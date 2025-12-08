<?php
use App\Http\Controllers\OtpController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\{
    LangueController,
    ProfileController,
    UtilisateurController,
    TypeMediaController,
    TypeContenuController,
    RoleController,
    MediaController,
    ContenuController,
    CommentaireController,
    RegionController,
    ParlerController,
    PaymentController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Pages classiques
Route::get('/register', function() {
    return view('auth.register');
})->name('register');

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

// Dashboard utilisateur
Route::get('/dashboard', function () {
    return view('layout');
})
->middleware(['auth'])
->name('dashboard');

Route::middleware(['auth', 'verified'])->get('/accueil', function () {
    return view('front');
})->name('accueil');

// Layout admin (accessible seulement aux admins)
Route::get('/layout', function () {
    return view('layout');
})
->middleware(['auth', 'verified'])
->name('layout');

// Social login
Route::get('auth/redirect/{provider}', [SocialAuthController::class, 'redirect'])
    ->name('social.redirect');

Route::get('auth/callback/{provider}', [SocialAuthController::class, 'callback'])
    ->name('social.callback');

// Profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('utilisateurs', UtilisateurController::class);
    Route::resource('langues', LangueController::class);
    Route::resource('typecontenus', TypeContenuController::class);
    Route::resource('typemedias', TypeMediaController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('medias', MediaController::class);
    Route::resource('contenus', ContenuController::class);
    Route::resource('commentaires', CommentaireController::class);
    Route::resource('regions', RegionController::class);

    Route::get('parler', [ParlerController::class, 'index'])->name('parler.index');
    Route::get('parler/create', [ParlerController::class, 'create'])->name('parler.create');
    Route::post('parler', [ParlerController::class, 'store'])->name('parler.store');
    Route::delete('parler/{id_region}/{id_langue}', [ParlerController::class, 'destroy'])->name('parler.destroy');
});
Route::middleware(['web'])->group(function () {

    Route::get('/otp/verify', [OtpController::class, 'showVerifyForm'])->name('otp.verify.show');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify.post');
    Route::post('/otp/resend', [OtpController::class, 'resend'])->name('otp.resend');

});

// ============================================
// ROUTES D'ABONNEMENT ET PAIEMENT FEDAPAY
// ============================================

// Page d'abonnement
Route::get('/subscribe', [PaymentController::class, 'showSubscription'])
    ->name('subscription.show')
    ->middleware('auth');

// Initier le paiement
Route::post('/payment/initiate', [PaymentController::class, 'initiatePayment'])
    ->name('payment.initiate')
    ->middleware('auth');

// Callback Fedapay (accessible sans auth pour les retours de paiement)
Route::get('/payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback');

// Pages de statut
Route::get('/payment/success', [PaymentController::class, 'success'])
    ->name('subscription.success');

Route::get('/payment/failed', [PaymentController::class, 'failed'])
    ->name('subscription.failed');

// ============================================
require __DIR__.'/auth.php';
