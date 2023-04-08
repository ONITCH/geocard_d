<!-- resources/views/user/show.blade.php -->
<link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@700&family=Kiwi+Maru&family=Noto+Sans+JP&family=Potta+One&family=Reggae+One&amily=Yusei+Magic&display=swap"
    rel="stylesheet">


<x-app-layout>
    <div style="position: relative; margin-top: 65px;">
        <img src="{{ asset('/image/title10.png') }}" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">FRIENDS INFO</h2>
        </div>
    </div>

    <div class="py-6" style="margin-bottom:70px">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="card" style="position: relative; width: 100%; margin-bottom:30px">
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

                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">▶︎ 訪れた国</p>
                            <ul class="py-2 px-3 text-grey-darkest" id="visited">
                                @foreach ($user->userCountries->sortBy('country_id') as $userCountry)
                                    <li
                                        style="font-size: 0.5em;display: inline-block;margin: 0 .1em .6em 0;padding: .6em; line-height: 1;text-decoration: none; color: #0000ee;background-color: #fff; border: 1px solid #0000ee; border-radius: 2em;">
                                        {{ $userCountry->country->name }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">▶︎ 連絡先</p>
                            <div>
                                @if ($user->contact1)
                                    <p class="py-2 px-3 text-grey-darkest mr-2">
                                        @if ($user->contact1_type === 'twitter')
                                            <a href="https://twitter.com/{{ $user->contact1 }}" target="_blank">
                                                <img src="{{ asset('image/twitter.png') }}" alt="twitter"
                                                    width="40" height="40">
                                            </a>
                                        @elseif ($user->contact1_type === 'instagram')
                                            <a href="https://www.instagram.com/{{ $user->contact1 }}" target="_blank">
                                                <img src="{{ asset('image/insta.png') }}" alt="instagram"
                                                    width="40" height="40">
                                            </a>
                                        @else
                                            <img src="{{ asset('image/other.png') }}" alt="other" width="40"
                                                height="40" class="flex mr-2">
                                            <p>{{ $user->contact1 }}</p>
                                        @endif
                                    </p>
                                @endif
                                @if ($user->contact2)
                                    <p class="py-2 px-3 text-grey-darkest mr-2">
                                        @if ($user->contact2_type === 'twitter')
                                            <a href="https://twitter.com/{{ $user->contact2 }}" target="_blank">
                                                <img src="{{ asset('image/twitter.png') }}" alt="twitter"
                                                    width="40" height="40">
                                            </a>
                                        @elseif ($user->contact2_type === 'instagram')
                                            <a href="https://www.instagram.com/{{ $user->contact2 }}" target="_blank">
                                                <img src="{{ asset('image/insta.png') }}" alt="instagram"
                                                    width="40" height="40">
                                            </a>
                                        @else
                                            <img src="{{ asset('image/other.png') }}" alt="other" width="40"
                                                height="40" class="flex mr-2">
                                            <p>{{ $user->contact2 }}</p>
                                        @endif
                                    </p>
                                @endif
                            </div>
                        </div>

                        {{-- フォローした日を取得したかった --}}
                        {{-- <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Friends since</p>
                            @if ($users[0]->followings->contains($user))
                                <p class="py-2 px-3 text-grey-darkest">
                                    {{ $users[0]->followings->find($user->id)->pivot->created_at->format('Y/m/d') }}
                                </p>
                            @endif
                        </div> --}}


                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">▶︎ Joined at</p>
                            <p class="py-2 px-3 text-grey-darkest" id="created_at">
                                {{ $user->created_at->format('Y/m/d') }}
                            </p>
                        </div>

                        {{-- <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">{{ $followers->count() }}
                                Followers</p> --}}
                        {{-- @foreach ($followers as $follower)
                                <p class="py-2 px-3 text-grey-darkest" id="followers{{ $loop->index }}">
                                    {{ $follower->name }}
                                </p>
                            @endforeach --}}
                    </div>

                    {{-- <div class="flex flex-col mb-4">
                        <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">{{ $followings->count() }}
                            Following</p> --}}
                    {{-- @foreach ($followings as $following)
                                <p class="py-2 px-3 text-grey-darkest" id="followings{{ $loop->index }}">
                                    {{ $following->name }}
                                </p>
                            @endforeach --}}
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
