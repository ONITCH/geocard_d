<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Card Edit') }}
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
                                    編集</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <h3 class="text-left font-bold text-lg text-grey-dark">ここにMY　CARD</h3>
                                    <div class="flex">
                                        プロフィール画像を設定する（AVATAR）
                                        <form action="/avatar" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="avatar">
                                            <button type="submit">Upload Avatar</button>
                                        </form>
                                    </div>
                                    <div class="flex">
                                        QRコード

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
