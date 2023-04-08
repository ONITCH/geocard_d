<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CardController;
// use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\FriendController;
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


Route::middleware('auth')->group(function () {
    Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');


    Route::resource('friend', FriendController::class);

    Route::resource('find', FindController::class);
    Route::post('/find', [App\Http\Controllers\FindController::class, 'search'])->name('find.search');

    // Route::post('/card/{id}', [CardController::class, 'store'])->name('card.store');
    // Route::get('/card/countries', [CardController::class, 'getCountries'])->name('card.countries');
    Route::get('/card/countries', [CardController::class, 'getcountries'])->name('card.countries');
    Route::post('/card/countries', [CardController::class, 'saveCountries'])->name('card.save-countries');
    // Route::get('/card/countries/', [App\Http\Controllers\CardController::class, 'countries'])->name('card.countries');

    Route::post('card/create', [App\Http\Controllers\CardController::class, "store"])->name("card.create2");

    Route::get('/card/upload', [App\Http\Controllers\UploadController::class, "show"])->name('upload_form');
    Route::post('/card/upload', [App\Http\Controllers\UploadController::class, "upload"])->name('upload_image');

    // Route::get('card/upload', [App\Http\Controllers\TemplateController::class, "show"])->name("template");
    // Route::get('card/create', [App\Http\Controllers\CardController::class, "show2"])->name("card.create");

    // Route::get('/card/create', [CardController::class, 'create'])->name('card.create');

    Route::post('/card/store', [CardController::class, 'store'])->name('card.store');

    Route::get('/dashboard', [App\Http\Controllers\CardController::class, "index"]);
    Route::get('/card/list', [App\Http\Controllers\CardController::class, "index"])->name('card.list');
    // Route::get('/', 'CardController@index')->name('card.index');

    // Route::get('/dashboard', [FeedController::class, 'dashboard'])->name('dashboard');

    Route::resource('card', CardController::class);
    Route::get('/feed/timeline', [FeedController::class, 'timeline'])->name('feed.timeline');
    //↓フォロワーの情報
    Route::get('follower/{user}', [FollowController::class, 'show'])->name('user.show');

    Route::get('user/{user}', [FollowController::class, 'index'])
        ->name('follow.show')
        ->middleware('auth');

    Route::resource('feed', FeedController::class);

    Route::post('user/{user}/follow', [FollowController::class, 'follow'])->name('follow');
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
    Route::post('/profile', [ProfileController::class, 'uploadAvatar'])->name('avatar.upload');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// Route::middleware('auth')->group(function () {
//     Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
//     Route::resource('friend', FriendController::class);
//     Route::resource('find', FindController::class);

//     Route::get('/card/edit/{id}', [App\Http\Controllers\CardController::class, 'edit'])->name('card.edit');
//     Route::post('card/create', [App\Http\Controllers\CardController::class, "store"])->name("card.create2");
//     Route::get('/card/upload', [App\Http\Controllers\UploadController::class, "show"])->name('upload_form');
//     Route::post('/card/upload', [App\Http\Controllers\UploadController::class, "upload"])->name('upload_image');

//     Route::post('/card', [CardController::class, 'store'])->name('card.store');
//     Route::get('/dashboard', [App\Http\Controllers\CardController::class, "index"]);
//     Route::get('/card/list', [App\Http\Controllers\CardController::class, "index"])->name('card.list');

//     Route::get('follower/{user}', [FollowController::class, 'show'])->name('user.show');
//     Route::get('follower/{user}', [FollowController::class, 'show'])->name('follower.show');
//     Route::get('user/{user}', [FollowController::class, 'index'])->name('follow.show')->middleware('auth');

//     Route::resource('card', CardController::class);
//     Route::get('/feed/timeline', [FeedController::class, 'timeline'])->name('feed.timeline');

//     Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
//     Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');
//     // Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');
//     // Route::get('/feed/{id}', [FeedController::class, 'show'])->name('feed.show');
//     // Route::delete('/feed/{id}', [FeedController::class, 'destroy'])->name('feed.destroy');
//     Route::resource('feed', FeedController::class);
// });

// Route::resource('qrcode', QrcodeController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::post('/profile', [ProfileController::class, 'uploadAvatar'])->name('avatar.upload');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';
