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
                            <th class="py-4 px-6 bg-grey-lightest  text-grey-dark border-b border-grey-light">
                                訪れたことのある国を選択してください
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">
                                <div class="card">

                                    <form method="POST" action="{{ route('card.save-countries') }}">
                                        @csrf
                                        <div class="form-group">
                                            @foreach ($countries as $country)
                                                <div class="form-check">
                                                    <input type="checkbox" name="countries[]"
                                                        value="{{ $country->id }}" class="form-check-input"
                                                        @if (in_array($country->id, $userCountryIds)) checked @endif>
                                                    <label class="form-check-label" for="country_{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="submit"
                                            class="w-full py-3 mt-6 font-medium
                                            tracking-widest text-white bg-black shadow-lg focus:outline-none
                                            hover:bg-gray-900 hover:shadow-none">SAVE</button>
                                    </form>
                                    <div class="mt-4">
                                        <h2>Selected Countries</h2>
                                        <ul>
                                            @foreach ($selectedCountries as $selectedCountry)
                                                <li>{{ $selectedCountry->country->name }}</li>
                                            @endforeach
                                        </ul>
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
