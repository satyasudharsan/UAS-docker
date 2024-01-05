document.addEventListener("DOMContentLoaded", function () {
    var header = document.querySelector("header");
    var nav = document.querySelector("nav");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 0) {
            header.style.backgroundColor = "white";
            header.style.boxShadow = "0 2px 4px rgba(0, 0, 0, 0.1)";
            nav.style.backgroundColor = "white";
        } else {
            header.style.backgroundColor = "transparent";
            header.style.boxShadow = "none";
            nav.style.backgroundColor = "transparent";
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var dismissButton = document.getElementById('dismissButton');

    if (dismissButton) {
        dismissButton.addEventListener('click', function() {
            var cookieBanner = document.getElementById('cookies-simple-with-dismiss-button');
            if (cookieBanner) {
                cookieBanner.remove();
            }
        });
    }
});

//open browser
document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.item');

    items.forEach((item, index) => {
        setTimeout(() => {
            item.classList.add('opacity-100');
        }, 400 * (index + 1));
    });
});

document.addEventListener("DOMContentLoaded", function() {
    function showLocationModal() {
        var locationModal = document.getElementById('locationModal');
        locationModal.classList.remove('hidden');
    }

    function showWeatherData(latitude, longitude) {
        fetch(`/get-weather?lat=${latitude}&lon=${longitude}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('city').innerText = `${data.name}`;
                document.getElementById('latitude').innerText = `Latitude: ${latitude}`;
                document.getElementById('longitude').innerText = `Longitude: ${longitude}`;
                document.getElementById('temperature').innerText = `${data.main.temp} °C`;
                document.getElementById('min-temperature').innerText = `${data.main.temp_min} °C`;
                document.getElementById('max-temperature').innerText = `${data.main.temp_max} °C`;

                updateRecommendation(latitude, longitude, data.main.temp_min, data.main.temp_max);
            })
            .catch(error => {
                console.error('Error fetching weather data:', error);
            });
    }

    function updateRecommendation(latitude, longitude, temperatureMin, temperatureMax) {
        fetch('/update-recommendation', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
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
            // Handle the response if needed
            console.log('Recommendation updated successfully:', data);
        })
        .catch(error => {
            console.error('Error updating recommendation:', error);
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
        // Hide the location modal
        var locationModal = document.getElementById('locationModal');
        locationModal.classList.add('hidden');

        requestGeolocation();
    });

    if (navigator.geolocation) {

        requestGeolocation();
    } else {

        showLocationModal();
    }
});




