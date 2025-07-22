<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(): View|RedirectResponse
    {
        if (user()) {
            return redirect()->route('home.index')->with('success', 'You are already logged in!');
        }

        return view('login');
    }
}
