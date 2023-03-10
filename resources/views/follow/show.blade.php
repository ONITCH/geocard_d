<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Follow Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">follow</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feeds as $feed)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">

                                    <!-- π½ γγγγη·¨ι -->
                                    <div class="flex">
                                        <p class="text-left text-grey-dark">{{$feed->user->name}}</p>
                                        <!-- follow ηΆζγ§ζ‘δ»Άεε² -->
                                        @if(Auth::user()->followings()->where('users.id', $feed->user->id)->exists())
                                        <!-- unfollow γγΏγ³ -->
                                        <form action="{{ route('unfollow', $feed->user) }}" method="POST" class="text-left">
                                            @csrf
                                            <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-red py-1 px-2 focus:outline-none focus:shadow-outline">
                                                <svg class="h-6 w-6 text-red-500" fill="yellow" viewBox="0 0 24 24" stroke="red">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" />
                                                </svg>
                                                {{ $feed->user->followers()->count() }}
                                            </button>
                                        </form>
                                        @else
                                        <!-- follow γγΏγ³ -->
                                        <form action="{{ route('follow', $feed->user) }}" method="POST" class="text-left">
                                            @csrf
                                            <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
                                                <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" />
                                                </svg>
                                                {{ $feed->user->followers()->count() }}
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                    <!-- πΌ γγγΎγ§η·¨ι -->


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>