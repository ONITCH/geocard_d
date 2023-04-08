<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('FIND') }}
        </h2>
    </x-slot> --}}
    <div style="position: relative; margin-top: 65px;">
        <img src="{{ asset('image/title1.png') }}" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">SEARCH</h2>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    @include('common.errors')
                    <form class="mb-6" action="{{ route('find.search') }}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <div class="flex">
                                <input class="flex-1 border py-2 px-3 text-grey-darkest" type="text" name="find"
                                    id="find" placeholder="国名">
                                <button type="submit"
                                    class="ml-2 flex-shrink-0 py-3 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none w-20 md:w-auto">SEARCH</button>
                            </div>
                            <label class="mb-2 uppercase text-lg text-grey-darkest"
                                style="font-size:14px;color: black; margin-left:140px;" for="find">に行った人を探す</label>
                        </div>
                    </form>

                    <div class="mb-4" style="color: black; ">
                        <h3 style="margin-bottom:20px;">検索結果</h3>
                        <ul style="color: black; ">
                            @foreach ($users as $user)
                                <li>
                                    <a href="{{ route('user.show', ['user' => $user->id]) }}">
                                        <p style="margin-top:10px; margin-bottom:10px;">▶︎ {{ $user->name }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
