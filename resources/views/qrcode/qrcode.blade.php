<x-app-layout>
    <div style="position: relative; margin-top: 65px;">
        <img src="{{ asset('/image/title11.png') }}" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">QR CODE</h2>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: white">
                    <div class="flex justify-center items-center h-full">
                        <img src="data:image/png;base64,{{ $src }}">
                        {{-- {!! QrCode::size(100)->generate('hello!!!') !!} --}}
                    </div>
                    <div class="visible-print text-center">
                        <p>QRコード読み取り</p>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center font-bold">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
</x-app-layout>
