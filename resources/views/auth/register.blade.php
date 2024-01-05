<x-guest-layout>
    <div class="my-5 text-3xl font-semibold">
        Sign Up For Free
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <input type="hidden" name="latitude" id="latitude" />
        <input type="hidden" name="longitude" id="longitude" />
        <input type="hidden" name="temperature_min" id="temperature_min">
        <input type="hidden" name="temperature_max" id="temperature_max">

        <div class="my-3 max-w-xl mx-auto">
            <x-input-label for="reCAPTCHA" :value="__('reCAPTCHA')" />
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                Daftar
            </x-primary-button>
        </div>
    </form>

    <div class="my-3 mx-auto text-center ">{{ __('Sudah punya akun?') }}
        <a href="{{route('login')}}" class="text-green-600 hover:text-green-800"> {{ __('Masuk') }}</a>
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
