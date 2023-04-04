<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SELECT COUNTRIES') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="text-center w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">
                                MY CARD
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">
                                <div class="card">
                                    {{-- カードが指定されている場合は、編集フォームを表示する --}}
                                    @if (isset($card))
                                        <form method="POST" action="{{ route('card.update', $card->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <label>Countries you've been:</label>
                                                <ul>
                                                    @foreach ($card->countries as $country)
                                                        <li>{{ $country->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div>
                                                <label>Select countries you've been:</label>
                                                <ul>
                                                    @foreach ($savedCountries as $country)
                                                        <li>
                                                            <input type="checkbox" name="countries[]"
                                                                value="{{ $country->id }}"
                                                                {{ $card->countries->contains($country->id) ? 'checked' : '' }}>
                                                            {{ $country->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <button type="submit">Save</button>
                                        </form>
                                    @else
                                        {{-- カードが指定されていない場合は、全ての国から行ったことのある国を選ぶことができるようにする --}}
                                        <form method="POST" action="{{ route('card.save-countries') }}">
                                            @csrf
                                            <div>
                                                <label>Select countries you've been:</label>
                                                <ul>
                                                    @foreach ($savedCountries as $country)
                                                        <li>
                                                            <input type="checkbox" name="countries[]"
                                                                value="{{ $country->id }}">
                                                            {{ $country->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <button type="submit">Save</button>
                                        </form>
                                    @endif
                                </div>
            </div>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
    </div>
</x-app-layout>
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
