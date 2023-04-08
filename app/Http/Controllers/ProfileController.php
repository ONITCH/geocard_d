<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'contact1' => ['nullable', 'string', 'max:255'],
            'contact1_type' => ['nullable', 'in:twitter,instagram,other'],
            'contact2' => ['nullable', 'string', 'max:255'],
            'contact2_type' => ['nullable', 'in:twitter,instagram,other'],
        ], [
            'in' => 'The :attribute field must be one of the following types: twitter, instagram, other.',
            'required_without' => 'The :attribute field is required when :values is not present.',
        ]);

        $user = Auth::user();
        $user->name = $validatedData['name'] ?? $user->name;

        // 既存の値を上書きする前に、送信された値が null でないかをチェックする
        if (isset($validatedData['contact1'])) {
            $user->contact1 = $validatedData['contact1'];
        }
        if (isset($validatedData['contact1_type'])) {
            $user->contact1_type = $validatedData['contact1_type'];
        }
        if (isset($validatedData['contact2'])) {
            $user->contact2 = $validatedData['contact2'];
        }
        if (isset($validatedData['contact2_type'])) {
            $user->contact2_type = $validatedData['contact2_type'];
        }

        $user->save();

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }




    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,bmp,gif|max:2048',
        ]);

        if (auth()->check()) {
            $user = auth()->user();
            $file = $request->file('avatar');
            $image = Image::make($file)->fit(300);
            $filename = $user->id . '.' . $file->getClientOriginalExtension();
            $path = 'avatars/' . $filename;
            Storage::disk('public')->put($path, (string) $image->encode());

            $user->update([
                'avatar' => $filename,
                'file_path' => $path,
            ]);

            return redirect()->route('profile.edit')->with('status', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('status', 'Unauthorized access');
        }
    }





    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
