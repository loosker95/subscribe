<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\PostsController;

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

Route::controller(SubscribersController::class)->group(function(){
    Route::get('/', 'index')->name('index.sent');
    Route::post('/', 'subscribeWithMail')->name('index.subscribe');
    Route::get('/show', 'showAll')->name('subscribers.all');
    Route::post('/show', 'sendNotification')->name('send.notification');
});



Route::get('/posts', [PostsController::class, 'index'])->name('posts.all');




