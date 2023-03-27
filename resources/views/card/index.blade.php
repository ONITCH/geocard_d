<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">
                                    MY CARD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <h3 class="text-left font-bold text-lg text-grey-dark">ここにMY　CARD</h3>
                                    <div class="flex">
                                        <a href="{{ url('card/create') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">カードを編集</a>

                                    </div>
                                    <div class="flex">
                                        <a href="{{ url('profile') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">プロフィールを編集</a>

                                    </div>
                                    <div class="flex">
                                        <a href="{{ url('qrcode') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">MY QRCode</a>

                                    </div>
                                    <div class="flex">
                                        カメラきどう？

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
