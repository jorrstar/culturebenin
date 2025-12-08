<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Afficher la page d'abonnement
     */
    public function showSubscription()
    {
        $user = Auth::user();
        $hasActiveSubscription = $user ? $user->hasActiveSubscription() : false;
        
        return view('subscription.subscribe', compact('hasActiveSubscription'));
    }

    /**
     * SIMULATION DU PAIEMENT POUR TEST
     */
    public function initiatePayment(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Connectez-vous d\'abord.');
        }

        $request->validate(['plan' => 'required|in:monthly,yearly']);

        $user = Auth::user();
        
        if ($user->hasActiveSubscription()) {
            return back()->with('error', 'Vous avez déjà un abonnement actif.');
        }

        try {
            // SIMULATION : Créer un abonnement "payé"
            $subscription = Subscription::create([
                'utilisateur_id' => $user->id_utilisateur,
                'plan' => $request->plan,
                'amount' => $request->plan === 'monthly' ? 2.00 : 20.00,
                'currency' => 'XOF',
                'fedapay_transaction_id' => 'SIM_' . uniqid(),
                'status' => 'active',
                'starts_at' => now(),
                'ends_at' => $request->plan === 'yearly' ? now()->addYear() : now()->addMonth(),
            ]);

            Log::info('Abonnement simulé créé', ['id' => $subscription->id]);

            // Rediriger vers la page de succès
            return redirect()->route('subscription.success')
                ->with('success', 'Abonnement activé avec succès (mode simulation) !');

        } catch (\Exception $e) {
            Log::error('Erreur simulation: ' . $e->getMessage());
            return back()->with('error', 'Erreur: ' . $e->getMessage());
        }
    }

    /**
     * SIMULATION Callback (pour tests)
     */
    public function callback(Request $request)
    {
        Log::info('Callback simulé', $request->all());
        
        // Rediriger automatiquement vers le succès pour les tests
        return redirect()->route('subscription.success');
    }

    /**
     * Page de succès
     */
    public function success()
    {
        return view('subscription.success');
    }

    /**
     * Page d'échec
     */
    public function failed()
    {
        return view('subscription.failed');
    }
}