<link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@700&family=Kiwi+Maru&family=Noto+Sans+JP&family=Potta+One&family=Reggae+One&amily=Yusei+Magic&display=swap"
    rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CREATE CARD') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-left font-bold text-lg text-grey-dark"> MY CARD CREATE</h3>
                    @include('common.errors')
                    <form class="mb-6" action="{{ route('card.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col mb-4">
                            @foreach ($images as $image)
                                <div class="flex flex-col gap-y-3">
                                    <div>
                                        <input type="radio" name="template_id"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="template_{{ $image->id }}" value="{{ $image->id }}">
                                        <label for="template_{{ $image->id }}"
                                            class="text-sm text-gray-500 ml-2 dark:text-gray-400">{{ $image->filename }}</label>
                                    </div>
                                    <div style="position: relative; width: 100%; margin-bottom: 16px;">
                                        <img src="{{ asset(Storage::url($image->file_path)) }}"
                                            style="display: block; max-width: 100%; height: auto; box-shadow: 0 0 10px rgb(69, 69, 69);">
                                        @php
                                            $template = $templates->where('filename', $image->filename)->first();
                                            // dd($template);
                                        @endphp
                                        @if ($template)
                                            <div class="card-content" style="{{ $template->CSS1 }}">
                                                <p style="margin: 0; font-size: 12px;">"タイ旅行ならお任せ"</p>
                                                <p style="margin: 0; font-size: 18px;">YOUR NAME</p>
                                                <p style="margin: 0; font-size: 12px;">from FUKUOKA, JAPAN</p>
                                            </div>
                                            <img style="{{ $template->CSS2 }}"
                                                src="{{ asset('/image/avatar_default3.png') }}" alt="Card Avatar Image">
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        {{-- コメント --}}
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="flex flex-col mb-4">
                                <label class="mb-2 font-bold text-lg text-grey-darkest" for="comments">COMMENT</label>
                                <input class="border py-2 px-3 text-grey-darkest" type="text" name="comments"
                                    id="comments">
                            </div>

                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="flex flex-col mb-4">
                                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="residence">居住地</label>
                                    <input class="border py-2 px-3 text-grey-darkest" type="text" name="residence"
                                        id="residence">
                                </div>


                                <label class="mb-2 font-bold text-lg text-grey-darkest" for="card_avatar">UPLOAD
                                    IMAGE</label>
                                <input type="file" name="image" accept="image/png, image/jpeg">
                            </div>



                            <div class="flex flex-col mb-4">
                            </div>
                            <button type="submit"
                                class="w-full py-3 mt-6 font-medium tracking-widest text-white bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                CREATE
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
