<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" style="color:black;">
            {{ __('▶︎パスワードの変更') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 ">
            {{ __('') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" style="background-color:white;">
        @csrf
        @method('put')

        <div>
            <x-input-label style="color:black;" for="current_password" :value="__('現在のパスワード')" />
            <x-text-input style="background-color:white; color:black;" id="current_password" name="current_password"
                type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label style="color:black;" for="password" :value="__('新しいパスワード')" />
            <x-text-input style="background-color:white; color:black;" id="password" name="password" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label style="color:black;" for="password_confirmation" :value="__('もう一度入力')" />
            <x-text-input style="background-color:white; color:black;" id="password_confirmation"
                name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
