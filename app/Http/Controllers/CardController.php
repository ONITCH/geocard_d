<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;
use App\Models\UploadImage;
use App\Models\Template;
use App\Models\Country;
use Str;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardId = Auth::user()->card_id;
        $card = Card::where('id', $cardId)->first();
        $residence = $card ? $card->residence : ''; // $cardオブジェクトがnullでないことを確認し、nullの場合は空の文字列を設定
        $comments = $card ? $card->comments : '';
        $username = Auth::user()->name; // ユーザー名を取得
        return view('card.index', compact('card', 'residence', 'username', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $uploads = UploadImage::orderBy("id", "desc")->get();
        $templates = Template::all();
        return view("card.create", [
            "images" => $uploads,
            "countries" => $countries,
            "templates" => $templates,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpeg'
        ]);

        $upload_image = $request->file('image');
        $template_id = $request->input('template_id');
        $template = Template::find($template_id);

        if ($upload_image && $template) {
            // アップロードされた画像を保存する
            $path = $upload_image->store('uploads', "public");
            // 画像の保存に成功したらDBに記録する
            if ($path) {
                // カードを作成し、card_id を取得する
                $card = Card::create([
                    "card_avatar" => $upload_image->getClientOriginalName(),
                    "file_path" => $path,
                    "comments" => $request->comments,
                    "template_id" => $request->template_id,
                    "residence" => $request->residence,
                ]);
                $card_id = $card->id;
                // ログインしているユーザーの card_id を更新する
                $user = Auth::user();
                $user->card_id = $card_id;
                $user->save();
            }
        }

        return redirect("/card/create");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function countries()
    // {
    //     $countries = Country::all();
    //     return view('card.countries', ['countries' => $countries]);
    // }

    // public function getCountries()
    // {
    //     $countries = Country::all();
    //     $savedCardId = Auth::user()->card_id;
    //     $savedCountries = [];
    //     if ($savedCardId) {
    //         $savedCard = Card::with('countries')->findOrFail($savedCardId);
    //         $savedCountries = $savedCard->countries;
    //     }
    //     return view('card.countries', compact('countries', 'savedCountries'));
    // }

    // public function saveCountries(Request $request)
    // {
    //     $cardId = Auth::user()->card_id;
    //     $card = Card::findOrFail($cardId);
    //     $card->countries()->sync($request->input('countries', []));
    //     return redirect()->route('card.countries');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $card = Card::findOrFail($id);
        // return view('card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 対象のカードを取得
        $card = Card::findOrFail($id);

        // 入力値のバリデーション
        $validated = $request->validate([
            'comments' => 'required|string',
            'residence' => 'required|string',
            'countries' => 'required|array',
            'countries.*' => 'required|string|exists:countries,name'
        ]);

        // 入力値の取得
        $comments = $validated['comments'];
        $residence = $validated['residence'];
        $countries = $validated['countries'];

        // カードの更新
        $card->comments = $comments;
        $card->residence = $residence;
        $card->countries()->sync(Country::whereIn('name', $countries)->get());

        $card->save();

        return redirect()->route('card.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
