<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display the user's profile information.
     */
    public function show()
    {
        return view('profile.show', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Show the form for editing the user's profile information.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the form for editing the user's password.
     */
    public function password()
    {
        return view('profile.password');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'nickname' => ['nullable', 'string', 'max:255'],
        'bio' => ['nullable', 'string', 'max:255'],
    ]);

    $user = $request->user();
    $user->name = $request->name;
    $user->nickname = $request->nickname;
    $user->bio = $request->bio;
    $user->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if (!Hash::check($value, $request->user()->password)) {
                        $fail('現在のパスワードが正しくありません。');
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.password')->with('status', 'password-updated');
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
