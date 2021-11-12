<x-guest-layout>
    <x-auth-card>
      <x-slot name="logo">
            <a href="/">
               <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" />-->
                <div class="panel-body">
                    <img src="{{ asset('logo.png') }}" alt="IHI logo">
                </div>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="fname" :value="__('First Name')"></x-label>

                <x-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autofocus></x-input>
            </div>

                <!-- Last Name -->
                <div>
                    <x-label for="lname" :value="__('Last Name')"></x-label>

                    <x-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus></x-input>
                </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"></x-label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required></x-input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"></x-label>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password"></x-input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"></x-label>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required></x-input>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <br><br>
    </x-auth-card>
    <x-footer></x-footer>
</x-guest-layout>
