<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update profile fields (nom, prenom, email, langue, sexe).
     * If a photo is included it's handled here as well (alternate to separate avatar route).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation - email unique except current user
        $request->validate([
            'nom' => ['required','string','max:255'],
            'prenom' => ['nullable','string','max:255'],
            'email' => [
                'required','email','max:255',
                Rule::unique('utilisateurs','email')->ignore($user->id_utilisateur, 'id_utilisateur'),
            ],
            'id_langue' => ['nullable','exists:langues,id_langue'],
            'sexe' => ['nullable','in:M,F'],
            // Accept many image types; optional
            'photo' => ['nullable','file','mimes:jpg,jpeg,png,gif,webp,svg','max:5120'],
        ]);

        // Update fields
        $user->nom = $request->nom;
        $user->prenom = $request->prenom ?? '';
        $user->email = $request->email;
        $user->id_langue = $request->id_langue ?? $user->id_langue;
        if ($request->filled('sexe')) {
            $user->sexe = $request->sexe;
        }

        // If email changed, clear verified flag
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Handle photo upload inline (also supported via profile.avatar route)
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            // remove old avatar if not default
            if ($user->photo && $user->photo !== 'default.png') {
                Storage::disk('public')->delete('avatars/'.$user->photo);
            }

            $filename = time() . '-' . preg_replace('/\s+/','_', $file->getClientOriginalName());
            $file->storeAs('public/avatars', $filename);
            $user->photo = 'avatars/'.$filename; // store relative to storage path for easy asset()
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update password (route profile.password)
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required','confirmed','min:8'],
        ]);

        if (!Hash::check($request->current_password, $user->mot_de_passe)) {
            return back()->withErrors(['current_password' => 'L’ancien mot de passe est incorrect.']);
        }

        $user->mot_de_passe = Hash::make($request->password);
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'password-updated');
    }

    /**
     * Separate endpoint to update avatar only (route profile.avatar).
     * Useful if you want AJAX later.
     */
    public function updateAvatar(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'photo' => ['required','file','mimes:jpg,jpeg,png,gif,webp,svg','max:5120'],
        ]);

        $file = $request->file('photo');

        if ($user->photo && $user->photo !== 'default.png') {
            Storage::disk('public')->delete($user->photo);
        }

        $filename = time() . '-' . preg_replace('/\s+/','_', $file->getClientOriginalName());
        $file->storeAs('public/avatars', $filename);
        $user->photo = 'avatars/'.$filename;
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'avatar-updated');
    }

    /**
     * Remove avatar -> sets to default (keeps default.png in storage/app/public/avatars/default.png)
     */
    public function removeAvatar(Request $request)
    {
        $user = Auth::user();

        if ($user->photo && $user->photo !== 'default.png') {
            Storage::disk('public')->delete($user->photo);
        }

        $user->photo = 'avatars/default.png';
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'avatar-removed');
    }

    /**
     * Delete account
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->mot_de_passe)) {
            return back()->withErrors(['password' => 'Mot de passe incorrect.']);
        }

        Auth::logout();

        // delete avatar if custom
        if ($user->photo && $user->photo !== 'avatars/default.png' && $user->photo !== 'default.png') {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
