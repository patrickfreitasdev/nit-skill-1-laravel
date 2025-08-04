<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $users = User::query()
            ->where('role', 'member')
            ->when(request()->has('name'), function (Builder $query) {
                $query->where('name', 'like', '%' . request()->name . '%');
            })
            ->when(request()->has('email'), function (Builder $query) {
                $query->where('email', 'like', '%' . request()->email . '%');
            })
            ->orderBy('id', 'desc')->paginate(10);

        return view('home', compact('users'));

    }
}
