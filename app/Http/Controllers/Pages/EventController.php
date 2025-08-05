<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $events = Event::query()
            ->when(request()->has('location'), function ($query) {
                $query->where('location', 'like', '%' . request()->location . '%');
            })
            ->when(request()->has('date'), function ($query) {
                $query->where('date', 'like', '%' . request()->date . '%');
            })
            ->paginate(6);

        return view('events.list', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('events.create');
    }
}
