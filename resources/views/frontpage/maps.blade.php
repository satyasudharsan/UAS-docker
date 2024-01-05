<x-green-layout>

    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="flex justify-end relative z-0 opacity-40">
            <img class="absolute w-80 scale-x-[-1]" src="{{ asset('assets/images/palm.png') }}" alt="images">
        </div>
    </div>
    <div class="item opacity-0 transition duration-1000 ease-in-out delay-300">
        <div class="relative z-0 opacity-40">
            <img class="absolute w-64" src="{{ asset('assets/images/palm.png') }}" alt="images">
        </div>
    </div>

    <section class="mt-10 py-20 px-12 md:px-20 relative z-10">
        <div class="mb-10">
            <h2 class="font-bold mx-auto text-center text-2xl md:text-3xl">Rekomendasi Berdasarkan Maps</h2>
            <div class="text-center text-base md:text-lg text-grey-light mt-4 p-3 space-x-5">
                <span id="latitude"></span>
                <span id="longitude"></span>
            </div>
            <div class="flex justify-center">
                <div class="text-center pb-2 space-y-3">
                    <div class="text-lg text-grey-light">
                        <span id="min-temperature" class="text-right text-sm md:text-base"></span>
                        <span id="temperature" class="text-center text-2xl md:text-3xl text-slate-900 mx-6"></span>
                        <span id="max-temperature" class="text-left text-sm md:text-base"></span>
                    </div>
                    <button id="recommendPlantsBtn" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring focus:border-blue-300">
                        Rekomendasi
                    </button>
                </div>
            </div>
        </div>

        <div class="max-w-[85rem] px-4 pb-10 sm:px-6 lg:px-8 lg:pb-14 mx-auto">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6"  id="recommendationsContainer">

            </div>
        </div>

        <div id="map" class="w-full h-2/3 rounded-lg item opacity-0 transition duration-1000 ease-in-out delay-300"></div>
    </section>

        {{-- L.map.setView([latitude, longitude], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
                }).addTo(map); --}}

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var map = L.map('map');
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                    }).addTo(map);
            var marker;
            var temperatureData = [];

            window.addEventListener('resize', function() {
                map.invalidateSize();
            });

            function showLocationModal() {
                var locationModal = document.getElementById('locationModal');
                locationModal.classList.remove('hidden');
            }

            function showWeatherData(latitude, longitude) {
                map.setView([latitude, longitude], 13);


                if (marker) {
                    marker.setLatLng([latitude, longitude]);
                } else {
                    marker = L.marker([latitude, longitude]).addTo(map)
                        .bindPopup('You are here!');
                }

                document.getElementById('latitude').innerText = `Latitude: ${latitude}`;
                document.getElementById('longitude').innerText = `Longitude: ${longitude}`;

                fetch(`/get-weather?lat=${latitude}&lon=${longitude}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('temperature').innerText = `${data.main.temp} °C`;
                        document.getElementById('min-temperature').innerText = `${data.main.temp_min} °C`;
                        document.getElementById('max-temperature').innerText = `${data.main.temp_max} °C`;

                        // Update the location in the database
                        updateLocation(latitude, longitude, data.main.temp_min, data.main.temp_max);
                    })
                    .catch(error => {
                        console.error('Error fetching weather data:', error);
                    });
            }

            function updateLocation(latitude, longitude, temperatureMin, temperatureMax) {
                fetch('/update-location', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        latitude: latitude,
                        longitude: longitude,
                        temperatureMin: temperatureMin,
                        temperatureMax: temperatureMax,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Location updated successfully:', data);
                })
                .catch(error => {
                    console.error('Error updating location:', error);
                });
            }

            function requestGeolocation() {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        showWeatherData(position.coords.latitude, position.coords.longitude);
                    },
                    function(error) {
                        showLocationModal();
                    }
                );
            }

            var allowLocationBtn = document.getElementById('allowLocationBtn');
            allowLocationBtn.addEventListener('click', function() {
                var locationModal = document.getElementById('locationModal');
                locationModal.classList.add('hidden');
                requestGeolocation();
            });

            if (navigator.geolocation) {
                requestGeolocation();
            } else {
                showLocationModal();
            }

            map.on('click', function(e) {
                var latitude = e.latlng.lat;
                var longitude = e.latlng.lng;

                temperatureData = [];

                showWeatherData(latitude, longitude);
            });

            var recommendPlantsBtn = document.getElementById('recommendPlantsBtn');
            recommendPlantsBtn.addEventListener('click', function() {

                var currentLocation = marker.getLatLng();
                var latitude = currentLocation.lat;
                var longitude = currentLocation.lng;

                fetch(`/get-recommendations?lat=${latitude}&lon=${longitude}`)
                    .then(response => response.json())
                    .then(data => {
                        updateLocation(latitude, longitude, data.temperatureMin, data.temperatureMax);

                        displayPlantRecommendations(data.recommendedPlants);
                    })
                    .catch(error => {
                        console.error('Error fetching plant recommendations:', error);
                    });
            });

            // ...

            // Tambahkan fungsi untuk menampilkan rekomendasi tanaman
            function displayPlantRecommendations(recommendedPlants) {
                var recommendationsContainer = document.getElementById('recommendationsContainer');
                recommendationsContainer.innerHTML = ''; // Bersihkan kontainer sebelum menambahkan data baru

                if (recommendedPlants.length === 0) {
                    recommendationsContainer.innerHTML = '<p>Tidak ada rekomendasi pada lokasi tersebut.</p>';
                    return;
                }

                recommendedPlants.forEach(function(plant) {
                    var plantHtml = `
                        <a class="group flex flex-col bg-primary2 border shadow-sm rounded-xl hover:shadow-md transition" href="/plant/${plant.nama_tanaman}">
                            <div class="p-4 md:p-5">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img class="h-[2.375rem] w-[2.375rem] rounded-full object-cover" src="${plant.plant_img}" alt="Image Description">
                                        <div class="ml-3">
                                            <h3 class="group-hover:text-green-600 font-semibold text-gray-800 ">
                                                ${plant.nama_tanaman}
                                            </h3>
                                            <div class="flex space-x-2">
                                                <p class="text-sm text-gray-500">
                                                    Min: ${plant.suhu_min} °C
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    Max: ${plant.suhu_max} °C
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-3">
                                        <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;

                    recommendationsContainer.innerHTML += plantHtml;
                });
            }
        });
    </script>

</x-green-layout>
