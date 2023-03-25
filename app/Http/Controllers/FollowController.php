<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feed;
use Illuminate\Support\Facades\Auth;
// use App\Models\User::followings();

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, $user)
    {
        // ログインしているユーザーのIDだけをもつユーザーを取得する
        $users = User::where('id', $user)->get();

        // ビューに変数を渡して表示させる
        return view('follow.show', compact('users'));
    }
    // public function index(Request $request, $user)
    // {
    //     // ログインしているユーザーのIDを取得する
    //     $userId = Auth::id();

    //     // ログインしているユーザーのIDだけをもつユーザーを取得する
    //     $users = User::where('id', $userId)->get();

    //     // ビューに変数を渡して表示させる
    //     return view('follow.show', compact('users'));
    //     // $feeds = Feed::getAllOrderByUpdated_at();
    //     // return view('follow.show', compact('feeds'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, User $user)
    {
        // フォロー済みの場合は何もしない
        if ($request->user()->isFollowing($user)) {
            return redirect()->back()->with('error', 'You are already following ' . $user->name);
        }

        // フォローしていない場合はフォローする
        $request->user()->followings()->syncWithoutDetaching($user);

        // フォロワーにも追加する
        $user->followers()->syncWithoutDetaching($request->user()->id);

        return redirect()->back()->with('success', 'You are now following ' . $user->name);
    }
    // public function store(Request $request, User $user)
    // {
    //     // フォロー済みの場合は何もしない
    //     if ($request->user()->isFollowing($user)) {
    //         return redirect()->back()->with('error', 'You are already following ' . $user->name);
    //     }

    //     $request->user()->followings()->attach($user);
    //     $user->followers()->attach($request->user()->id);

    //     return redirect()->back()->with('success', 'You are now following ' . $user->name);
    // }
    // if ($request->user()->canFollow($user)) {
    //     $request->user()->followings()->attach($user);
    //     $user->followers()->attach($user->id);
    //     return redirect()->back();
    // }
    // Auth::user()->followings()->attach($user->id);
    // //ここに足す　相手が自分をフォローする　以下追記文 QRコードをここに繋げる
    // // $friend = User::find($user->id);
    // // $friend->followers()->attach(Auth::$request->id());
    // return redirect()->back()->with('success', 'You are now following ' . $user->name);


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ターゲットユーザのデータ
        $user = User::find($id);
        // ターゲットユーザのフォロワー一覧
        $followers = $user->followers;
        // ターゲットユーザのフォローしている人一覧
        $followings  = $user->followings;

        return view('user.show', compact('user', 'followers', 'followings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Auth::user()->followings()->detach($user->id);
        return redirect()->back();
    }
}
