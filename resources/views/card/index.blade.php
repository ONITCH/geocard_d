<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MY CARD') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 bg-white border-b border-gray-200"> --}}
                <table class="text-center w-full border-collapse">
                    <tbody>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-6 px-6 border-b border-grey-light">
                                @include('partials.show')
                                <div class="card">
                                </div>

                                <div class="flex">
                                    <a href="{{ url('card/create') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">カードを編集</a>

                                </div>
                                <div class="flex">
                                    <a href="{{ url('profile') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">プロフィールを編集</a>

                                </div>

                                <div class="flex">
                                    <a href="{{ url('card/countries') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">行ったことのある国を編集</a>
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

                    {{-- <div>
                        <label>Countries you've been:</label>
                        @if (isset($card) && isset($card->countries))
                            @foreach ($card->countries as $country) --}}
                    {{-- ボタンである必要はない・修正要 --}}
                    {{-- <button type="button" class="country-button"
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
                    </div> --}}

                    {{-- <div>
                            <input type="hidden" id="country_id" name="country_id">
                            <button type="submit" id="submit-button" disabled>Submit</button>
                        </div> --}}

                </form>

                {{-- </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
