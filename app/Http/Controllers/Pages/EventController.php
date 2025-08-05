<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\{RedirectResponse, UploadedFile};
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

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
            ->orderBy('id', 'desc')
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

    public function store(): RedirectResponse
    {

        request()->merge([
            'user_id' => user()->getAttributeValue('id'),
        ]);

        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'date'  => function ($attribute, $value, $fail) {
                $isPastDate = strtotime($value) < strtotime(now());

                if ($isPastDate) {
                    $fail('Invalid date, please check the date, it must be a future date');
                }
            },
            'location'    => 'required|string|max:255',
            'description' => 'required|string',
            'user_id'     => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }

        if (request()->hasFile('event_image')) {
            $validated['photo_path'] = $this->uploadImage(request()->file('event_image'));
        }

        Event::query()->create($validated);

        $notification = [
            'message'    => 'Event created successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->route('events.index')->with($notification);
    }

    public function destroy(Event $event): RedirectResponse
    {

        try {

            $eventImage = storage_path('app/public/' . $event->getAttributeValue('photo_path'));

            $event->delete();

            if (File::exists($eventImage)) {
                File::delete($eventImage);
            }

            $notification = [
                'message'    => 'Event deleted successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->route('events.index')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'message'    => 'Something went wrong, please try again or contact support.',
                'alert-type' => 'error',
            ];

            return back()->with($notification);
        }

    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    private function uploadImage(UploadedFile $file): string
    {
        $directory = storage_path('app/public/events');

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $manager = new ImageManager(new Driver());
        $image   = $manager->read($file);

        $filename = time() . '.' . $file->getClientOriginalExtension();
        $image->resize(640, 480)->save($directory . '/' . $filename);

        return 'events/' . $filename;
    }
}
