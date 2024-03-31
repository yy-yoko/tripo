<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\TrippostsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserFollowController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [TrippostsController::class,'index']);

Route::get('/dashboard', [TrippostsController::class,'index'] )->middleware(['auth'])->name('dashboard');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {                                   
    Route::group(['prefix' => 'users/{id}'], function () {                                          
        Route::post('follow', [UserFollowController::class, 'store'])->name('user.follow');         
        Route::delete('unfollow', [UserFollowController::class, 'destroy'])->name('user.unfollow'); 
        Route::get('followings', [UsersController::class, 'followings'])->name('users.followings'); 
        Route::get('followers', [UsersController::class, 'followers'])->name('users.followers'); 
        Route::get('favorites', [UsersController::class, 'favorites'])->name('users.favorites');
        });
        
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);
    Route::resource('tripposts',TrippostsController::class,['only' => ['store','destroy']]);
    Route::post('/posts', [TrippostsController::class, 'store'])->name('posts.store');
    
    Route::group(['prefix' => 'tripposts/{id}'], function() { 
        Route::post('favorites', [FavoritesController::class, 'store'])->name('favorites.favorite');  
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('favorites.unfavorite'); 
    });
});