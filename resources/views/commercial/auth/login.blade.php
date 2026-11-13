<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Commercial - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #5B8CC6;
            --light-blue: #E8F1F8;
            --primary-orange: #F4A261;
            --light-orange: #FFF3E6;
            --text-dark: #2D3748;
            --text-gray: #718096;
            --bg-light: #F7FAFC;
            --white: #FFFFFF;
            --border-color: #E2E8F0;
            --red: #E53E3E;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #F7FAFC 0%, #E8F1F8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            color: var(--text-dark);
        }

        .auth-container {
            width: 100%;
            max-width: 460px;
        }

        .auth-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(91, 140, 198, 0.15);
            border: 1px solid var(--border-color);
            padding: 2.5rem 2rem;
            animation: fadeInDown 0.6s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-icon {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
            color: var(--white);
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1rem;
            box-shadow: 0 8px 20px rgba(91, 140, 198, 0.3);
        }

        .portal-badge {
            display: inline-block;
            background: var(--light-orange);
            color: var(--primary-orange);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.35rem 0.9rem;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .auth-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }

        .auth-subtitle {
            color: var(--text-gray);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.75rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: var(--bg-light);
            color: var(--text-dark);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-blue);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(91, 140, 198, 0.15);
        }

        .btn-submit {
            width: 100%;
            padding: 0.9rem 1.5rem;
            background: linear-gradient(135deg, var(--primary-blue), #4A7AB8);
            border: none;
            border-radius: 12px;
            color: var(--white);
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(91, 140, 198, 0.3);
            margin-top: 1.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(91, 140, 198, 0.4);
            background: linear-gradient(135deg, #4A7AB8, var(--primary-blue));
        }

        .auth-footer {
            margin-top: 1.75rem;
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-gray);
        }

        .auth-footer a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s ease;
        }

        .auth-footer a:hover {
            color: var(--primary-orange);
            text-decoration: underline;
        }

        .alert-error {
            background: #FFF5F5;
            color: var(--red);
            border: 1px solid #FED7D7;
            padding: 0.85rem 1rem;
            border-radius: 10px;
            font-size: 0.88rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .switch-link {
            display: block;
            margin-top: 0.75rem;
            font-size: 0.82rem;
            color: var(--text-gray);
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="logo-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div>
                    <span class="portal-badge"><i class="fas fa-shield-alt me-1"></i> Espace Commercial</span>
                </div>
                <h1 class="auth-title">Connexion Commercial</h1>
                <p class="auth-subtitle">Accédez à votre espace de gestion commerciale</p>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('commercial.login.submit') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">Adresse Email Commerciale</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="commercial@exemple.com">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Mot de passe</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" class="form-control" required placeholder="••••••••">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-muted" for="remember" style="font-size: 0.88rem;">
                            Se souvenir de moi
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Se connecter</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <div class="auth-footer">
                <p>Nouveau commercial ? <a href="{{ route('commercial.register') }}">Créer un compte</a></p>
                <div class="switch-link">
                    <a href="{{ route('login') }}" class="text-muted"><i class="fas fa-user-shield me-1"></i> Accès Admin Général</a>
                    &bull;
                    <a href="{{ route('home') }}" class="text-muted"><i class="fas fa-home me-1"></i> Accueil</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
