<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — Blog TP</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg: #0f0f0f; --surface: #181818; --border: #2a2a2a;
            --gold: #c9a84c; --gold-dim: #8a6f30;
            --text: #e8e4dc; --muted: #7a7670; --danger: #c0392b;
        }
        body {
            background: var(--bg); color: var(--text);
            font-family: 'DM Sans', sans-serif; font-weight: 300;
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
        }
        .auth-container {
            width: 100%; max-width: 440px; padding: 2rem;
        }
        .auth-brand {
            text-align: center; margin-bottom: 2.5rem;
        }
        .auth-brand a {
            font-family: 'Playfair Display', serif;
            font-size: 2rem; color: var(--gold); text-decoration: none; letter-spacing: 1px;
        }
        .auth-brand p {
            font-size: 0.8rem; color: var(--muted); letter-spacing: 2px;
            text-transform: uppercase; margin-top: 0.4rem;
        }
        .auth-card {
            background: var(--surface); border: 1px solid var(--border); padding: 2.5rem;
        }
        .form-group { margin-bottom: 1.4rem; }
        .form-group label {
            display: block; font-size: 0.75rem; letter-spacing: 1.5px;
            text-transform: uppercase; color: var(--muted); margin-bottom: 0.5rem;
        }
        .form-group input {
            width: 100%; background: var(--bg); border: 1px solid var(--border);
            color: var(--text); padding: 0.75rem 1rem;
            font-family: 'DM Sans', sans-serif; font-size: 0.95rem;
            border-radius: 2px; outline: none; transition: border-color 0.2s;
        }
        .form-group input:focus { border-color: var(--gold-dim); }
        .invalid-feedback { color: #e07070; font-size: 0.8rem; margin-top: 0.4rem; }
        .btn-submit {
            width: 100%; background: var(--gold); color: #0f0f0f;
            border: none; padding: 0.8rem; font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem; font-weight: 500; letter-spacing: 2px;
            text-transform: uppercase; cursor: pointer; border-radius: 2px;
            transition: background 0.2s; margin-top: 0.5rem;
        }
        .btn-submit:hover { background: #e0bc5a; }
        .auth-footer {
            text-align: center; margin-top: 1.5rem;
            font-size: 0.83rem; color: var(--muted);
        }
        .auth-footer a { color: var(--gold); text-decoration: none; }
        .auth-footer a:hover { text-decoration: underline; }
        .remember-row {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .remember-row label { font-size: 0.82rem; color: var(--muted); display: flex; align-items: center; gap: 0.4rem; }
        .remember-row a { font-size: 0.82rem; color: var(--gold); text-decoration: none; }
        .alert-error {
            padding: 0.8rem 1rem; border-left: 3px solid var(--danger);
            background: rgba(192,57,43,0.08); color: #e07070;
            font-size: 0.85rem; margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
<div class="auth-container">
    <div class="auth-brand">
        <a href="/">The Blog</a>
        <p>Connexion à votre compte</p>
    </div>
    <div class="auth-card">
        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Adresse email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="remember-row">
                <label>
                    <input type="checkbox" name="remember">
                    Se souvenir de moi
                </label>
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                @endif
            </div>
            <button type="submit" class="btn-submit">Se connecter</button>
        </form>
    </div>
    <div class="auth-footer">
        Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a>
    </div>
</div>
</body>
</html>
