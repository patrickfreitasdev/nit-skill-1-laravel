<?php

use App\Http\Controllers\Auth\{LoginController, LogoutController};
use App\Http\Controllers\Pages\{AboutUsController, EventController, HomeController, LoginPageController};
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminOnlyAccess;
use Illuminate\Support\Facades\{Route};

#region Regular Page Routes
Route::get('/', HomeController::class)->name('home.index');
Route::get('/about-us', AboutUsController::class)->name('about.index');
#endregion

#region Event Logged Out Routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
#endregion

#region Auth Routes
Route::get('/login', LoginPageController::class)->name('login');
Route::post('/login', LoginController::class)->name('auth.login');
#endregion

Route::middleware(['auth', AdminOnlyAccess::class])->group(function () {

    #region User Routes
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    #endregion

    #region Event logged in Routes
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    #endregion

    #region Auth Logged in Routes
    Route::post('/logout', LogoutController::class)->name('auth.logout');
    #endregion

});
