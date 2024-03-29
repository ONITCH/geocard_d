<link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@700&family=Kiwi+Maru&family=Noto+Sans+JP&family=Potta+One&family=Reggae+One&amily=Yusei+Magic&display=swap"
    rel="stylesheet">

<style>
    .form-bottom {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 999;
    }

    .icon-timestamp {
        display: flex;
        align-items: center;
    }

    .icon-timestamp svg {
        margin-right: 5px;
    }
</style>
<x-app-layout>
    <div style="position: relative; margin-top: 65px;">
        <img src="{{ asset('image/title2.png') }}" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">FEED</h2>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="margin-bottom: 180px;">
                    <table class="text-center w-full border-collapse" style="margin-bottom: 20px;">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest uppercase text-lg text-grey-dark border-b border-grey-light">
                                    次の目的地は？
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feeds->items() as $feed)
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
                                                <div>
                                                    <div style="font-size: 12px; margin-top: 12px; text-align:left;">
                                                        {{-- <span class="mr-2"></span> --}}
                                                        <span>{{ $feed->date1 }}</span>
                                                        <span>〜</span>
                                                        <span>{{ $feed->date2 }}</span>
                                                    </div>
                                                </div>
                                                <a herf="{{ route('feed.show', $feed->id) }}">
                                                    <h3 class="text-left font-bold text-lg text-grey-dark"
                                                        style="font-size: 14px;">
                                                        {{ $feed->feed }}
                                                    </h3>
                                                </a>

                                            </div>
                                        </div>


                                        <div class="flex justify-end">
                                            @if ($feed->user_id === Auth::user()->id)
                                                <form action="{{ route('feed.destroy', $feed->id) }}" method="POST"
                                                    style="text-align: right;">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                        <svg class="h-6 w-6 text-gray-500" fill="none"
                                                            viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
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


                        {{ $feeds->links() }}

                    </table>


                </div>
            </div>
        </div>
    </div>


    <div class="form-bottom py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-gray-100 border-b border-gray-200">
                    @include('common.errors')
                    <form class="mb-6" action="{{ route('feed.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <label class="mb-1 uppercase text-lg text-grey-darkest" for="feed"
                                style="font-size:14px;">▶︎ 次の目的地を書き込む</label>

                            <div class="flex" style="margin-bottom:10px;">
                                <input class="border py-1 px-1 text-grey-darkest" type="date" name="date1"
                                    id="date1" style="font-size:14px; width: 120px;">
                                <p class="mx-2 flex items-center justify-center"style="font-size:14px;">から</p>
                                <input class="
                                    border py-1 px-1 text-grey-darkest"
                                    type="date" name="date2" id="date2" style="font-size:14px; width: 120px;">
                            </div>
                            <div class="flex">
                                <input class="flex-1 border py-1 px-3 text-grey-darkest" type="text" name="feed"
                                    id="feed" style="font-size:14px;" placeholder="３０字まで">

                                <button type="submit"
                                    class="ml-2 flex-shrink-0 py-1 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none w-20 md:w-auto">Create</button>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">「台湾食べ歩き旅！」「東京出張」など</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
