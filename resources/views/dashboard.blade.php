<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('GEOCARD') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @php
                    $cardId = Auth::user()->card_id;
                    $card = App\Models\Card::where('id', $cardId)
                        ->with('countries')
                        ->first();
                    $residence = $card ? $card->residence : ''; // $cardオブジェクトがnullでないことを確認し、nullの場合は空の文字列を設定
                    $comments = $card ? $card->comments : '';
                    $username = Auth::user()->name; // ユーザー名を取得
                @endphp
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>{{ __('WELCOME! ') }}{{ Auth::user()->name }}</div>
                    @include('partials.show')
                    {{-- <img src="{{ asset('image/geocardsample2.png') }}" alt=""> --}}
                    {{-- {{ $templates->filename }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
