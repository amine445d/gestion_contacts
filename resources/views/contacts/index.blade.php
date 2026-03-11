
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des contacts</title>
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
            --danger: #b91c1c;
            --danger-soft: #fef2f2;
            --row-hover: #faf8f5;
            --shadow: 0 2px 12px rgba(26,23,20,0.07);
        }

        body {
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
            color: var(--ink);
            min-height: 100vh;
            padding: 60px 24px;
        }

        .container {
            max-width: 860px;
            margin: 0 auto;
        }

        /* Header */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 40px;
            padding-bottom: 28px;
            border-bottom: 1.5px solid var(--border);
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            line-height: 1;
            color: var(--ink);
        }

        .page-header h1 span {
            display: block;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.75rem;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.01em;
            transition: background 0.18s, transform 0.15s, box-shadow 0.18s;
            box-shadow: 0 2px 8px rgba(200,82,42,0.25);
        }

        .btn-add:hover {
            background: #b34520;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(200,82,42,0.35);
        }

        .btn-add svg { flex-shrink: 0; }

        /* Table card */
        .card {
            background: var(--surface);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid var(--border);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f9f7f4;
            border-bottom: 1.5px solid var(--border);
        }

        thead th {
            padding: 14px 20px;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--muted);
        }

        thead th:last-child { text-align: right; }

        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.15s;
        }

        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: var(--row-hover); }

        td {
            padding: 16px 20px;
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .cell-id {
            font-size: 0.78rem;
            color: var(--muted);
            font-weight: 500;
            font-variant-numeric: tabular-nums;
        }

        .cell-name {
            font-weight: 500;
            color: var(--ink);
        }

        .cell-email a, .cell-email {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.85rem;
        }

        .cell-phone {
            color: var(--muted);
            font-size: 0.85rem;
            font-variant-numeric: tabular-nums;
        }

        /* Actions cell */
        .actions-cell {
            text-align: right;
        }

        .actions-wrap {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 14px;
            border-radius: 6px;
            background: var(--accent-soft);
            color: var(--accent);
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500;
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
        }

        .btn-edit:hover {
            background: #ecddd5;
            color: #b34520;
        }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 14px;
            border-radius: 6px;
            background: var(--danger-soft);
            color: var(--danger);
            border: none;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
        }

        .btn-delete:hover {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Delete form inline */
        .delete-form { display: inline; margin: 0; padding: 0; }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
        }

        .empty-state svg { margin-bottom: 14px; opacity: 0.35; }
        .empty-state p { font-size: 0.9rem; }

        /* Footer count */
        .table-footer {
            padding: 12px 20px;
            background: #f9f7f4;
            border-top: 1px solid var(--border);
            font-size: 0.75rem;
            color: var(--muted);
            border-radius: 0 0 14px 14px;
        }

        /* Fade-in animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .container { animation: fadeUp 0.4s ease both; }

        tbody tr {
            animation: fadeUp 0.35s ease both;
        }

        tbody tr:nth-child(1)  { animation-delay: 0.05s; }
        tbody tr:nth-child(2)  { animation-delay: 0.09s; }
        tbody tr:nth-child(3)  { animation-delay: 0.13s; }
        tbody tr:nth-child(4)  { animation-delay: 0.17s; }
        tbody tr:nth-child(5)  { animation-delay: 0.21s; }
        tbody tr:nth-child(6)  { animation-delay: 0.25s; }

        /* Alert success */
.alert-success {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #f0faf4;
    border: 1px solid #a7dfbc;
    border-left: 4px solid #22c55e;
    border-radius: 10px;
    padding: 14px 18px;
    margin-bottom: 28px;
    font-size: 0.875rem;
    font-weight: 500;
    color: #166534;
    animation: fadeUp 0.4s ease both;
}

.alert-success::before {
    content: '';
    display: inline-flex;
    flex-shrink: 0;
    width: 18px;
    height: 18px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%2322c55e' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-size: contain;
}
    </style>
</head>
<body>

<div class="container">

  <div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="page-header">
        <h1>
            <span>Répertoire</span>
            Liste des contacts
        </h1>
        <a href="{{ route('contacts.create') }}" class="btn-add">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Ajouter un contact
        </a>
    </div>

    <!-- Tableau -->
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse($contacts as $contact)
                <tr>
                    <td class="cell-id">{{ $contact->id }}</td>
                    <td class="cell-name">{{ $contact->nom }}</td>
                    <td class="cell-email">{{ $contact->email }}</td>
                    <td class="cell-phone">{{ $contact->telephone }}</td>
                    <td class="actions-cell">
                        <div class="actions-wrap">

                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn-edit">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                                Modifier
                            </a>

                            <form class="delete-form" action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/>
                                        <path d="M10 11v6"/><path d="M14 11v6"/>
                                        <path d="M9 6V4h6v2"/>
                                    </svg>
                                    Supprimer
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                            <p>Aucun contact trouvé.</p>
                        </div>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>

        @if($contacts->count())
        <div class="table-footer">
            {{ $contacts->count() }} contact{{ $contacts->count() > 1 ? 's' : '' }} au total
        </div>
        @endif
    </div>

</div>

</body>
</html>