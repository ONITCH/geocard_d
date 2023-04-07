<x-app-layout>
    <div style="position: relative; margin-top: 65px;">
        <img src="{{ asset('image/title6.png') }}" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">MY CARD</h2>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden  sm:rounded-lg">
                {{-- <div class="p-6 bg-white border-b border-gray-200"> --}}
                <table class="text-center w-full border-collapse">
                    <tbody>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-6 px-6">
                                @include('partials.show')

                                <div style="display: flex; justify-content: space-between; margin-top:16px;">
                                    <div class="flex mt-8">
                                        <a href="{{ url('card/create') }}" style="text-decoration: none;"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">
                                            <img src="{{ asset('image/menu_card.png') }}" alt="QR"width="80"
                                                height="80">
                                            <p style="font-size: 12px;">GEOCARD作成</p>
                                        </a>

                                    </div>
                                    <div class="flex mt-8">
                                        <a href="{{ url('profile') }}"
                                            style="text-decoration: none; display: flex; flex-direction: column; align-items: center;""
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">
                                            <img src="{{ asset('image/menu_profile.png') }}"
                                                alt="QR"width="80" height="80">
                                            <p style="font-size: 12px;">プロフィール編集</p>
                                        </a>

                                    </div>

                                    <div class="flex mt-8"
                                        style="display: flex; flex-direction: justify-content: center;">
                                        <a href="{{ url('card/countries') }}" style="text-decoration: none;"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">
                                            <img src="{{ asset('image/menu_countries.png') }}"
                                                alt="QR"width="80" height="80">
                                            <p style="font-size: 12px;">訪問国を選択</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex mt-8">
                                    <a href="{{ url('qrcode') }}" style="text-decoration: none;"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">
                                        <img src="{{ asset('image/menu_qr.png') }}" alt="QR"width="80"
                                            height="80">
                                        <p style="font-size: 12px;">QRコード表示</p>
                                    </a>

                                </div>

                                {{-- <div class="flex mt-4">
                                    カメラきどう？
                                </div> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
