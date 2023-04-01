<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TEMPLATE UPLOADER') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                {{-- <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">
                                    CARD TEMPLATES</th>
                            </tr> --}}
                        </thead>
                        <tbody>
                            <tr class="hover:bg-grey-lighter">
                                {{-- <td class="py-4 px-6 border-b border-grey-light"> --}}
                                <h3 class="text-left font-bold text-lg text-grey-dark">UPLOAD PAGE</h3>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" accept="image/png, image/jpeg">
                                    <label for="box_shadow" class="block font-medium text-lg text-gray-700 mt-4">Box
                                        Shadow</label>
                                    <input type="text" name="box_shadow" id="box_shadow"
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">
                                    <label for="CSS1"
                                        class="block font-medium text-lg text-gray-700 mt-4">CSS1</label>
                                    <input type="text" name="CSS1" id="CSS1"
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">
                                    <label for="CSS2"
                                        class="block font-medium text-lg text-gray-700 mt-4">CSS2</label>
                                    <input type="text" name="CSS2" id="CSS2"
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">
                                    <button type="submit"
                                        class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                        送信
                                    </button>
                                </form>

                                {{-- <a href="{{ route('card/upload') }}">Upload</a>
<hr /> --}}

                                @foreach ($images as $image)
                                    <p>{{ $image->filename }}</p>
                                    <div
                                        style="wdisplay: block; max-width: 100%; height: auto; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                                        margin: 16px;">
                                        <img src="{{ asset(Storage::url($image->file_path)) }}" style="width:100%;" />

                                    </div>
                                @endforeach

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
