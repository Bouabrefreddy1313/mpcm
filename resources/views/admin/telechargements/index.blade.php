<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Téléchargements PDF - Admin - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #2563EB;
            --dark-blue: #1E40AF;
            --light-blue: #DBEAFE;
            --very-light-blue: #F0F9FF;
            --primary-orange: #F97316;
            --dark-orange: #EA580C;
            --light-orange: #FFEDD5;
            --success-green: #10B981;
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --bg-light: #F9FAFB;
            --white: #FFFFFF;
            --border-color: #E5E7EB;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
        }

        /* Header */
        .page-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            padding: 2rem;
            color: var(--white);
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin-top: 0.5rem;
        }

        .breadcrumb-item a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--white);
        }

        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
            margin-top: -2rem;
        }

        .stat-box {
            background: var(--white);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-box-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--white);
        }

        .stat-box-icon.blue { background: var(--primary-blue); }
        .stat-box-icon.green { background: var(--success-green); }
        .stat-box-icon.orange { background: var(--primary-orange); }

        .stat-box-content h3 {
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
            color: var(--text-dark);
        }

        .stat-box-content p {
            margin: 0;
            color: var(--text-gray);
            font-size: 0.95rem;
        }

        /* Content */
        .content-wrapper {
            padding: 0 2rem 2rem;
        }

        .section-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .section-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin: 0;
        }

        /* Table */
        .table-responsive {
            overflow-x: auto;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table thead th {
            background: var(--bg-light);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-gray);
            font-size: 0.9rem;
            border-bottom: 2px solid var(--border-color);
        }

        .custom-table tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .custom-table tbody tr:hover {
            background: var(--very-light-blue);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
            color: var(--white);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .user-details h4 {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
        }

        .user-details p {
            margin: 0;
            font-size: 0.85rem;
            color: var(--text-gray);
        }

        .badge-catalogue {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--light-blue);
            color: var(--primary-blue);
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-catalogue i {
            font-size: 0.8rem;
        }

        .date-info {
            display: flex;
            flex-direction: column;
        }

        .date-main {
            font-weight: 600;
            color: var(--text-dark);
        }

        .date-time {
            font-size: 0.85rem;
            color: var(--text-gray);
        }

        /* Catalogue Distribution */
        .catalogue-list {
            padding: 1.5rem;
        }

        .catalogue-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .catalogue-item:last-child {
            border-bottom: none;
        }

        .catalogue-name {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 600;
        }

        .catalogue-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1rem;
        }

        .catalogue-bar {
            flex: 1;
            margin: 0 1rem;
            height: 8px;
            background: var(--bg-light);
            border-radius: 4px;
            overflow: hidden;
        }

        .catalogue-progress {
            height: 100%;
            background: var(--primary-blue);
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .catalogue-count {
            font-weight: 700;
            color: var(--primary-blue);
            min-width: 40px;
            text-align: right;
        }

        /* Pagination */
        .pagination-wrapper {
            padding: 1.5rem;
            display: flex;
            justify-content: center;
        }

        .pagination {
            gap: 0.5rem;
        }

        .page-link {
            border: none;
            padding: 0.6rem 1rem;
            border-radius: 8px;
            color: var(--text-gray);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: var(--light-blue);
            color: var(--primary-blue);
        }

        .page-item.active .page-link {
            background: var(--primary-blue);
            color: var(--white);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-icon {
            width: 100px;
            height: 100px;
            background: var(--light-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary-blue);
            font-size: 3rem;
        }

        .empty-state h3 {
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--text-gray);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .stats-row {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            .content-wrapper {
                padding: 0 1rem 1rem;
            }

            .custom-table {
                font-size: 0.9rem;
            }

            .user-avatar {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }
        }

        /* Export Button */
        .btn-export {
            background: var(--success-green);
            color: var(--white);
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-export:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            color: var(--white);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="page-header">
        <div class="container-fluid">
            <h1><i class="fas fa-download me-3"></i>Téléchargements PDF</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   
                    <li class="breadcrumb-item active">Téléchargements</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-row">
        <div class="stat-box">
            <div class="stat-box-icon blue">
                <i class="fas fa-download"></i>
            </div>
            <div class="stat-box-content">
                <h3>{{ $stats['total'] }}</h3>
                <p>Total téléchargements</p>
            </div>
        </div>

        <div class="stat-box">
            <div class="stat-box-icon green">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div class="stat-box-content">
                <h3>{{ $stats['aujourd_hui'] }}</h3>
                <p>Aujourd'hui</p>
            </div>
        </div>

        <div class="stat-box">
            <div class="stat-box-icon orange">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-box-content">
                <h3>{{ $stats['ce_mois'] }}</h3>
                <p>Ce mois</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content-wrapper">
        <div class="row g-4">
            <!-- Table des téléchargements -->
            <div class="col-lg-8">
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="section-title">Liste des téléchargements</h2>
                        <a href="#" class="btn-export" onclick="exportData()">
                            <i class="fas fa-file-excel"></i>
                            Exporter Excel
                        </a>
                    </div>

                    @if($telechargements->count() > 0)
                        <div class="table-responsive">
                            <table class="custom-table">
                                <thead>
                                    <tr>
                                        <th>Utilisateur</th>
                                        <th>Contact</th>
                                        <th>Catalogue</th>
                                        <th>Entreprise</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($telechargements as $item)
                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <div class="user-avatar">
                                                    {{ strtoupper(substr($item->prenom, 0, 1) . substr($item->nom, 0, 1)) }}
                                                </div>
                                                <div class="user-details">
                                                    <h4>{{ $item->prenom }} {{ $item->nom }}</h4>
                                                    <p>{{ $item->fonction ?? 'Non spécifié' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="user-details">
                                                <p><i class="fas fa-envelope me-1 text-muted"></i> {{ $item->email }}</p>
                                                @if($item->telephone)
                                                    <p><i class="fas fa-phone me-1 text-muted"></i> {{ $item->telephone }}</p>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge-catalogue">
                                                <i class="fas fa-file-pdf"></i>
                                                {{ $item->catalogue }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($item->entreprise)
                                                <span class="text-dark">{{ $item->entreprise }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="date-info">
                                                <span class="date-main">{{ $item->created_at->format('d/m/Y') }}</span>
                                                <span class="date-time">{{ $item->created_at->format('H:i') }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pagination-wrapper">
                            {{ $telechargements->links() }}
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-inbox"></i>
                            </div>
                            <h3>Aucun téléchargement</h3>
                            <p>Les téléchargements apparaîtront ici une fois que des utilisateurs auront rempli le formulaire.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Répartition par catalogue -->
            <div class="col-lg-4">
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="section-title">Répartition par catalogue</h2>
                    </div>
                    <div class="catalogue-list">
                        @php
                            $maxCount = $parCatalogue->max('total') ?? 1;
                            $colors = ['blue', 'orange', 'green', 'purple', 'red'];
                        @endphp

                        @forelse($parCatalogue as $index => $catalogue)
                            <div class="catalogue-item">
                                <div class="catalogue-name">
                                    <div class="catalogue-icon" style="background: var(--{{ $colors[$index % count($colors)] == 'blue' ? 'primary-blue' : ($colors[$index % count($colors)] == 'orange' ? 'primary-orange' : ($colors[$index % count($colors)] == 'green' ? 'success-green' : ($colors[$index % count($colors)] == 'purple' ? 'purple' : 'red'))) }}">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <span>{{ $catalogue->catalogue }}</span>
                                </div>
                                <div class="catalogue-bar">
                                    <div class="catalogue-progress" style="width: {{ ($catalogue->total / $maxCount) * 100 }}%"></div>
                                </div>
                                <div class="catalogue-count">{{ $catalogue->total }}</div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted">
                                Aucune donnée disponible
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function exportData() {
            // Fonction simple pour exporter en CSV
            const rows = document.querySelectorAll('.custom-table tbody tr');
            let csv = 'Nom,Prénom,Email,Téléphone,Entreprise,Fonction,Catalogue,Date\n';
            
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const nom = cells[0].querySelector('h4').textContent.trim();
                const email = cells[1].querySelector('p').textContent.replace('📧 ', '').trim();
                const telephone = cells[1].querySelectorAll('p')[1]?.textContent.replace('📞 ', '').trim() || '';
                const catalogue = cells[2].textContent.trim();
                const entreprise = cells[3].textContent.trim();
                const date = cells[4].textContent.trim().replace('\n', ' ');
                
                csv += `"${nom}","${email}","${telephone}","${entreprise}","${catalogue}","${date}"\n`;
            });
            
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'telechargements_' + new Date().toISOString().split('T')[0] + '.csv';
            link.click();
        }

        // Animation des barres de progression
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelectorAll('.catalogue-progress').forEach(bar => {
                    bar.style.width = bar.style.width;
                });
            }, 100);
        });
    </script>
</body>
</html>