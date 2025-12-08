<?php

namespace App\Http\Controllers\Auth;
use App\Mail\OtpCodeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required','string','max:255'],
        'email' => ['required','string','email','max:255','unique:utilisateurs,email'],
        'password' => ['required','confirmed', Rules\Password::defaults()],
        'id_role' => ['required','in:2,3'],
    ]);

    // Create user but keep email not verified
    $user = Utilisateur::create([
        'nom' => $request->name,
        'prenom' => '',
        'email' => $request->email,
        'mot_de_passe' => Hash::make($request->password),
        'sexe' => 'M',
        'date_inscription' => now(),
        'date_naissance' => now()->subYears(18),
        'statut' => 'actif',
        'photo' => 'default.png',
        'id_role' => $request->id_role,
        'id_langue' => 1,
        'email_verified_at' => null,
    ]);

    // generate 6-digit OTP
    $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    $user->otp_code = $code;
    $user->otp_expires_at = now()->addMinutes(10);
    $user->otp_purpose = 'register';
    $user->save();

    // send mail
    Mail::to($user->email)->send(new OtpCodeMail($code, 'inscription'));

    // store user id in session to know which user verifies
    session(['otp_user_id' => $user->id_utilisateur, 'otp_intended' => route('accueil')]);

    return redirect()->route('otp.verify.show')->with('status', 'code-sent');
}
}