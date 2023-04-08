<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" style="color:black;">
            {{ __('▶︎プロフィール画像の変更') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('　画像はFEED画面に表示されます') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div style="display: flex; justify-content: center; align-items: center; margin-top: 20px; margin-bottom: 20px">
        @if (auth()->user()->avatar)
            <img style="height: 10rem; width: 10rem; border-radius: 50%; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);"
                src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" alt="Avatar">
        @else
            <img style="height: 10rem; width: 10rem; border-radius: 50%; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);"
                src="{{ asset('image/avatar_default3.png') }}" alt="Default Avatar">
        @endif
    </div>

    <form action="{{ route('avatar.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="avatar">
        <x-primary-button class="mt-2">SAVE</x-primary-button>
    </form>

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" style="color:black;">
            {{ __('▶︎連絡先情報を登録') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('　FRIENDS画面で個人ページに表示されます') }}
            {{ __('　twitter/instagramはユーザーネームを入力') }}
        </p>
    </header>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <p>連絡先①</p>
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" name="contact1_type" value="twitter" class="form-radio">
                    <span class="ml-2">Twitter</span>
                </label>

                <label class="inline-flex items-center ml-6">
                    <input type="radio" name="contact1_type" value="instagram" class="form-radio">
                    <span class="ml-2">Instagram</span>
                </label>

                <label class="inline-flex items-center ml-6">
                    <input type="radio" name="contact1_type" value="other" class="form-radio">
                    <span class="ml-2">Other</span>
                </label>
            </div>
            {{-- <x-input-label for="contact1" :value="__('Contact 1')" /> --}}
            <x-text-input style="background-color:white; color:black;" id="contact1" name="contact1" type="text"
                class="mt-1 block w-full" :value="old('contact1', $user->contact1)" autofocus autocomplete="contact1" />



            <x-input-error class="mt-2" :messages="$errors->get('contact1_type')" />
        </div>

        <div>
            <p>連絡先②</p>
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" name="contact2_type" value="twitter" class="form-radio">
                    <span class="ml-2">Twitter</span>
                </label>

                <label class="inline-flex items-center ml-6">
                    <input type="radio" name="contact2_type" value="instagram" class="form-radio">
                    <span class="ml-2">Instagram</span>
                </label>

                <label class="inline-flex items-center ml-6">
                    <input type="radio" name="contact2_type" value="other" class="form-radio">
                    <span class="ml-2">Other</span>
                </label>
            </div>
            {{-- <x-input-label for="contact2" :value="__('Contact 2')" /> --}}
            <x-text-input style="background-color:white; color:black;" id="contact2" name="contact2" type="text"
                class="mt-1 block w-full" :value="old('contact2', $user->contact2)" autocomplete="contact2" />
            <x-input-error class="mt-2" :messages="$errors->get('contact2')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>


    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" style="color:black;">
            {{ __('▶︎名前の編集') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('　GEOCARDに表示されます。名前を覚えてもらう') }}<br>
            {{ __('　ためにもフルネームで表示しましょう') }}
        </p>
    </header>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')


        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input style="background-color:white; color:black;" id="name" name="name" type="text"
                class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input style="background-color:white; color:black;" id="email" name="email" type="email"
                class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
