<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function store(): RedirectResponse
    {

        /**
         * FIXME
         * When any validation fails e.g date_of_birth, it correctly return to front end
         * and pre-populate the old value including phone, but the phone JS library fails to populate the country code
         * again and the second attempt make the phone validation to fail
         */
        $validated = request()->validate([
            'name'                 => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users',
            'phone'                => 'required:AU|string|max:255',
            'address'              => 'required|string|max:255',
            'profissional_summary' => 'nullable|string',
            'date_of_birth'        => function ($attribute, $value, $fail) {

                $age = Carbon::parse($value)->age;

                if ($age < 1 || $age > 112) {
                    $fail('Invalid age, please check the birth date');
                }
            },
        ]);

        if ($validated) {

            // ensure it is a member role
            $validated['role'] = 'member';

            User::query()->create($validated);

            $notification = [
                'message'    => 'New member added successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->route('home.index')->with($notification);
        }

        return redirect()->back()->withErrors($validated);

    }

    public function update(User $user): RedirectResponse
    {

        /**
         * FIXME
         * When any validation fails e.g date_of_birth, it correctly return to front end
         * and pre-populate the old value including phone, but the phone JS library fails to populate the country code
         * again and the second attempt make the phone validation to fail
         */
        $validated = request()->validate([
            'name'                 => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users,email,' . $user->getAttributeValue('id'),
            'phone'                => 'required:AU|string|max:255',
            'address'              => 'required|string|max:255',
            'profissional_summary' => 'nullable|string',
            'date_of_birth'        => function ($attribute, $value, $fail) {

                $age = Carbon::parse($value)->age;

                if ($age < 1 || $age > 112) {
                    $fail('Invalid age, please check the birth date');
                }
            },
        ]);

        if ($validated) {

            $user->update($validated);

            $notification = [
                'message'    => 'New member added successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->route('home.index')->with($notification);

        }

        return redirect()->back()->withErrors($validated);

    }

    public function destroy(User $user): RedirectResponse
    {

        try {

            $user->delete();

            $notification = [
                'message'    => 'Member deleted successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->route('home.index')->with($notification);

        } catch (Exception $e) {

            $notification = [
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }

    }
}
