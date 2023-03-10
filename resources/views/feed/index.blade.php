<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">feed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feeds as $feed)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('user.show', $feed->user->id) }}">
                                        <p class="text-left text-grey-dark">{{$feed->user->name}}</p>
                                    </a>
                                    <a herf="{{route('feed.show',$feed->id)}}">
                                        <h3 class="text-left font-bold text-lg text-grey-dark">{{$feed->feed}}</h3>
                                    </a>
                                    <div class="flex">
                                        @if($feed->user_id===Auth::user()->id)

                                        <!-- 更新ボタン -->
                                        <form action="{{ route('feed.edit',$feed->id) }}" method="GET" class="text-left">
                                            @csrf
                                            <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        </form>
                                        <!-- 削除ボタン -->
                                        <form action="{{ route('feed.destroy',$feed->id) }}" method="POST" class="text-left">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('common.errors')
                    <form class="mb-6" action="{{ route('feed.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <!-- <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="feed">User_id消す</label>
                            <input class="border py-2 px-3 text-grey-darkest" type="integer" name="user_id" id="user_id"> -->
                            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="feed">Feed</label>
                            <input class="border py-2 px-3 text-grey-darkest" type="text" name="feed" id="feed">
                        </div>
                        <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>