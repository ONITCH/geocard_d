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
        // フォローしているユーザを取得する
        $followings = User::find(Auth::id())->followings->pluck('id')->all();
        // 自分とフォローしている人が投稿したツイートを取得する
        $feeds = Feed::query()
            ->where('user_id', Auth::id())
            ->orWhereIn('user_id', $followings)
            ->orderBy('updated_at', 'desc')

            ->paginate(10); // ページネーション
        // dd($feeds);
        return view('feed.index', compact('feeds'));
    }

    // public function dashboard()
    // {
    //     // フォローしているユーザを取得する
    //     $followings = User::find(Auth::id())->followings->pluck('id')->all();
    //     // 自分とフォローしている人が投稿したツイートを取得する
    //     $feeds = Feed::query()
    //         ->where('user_id', Auth::id())
    //         ->orWhereIn('user_id', $followings)
    //         ->orderBy('updated_at', 'desc')
    //         ->get();
    //     return view('dashboard', compact('feeds'));
    // }

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
            'feed' => 'required|max:30',
            'date1' => 'required|date',
            'date2' => 'required|date',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('feed.index')
                ->withInput()
                ->withErrors($validator);
        }
        // フォームから送信されてきたデータにユーザIDをマージする
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        // date1とdate2をリクエストデータに追加する
        $data['date1'] = $request->input('date1');
        $data['date2'] = $request->input('date2');
        $result = Feed::create($data);
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
            ->paginate(10); // ページネーション
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
