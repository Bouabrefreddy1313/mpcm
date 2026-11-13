<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Demandes de formations</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            max-width: 1400px;
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
            content: "📊";
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
            color: #3b82f6;
        }

        .stat-badge .label {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        .alert-info {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            font-size: 1.1rem;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
            animation: slideInDown 0.6s ease-out;
        }

        .alert-info::before {
            content: "ℹ️";
            font-size: 2rem;
            display: block;
            margin-bottom: 1rem;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }

        .demande-card {
            background: white;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            animation: slideInUp 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        .demande-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .demande-card:hover {
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

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .card-badge {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
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

        .besoins-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1rem;
            margin: 1rem 0;
            border: 1px solid #e2e8f0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, padding 0.4s ease-out;
        }

        .besoins-section.expanded {
            max-height: 500px;
            padding: 1.25rem;
        }

        .besoins-title {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .besoins-content {
            color: #475569;
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .card-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.625rem 1.25rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #64748b;
            border: 2px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
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
        }

        .view-btn.active {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .table-view {
            display: none;
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        .table-view.active {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
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
        }

        thead th:first-child {
            border-top-left-radius: 12px;
        }

        thead th:last-child {
            border-top-right-radius: 12px;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: background 0.3s;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody td {
            padding: 1rem;
            color: #475569;
        }

        .cards-view.active {
            display: grid;
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

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
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

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .filters-section {
                flex-direction: column;
            }

            .filter-input {
                width: 100%;
                min-width: auto;
            }

            .card-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
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

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard-header">
            <h1>
                Demandes de formations personnalisées
            </h1>
            <div class="stats-container">
                <div class="stat-badge">
                    <div class="number">{{ $demandes->count() }}</div>
                    <div class="label">Total</div>
                </div>
            </div>
        </div>

        @if($demandes->isEmpty())
            <div class="alert-info">
                Aucune demande de formation pour le moment. Les nouvelles demandes apparaîtront ici.
            </div>
        @else
            <div class="filters-section">
                <input type="text" class="filter-input" id="searchInput" placeholder="🔍 Rechercher par nom, entreprise, titre...">
                <div class="view-toggle">
                    <button class="view-btn active" onclick="switchView('cards')">📋 Cartes</button>
                    <button class="view-btn" onclick="switchView('table')">📊 Tableau</button>
                </div>
            </div>

            <div class="cards-view cards-grid active" id="cardsView">
                @foreach($demandes as $demande)
                <div class="demande-card" data-search="{{ strtolower($demande->titre . ' ' . $demande->nom . ' ' . $demande->prenom . ' ' . $demande->entreprise) }}">
                    <div class="card-header">
                        <div>
                            <div class="card-title">{{ $demande->titre }}</div>
                            <div style="color: #64748b; font-size: 0.875rem;">
                                {{ $demande->created_at->format('d/m/Y à H:i') }}
                                @if($demande->created_at->diffInDays(now()) < 3)
                                    <span class="badge-new">NOUVEAU</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-badge">#{{ $loop->iteration }}</div>
                    </div>

                    <div class="card-info">
                        <div class="info-row">
                            <div class="info-icon">👤</div>
                            <div class="info-content">
                                <div class="info-label">Contact</div>
                                <div class="info-value">{{ $demande->civilite }} {{ $demande->prenom }} {{ $demande->nom }}</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-icon">🏢</div>
                            <div class="info-content">
                                <div class="info-label">Entreprise</div>
                                <div class="info-value">{{ $demande->entreprise ?? 'Non renseignée' }}</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-icon">📧</div>
                            <div class="info-content">
                                <div class="info-label">Email</div>
                                <div class="info-value">{{ $demande->email }}</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-icon">📱</div>
                            <div class="info-content">
                                <div class="info-label">Téléphone</div>
                                <div class="info-value">{{ $demande->telephone }}</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-icon">📅</div>
                            <div class="info-content">
                                <div class="info-label">Période souhaitée</div>
                                <div class="info-value">{{ $demande->periode }}</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-icon">👥</div>
                            <div class="info-content">
                                <div class="info-label">Nombre de participants</div>
                                <div class="info-value">{{ $demande->nombre_personnes }} personne(s)</div>
                            </div>
                        </div>
                    </div>

                    <div class="besoins-section" id="besoins{{ $demande->id }}">
                        <div class="besoins-title">📝 Besoins exprimés</div>
                        <div class="besoins-content">{!! nl2br(e($demande->besoins)) !!}</div>
                    </div>

                    <div class="card-actions">
                        <button class="btn btn-primary" onclick="toggleBesoins({{ $demande->id }})">
                            <span>👁️ Voir les besoins</span>
                        </button>
                        <button class="btn btn-success" onclick="contactClient('{{ $demande->email }}')">
                            <span>✉️ Contacter</span>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="table-view" id="tableView">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Période</th>
                            <th>Participants</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Entreprise</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($demandes as $demande)
                        <tr data-search="{{ strtolower($demande->titre . ' ' . $demande->nom . ' ' . $demande->prenom . ' ' . $demande->entreprise) }}">
                            <td><strong>#{{ $loop->iteration }}</strong></td>
                            <td>{{ $demande->titre }}</td>
                            <td>{{ $demande->periode }}</td>
                            <td>{{ $demande->nombre_personnes }}</td>
                            <td>{{ $demande->nom }}</td>
                            <td>{{ $demande->prenom }}</td>
                            <td><a href="mailto:{{ $demande->email }}" style="color: #3b82f6;">{{ $demande->email }}</a></td>
                            <td>{{ $demande->telephone }}</td>
                            <td>{{ $demande->entreprise ?? '-' }}</td>
                            <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="showModal({{ $demande->id }}, `{{ addslashes($demande->besoins) }}`)">
                                    Voir détails
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script>
        // Toggle besoins section
        function toggleBesoins(id) {
            const section = document.getElementById(`besoins${id}`);
            const isExpanded = section.classList.contains('expanded');

            const allSections = document.querySelectorAll('.besoins-section');
            allSections.forEach(s => s.classList.remove('expanded'));

            if (!isExpanded) {
                section.classList.add('expanded');
            }
        }

        // Contact client
        function contactClient(email) {
            window.location.href = `mailto:${email}`;
        }

        // Switch between cards and table view
        function switchView(view) {
            const cardsView = document.getElementById('cardsView');
            const tableView = document.getElementById('tableView');
            const buttons = document.querySelectorAll('.view-btn');

            buttons.forEach(btn => btn.classList.remove('active'));

            if (view === 'cards') {
                cardsView.classList.add('active');
                tableView.classList.remove('active');
                buttons[0].classList.add('active');
            } else {
                cardsView.classList.remove('active');
                tableView.classList.add('active');
                buttons[1].classList.add('active');
            }
        }

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const cards = document.querySelectorAll('.demande-card');
                const rows = document.querySelectorAll('tbody tr');

                cards.forEach(card => {
                    const searchData = card.getAttribute('data-search');
                    if (searchData.includes(searchTerm)) {
                        card.style.display = 'block';
                        card.style.animation = 'slideInUp 0.4s ease-out';
                    } else {
                        card.style.display = 'none';
                    }
                });

                rows.forEach(row => {
                    const searchData = row.getAttribute('data-search');
                    if (searchData && searchData.includes(searchTerm)) {
                        row.style.display = 'table-row';
                    } else if (searchData) {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // Show modal for table view
        function showModal(id, besoins) {
            alert(`Besoins exprimés:\n\n${besoins}`);
        }

        // Animation on scroll
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

        document.querySelectorAll('.demande-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease-out';
            observer.observe(card);
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'f') {
                e.preventDefault();
                searchInput.focus();
            }
        });

        // Auto-refresh notification
        console.log('%c📊 Dashboard Admin MonProfChezMoi', 'font-size: 20px; color: #3b82f6; font-weight: bold;');
        console.log('%cDashboard chargé avec succès!', 'font-size: 14px; color: #10b981;');
    </script>
</body>
</html>
