<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

class LoginPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View|RedirectResponse
    {
        if (user()) {
            return redirect()->route('home.index')->with('success', 'You are already logged in!');
        }

        return view('login');
    }
}
