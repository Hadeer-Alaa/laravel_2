<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    $name = 'mohamed';
    $age = 25;
    return view('hello',[
        'name' => $name,
    ]);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',  [PostController::class, 'index'])->name('home');
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
 
    //$user->token;
return("you are logged with github ");

});

Route::get('/auth/redirect2', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/auth/callback2', function () {
    $user = Socialite::driver('google')->user();
 
    //$user->token;
return("you are logged with google ");

});