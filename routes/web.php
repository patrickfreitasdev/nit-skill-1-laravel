<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pages\{AboutUsController, EventController, HomeController, LoginPageController};
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\{Route};

Route::get('/about-us', AboutUsController::class)->name('about.index');

#region Event Logged Out Routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
#endregion

#region Auth Routes
Route::get('/login', LoginPageController::class)->name('login');
Route::post('/login', LoginController::class)->name('auth.login');
#endregion

Route::middleware(['auth'])->group(function () {
    Route::get('/', HomeController::class)->name('home.index');

    #region User Routes
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    #endregion

    #region Event logged in Routes
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    #endregion
});
