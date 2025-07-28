<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            /** For now only admins can get access */
            if (!user()->isAdmin()) {

                $notification = [
                    'message'    => 'Error logging in, try again or contact support.',
                    'alert-type' => 'error',
                ];

                return redirect()->route('login')->withErrors([
                    'email' => 'The the provided credentials are wrong or invalid user, try again or contact support.',
                ])->with($notification);
            }

            $request->session()->regenerate();

            return redirect()->route('home.index');

        }

        $notification = [
            'message'    => 'Error logging in, try again or contact support.',
            'alert-type' => 'error',
        ];

        return redirect()->route('login')->withErrors([
            'email' => 'The the provided credentials are wrong or invalid user, try again or contact support.',
        ])->with($notification);

    }
}
