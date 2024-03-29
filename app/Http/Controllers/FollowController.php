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

    public function follow(Request $request, User $user)
    {
        // ログインユーザーがすでにフォローしているかをチェック
        if ($request->user()->isFollowing($user)) {
            return redirect()->back()->with('error', 'You are already following ' . $user->name);
        }

        // フォローの保存
        $request->user()->followings()->syncWithoutDetaching([$user->id]);
        $user->followings()->syncWithoutDetaching([$request->user()->id]);

        // フォローしたユーザーの名前をセッションに保存する
        $request->session()->flash('followed_user', $user->name);

        return redirect()->route('dashboard')->with('success', 'フォローしました');
    }


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
