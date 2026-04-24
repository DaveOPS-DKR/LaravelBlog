<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Blog TP' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #0f0f0f;
            --surface:   #181818;
            --border:    #2a2a2a;
            --gold:      #c9a84c;
            --gold-dim:  #8a6f30;
            --text:      #e8e4dc;
            --muted:     #7a7670;
            --danger:    #c0392b;
            --success:   #27ae60;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            min-height: 100vh;
            line-height: 1.7;
        }

        /* NAV */
        nav {
            border-bottom: 1px solid var(--border);
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            background: rgba(15,15,15,0.95);
            backdrop-filter: blur(8px);
            z-index: 100;
        }

        .nav-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--gold);
            text-decoration: none;
            letter-spacing: 1px;
        }

        .nav-links { display: flex; align-items: center; gap: 2rem; }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .nav-links a:hover { color: var(--gold); }

        .nav-user {
            font-size: 0.85rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-user span { color: var(--text); }

        /* MAIN */
        main { max-width: 1100px; margin: 0 auto; padding: 3rem 2rem; }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.4rem;
            border-radius: 2px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--gold);
            color: #0f0f0f;
            font-weight: 500;
        }

        .btn-primary:hover { background: #e0bc5a; }

        .btn-outline {
            background: transparent;
            color: var(--gold);
            border: 1px solid var(--gold-dim);
        }

        .btn-outline:hover { border-color: var(--gold); background: rgba(201,168,76,0.05); }

        .btn-danger {
            background: transparent;
            color: var(--danger);
            border: 1px solid #5a1a1a;
            font-size: 0.78rem;
        }

        .btn-danger:hover { background: rgba(192,57,43,0.1); }

        /* ALERTS */
        .alert {
            padding: 0.9rem 1.2rem;
            border-left: 3px solid;
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }

        .alert-success { border-color: var(--success); background: rgba(39,174,96,0.08); color: #5dba7d; }
        .alert-error   { border-color: var(--danger);  background: rgba(192,57,43,0.08);  color: #e07070; }

        /* FORMS */
        .form-group { margin-bottom: 1.5rem; }

        .form-group label {
            display: block;
            font-size: 0.78rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 0.75rem 1rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            border-radius: 2px;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus { border-color: var(--gold-dim); }

        .form-group textarea { resize: vertical; min-height: 180px; }

        .form-group select option { background: var(--surface); }

        .invalid-feedback { color: #e07070; font-size: 0.82rem; margin-top: 0.4rem; }

        /* PAGE HEADER */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 400;
            color: var(--text);
        }

        .page-header p {
            font-size: 0.85rem;
            color: var(--muted);
            margin-top: 0.3rem;
        }

        /* FORM CARD */
        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 2.5rem;
            max-width: 720px;
        }

        /* FILE INPUT */
        .file-input-wrapper {
            position: relative;
            border: 1px dashed var(--border);
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.2s;
            border-radius: 2px;
        }

        .file-input-wrapper:hover { border-color: var(--gold-dim); }

        .file-input-wrapper input[type="file"] {
            position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;
        }

        .file-input-label {
            font-size: 0.85rem;
            color: var(--muted);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .file-input-label svg { color: var(--gold-dim); }

        /* FOOTER */
        footer {
            border-top: 1px solid var(--border);
            text-align: center;
            padding: 2rem;
            font-size: 0.8rem;
            color: var(--muted);
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('articles.index') }}" class="nav-brand">The Blog</a>
    <div class="nav-links">
        <a href="{{ route('articles.index') }}">Articles</a>
        <a href="{{ route('types.index') }}">Catégories</a>
    </div>
    @auth
        <div class="nav-user">
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background:none; border:none; cursor:pointer; color:var(--muted); font-size:0.85rem; letter-spacing:1.5px; text-transform:uppercase; font-family:'DM Sans',sans-serif;">
                    Déconnexion
                </button>
            </form>
        </div>
    @endauth
</nav>

<main>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    {{ $slot }}
</main>

<footer>
    &copy; {{ date('Y') }} &nbsp;&mdash;&nbsp; Blog TP &nbsp;&mdash;&nbsp; Laravel 10
</footer>

</body>
</html>
