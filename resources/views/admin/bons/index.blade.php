<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Bons de Formation - Admin</title>
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
            content: "🎫";
            font-size: 2.5rem;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn-create {
            padding: 0.875rem 1.75rem;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-create::before {
            content: "+";
            font-size: 1.5rem;
            font-weight: 700;
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: all 0.3s;
            animation: slideInUp 0.6s ease-out;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            flex-shrink: 0;
        }

        .stat-card:nth-child(1) .stat-icon {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        }

        .stat-card:nth-child(2) .stat-icon {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        }

        .stat-card:nth-child(3) .stat-icon {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        }

        .stat-card:nth-child(4) .stat-icon {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        }

        .stat-content h3 {
            font-size: 2rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }

        .stat-content p {
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 500;
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

        .code-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-weight: 600;
            font-size: 0.85rem;
            color: #1e293b;
            border: 2px solid #cbd5e1;
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

        .status-badge.disponible {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .status-badge.utilise {
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            color: #3730a3;
        }

        .status-badge.expire {
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
            text-decoration: none;
        }

        .btn-edit {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .cards-view {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 1.5rem;
        }

        .cards-view.active {
            display: grid;
        }

        .bon-card {
            background: white;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.6s ease-out;
        }

        .bon-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
        }

        .bon-card.disponible::before {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .bon-card.utilise::before {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        }

        .bon-card.expire::before {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }

        .bon-card:hover {
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

        .card-description {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.25rem;
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
            margin-bottom: 2rem;
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
            max-width: 500px;
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

        .modal-body p {
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 1rem;
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

            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard-header">
            <h1>Gestion des Bons de Formation</h1>
            <div class="header-actions">
                <a href="{{ route('admin.bons.create') }}" class="btn-create">
                    Créer un nouveau bon
                </a>
            </div>
        </div>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">🎫</div>
                <div class="stat-content">
                    <h3 id="totalCount">0</h3>
                    <p>Total de bons</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✓</div>
                <div class="stat-content">
                    <h3 id="availableCount">0</h3>
                    <p>Disponibles</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🔄</div>
                <div class="stat-content">
                    <h3 id="usedCount">0</h3>
                    <p>Utilisés</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⏰</div>
                <div class="stat-content">
                    <h3 id="expiredCount">0</h3>
                    <p>Expirés</p>
                </div>
            </div>
        </div>

        <div class="filters-section">
            <input
                type="text"
                class="filter-input"
                id="searchInput"
                placeholder="🔍 Rechercher par titre, code, description..."
            >
            <select class="filter-select" id="statusFilter">
                <option value="all">Tous les statuts</option>
                <option value="disponible">Disponibles</option>
                <option value="utilise">Utilisés</option>
                <option value="expire">Expirés</option>
            </select>
            <div class="view-toggle">
                <button class="view-btn" onclick="switchView('cards')">📋 Cartes</button>
                <button class="view-btn active" onclick="switchView('table')">📊 Tableau</button>
            </div>
        </div>

        @if($bons->isEmpty())
            <div class="empty-state">
                <div class="empty-state-icon">🎫</div>
                <h3>Aucun bon de formation</h3>
                <p>Créez votre premier bon de formation pour commencer</p>
                <a href="{{ route('admin.bons.create') }}" class="btn-create">
                    Créer un bon maintenant
                </a>
            </div>
        @else
            <div class="table-container" id="tableView">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Montant</th>
                            <th>Code Unique</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bons as $bon)
                        <tr data-status="{{ $bon->statut }}" data-search="{{ strtolower($bon->titre . ' ' . $bon->description . ' ' . $bon->code_unique) }}">
                            <td><strong>#{{ $bon->id }}</strong></td>
                            <td>{{ $bon->titre }}</td>
                            <td>{{ Str::limit($bon->description, 50) }}</td>
                            <td><strong>{{ $bon->montant }} €</strong></td>
                            <td>
                                <span class="code-badge">{{ $bon->code_unique }}</span>
                            </td>
                            <td>
                                <span class="status-badge {{ $bon->statut }}">
                                    {{ ucfirst($bon->statut) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('admin.bons.create') }}" class="btn btn-edit">
                                        ✏️ Modifier
                                    </a>
                                    <button
                                        type="button"
                                        class="btn btn-delete"
                                        onclick="confirmDelete({{ $bon->id }}, '{{ $bon->titre }}')"
                                    >
                                        🗑️ Supprimer
                                    </button>
                                    <form
                                        id="deleteForm{{ $bon->id }}"
                                        action="{{ route('admin.bons.destroy', $bon) }}"
                                        method="POST"
                                        style="display:none;"
                                    >
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cards-view" id="cardsView">
                @foreach ($bons as $bon)
                <div class="bon-card {{ $bon->statut }}" data-status="{{ $bon->statut }}" data-search="{{ strtolower($bon->titre . ' ' . $bon->description . ' ' . $bon->code_unique) }}">
                    <div class="card-header">
                        <div style="flex: 1;">
                            <div class="card-id">Bon #{{ $bon->id }}</div>
                            <div class="card-title">{{ $bon->titre }}</div>
                            <div style="margin-top: 0.5rem;">
                                <span class="status-badge {{ $bon->statut }}">
                                    {{ ucfirst($bon->statut) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <p class="card-description">{{ $bon->description }}</p>

                    <div class="card-info">
                        <div class="info-row">
                            <div class="info-icon">💰</div>
                            <div class="info-content">
                                <div class="info-label">Montant</div>
                                <div class="info-value">{{ $bon->montant }} €</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-icon">🔑</div>
                            <div class="info-content">
                                <div class="info-label">Code Unique</div>
                                <div class="info-value">
                                    <span class="code-badge">{{ $bon->code_unique }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-actions">
                        <a href="{{ route('admin.bons.create') }}" class="btn btn-edit">
                            ✏️ Modifier
                        </a>
                        <button
                            type="button"
                            class="btn btn-delete"
                            onclick="confirmDelete({{ $bon->id }}, '{{ $bon->titre }}')"
                        >
                            🗑️ Supprimer
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirmer la suppression</h2>
                <button class="modal-close" onclick="closeModal()">×</button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer le bon <strong id="bonTitle"></strong> ?</p>
                <p>Cette action est irréversible.</p>
            </div>
            <div class="modal-actions">
                <button class="btn btn-edit" onclick="closeModal()">Annuler</button>
                <button class="btn btn-delete" onclick="executeDelete()">Supprimer</button>
            </div>
        </div>
    </div>

    <script>
        let currentDeleteId = null;

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

        function confirmDelete(id, title) {
            currentDeleteId = id;
            document.getElementById('bonTitle').textContent = title;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.remove('active');
            currentDeleteId = null;
        }

        function executeDelete() {
            if (currentDeleteId) {
                document.getElementById('deleteForm' + currentDeleteId).submit();
            }
        }

        function updateStats() {
            const rows = document.querySelectorAll('tbody tr, .bon-card');
            let total = 0, available = 0, used = 0, expired = 0;

            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                total++;
                if (status === 'disponible') available++;
                else if (status === 'utilise') used++;
                else if (status === 'expire') expired++;
            });

            document.getElementById('totalCount').textContent = total;
            document.getElementById('availableCount').textContent = available;
            document.getElementById('usedCount').textContent = used;
            document.getElementById('expiredCount').textContent = expired;
        }

        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');

        function filterBons() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;

            const cards = document.querySelectorAll('.bon-card');
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

        searchInput.addEventListener('input', filterBons);
        statusFilter.addEventListener('change', filterBons);

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

        document.querySelectorAll('.bon-card, .stat-card').forEach(card => {
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
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        updateStats();

        console.log('%c🎫 Gestion Bons - MonProfChezMoi', 'font-size: 20px; color: #3b82f6; font-weight: bold;');
        console.log('%cDashboard chargé avec succès!', 'font-size: 14px; color: #10b981;');
    </script>
</body>
</html>
