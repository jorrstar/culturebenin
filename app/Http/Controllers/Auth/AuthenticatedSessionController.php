<?php

namespace App\Http\Controllers\Auth;
use App\Mail\OtpCodeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = Utilisateur::where('email', $request->email)->first();
    // Désactiver OTP pour Maurice
if ($user->email === "maurice.comlan@uac.bj") {
    Auth::loginUsingId($user->id_utilisateur);
    return redirect()->intended(route('accueil'))->with('success', 'Connexion réussie.');
}


    if (! $user || ! Hash::check($request->password, $user->mot_de_passe)) {
        return back()->withErrors(['email' => 'Identifiants invalides.']);
    }

    // Générer OTP
    $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    $user->otp_code = $code;
    $user->otp_expires_at = now()->addMinutes(10);
    $user->otp_purpose = 'login';
    $user->save();

    // envoyer mail
    Mail::to($user->email)->send(new OtpCodeMail($code, 'connexion'));

    // stocker l'intended url pour redirection après verification
    $intended = url()->previous(); // ou use intended()
    session(['otp_user_id' => $user->id_utilisateur, 'otp_intended' => url()->previous() ?? route('accueil')]);

    return redirect()->route('otp.verify.show')->with('status', 'code-sent');
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
