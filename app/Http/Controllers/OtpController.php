<?php

namespace App\Http\Controllers;

use App\Mail\OtpCodeMail;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class OtpController extends Controller
{
    public function showVerifyForm()
    {
        // show verify form
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $userId = session('otp_user_id');
        if (! $userId) {
            return redirect()->route('login')->withErrors(['email' => 'Aucun processus de vérification en cours.']);
        }

        $user = Utilisateur::find($userId);
        if (! $user) {
            return redirect()->route('login')->withErrors(['email' => 'Utilisateur introuvable.']);
        }

        if (! $user->otp_code || ! $user->otp_expires_at) {
            return back()->withErrors(['code' => 'Aucun code valide trouvé.']);
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['code' => 'Le code a expiré. Demandez un nouveau code.']);
        }

        if (hash_equals($user->otp_code, $request->code) === false) {
            return back()->withErrors(['code' => 'Code invalide.']);
        }

        // code correct -> behaviour depends on purpose
        $purpose = $user->otp_purpose;

        // Clear otp fields
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->otp_purpose = null;

        if ($purpose === 'register') {
            // mark email verified
            $user->email_verified_at = now();
            $user->save();

            // login the user
            Auth::loginUsingId($user->id_utilisateur);

            // redirect intended
            $intended = session('otp_intended', route('layout'));
            session()->forget(['otp_user_id','otp_intended']);
            return redirect()->intended($intended)->with('success', 'Compte vérifié et connecté.');
        }

        if ($purpose === 'login') {
            $user->save();

            // login
            Auth::loginUsingId($user->id_utilisateur);

            $intended = session('otp_intended', route('layout'));
            session()->forget(['otp_user_id','otp_intended']);
            return redirect()->intended($intended)->with('success', 'Authentification réussie.');
        }

        // fallback
        $user->save();
        return redirect()->route('login')->with('success','Vérification effectuée.');
    }

    public function resend(Request $request)
    {
        $userId = session('otp_user_id');
        if (! $userId) {
            return redirect()->route('login')->withErrors(['email' => 'Aucun processus de vérification en cours.']);
        }

        $user = Utilisateur::find($userId);
        if (! $user) {
            return redirect()->route('login')->withErrors(['email' => 'Utilisateur introuvable.']);
        }

        // regen code
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->otp_code = $code;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        Mail::to($user->email)->send(new OtpCodeMail($code, $user->otp_purpose ?? 'verification'));

        return back()->with('status','code-resent');
    }
}
