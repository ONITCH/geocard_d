<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label style="color: rgb(80, 80, 80)" for="email" :value="__('Email')" />
            <x-text-input style="background-color: white; color: rgb(80, 80, 80)" id="email" class="block mt-1 w-full"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label style="color: rgb(80, 80, 80)" for="password" :value="__('Password')" />

            <x-text-input style="background-color: white; color: rgb(80, 80, 80)" id="password"
                class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded bg-white border-gray-300 text-indigo-600 shadow-sm focus:ring-2 focus:ring-yellow-500"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400"
                    style="color: rgb(80, 80, 80)">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a style="color: rgb(80, 80, 80)"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3" style="border-color:gray;background-color:white; color: rgb(80, 80, 80)">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <a style="color: rgb(80, 80, 80)"
            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('register') }}">
            {{ __('新規登録はこちら') }}
        </a>
    </form>
</x-guest-layout>
