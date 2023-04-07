<link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@700&family=Kiwi+Maru&family=Noto+Sans+JP&family=Potta+One&family=Reggae+One&amily=Yusei+Magic&display=swap"
    rel="stylesheet">
<x-app-layout>
    <div style="position: relative; margin-top: 65px;">
        <img src="/image/title7.png" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">TRAVELERS</h2>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-bottom: 80px;">
            <div class="py-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100"> --}}
                <div class="  max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        {{-- <div class="py-6"> --}}
                        @if (Auth::user()->followings)
                            @foreach (Auth::user()->followings as $friend)
                                {{-- @if ($friend->card) --}}
                                @php
                                    $card = $friend->card;
                                    $residence = $card ? $card->residence : '';
                                    $comments = $card ? $card->comments : '';
                                    $username = $friend->name;
                                @endphp
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-2">
                                        <a href="{{ route('user.show', ['user' => $friend->id]) }}">
                                            <div class="card"
                                                style="position: relative; width: 100%; margin-bottom:10px">
                                                @if ($friend->card)
                                                    <div class="card" style="position: relative; width: 100%;">
                                                        {{-- @if ($friend->card->template) --}}
                                                        <img src="{{ asset('storage/' . $friend->card->template->file_path) }}"
                                                            style="display: block; max-width: 100%; height: auto; box-shadow: {{ $friend->card->template->box_shadow }};">
                                                        {{-- CSS1 --}}
                                                        <div class="card-content"
                                                            style="{{ $friend->card && $friend->card->template && $friend->card->template->CSS1 ? $friend->card->template->CSS1 : 'position: absolute; top: 80px; left: 50px; right: auto; color: rgba(0,0,0); text-align: left; font-family: \'Noto Sans JP\', sans-serif;' }}">

                                                            @if (!empty($friend->card->comments))
                                                                <p style="margin: 0; font-size: 12px;">
                                                                    "{{ $friend->card->comments }}"</p>
                                                            @endif
                                                            <p style="margin: 0; font-size: 18px;">
                                                                {{ $friend->name }}</p>
                                                            @if (!empty($friend->card->residence))
                                                                <p style="margin: 0; font-size: 12px;">from
                                                                    {{ $friend->card->residence }}</p>
                                                            @endif
                                                        </div>
                                                        @if ($friend->card->file_path)
                                                            {{-- CSS2 --}}
                                                            <img style="{{ $friend->card && $friend->card->template ? $friend->card->template->CSS2 : '' }}"
                                                                src="{{ $friend->card->card_avatar ? asset('storage/' . $friend->card->file_path) : '/image/avatar_default.png' }}"
                                                                alt="Card Avatar Image">
                                                        @else
                                                            <p></p>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="card" style="position: relative; width: 100%;">
                                                        <img src="{{ asset('/image/Default_Card.png') }}"
                                                            alt="Default Image">
                                                        <div class="card-content"
                                                            style="position: absolute; top: 80px; left: 50px; right: auto; color: rgba(0,0,0); text-align: left; font-family: 'Noto Sans JP', sans-serif;">
                                                            <p style="margin: 0; font-size: 18px;">
                                                                {{ $friend->name }}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </a>
                                    </div>
                                </div>
                                {{-- @endif --}}
                            @endforeach
                        @endif
                        {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
