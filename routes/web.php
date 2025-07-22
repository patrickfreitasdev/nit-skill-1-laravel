<?php

use App\Http\Controllers\Pages\HomeController;
use Illuminate\Support\Facades\{Auth, Route};

Route::get('/login', function () {

    if (app()->environment('local')) {
        Auth::loginUsingId(1);

        return redirect(\route('home.index'));
    }

    return redirect('/');

});

Route::get('/about-us', \App\Http\Controllers\Pages\AboutUsController::class)->name('about.index');

#region Event Routes
Route::get('/events', [\App\Http\Controllers\Page\EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [\App\Http\Controllers\Page\EventController::class, 'create'])->name('events.create');
#endregion

#region User Routes
Route::get('/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::get('/user/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
#endregion

#region User Routes
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
#endregion

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', HomeController::class)->name('home.index');
});
