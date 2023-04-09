<x-app-layout>
    <div style="position: relative; margin-top: 65px;">
        <img src="{{ asset('/image/title11.png') }}" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">QR CODE</h2>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p style="text-align: center">どちらか一方の読み取りでOK！</p>
            <div class="">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: white">
                    <div class="flex justify-center items-center h-full">
                        <img src="data:image/png;base64,{{ $src }}">
                        {{-- {!! QrCode::size(100)->generate('hello!!!') !!} --}}
                    </div>
                    <div class="visible-print text-center">
                        {{-- <p>QRコード読み取り</p> --}}
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div style="background-color: rgb(246, 215, 89); padding: 5px 10px; border-radius: 30px;">
                        <p style="font-size: 12px; margin: 10px;">{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <div class="p-6 bg-white">
                    <a href="{{ url()->previous() }}" style="margin-top: 30px"
                        class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        Back
                    </a>
                </div>
            </div>
        </div>
</x-app-layout>
