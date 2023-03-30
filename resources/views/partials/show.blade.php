<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Reggae+One&display=swap" rel="stylesheet">
<div class="card" style="position: relative; width: 100%;">
    @if (isset($card->template))
        <img src="{{ asset('storage/' . $card->template->file_path) }}"
            style="display: block; max-width: 100%; height: auto; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
    @endif
    <div class="card-content"
        style="position: absolute; top: 50px; left: auto; right: 30px; color: rgb(0, 0, 0); text-align: right; font-family: 'Reggae One', cursive;">
        <p style="margin: 0; font-size: 16px;">{{ $username }}</p>
        <p style="margin: 0; font-size: 12px;">{{ $residence }}</p>
    </div>
</div>
