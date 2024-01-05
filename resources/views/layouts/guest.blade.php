<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex items-center min-h-screen p-6 bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden rounded-lg shadow-xl relative">
                <div class="flex flex-col md:flex-row h-full">
                    <div class="relative md:w-1/2 h-32 md:h-auto">
                        <!-- Efek gelap menggunakan pseudo-element ::before -->
                        <div class="absolute inset-0">
                            <div class="bg-black opacity-60 w-full h-full absolute inset-0"></div>
                        </div>
                        <img src="{{asset('assets/images/bg-login.jpg')}}" alt="" class="object-cover w-full h-full">
                    </div>
                    <div class="flex flex-col justify-center p-6 sm:p-[4.5rem] md:w-1/2">
                        <x-application-logo class="fill-current w-16 h-12 text-gray-500" />
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <div id="locationModal" class="fixed z-20 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:py-6 sm:px-4 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Aktifkan Lokasi
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Website ini membutuhkan akses lokasi untuk memberikan informasi rekomendasi tanaman hias. Mohon aktifkan lokasi pada perangkat Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button id="allowLocationBtn" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Aktifkan Lokasi
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                function showLocationModal() {
                    var locationModal = document.getElementById('locationModal');
                    locationModal.classList.remove('hidden');
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
        </script>

    </body>
</html>
