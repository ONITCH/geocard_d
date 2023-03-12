<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\FollowController;
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
