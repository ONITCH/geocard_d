<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TemplateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 🔽 追加
Route::middleware('auth')->group(function () {
    Route::get('card/upload', [App\Http\Controllers\UploadImageController::class, "show"])->name("upload_form");

    Route::post('card/upload', [App\Http\Controllers\UploadImageController::class, "upload"])->name("upload_image");

    Route::get('card/upload', [App\Http\Controllers\TemplateController::class, "show"])->name("template");

    Route::get('card/create', [App\Http\Controllers\CardController::class, "show2"])->name("card.create");

    Route::resource('card', CardController::class);
    Route::get('/feed/timeline', [FeedController::class, 'timeline'])->name('feed.timeline');
    //↓フォロワーの情報
    Route::get('follower/{user}', [FollowController::class, 'show'])->name('user.show');
    Route::get('user/{user}', [FollowController::class, 'index'])->name('follow.show');
    Route::resource('feed', FeedController::class);
    // 🔽 追加
    Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
    // 🔽 追加
    Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');
});

Route::resource('qrcode', QrcodeController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
