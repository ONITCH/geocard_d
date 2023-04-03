<!-- resources/views/user/show.blade.php -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Reggae+One&display=swap" rel="stylesheet">


<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show User Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="card" style="position: relative; width: 100%;">
                            @if ($user->card && $user->card->template)
                                <img src="{{ asset('storage/' . $user->card->template->file_path) }}"
                                    style="display: block; max-width: 100%; height: auto; box-shadow: {{ $user->card->template->box_shadow }};">
                            @else
                                <img src="{{ asset('/image/Default_Card.png') }}" alt="Default Image"
                                    style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3)">
                            @endif
                            {{-- CSS1 --}}
                            <div class="card-content"
                                style="{{ $user->card && $user->card->template && $user->card->template->CSS1 ? $user->card->template->CSS1 : 'position: absolute; top: 80px; left: 50px; right: auto; color: rgba(0,0,0); text-align: left; font-family: \'Noto Sans JP\', sans-serif;' }}">

                                @if (!empty($user->card->comments))
                                    <p style="margin: 0; font-size: 12px;">"{{ $user->card->comments }}"</p>
                                @endif
                                <p style="margin: 0; font-size: 18px;">{{ $user->name }}</p>
                                @if (!empty($user->card->residence))
                                    <p style="margin: 0; font-size: 12px;">from {{ $user->card->residence }}</p>
                                @endif
                            </div>
                            @if ($user->card && $user->card->file_path)
                                {{-- CSS2 --}}
                                <img style="{{ $user->card && $user->card->template ? $user->card->template->CSS2 : '' }}"
                                    src="{{ asset('storage/' . $user->card->file_path) }}" alt="Card Avatar Image">
                            @endif
                        </div>
                        {{-- <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Name</p>
                            <p class="py-2 px-3 text-grey-darkest" id="name">
                                {{ $user->name }}
                            </p>
                        </div> --}}
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Joined_at</p>
                            <p class="py-2 px-3 text-grey-darkest" id="created_at">
                                {{ $user->created_at }}
                            </p>
                        </div>




                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">{{ $followers->count() }}
                                Followers</p>
                            @foreach ($followers as $follower)
                                <p class="py-2 px-3 text-grey-darkest" id="followers{{ $loop->index }}">
                                    {{ $follower->name }}
                                </p>
                            @endforeach
                        </div>

                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">{{ $followings->count() }}
                                Following</p>
                            @foreach ($followings as $following)
                                <p class="py-2 px-3 text-grey-darkest" id="followings{{ $loop->index }}">
                                    {{ $following->name }}
                                </p>
                            @endforeach
                        </div>

                        <a href="{{ url()->previous() }}"
                            class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
