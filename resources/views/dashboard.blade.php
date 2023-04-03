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
                    {{-- <div>{{ __('WELCOME! ') }}{{ Auth::user()->name }}</div> --}}
                    @include('partials.show')
                    {{-- <img src="{{ asset('image/geocardsample2.png') }}" alt=""> --}}
                    {{-- {{ $templates->filename }} --}}
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200" style="margin-bottom: 100px;">
            <table class="text-center w-full border-collapse">
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest uppercase text-lg text-grey-dark border-b border-grey-light">
                            今後どこに行く？
                        </th>
                    </tr>
                </thead>
                @php
                    $feeds = \App\Models\Feed::getAllOrderByUpdated_at();
                @endphp
                <tbody>
                    @foreach ($feeds->take(5) as $feed)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">
                                {{-- AVATAR --}}
                                <div class="relative inline-block flex">
                                    <img style="height: 2.5rem; width: 2.5rem; border-radius: 50%; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);"
                                        src="{{ $feed->user->avatar ? asset('storage/' . $feed->user->file_path) : asset('image/avatar_default3.png') }}"
                                        alt="Avatar Image">
                                    {{-- <span
                                                    class="absolute bottom-0 right-0 block h-1.5 w-1.5 rounded-full ring-2 ring-white bg-gray-400"></span> --}}
                                    <div style="margin-left: 20px; font-family: 'Noto Sans JP', sans-serif;">
                                        <a href="{{ route('user.show', $feed->user->id) }}">
                                            <p class="text-left text-grey-dark" style="font-size: 14px;">
                                                {{ $feed->user->name }}</p>
                                        </a>
                                        <a herf="{{ route('feed.show', $feed->id) }}">
                                            <h3 class="text-left font-bold text-lg text-grey-dark"
                                                style="font-size: 14px; margin-top: 10px;">
                                                {{ $feed->feed }}
                                            </h3>
                                        </a>
                                    </div>
                                </div>


                                <div class="flex justify-end">
                                    <a herf="{{ route('feed.show', $feed->id) }}">
                                        <h3 class="text-right font-bold text-lg text-grey-dark"
                                            style="font-size: 10px; color:grey; margin-top: 10px;">
                                            {{ $feed->created_at }}
                                        </h3>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <a href="{{ route('feed.timeline') }}"
                class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                READ MORE
            </a>
        </div>
    </div>
    </div>
</x-app-layout>
