<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #f5f2ee;
            --surface: #ffffff;
            --ink: #1a1714;
            --muted: #7a7570;
            --accent: #c8522a;
            --accent-soft: #f5ede8;
            --border: #e2ddd8;
            --border-focus: #c8522a;
            --shadow: 0 2px 12px rgba(26,23,20,0.07);
        }

        body {
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
            min-height: 100vh;
            padding: 60px 24px;
        }

        .container {
            max-width: 520px;
            margin: 0 auto;
            animation: fadeUp 0.4s ease both;
        }

        /* Header */
        .page-header {
            margin-bottom: 36px;
            padding-bottom: 28px;
            border-bottom: 1.5px solid var(--border);
        }

        .page-header span {
            display: block;
            font-size: 0.75rem;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            line-height: 1;
            color: var(--ink);
        }

        /* Card */
        .card {
            background: var(--surface);
            border-radius: 14px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            padding: 36px;
        }

        /* Form fields */
        .field {
            margin-bottom: 24px;
        }

        .field label {
            display: block;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--muted);
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--ink);
            background: #faf9f7;
            transition: border-color 0.18s, box-shadow 0.18s, background 0.18s;
            outline: none;
        }

        .field input::placeholder { color: #bbb5af; }

        .field input:focus {
            border-color: var(--border-focus);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(200,82,42,0.1);
        }

        /* Actions */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--accent);
            color: #fff;
            border: none;
            padding: 12px 26px;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.18s, transform 0.15s, box-shadow 0.18s;
            box-shadow: 0 2px 8px rgba(200,82,42,0.25);
        }

        .btn-submit:hover {
            background: #b34520;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(200,82,42,0.35);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 400;
            transition: color 0.15s;
        }

        .btn-back:hover { color: var(--ink); }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="page-header">
        <span>Répertoire</span>
        <h1>Ajouter un contact</h1>
    </div>

    <div class="card">
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Jean Dupont">
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="jean@exemple.com">
            </div>

            <div class="field">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" placeholder="+212 6 00 00 00 00">
            </div>

            <div class="form-actions">
                <a href="{{ route('contacts.index') }}" class="btn-back">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Retour à la liste
                </a>

                <button type="submit" class="btn-submit">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Ajouter
                </button>
            </div>

        </form>
    </div>

</div>

</body>
</html>