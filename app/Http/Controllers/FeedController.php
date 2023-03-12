<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Feed;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feeds = Feed::getAllOrderByUpdated_at();
        return view('feed.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //feed createに行くはずだったやつ変えてる
        return view('feed.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'feed' => 'required | max:30',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('feed.index')
                ->withInput()
                ->withErrors($validator);
        }
        // 🔽 編集 フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $result = Feed::create($data);
        // $feed = new Feed;
        // $feed->feed = $request->content;
        // $feed->user_id = $request->user()->id;
        // $user_id->user_id = $request->user()->id;
        return redirect()->route('feed.index');
    }


    // フォローしている人のみ表示する APP/Models/User必要？上のやつ
    public function timeline()
    {
        // フォローしているユーザを取得する
        $followings = User::find(Auth::id())->followings->pluck('id')->all();
        // 自分とフォローしている人が投稿したツイートを取得する
        $feeds = Feed::query()
            ->where('user_id', Auth::id())
            ->orWhereIn('user_id', $followings)
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('feed.index', compact('feeds'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Feed::find($id)->delete();
        return redirect()->route('feed.index');
    }
}
