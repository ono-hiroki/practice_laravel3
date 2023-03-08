<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');
Route::middleware('auth')->group(function () {
    Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)
        ->name('tweet.create');
    Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)
        ->name('tweet.update.index')->where('tweedId', '[0-9]+');
    Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)
        ->name('tweet.update.put')->where('tweedId', '[0-9]+');
    Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)
        ->name('tweet.delete')->where('tweedId', '[0-9]+');
});
