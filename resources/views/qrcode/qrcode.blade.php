<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('YOUR QR CODE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center items-center h-full">
                        {!! QrCode::size(100)->generate('hello!!!'); !!}</div>
                    <div class="visible-print text-center">
                        <p>QRコード読み取り</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>