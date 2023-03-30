<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 bg-white border-b border-gray-200"> --}}
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
                                {{-- @extends('layouts.app') --}}
                                @include('partials.show')
                                {{-- @section('content') --}}
                                <div class="card">
                                    {{-- <h2>{{ $card->id }}</h2> --}}
                                    {{-- <p>Template ID: {{ $card->template_id }}</p> --}}
                                    {{-- @if (isset($card->template))
                                            <img src="{{ asset('storage/' . $card->template->file_path) }}">
                                        @endif --}}
                                    {{-- <ul>
                                            @foreach ($card->countries as $country)
                                                <li>{{ $country->name }}</li>
                                            @endforeach
                                        </ul> --}}
                                </div>
                                {{-- @endsection --}}
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

                {{-- 以下行ったことある国を選択するボタン --}}
                <form method="POST" action="{{ route('card.store') }}">
                    @csrf

                    {{-- <div>
                            <label for="template_id">Template ID:</label>
                            <input type="text" id="template_id" name="template_id">
                        </div> --}}

                    <div>
                        <label>Countries you've been:</label>
                        @if (isset($card) && isset($card->countries))
                            @foreach ($card->countries as $country)
                                {{-- ボタンである必要はない・修正要 --}}
                                <button type="button" class="country-button"
                                    data-country="{{ $country->id }}">{{ $country->name }}</button>
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <div>
                            @if ($residence)
                                <p>Residence: {{ $residence }}</p>
                            @endif
                        </div>
                        <div>
                            <p>Username: {{ $username }}</p>
                        </div>
                    </div>

                    {{-- <div>
                            <input type="hidden" id="country_id" name="country_id">
                            <button type="submit" id="submit-button" disabled>Submit</button>
                        </div> --}}

                </form>


                {{-- <script>
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
                    </script>

                    <style>
                        .selected {
                            background-color: blue;
                            color: white;
                        }
                    </style> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
