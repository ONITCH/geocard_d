<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Reggae+One&display=swap" rel="stylesheet">

<div class="card" style="position: relative; width: 100%;">
    @if ($card && $card->template)
        <img src="{{ asset('storage/' . $card->template->file_path) }}"
            style="display: block; max-width: 100%; height: auto; box-shadow: {{ $card->template->box_shadow }};">
    @else
        <img src="{{ asset('/image/geosample3.png') }}" alt="Default Image">
    @endif
    {{-- CSS1 --}}
    <div class="card-content"
        style="{{ $card && $card->template && $card->template->CSS1 ? $card->template->CSS1 : 'position: absolute; top: 80px; left: 50px; right: auto; color: rgba(0,0,0); text-align: left; font-family: \'Noto Sans JP\', sans-serif;' }}">

        @if (!empty($comments))
            <p style="margin: 0; font-size: 12px;">"{{ $comments }}"</p>
        @endif
        <p style="margin: 0; font-size: 18px;">{{ $username }}</p>
        @if (!empty($residence))
            <p style="margin: 0; font-size: 12px;">from {{ $residence }}</p>
        @endif
    </div>
    @if ($card && $card->file_path)
        {{-- CSS2 --}}
        <img style="{{ $card && $card->template ? $card->template->CSS2 : '' }}"
            src="{{ $card->card_avatar ? asset('storage/' . $card->file_path) : '/image/avatar_default.png' }}"
            alt="Card Avatar Image">
    @else
        <p></p>
    @endif
</div>




{{-- 
//////stairs///////
box-shadow: 
0 0 10px rgba(255, 255, 255)
CSS1
position: absolute; top: 100px; left: 50px; right: auto; color: rgb(255, 255, 255); text-align: left; font-family: 'Noto Sans JP', sans-serif;
CSS2
position: absolute; top: 30px;  left: 50px; display: inline-block; height: 50px; width: 50px; border: 1px solid white; box-shadow: 0px 0px 0px 1px black, 0px 2px 4px black; margin-top: 10px;

//////citrus///////
box-shadow: 
0 0 10px rgba(0, 0, 0, 0.5)
CSS1
position: absolute; top: 50px; left: auto; right: 30px; color: rgb(0, 0, 0); text-align: right; font-family: 'Reggae One', cursive;
CSS2
position: absolute; top: 105px; left: auto; right: 30px; display: inline-block; height: 50px; width: 50px; border-radius: 50%; border: 2px solid white; box-shadow: 0px 0px 0px 1px black, black; margin-top: 10px; --}}



{{-- CSS確認用 --}}

{{-- <div>
<div class="card" style="position: relative; width: 100%;">
    @if (isset($card->template))
        <img src="{{ asset('storage/' . $card->template->file_path) }}"
            style="display: block; max-width: 100%; height: auto; box-shadow: 0 0 10px rgba(255, 255, 255);">
    @endif

    <div class="card-content"
        style="position: absolute; top: 100px; left: 50px; right: auto; color: rgb(255, 255, 255); text-align: left; font-family: 'Noto Sans JP', sans-serif;">
        <p style="margin: 0; font-size: 12px;">"{{ $comments }}"</p>
        <p style="margin: 0; font-size: 18px;">{{ $username }}</p>
        <p style="margin: 0; font-size: 12px;">from {{ $residence }}</p>
    </div>
    @if ($card->file_path)

        <img style="position: absolute; top: 30px;  left: 50px; display: inline-block; height: 50px; width: 50px; border: 1px solid white; box-shadow: 0px 0px 0px 1px black, 0px 2px 4px black; margin-top: 10px;"
            src="{{ $card->card_avatar ? asset('storage/' . $card->file_path) : 'https://dummyimage.com/300x300/000/fff&text=Card+Avatar' }}"
            alt="Card Avatar Image">
    @else
        <p>No card image available.</p>
    @endif

</div>
</div> --}}
