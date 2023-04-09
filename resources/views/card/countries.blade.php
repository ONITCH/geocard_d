<x-app-layout>
    <div style="position: relative; margin-top: 65px;">
        <img src="{{ asset('/image/title8.png') }}" style="width: 100%;">
        <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
            <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">VISITED<br> COUNTRIES</h2>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12" style="margin-bottom: 80px;">
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
                            <td class="py-4 px-6">
                                <div class="card">

                                    <form method="POST" action="{{ route('card.save-countries') }}">
                                        @csrf
                                        <div class="form-group">
                                            <p>アジア</p>
                                            @foreach ($countries->whereBetween('id', [1, 24])->sortBy('id') as $country)
                                                <div class="form-check"
                                                    style="font-size: 0.8em;display: inline-block; margin-right: 10px;">
                                                    <input type="checkbox" name="countries[]"
                                                        value="{{ $country->id }}" class="form-check-input"
                                                        @if (in_array($country->id, $userCountryIds)) checked @endif>
                                                    <label class="form-check-label" for="country_{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <p style="margin-top:30px;">オセアニア</p>
                                            @foreach ($countries->whereBetween('id', [25, 40])->sortBy('id') as $country)
                                                <div class="form-check"
                                                    style="font-size: 0.8em;display: inline-block; margin-right: 10px;">
                                                    <input type="checkbox" name="countries[]"
                                                        value="{{ $country->id }}" class="form-check-input"
                                                        @if (in_array($country->id, $userCountryIds)) checked @endif>
                                                    <label class="form-check-label" for="country_{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <p style="margin-top:30px;">北米・南米</p>
                                            @foreach ($countries->whereBetween('id', [41, 74])->sortBy('id') as $country)
                                                <div class="form-check"
                                                    style="font-size: 0.8em;display: inline-block; margin-right: 10px;">
                                                    <input type="checkbox" name="countries[]"
                                                        value="{{ $country->id }}" class="form-check-input"
                                                        @if (in_array($country->id, $userCountryIds)) checked @endif>
                                                    <label class="form-check-label" for="country_{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <p style="margin-top:30px;">ヨーロッパ</p>
                                            @foreach ($countries->whereBetween('id', [75, 128])->sortBy('id') as $country)
                                                <div class="form-check"
                                                    style="font-size: 0.8em;display: inline-block; margin-right: 10px;">
                                                    <input type="checkbox" name="countries[]"
                                                        value="{{ $country->id }}" class="form-check-input"
                                                        @if (in_array($country->id, $userCountryIds)) checked @endif>
                                                    <label class="form-check-label" for="country_{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <p style="margin-top:30px;">中東</p>
                                            @foreach ($countries->whereBetween('id', [129, 144])->sortBy('id') as $country)
                                                <div class="form-check"
                                                    style="font-size: 0.8em;display: inline-block; margin-right: 10px;">
                                                    <input type="checkbox" name="countries[]"
                                                        value="{{ $country->id }}" class="form-check-input"
                                                        @if (in_array($country->id, $userCountryIds)) checked @endif>
                                                    <label class="form-check-label" for="country_{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <p style="margin-top:30px;">アフリカ</p>
                                            @foreach ($countries->whereBetween('id', [145, 198])->sortBy('id') as $country)
                                                <div class="form-check"
                                                    style="font-size: 0.8em;display: inline-block; margin-right: 10px;">
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
                                        <h2>訪れた国</h2>
                                        <ul>
                                            @foreach ($selectedCountries->sortBy('country_id') as $selectedCountry)
                                                <li
                                                    style="font-size: 0.5em;display: inline-block;margin: 0 .1em .6em 0;padding: .6em; line-height: 1;text-decoration: none; color: #0000ee;background-color: #fff; border: 1px solid #0000ee; border-radius: 2em;">
                                                    {{ $selectedCountry->country->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a href="{{ url()->previous() }}" style="margin-top: 50px"
                                        class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                        Back
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
