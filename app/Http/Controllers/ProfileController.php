<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $tokens = auth()->user()->tokens;
        return view('profile.index', [
            'user' => $request->user(), 
            'tokens' => $tokens
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        if ($request->hasFile('avatar')) {
            // Store the current avatar path.
            $oldAvatar = $request->user()->avatar;

            $file = $request->file('avatar');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $storeAs = $filename.'_'.time().'.'.$extension;
            Storage::disk('public')->put('avatars/'.$storeAs, file_get_contents($file));
            $request->user()->avatar = 'avatars/'.$storeAs;
            $request->user()->save();

            // If a new avatar was uploaded and the old avatar is not the default one, delete the old one.
            if ($oldAvatar && $oldAvatar != 'default_avatar.jpg' && $oldAvatar != 'default_avatar.png') {
                Storage::disk('public')->delete($oldAvatar);
            }
        }

        // If 'about_me' was changed, redirect to the profile page with a different status message.
        if ($request->user()->wasChanged('about_me')) {
            return Redirect::route('profile.index')->with('status', 'about_updated');
        }

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
