<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="my-5 text-left text-3xl font-semibold">
        Welcome Back
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <input type="hidden" name="latitude" id="latitude" />
        <input type="hidden" name="longitude" id="longitude" />
        <input type="hidden" name="temperature_min" id="temperature_min" />
        <input type="hidden" name="temperature_max" id="temperature_max" />

        <div class="my-3 w-full">
            <x-input-label for="reCAPTCHA" :value="__('reCAPTCHA')" />
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex justify-between">
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                Masuk
            </x-primary-button>
        </div>
    </form>

    <div class="my-3 mx-auto text-center">{{ __('Belum punya akun?') }}
        <a href="{{route('register')}}" class="text-green-600 hover:text-green-800"> {{ __('Daftar') }}</a>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById('latitude').value = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;

                fetch(`/get-weather?lat=${position.coords.latitude}&lon=${position.coords.longitude}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('temperature_min').value = data.main.temp_min;
                        document.getElementById('temperature_max').value = data.main.temp_max;
                    })
                    .catch(error => {
                        console.error('Error fetching weather data:', error);
                    });
            });
        });
    </script>



</x-guest-layout>
