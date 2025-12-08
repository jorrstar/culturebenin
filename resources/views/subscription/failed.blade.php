<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Échoué - CultureBenin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        
        .failed-card {
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            border-radius: 20px;
            padding: 50px 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            border: 3px solid #dc3545;
        }
        
        .failed-icon {
            font-size: 5rem;
            color: #dc3545;
            margin-bottom: 25px;
        }
        
        .btn-retry {
            background: #ffdd00;
            color: #1e3c72;
            border: none;
            padding: 12px 30px;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin-top: 10px;
            margin-right: 10px;
        }
        
        .btn-retry:hover {
            background: #ffed4e;
            transform: scale(1.05);
        }
        
        .btn-home {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .btn-home:hover {
            background: #5a6268;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="failed-card">
        <div class="failed-icon">
            <i class="fas fa-times-circle"></i>
        </div>
        
        <h1 class="text-danger mb-3 fw-bold">Paiement Échoué</h1>
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @else
            <p class="mb-3 fs-5">Le paiement n'a pas pu être traité.</p>
        @endif
        
        <div class="mt-4">
            <p class="text-muted">
                <i class="fas fa-info-circle me-2"></i>
                Causes possibles :
            </p>
            <ul class="text-start text-muted">
                <li>Fonds insuffisants sur votre carte</li>
                <li>Carte expirée ou invalide</li>
                <li>Problème temporaire avec le processeur de paiement</li>
                <li>Transaction annulée</li>
            </ul>
        </div>
        
        <div class="mt-5">
            <a href="{{ route('subscription.show') }}" class="btn btn-retry">
                <i class="fas fa-redo me-2"></i>Réessayer le paiement
            </a>
            
            <a href="/" class="btn btn-home">
                <i class="fas fa-home me-2"></i>Retour à l'accueil
            </a>
        </div>
        
        <div class="mt-4 text-muted small">
            <i class="fas fa-headset me-1"></i>
            Besoin d'aide ? Contactez-nous : support@culturebenin.bj
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>