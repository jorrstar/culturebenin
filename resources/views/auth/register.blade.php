<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CultureBenin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .register-card { 
            background:white; 
            border-radius:12px; 
            padding:30px; 
            box-shadow:0 10px 25px rgba(0,0,0,0.15); 
            width:400px; 
            text-align:center; 
        }

        .register-title { 
            font-size:1.8rem; 
            color:#0d6efd; 
            margin-bottom:20px; 
        }

        .text-input { 
            width:100%; 
            padding:12px; 
            border-radius:8px; 
            border:1px solid #ccc; 
            margin-bottom:10px; 
        }

        .text-input:focus { 
            border-color:#0d6efd; 
            box-shadow:0 0 8px rgba(13,110,253,0.3); 
            outline:none; 
        }

        .forgot-link { 
            font-size:0.875rem; 
            text-decoration:underline; 
            color:#0d6efd; 
        }

        .forgot-link:hover { 
            color:#0b5ed7; 
        }

        .social-buttons { 
            display:flex; 
            justify-content:center; 
            gap:10px; 
            margin-top:20px; 
            flex-wrap:wrap; 
        }

        .social-btn { 
            flex:1; 
            display:flex; 
            align-items:center; 
            justify-content:center; 
            padding:10px; 
            border-radius:8px; 
            color:white; 
            text-decoration:none; 
            font-weight:bold; 
            gap:8px; 
            min-width:180px; 
        }

        .google-btn { 
            background:#DB4437; 
        }

        .facebook-btn { 
            background:#1877F2; 
        }

        .btn-submit {
            background:#0d6efd;
            color:white;
            border:none;
            border-radius:8px;
            padding:10px 20px;
            cursor:pointer;
            transition:0.3s;
        }

        .btn-submit:hover {
            background:#0b5ed7;
            transform:translateY(-2px);
        }

        .form-footer {
            display:flex; 
            justify-content:space-between; 
            align-items:center; 
            margin-top:15px;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <h2 class="register-title">Créer un compte</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input id="name" class="text-input" type="text" name="name" placeholder="Nom" value="{{ old('name') }}" required autofocus>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror

            <input id="email" class="text-input mt-3" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror

            <input id="password" class="text-input mt-3" type="password" name="password" placeholder="Mot de passe" required>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror

            <input id="password_confirmation" class="text-input mt-3" type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            <select name="id_role" class="text-input" required>
    <option value="">-- Choisissez un rôle --</option>
    <option value="2">Auteur</option>
    <option value="3">Utilisateur</option>
</select>
@error('id_role') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="form-footer">
                <a href="{{ route('login') }}" class="forgot-link">Déjà inscrit ? Connectez-vous</a>
                <button type="submit" class="btn-submit">S'inscrire</button>
            </div>
        </form>

        <div class="social-buttons">
            <a href="{{ route('social.redirect', 'google') }}" class="social-btn google-btn">
                <i class="fab fa-google"></i> Continuez avec Google
            </a>
            <a href="{{ route('social.redirect', 'facebook') }}" class="social-btn facebook-btn">
                <i class="fab fa-facebook-f"></i> Continuez avec Facebook
            </a>
        </div>
    </div>
</body>
</html>
