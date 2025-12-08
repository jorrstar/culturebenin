<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérifier le code - CultureBenin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .otp-container {
            max-width: 480px;
            width: 90%;
            margin: 30px auto;
        }
        
        .otp-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            text-align: center;
        }
        
        h3 {
            color: #0d6efd;
            margin-bottom: 20px;
            font-size: 24px;
        }
        
        .alert {
            padding: 12px;
            background: #e6f4ff;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #0d6efd;
        }
        
        .error {
            color: #b91c1c;
            background: #fee;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #dc2626;
        }
        
        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 18px;
            text-align: center;
            letter-spacing: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
        }
        
        .btn-verify {
            width: 100%;
            padding: 14px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .btn-verify:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
        }
        
        .btn-resend {
            width: 100%;
            padding: 12px;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            color: #4b5563;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
        }
        
        .btn-resend:hover {
            background: #e5e7eb;
        }
        
        .code-instructions {
            color: #666;
            font-size: 14px;
            margin-top: 20px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="otp-container">
        <div class="otp-card">
            <h3>Vérification du code</h3>

            @if(session('status') === 'code-sent')
                <div class="alert">
                    ✅ Un code à 6 chiffres a été envoyé à votre adresse email.
                    <br><small>Il expire dans 10 minutes.</small>
                </div>
            @endif

            @if ($errors->any())
                <div class="error">
                    <strong>Erreur :</strong>
                    <ul style="margin: 10px 0 0 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('otp.verify.post') }}">
                @csrf
                <label for="code">Entrez le code à 6 chiffres</label>
                <input id="code" name="code" type="text" 
                       maxlength="6" 
                       pattern="\d{6}" 
                       placeholder="000000"
                       required
                       autofocus>
                
                <button type="submit" class="btn-verify">
                    Vérifier le code
                </button>
            </form>

            <form method="POST" action="{{ route('otp.resend') }}">
                @csrf
                <button type="submit" class="btn-resend">
                    ↻ Renvoyer le code
                </button>
            </form>
            
            <div class="code-instructions">
                <p>📧 Vérifiez votre boîte de réception et vos spams.</p>
                <p>⏱️ Le code expire après 10 minutes.</p>
            </div>
        </div>
    </div>

    <script>
        // Auto-focus sur le champ code
        document.getElementById('code').focus();
        
        // Auto-move to next input (optional)
        const codeInput = document.getElementById('code');
        codeInput.addEventListener('input', function(e) {
            if (this.value.length === 6) {
                this.form.submit();
            }
        });
    </script>
</body>
</html>