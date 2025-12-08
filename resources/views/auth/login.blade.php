<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultureBenin - Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 400px;
            text-align: center;
        }

        .login-title {
            font-size: 28px;
            margin-bottom: 25px;
            color: #333;
        }

        .login-title .highlight {
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-input {
            width: 100%;
            padding: 12px 15px;
            margin-top: 5px;
            border-radius: 10px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
        }

        .text-input:focus {
            border-color: #ff7e5f;
            box-shadow: 0 0 8px rgba(252,126,95,0.5);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #ff7e5f;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }

        .btn-login:hover { background: #feb47b; }

        .remember {
            display: flex;
            align-items: center;
            justify-content: start;
            margin-top: 10px;
        }

        .forgot-link {
            display: block;
            margin-top: 10px;
            font-size: 0.875rem;
            color: #555;
            text-decoration: underline;
        }

        .forgot-link:hover { color: #ff7e5f; }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            gap: 8px;
            min-width: 180px;
        }

        .google-btn { background: #DB4437; }
        .facebook-btn { background: #1877F2; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2 class="login-title">Bienvenue sur <span class="highlight">CultureBenin</span></h2>

        @if (session('status'))
            <div class="mb-4 text-green-600">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input id="email" class="text-input" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror

            <input id="password" class="text-input mt-3" type="password" name="password" placeholder="Mot de passe" required>
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror

            <div class="remember">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me" class="ms-2">Se souvenir de moi</label>
            </div>

            @if(Route::has('password.request'))
                <a class="forgot-link" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            @endif

            <button type="submit" class="btn-login">Se connecter</button>
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
