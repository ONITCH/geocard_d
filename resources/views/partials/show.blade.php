<link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@700&family=Kiwi+Maru&family=Noto+Sans+JP&family=Potta+One&family=Reggae+One&amily=Yusei+Magic&display=swap"
    rel="stylesheet">

<div class="card" style="position: relative; width: 100%;">
    @if ($card && $card->template)
        <img src="{{ asset('storage/' . $card->template->file_path) }}"
            style="display: block; max-width: 100%; height: auto; box-shadow: {{ $card->template->box_shadow }};">
    @else
        <img src="{{ asset('/image/Default_Card.png') }}" alt="Default Image"
            style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3)">
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
            src="{{ asset('storage/' . $card->file_path) }}" alt="Card Avatar Image">
    @else
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
position: absolute; top: 105px; left: auto; right: 30px; display: inline-block; height: 50px; width: 50px; border-radius: 50%; border: 2px solid white; box-shadow: 0px 0px 0px 1px black, black; margin-top: 10px; 

///twotowers///
position: absolute; top: 70px; left: 100px; right: auto; color: rgb(56, 56, 56); text-align: center; font-family: 'Noto Sans JP', sans-serif;
position: absolute; top: 10px;  left: 255px; display: inline-block; height: 50px; width: 50px; border: 1px solid white; box-shadow: 0px 0px 0px 1px black, 0px 1px 1px black; margin-top: 10px;

///box///
position: absolute; top: 70px; left: 135px; right: auto; color: rgb(0, 0, 0); text-align: right; font-family: 'M PLUS 1p', sans-serif;
position: absolute; top: 65px;  left: 40px; display: inline-block; height: 50px; width: 50px; border: 2px solid rgb(0, 0, 0); box-shadow: 0px 0px 0px 0px ; margin-top: 10px;

position: absolute; top: 70px; left: 140px; right: auto; color: rgb(0, 0, 0); text-align: right; font-family: 'Yusei Magic', sans-serif;

slim////
position: absolute; top: 70px; left: 140px; right: auto; color: rgb(0, 0, 0); text-align: right; font-family: 'Potta One', cursive;"
position: absolute; top: 10px;  left: 30px; display: inline-block; border-radius: 50%; height: 70px; width: 70px; border: 3px solid rgb(71, 239, 52); box-shadow: 0px 0px 0px 0px ; margin-top: 10px;

dotblack///
position: absolute; top: 100px; left: 95px; right: auto; color: rgb(56, 56, 56); text-align: center; font-family: 'Noto Sans JP', sans-serif;
position: absolute; top: 10px;  left: 135px; display: inline-block; border-radius: 50%; height: 60px; width: 60px; border: 1px solid rgb(255, 255, 255); box-shadow: 0px 0px 0px 0px ; margin-top: 10px;
white///
position: absolute; top: 105px; left: 85px; right: auto; color: rgb(56, 56, 56); text-align: center; font-family: 'Kiwi Maru', serif;

geoblk///
position: absolute; top: 30px; left: 30px; right: auto; color: rgb(223, 223, 223); text-align: left; font-family: 'Noto Sans JP', sans-serif;
position: absolute; top: 110px;  left: 265px; display: inline-block; height: 50px; width: 50px; border: 2px solid rgb(175, 175, 175); box-shadow: 0px 0px 0px 0px ; margin-top: 10px;
geowht///
position: absolute; top: 50px; left: 155px; right: auto; color: rgb(94, 94, 94); text-align: right; font-family: 'Noto Sans JP', sans-serif;
position: absolute; top: 110px;  left: 250px; display: inline-block; height: 50px; width: 50px; border: 2px solid rgb(175, 175, 175); box-shadow: 0px 0px 0px 0px ; margin-top: 10px;
--}}



{{-- CSS確認用 --}}

{{-- <div>
    <div class="card" style="position: relative; width: 100%;">
        @if (isset($card->template))
            <img src="{{ asset('storage/' . $card->template->file_path) }}"
                style="display: block; max-width: 100%; height: auto; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);">
        @endif

        <div class="card-content"
            style="position: absolute; top: 50px; left: 155px; right: auto; color: rgb(94, 94, 94); text-align: right; font-family: 'Noto Sans JP', sans-serif;">
            <p style="margin: 0; font-size: 12px;">"{{ $comments }}"</p>
            <p style="margin: 0; font-size: 18px;">{{ $username }}</p>
            <p style="margin: 0; font-size: 12px;">from {{ $residence }}</p>
        </div>
        @if ($card->file_path)
            <img style="position: absolute; top: 110px;  left: 250px; display: inline-block; height: 50px; width: 50px; border: 2px solid rgb(175, 175, 175); box-shadow: 0px 0px 0px 0px ; margin-top: 10px;"
                src="{{ $card->card_avatar ? asset('storage/' . $card->file_path) : 'https://dummyimage.com/300x300/000/fff&text=Card+Avatar' }}"
                alt="Card Avatar Image">
        @else
            <p>No card image available.</p>
        @endif

    </div>
</div> --}}
