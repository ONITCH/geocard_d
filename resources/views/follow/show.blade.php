<x-app-layout>
    <div style="position: relative; margin-top: 65px;">
        <img src="{{ asset('/image/title11.png') }}" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">FOLLOW ME!</h2>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
            <div class="p-6 bg-white">
                <table class="text-center w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark ">
                                ★をクリックしてフォロー</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6">

                                    <!-- 🔽 ここから編集 -->
                                    <div class="flex flex-col items-center">
                                        <p class="text-left text-grey-dark">{{ $user->name }}</p>
                                        <!-- follow 状態で条件分岐 -->
                                        @if (Auth::user()->followings()->where('users.id', $user->id)->exists())
                                            <!-- unfollow ボタン -->
                                            <form action="{{ route('unfollow', $user) }}" method="POST"
                                                class="text-left">
                                                @csrf
                                                <button type="submit"
                                                    class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-red py-1 px-2 focus:outline-none focus:shadow-outline">
                                                    <svg class="h-6 w-6 text-red-500" fill="yellow" viewBox="0 0 24 24"
                                                        stroke="red">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1"
                                                            d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" />
                                                    </svg>
                                                    {{-- {{ $user->followers()->count() }} --}}
                                                </button>
                                            </form>
                                        @else
                                            <!-- follow ボタン -->
                                            <form action="{{ route('follow', $user) }}" method="POST"
                                                class="text-left">
                                                @csrf
                                                <button type="submit"
                                                    class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
                                                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="black">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1"
                                                            d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" />
                                                    </svg>
                                                    {{-- {{ $user->followers()->count() }} --}}
                                                </button>
                                            </form>
                                        @endif

                                    </div>
                                    <!-- 🔼 ここまで編集 -->


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
