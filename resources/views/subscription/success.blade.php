<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Réussi - CultureBenin</title>
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
        
        .success-card {
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            border-radius: 20px;
            padding: 50px 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            border: 3px solid #28a745;
        }
        
        .success-icon {
            font-size: 5rem;
            color: #28a745;
            margin-bottom: 25px;
            animation: bounce 1s infinite alternate;
        }
        
        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-10px); }
        }
        
        .btn-home {
            background: #ffdd00;
            color: #1e3c72;
            border: none;
            padding: 12px 30px;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        
        .btn-home:hover {
            background: #ffed4e;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <h1 class="text-success mb-3 fw-bold">Paiement Réussi !</h1>
        
        <p class="mb-3 fs-5">Votre abonnement a été activé avec succès.</p>
        
        <p class="text-muted mb-4">
            <i class="fas fa-star text-warning me-1"></i>
            Merci de soutenir la culture béninoise.
            <i class="fas fa-star text-warning ms-1"></i>
        </p>
        
        <div class="mt-4">
            <p class="text-success">
                <i class="fas fa-crown me-2"></i>
                Vous avez maintenant accès à tous nos contenus premium !
            </p>
        </div>
        
        <div class="mt-5">
            <a href="/" class="btn btn-home">
                <i class="fas fa-home me-2"></i>Retour à l'accueil
            </a>
        </div>
        
        <div class="mt-4 text-muted small">
            <i class="fas fa-envelope me-1"></i>
            Un email de confirmation vous a été envoyé.
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>