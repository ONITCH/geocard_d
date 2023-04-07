<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label style="color: rgb(80, 80, 80)" for="name" :value="__('Name')" />
            <x-text-input style="background-color: white; color: rgb(80, 80, 80)" id="name" class="block mt-1 w-full"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label style="color: rgb(80, 80, 80)" for="email" :value="__('Email')" />
            <x-text-input style="background-color: white; color: rgb(80, 80, 80)" id="email"
                class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label style="color: rgb(80, 80, 80)" for="password" :value="__('Password')" />

            <x-text-input style="background-color: white; color: rgb(80, 80, 80)" id="password"
                class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label style="color: rgb(80, 80, 80)" for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input style="background-color: white; color: rgb(80, 80, 80)" id="password_confirmation"
                class="block mt-1 w-full" type="password" name="password_confirmation" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a style="color: rgb(80, 80, 80)"class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('登録済みの方はこちら') }}
            </a>

            <x-primary-button class="ml-4" style="border-color:gray; background-color: white; color: rgb(80, 80, 80)">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
