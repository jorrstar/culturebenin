<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement - CultureBenin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        
        .subscription-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }
        
        .pricing-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            height: 100%;
            transition: transform 0.3s ease;
            border: 2px solid transparent;
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
            border-color: #ffdd00;
        }
        
        .pricing-card.recommended {
            background: rgba(255, 221, 0, 0.15);
            border: 2px solid #ffdd00;
        }
        
        .price {
            font-size: 3rem;
            font-weight: bold;
            color: #ffdd00;
        }
        
        .plan-name {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: white;
        }
        
        .features-list {
            list-style: none;
            padding: 0;
            margin: 25px 0;
        }
        
        .features-list li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .features-list li:last-child {
            border-bottom: none;
        }
        
        .btn-subscribe {
            background: #ffdd00;
            color: #1e3c72;
            border: none;
            padding: 15px 30px;
            font-weight: bold;
            border-radius: 50px;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-subscribe:hover {
            background: #ffed4e;
            transform: scale(1.05);
        }
        
        .badge-recommended {
            background: #ffdd00;
            color: #1e3c72;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="subscription-container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">Abonnez-vous à CultureBenin</h1>
            <p class="lead">Accédez à des contenus exclusifs et soutenez la culture béninoise</p>
        </div>
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(isset($hasActiveSubscription) && $hasActiveSubscription)
            <div class="alert alert-success text-center">
                <h4><i class="fas fa-crown me-2"></i>Vous avez déjà un abonnement actif</h4>
                <p>Profitez de tous nos contenus premium !</p>
                <a href="/" class="btn btn-outline-light">Retour à l'accueil</a>
            </div>
        @else
            <div class="row g-4">
                <!-- Forfait Mensuel -->
                <div class="col-md-6">
                    <div class="pricing-card">
                        <div class="plan-name">Abonnement Mensuel</div>
                        <div class="price">2$<small class="fs-6 text-light">/mois</small></div>
                        
                        <ul class="features-list">
                            <li><i class="fas fa-check text-success me-2"></i> Accès à tous les contenus</li>
                            <li><i class="fas fa-check text-success me-2"></i> Visites virtuelles HD</li>
                            <li><i class="fas fa-check text-success me-2"></i> Téléchargements illimités</li>
                            <li><i class="fas fa-check text-success me-2"></i> Sans publicité</li>
                            <li><i class="fas fa-check text-success me-2"></i> Support par email</li>
                        </ul>
                        
                        <form action="{{ route('payment.initiate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" value="monthly">
                            <button type="submit" class="btn-subscribe">
                                <i class="fas fa-credit-card me-2"></i>Souscrire maintenant
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Forfait Annuel -->
                <div class="col-md-6">
                    <div class="pricing-card recommended">
                        <span class="badge-recommended"><i class="fas fa-star me-1"></i> RECOMMANDÉ</span>
                        <div class="plan-name">Abonnement Annuel</div>
                        <div class="price">20$<small class="fs-6 text-light">/an</small></div>
                        <p class="text-light"><s>24$</s> <span class="text-warning fw-bold">Économisez 4$</span></p>
                        
                        <ul class="features-list">
                            <li><i class="fas fa-check text-success me-2"></i> Tous les avantages mensuels</li>
                            <li><i class="fas fa-check text-success me-2"></i> Accès anticipé aux nouveautés</li>
                            <li><i class="fas fa-check text-success me-2"></i> Invitations aux événements VIP</li>
                            <li><i class="fas fa-check text-success me-2"></i> Certificat de soutien</li>
                            <li><i class="fas fa-check text-success me-2"></i> Statistiques détaillées</li>
                        </ul>
                        
                        <form action="{{ route('payment.initiate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" value="yearly">
                            <button type="submit" class="btn-subscribe">
                                <i class="fas fa-crown me-2"></i>Choisir l'offre annuelle
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <p class="text-light"><i class="fas fa-lock me-2"></i>Paiement sécurisé via Fedapay</p>
                <div class="d-flex justify-content-center gap-3">
                    <img src="https://fedapay.com/images/logo.png" alt="Fedapay" height="30">
                </div>
            </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>