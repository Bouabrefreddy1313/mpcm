
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 2rem 1rem;
            color: #1e293b;
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
            animation: fadeIn 0.6s ease-out;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .dashboard-header h1 {
            color: white;
            font-size: 2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .dashboard-header h1::before {
            content: "🛒";
            font-size: 2.5rem;
        }

        .stats-container {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .stat-badge {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .stat-badge .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .stat-badge.pending .number {
            color: #f59e0b;
        }

        .stat-badge.validated .number {
            color: #10b981;
        }

        .stat-badge.rejected .number {
            color: #ef4444;
        }

        .stat-badge .label {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        .filters-section {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-input {
            flex: 1;
            min-width: 250px;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .filter-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .filter-select {
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            min-width: 200px;
        }

        .filter-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .view-toggle {
            display: flex;
            gap: 0.5rem;
            background: #f1f5f9;
            padding: 0.5rem;
            border-radius: 10px;
        }

        .view-btn {
            padding: 0.5rem 1rem;
            border: none;
            background: transparent;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .view-btn.active {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
            display: block;
        }

        .table-container.hidden {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 1200px;
        }

        thead th {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        thead th:first-child {
            border-top-left-radius: 12px;
        }

        thead th:last-child {
            border-top-right-radius: 12px;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: all 0.3s;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody td {
            padding: 1rem;
            color: #475569;
            font-size: 0.9rem;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-badge.pending {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .status-badge.validated {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .status-badge.rejected {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }

        .status-badge::before {
            content: "●";
            font-size: 0.75rem;
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .btn-validate {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-validate:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-reject {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-reject:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .btn-view {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .cards-view {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 1.5rem;
        }

        .cards-view.active {
            display: grid;
        }

        .commande-card {
            background: white;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.6s ease-out;
        }

        .commande-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
        }

        .commande-card.pending::before {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        }

        .commande-card.validated::before {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .commande-card.rejected::before {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }

        .commande-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .card-id {
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 600;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0.5rem 0;
        }

        .card-info {
            display: grid;
            gap: 0.875rem;
            margin-bottom: 1.25rem;
        }

        .info-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .info-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            flex-shrink: 0;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 0.75rem;
            color: #64748b;
            margin-bottom: 0.2rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: #1e293b;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .card-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .card-actions .btn {
            flex: 1;
            justify-content: center;
        }

        .empty-state {
            background: white;
            border-radius: 16px;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .empty-state-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #64748b;
            font-size: 1rem;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            z-index: 1000;
            padding: 2rem;
            overflow-y: auto;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideInUp 0.3s ease-out;
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .modal-header h2 {
            font-size: 1.5rem;
            color: #1e293b;
        }

        .modal-close {
            width: 40px;
            height: 40px;
            background: #f1f5f9;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.5rem;
            color: #64748b;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            background: #e2e8f0;
            transform: rotate(90deg);
        }

        .modal-body {
            margin-bottom: 1.5rem;
        }

        .modal-actions {
            display: flex;
            gap: 1rem;
        }

        .modal-actions .btn {
            flex: 1;
            padding: 1rem;
            font-size: 1rem;
            justify-content: center;
        }

        .badge-new {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 700;
            margin-left: 0.5rem;
            animation: pulse 2s infinite;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1.5rem;
            }

            .dashboard-header h1 {
                font-size: 1.5rem;
            }

            .cards-view {
                grid-template-columns: 1fr;
            }

            .filters-section {
                flex-direction: column;
            }

            .filter-input,
            .filter-select {
                width: 100%;
                min-width: auto;
            }

            table {
                min-width: 100%;
                font-size: 0.85rem;
            }

            thead th,
            tbody td {
                padding: 0.75rem 0.5rem;
            }

            .action-btns {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideInDown 0.6s ease-out;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border-left: 4px solid #10b981;
            color: #065f46;
        }

        .alert-success::before {
            content: "✓";
            font-size: 1.5rem;
            font-weight: bold;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="dashboard-header">
        <h1>Gestion des Commandes</h1>
        <div class="stats-container">
            <div class="stat-badge pending">
                <div class="number" id="pendingCount">0</div>
                <div class="label">En attente</div>
            </div>
            <div class="stat-badge validated">
                <div class="number" id="validatedCount">0</div>
                <div class="label">Validées</div>
            </div>
            <div class="stat-badge rejected">
                <div class="number" id="rejectedCount">0</div>
                <div class="label">Rejetées</div>
            </div>
        </div>
    </div>

    <div class="filters-section">
        <input type="text" class="filter-input" id="searchInput" placeholder="🔍 Rechercher par email, téléphone, titre du bon...">
        <select class="filter-select" id="statusFilter">
            <option value="all">Tous les statuts</option>
            <option value="en attente">En attente</option>
            <option value="validée">Validées</option>
            <option value="rejetée">Rejetées</option>
        </select>
        <div class="view-toggle">
            <button class="view-btn" onclick="switchView('cards')">📋 Cartes</button>
            <button class="view-btn active" onclick="switchView('table')">📊 Tableau</button>
        </div>
    </div>

    @if($commandes->isEmpty())
        <div class="empty-state">
            <div class="empty-state-icon">📦</div>
            <h3>Aucune commande</h3>
            <p>Les commandes de bons de formation apparaîtront ici.</p>
        </div>
    @else
        {{-- VUE TABLEAU --}}
        <div class="table-container" id="tableView">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre du Bon</th>
                        <th>Montant</th>
                        <th>Code du bon</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Statut</th>
                        <th>Date de Création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                    <tr data-status="{{ $commande->statut }}" data-search="{{ strtolower(($commande->bon?->titre ?? '') . ' ' . $commande->email . ' ' . $commande->telephone) }}">
                        <td><strong>#{{ $commande->id }}</strong></td>
                        <td>{{ $commande->bon?->titre ?? 'Bon supprimé' }}</td>
                        <td><strong>{{ $commande->montant }} FCFA</strong></td>
                        <td>{{ $commande->bon?->code_unique ?? '-' }}</td>
                        <td>{{ $commande->telephone }}</td>
                        <td>{{ $commande->email }}</td>
                        <td>
                            @if($commande->statut == 'en attente')
                                <span class="status-badge pending">En attente</span>
                            @elseif($commande->statut == 'validée')
                                <span class="status-badge validated">Validée</span>
                            @elseif($commande->statut == 'rejetée')
                                <span class="status-badge rejected">Rejetée</span>
                            @endif
                        </td>
                        <td>{{ $commande->created_at->format('d/m/Y à H:i') }}</td>
                        <td>
                            @if ($commande->statut == 'en attente')
                            <div class="action-btns">
                                <form action="{{ route('commandes.validate', $commande) }}" method="POST" style="display:inline;" onsubmit="return confirmAction('valider')">
                                    @csrf
                                    <button type="submit" class="btn btn-validate">✓ Valider</button>
                                </form>
                                <form action="{{ route('commandes.reject', $commande) }}" method="POST" style="display:inline;" onsubmit="return confirmAction('rejeter')">
                                    @csrf
                                    <button type="submit" class="btn btn-reject">✗ Rejeter</button>
                                </form>
                            </div>
                            @else
                                <span style="color: #94a3b8; font-size: 0.875rem;">Aucune action</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- VUE CARTES --}}
        <div class="cards-view" id="cardsView">
            @foreach ($commandes as $commande)
            <div class="commande-card {{ $commande->statut == 'en attente' ? 'pending' : ($commande->statut == 'validée' ? 'validated' : 'rejected') }}" data-status="{{ $commande->statut }}" data-search="{{ strtolower(($commande->bon?->titre ?? '') . ' ' . $commande->email . ' ' . $commande->telephone) }}">
                <div class="card-header">
                    <div style="flex: 1;">
                        <div class="card-id">Commande #{{ $commande->id }}</div>
                        <div class="card-title">{{ $commande->bon?->titre ?? 'Bon supprimé' }}</div>
                        <div style="margin-top: 0.5rem;">
                            @if($commande->statut == 'en attente')
                                <span class="status-badge pending">En attente</span>
                                @if($commande->created_at->diffInHours(now()) < 24)
                                    <span class="badge-new">NOUVEAU</span>
                                @endif
                            @elseif($commande->statut == 'validée')
                                <span class="status-badge validated">Validée</span>
                            @elseif($commande->statut == 'rejetée')
                                <span class="status-badge rejected">Rejetée</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-info">
                    <div class="info-row">
                        <div class="info-icon">💰</div>
                        <div class="info-content">
                            <div class="info-label">Montant</div>
                            <div class="info-value">{{ $commande->montant }} €</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-icon">📱</div>
                        <div class="info-content">
                            <div class="info-label">Téléphone</div>
                            <div class="info-value">{{ $commande->telephone }}</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-icon">📧</div>
                        <div class="info-content">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $commande->email }}</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-icon">📅</div>
                        <div class="info-content">
                            <div class="info-label">Date de commande</div>
                            <div class="info-value">{{ $commande->created_at->format('d/m/Y à H:i') }}</div>
                        </div>
                    </div>
                </div>

                @if ($commande->statut == 'en attente')
                <div class="card-actions">
                    <form action="{{ route('commandes.validate', $commande) }}" method="POST" style="flex: 1;" onsubmit="return confirmAction('valider')">
                        @csrf
                        <button type="submit" class="btn btn-validate">✓ Valider</button>
                    </form>
                    <form action="{{ route('commandes.reject', $commande) }}" method="POST" style="flex: 1;" onsubmit="return confirmAction('rejeter')">
                        @csrf
                        <button type="submit" class="btn btn-reject">✗ Rejeter</button>
                    </form>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    @endif
</div>

    <script>
        function switchView(view) {
            const cardsView = document.getElementById('cardsView');
            const tableView = document.getElementById('tableView');
            const buttons = document.querySelectorAll('.view-btn');

            buttons.forEach(btn => btn.classList.remove('active'));

            if (view === 'cards') {
                cardsView.classList.add('active');
                tableView.classList.add('hidden');
                buttons[0].classList.add('active');
            } else {
                cardsView.classList.remove('active');
                tableView.classList.remove('hidden');
                buttons[1].classList.add('active');
            }
        }

        function confirmAction(action) {
            const messages = {
                'valider': 'Êtes-vous sûr de vouloir valider cette commande ? Un code sera envoyé au client.',
                'rejeter': 'Êtes-vous sûr de vouloir rejeter cette commande ? Le client sera notifié.'
            };
            return confirm(messages[action]);
        }

        function updateStats() {
            const rows = document.querySelectorAll('tbody tr');
            let pending = 0, validated = 0, rejected = 0;

            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                if (status === 'en attente') pending++;
                else if (status === 'validee') validated++;
                else if (status === 'rejetee') rejected++;
            });

            document.getElementById('pendingCount').textContent = pending;
            document.getElementById('validatedCount').textContent = validated;
            document.getElementById('rejectedCount').textContent = rejected;
        }

        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');

        function filterCommandes() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;

            const cards = document.querySelectorAll('.commande-card');
            const rows = document.querySelectorAll('tbody tr');

            function applyFilters(elements) {
                elements.forEach(element => {
                    const searchData = element.getAttribute('data-search');
                    const statusData = element.getAttribute('data-status');

                    const matchesSearch = searchData.includes(searchTerm);
                    const matchesStatus = statusValue === 'all' || statusData === statusValue;

                    if (matchesSearch && matchesStatus) {
                        element.style.display = '';
                    } else {
                        element.style.display = 'none';
                    }
                });
            }

            applyFilters(cards);
            applyFilters(rows);
        }

        searchInput.addEventListener('input', filterCommandes);
        statusFilter.addEventListener('change', filterCommandes);

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 50);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.commande-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease-out';
            observer.observe(card);
        });

        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'f') {
                e.preventDefault();
                searchInput.focus();
            }
        });

        updateStats();

        console.log('%c🛒 Gestion Commandes - MonProfChezMoi', 'font-size: 20px; color: #3b82f6; font-weight: bold;');
        console.log('%cDashboard chargé avec succès!', 'font-size: 14px; color: #10b981;');
    </script>
</body>
</html>
