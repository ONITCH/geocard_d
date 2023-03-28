<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Card') }}
        </h2>
    </x-slot>

    <div class="py-12">
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

                                    <div class="flex">
                                        <input type="radio" name="template_id"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="template_{{ $image->id }}" value="{{ $image->id }}">
                                        <label for="template_{{ $image->id }}"
                                            class="text-sm text-gray-500 ml-2 dark:text-gray-400">{{ $image->filename }}</label>
                                    </div>

                                    <div style="width: 8rem; float:left; margin: 16px;">
                                        <img src="{{ Storage::url($image->file_path) }}" style="width:100%;" />
                                        {{-- <p>{{ $image->filename }}</p> --}}
                                        <p>{{ $image->id }}</p>
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
                                Create
                            </button>
                    </form>
                    {{-- 国選択： --}}
                    <form method="POST" action="{{ route('card.store') }}">
                        @csrf
                        <div>
                            <label>Country:</label>
                            @foreach ($countries as $country)
                                <button type="button" class="country-button"
                                    data-country="{{ $country->id }}">{{ $country->name }}</button>
                            @endforeach
                        </div>
                        <div>
                            <input type="hidden" id="country_id" name="country_id">
                            <button type="submit" id="submit-button" disabled>Submit</button>
                        </div>
                    </form>
                    {{-- 国選択： --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        const buttons = document.querySelectorAll('.country-button');
        const countryIdInput = document.querySelector('#country_id');
        const submitButton = document.querySelector('#submit-button');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Select the button
                buttons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Set the country id in the hidden input
                countryIdInput.value = button.dataset.country;

                // Enable the submit button
                submitButton.disabled = false;
            });
        });

        // Add a click event listener to a new button that selects all buttons
        const selectAllButton = document.createElement('button');
        selectAllButton.textContent = 'Select All';
        selectAllButton.addEventListener('click', () => {
            buttons.forEach(button => {
                button.classList.add('selected');
                countryIdInput.value = button.dataset.country;
            });
            submitButton.disabled = false;
        });
        document.querySelector('form').prepend(selectAllButton);
    </script>

    <style>
        .selected {
            background-color: blue;
            color: white;
        }
    </style>
</x-app-layout>
