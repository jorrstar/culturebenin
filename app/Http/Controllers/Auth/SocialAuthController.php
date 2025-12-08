<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    protected $allowedProviders = ['google', 'facebook'];

    public function redirect($provider)
    {
        if (!in_array($provider, $this->allowedProviders)) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        if (!in_array($provider, $this->allowedProviders)) {
            abort(404);
        }

        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors('Connexion sociale échouée.');
        }

        // Chercher par provider_id
        $user = Utilisateur::where('provider_name', $provider)
                           ->where('provider_id', $socialUser->getId())
                           ->first();

        // Ou chercher par email
        if (!$user && $socialUser->getEmail()) {
            $user = Utilisateur::where('email', $socialUser->getEmail())->first();
        }

        // Si pas trouvé -> créer (RÔLE: utilisateur normal)
        if (!$user) {
            $user = Utilisateur::create([
                'nom' => $socialUser->getName() ?: Str::before($socialUser->getEmail(), '@'),
                'prenom' => '',
                'email' => $socialUser->getEmail(),
                'mot_de_passe' => Hash::make(Str::random(24)), // ✅ CORRIGÉ : Hash::make au lieu de bcrypt
                'sexe' => 'M',
                'date_inscription' => now(),
                'date_naissance' => now()->subYears(25)->toDateString(),
                'statut' => 'actif',
                'photo' => $socialUser->getAvatar() ?: 'default.png',
                'id_role' => 4, // 4 = "Utilisateur" (ne donne jamais admin)
                'id_langue' => 1,
                'provider_name' => $provider,
                'provider_id' => $socialUser->getId(),
                'email_verified_at' => now(),
            ]);
        } else {
            // Si trouvé mais sans provider info, lier
            if (!$user->provider_name || !$user->provider_id) {
                $user->update([
                    'provider_name' => $provider,
                    'provider_id' => $socialUser->getId(),
                ]);
            }
        }

        Auth::login($user, true);

        return redirect()->intended(route('dashboard', false));
    }
}