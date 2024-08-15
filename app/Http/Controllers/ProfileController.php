<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('front.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function show(Request $request): View
    {
        if(auth()->user()->role_id == 2)
            return view('front.profile.cleaner', [
                'user' => $request->user()
            ]);
        else
            return view('front.profile.client', [
                'user' => $request->user()
            ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->safe()->except(['passport_photo_1', 'passport_photo_2', 'contract_photo', 'employment_photo']));

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        foreach ($request->safe()->only(['passport_photo_1', 'passport_photo_2', 'contract_photo', 'employment_photo']) as $key => $value) {
            if ($request->hasFile($key)) {
                if (!is_null($request->user()->$key)) 
                    Storage::disk('private')->delete($request->user()->$key);

                $value = $request->file($key)->store('', 'private');

                $request->user()->$key = $value;//fill([$key => $value]);
            }
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            // 'password' => ['required', 'current_password'],
            'cause_id' => ['required', 'numeric', 'exists:causes,id'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();
        
        \App\Models\Cause::where('id', $request->cause_id)->increment('count_use');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function delete(Request $request): View
    {
        return view('front.profile.delete', [
                'user' => $request->user(),
                'causes' => \App\Models\Cause::all(),
            ]);
    }
}
