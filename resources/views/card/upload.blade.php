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
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">
                                    CARD TEMPLATES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
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
                                    <form method="post" action="{{ route('upload_image') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="image" accept="image/png, image/jpeg">
                                        {{-- <input type="hidden" name="template_id" value="{{ $template_id }}"> --}}
                                        <button type="submit"
                                            class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                            送信
                                        </button>
                                    </form>

                                    {{-- <a href="{{ route('card/upload') }}">Upload</a>
<hr /> --}}

                                    @foreach ($images as $image)
                                        <div style="width: 15rem; float:left; margin: 16px;">
                                            <img src="{{ Storage::url($image->file_path) }}" style="width:100%;" />
                                            <p>{{ $image->filename }}</p>
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
