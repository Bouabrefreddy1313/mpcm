<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes de Devis - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/demandes-devis.css') }}">
</head>
<style>
    :root {
    --primary-blue: #5B8CC6;
    --light-blue: #E8F1F8;
    --primary-orange: #F4A261;
    --light-orange: #FFF3E6;
    --success-green: #48BB78;
    --light-green: #E6F9F0;
    --purple: #9F7AEA;
    --light-purple: #F5F0FF;
    --danger-red: #E53E3E;
    --light-red: #FFF5F5;
    --text-dark: #2D3748;
    --text-gray: #718096;
    --bg-light: #F7FAFC;
    --white: #FFFFFF;
    --border-color: #E2E8F0;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: var(--bg-light);
    color: var(--text-dark);
}

.main-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
}

/* Page Header */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.header-content {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.btn-back {
    width: 50px;
    height: 50px;
    border: none;
    background: var(--white);
    color: var(--primary-blue);
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.btn-back:hover {
    background: var(--primary-blue);
    color: var(--white);
    transform: translateX(-5px);
}

.page-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
    animation: fadeInLeft 0.6s ease;
}

@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.page-subtitle {
    color: var(--text-gray);
    font-size: 1rem;
}

.header-actions {
    display: flex;
    gap: 1rem;
}

.btn-action {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.btn-action.primary {
    background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
    color: var(--white);
}

.btn-action.primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(91, 140, 198, 0.3);
}

.btn-action.secondary {
    background: var(--white);
    color: var(--text-dark);
    border: 2px solid var(--border-color);
}

.btn-action.secondary:hover {
    border-color: var(--primary-blue);
    color: var(--primary-blue);
    transform: translateY(-3px);
}

/* Stats Section */
.stats-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: var(--white);
    border-radius: 16px;
    padding: 1.75rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    border: 1px solid var(--border-color);
    transition: all 0.4s ease;
    opacity: 0;
    transform: translateY(30px);
}

.stat-card.animate {
    animation: fadeInUp 0.6s ease forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stat-card:nth-child(1).animate { animation-delay: 0.1s; }
.stat-card:nth-child(2).animate { animation-delay: 0.2s; }
.stat-card:nth-child(3).animate { animation-delay: 0.3s; }
.stat-card:nth-child(4).animate { animation-delay: 0.4s; }

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
}

.stat-icon {
    width: 65px;
    height: 65px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: var(--white);
    flex-shrink: 0;
}

.stat-card.blue .stat-icon {
    background: linear-gradient(135deg, var(--primary-blue), #4A7AB8);
}

.stat-card.orange .stat-icon {
    background: linear-gradient(135deg, var(--primary-orange), #E76F51);
}

.stat-card.green .stat-icon {
    background: linear-gradient(135deg, var(--success-green), #38A169);
}

.stat-card.purple .stat-icon {
    background: linear-gradient(135deg, var(--purple), #805AD5);
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-gray);
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.stat-value {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--text-dark);
}

/* Empty State */
.empty-state {
    background: var(--white);
    border-radius: 16px;
    padding: 5rem 2rem;
    text-align: center;
    border: 1px solid var(--border-color);
    opacity: 0;
    transform: scale(0.9);
}

.empty-state.animate {
    animation: scaleIn 0.6s ease forwards;
}

@keyframes scaleIn {
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.empty-icon {
    width: 120px;
    height: 120px;
    background: var(--light-blue);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    color: var(--primary-blue);
    font-size: 4rem;
}

.empty-state h2 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.75rem;
}

.empty-state p {
    color: var(--text-gray);
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

/* Filters Section */
.filters-section {
    background: var(--white);
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    border: 1px solid var(--border-color);
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    opacity: 0;
    transform: translateY(30px);
}

.filters-section.animate {
    animation: fadeInUp 0.6s ease 0.2s forwards;
}

.search-wrapper {
    flex: 1;
    min-width: 300px;
    position: relative;
}

.search-wrapper i {
    position: absolute;
    left: 1.25rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-gray);
    font-size: 1rem;
}

.search-wrapper input {
    width: 100%;
    padding: 0.9rem 1.25rem 0.9rem 3.25rem;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.search-wrapper input:focus {
    outline: none;
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 3px rgba(91, 140, 198, 0.1);
}

.filters-wrapper {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.filter-select {
    padding: 0.9rem 1.25rem;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-size: 0.95rem;
    background: var(--white);
    color: var(--text-dark);
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 180px;
}

.filter-select:focus {
    outline: none;
    border-color: var(--primary-blue);
}

.btn-reset {
    padding: 0.9rem 1.5rem;
    background: var(--light-red);
    border: 2px solid transparent;
    border-radius: 12px;
    color: var(--danger-red);
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-reset:hover {
    background: var(--danger-red);
    color: var(--white);
    transform: scale(1.05);
}

/* Table Card */
.table-card {
    background: var(--white);
    border-radius: 16px;
    border: 1px solid var(--border-color);
    overflow: hidden;
    opacity: 0;
    transform: translateY(30px);
}

.table-card.animate {
    animation: fadeInUp 0.6s ease 0.4s forwards;
}

.table-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
}

.table-info {
    color: var(--text-gray);
    font-size: 0.95rem;
}

.results-count {
    color: var(--primary-blue);
    font-weight: 700;
    font-size: 1.1rem;
}

.table-wrapper {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table thead {
    background: var(--bg-light);
}

.data-table th {
    padding: 1.25rem 1.5rem;
    text-align: left;
    font-weight: 700;
    color: var(--text-dark);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    user-select: none;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.data-table th:hover {
    background: rgba(91, 140, 198, 0.05);
}

.th-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.75rem;
}

.th-content i {
    color: var(--text-gray);
    font-size: 0.8rem;
}

.data-table tbody tr {
    border-bottom: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.data-table tbody tr:hover {
    background: var(--light-blue);
}

.data-table td {
    padding: 1.25rem 1.5rem;
    color: var(--text-dark);
    vertical-align: middle;
}

.badge-id {
    background: var(--light-blue);
    color: var(--primary-blue);
    padding: 0.4rem 0.9rem;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.85rem;
    display: inline-block;
}

.cours-cell {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.cours-icon {
    width: 42px;
    height: 42px;
    background: var(--light-green);
    color: var(--success-green);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.cours-title {
    font-weight: 600;
    color: var(--text-dark);
    max-width: 250px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.client-cell {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.client-avatar {
    width: 42px;
    height: 42px;
    background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
    color: var(--white);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.client-name {
    font-weight: 600;
    color: var(--text-dark);
}

.contact-cell {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: var(--text-gray);
}

.contact-item i {
    color: var(--primary-blue);
    font-size: 0.85rem;
    width: 16px;
}

.ville-badge {
    background: var(--light-purple);
    color: var(--purple);
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
}

.date-cell {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.date-main {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-dark);
    font-weight: 500;
}

.date-main i {
    color: var(--primary-blue);
    font-size: 0.9rem;
}

.date-time {
    color: var(--text-gray);
    font-size: 0.85rem;
    padding-left: 1.4rem;
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-icon {
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.btn-icon.primary {
    background: var(--light-blue);
    color: var(--primary-blue);
}

.btn-icon.primary:hover {
    background: var(--primary-blue);
    color: var(--white);
    transform: translateY(-2px);
}

.btn-icon.success {
    background: var(--light-green);
    color: var(--success-green);
}

.btn-icon.success:hover {
    background: var(--success-green);
    color: var(--white);
    transform: translateY(-2px);
}

.btn-icon.orange {
    background: var(--light-orange);
    color: var(--primary-orange);
}

.btn-icon.orange:hover {
    background: var(--primary-orange);
    color: var(--white);
    transform: translateY(-2px);
}

.btn-icon.danger {
    background: var(--light-red);
    color: var(--danger-red);
}

.btn-icon.danger:hover {
    background: var(--danger-red);
    color: var(--white);
    transform: translateY(-2px);
}

.table-footer {
    padding: 1.5rem 2rem;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: center;
    align-items: center;
}

.footer-info {
    color: var(--text-gray);
    font-size: 0.95rem;
}

.footer-info span {
    color: var(--primary-blue);
    font-weight: 700;
}

/* Modals */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    padding: 2rem;
}

.modal-overlay.active {
    display: flex;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.modal-content {
    background: var(--white);
    border-radius: 20px;
    max-width: 600px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--text-dark);
}

.modal-close {
    width: 36px;
    height: 36px;
    border: none;
    background: var(--bg-light);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    color: var(--text-gray);
}

.modal-close:hover {
    background: var(--danger-red);
    color: var(--white);
}

.modal-body {
    padding: 2rem;
}

.modal-footer {
    padding: 1.5rem 2rem;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
}

/* Responsive */
@media (max-width: 1024px) {
    .stats-section {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .main-container {
        padding: 1rem;
    }

    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .page-title {
        font-size: 1.5rem;
    }

    .header-actions {
        width: 100%;
        flex-direction: column;
    }

    .btn-action {
        width: 100%;
        justify-content: center;
    }

    .stats-section {
        grid-template-columns: 1fr;
    }

    .filters-section {
        flex-direction: column;
    }

    .search-wrapper {
        width: 100%;
        min-width: auto;
    }

    .filters-wrapper {
        width: 100%;
        flex-direction: column;
    }

    .filter-select {
        width: 100%;
    }

    .data-table {
        min-width: 1000px;
    }
}

@media (max-width: 576px) {
    .action-buttons {
        flex-direction: column;
    }
}

/* Print Styles */
@media print {
    .page-header,
    .filters-section,
    .action-buttons,
    .modal-overlay {
        display: none !important;
    }

    .table-card {
        box-shadow: none;
        border: 1px solid #000;
    }
}

</style>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Demandes de Devis') }}
            </h2>
        </x-slot>

        <div class="main-container">
            <!-- Header Section -->
            <div class="page-header">
                <div class="header-content">
                    <button class="btn-back" onclick="window.history.back()">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <div class="header-text">
                        <h1 class="page-title">Demandes de Devis</h1>
                        <p class="page-subtitle">Gérez et suivez toutes les demandes de devis clients</p>
                    </div>
                </div>
                <div class="header-actions">
                    <button class="btn-action secondary" onclick="window.print()">
                        <i class="fas fa-print"></i>
                        <span>Imprimer</span>
                    </button>
                    <button class="btn-action primary" onclick="exportToCSV()">
                        <i class="fas fa-download"></i>
                        <span>Exporter CSV</span>
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-section">
                <div class="stat-card blue" data-animate>
                    <div class="stat-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Total Demandes</div>
                        <div class="stat-value" data-target="{{ $demandes->count() }}">0</div>
                    </div>
                </div>

                <div class="stat-card orange" data-animate>
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Aujourd'hui</div>
                        <div class="stat-value" data-target="{{ $demandes->where('created_at', '>=', now()->startOfDay())->count() }}">0</div>
                    </div>
                </div>

                <div class="stat-card green" data-animate>
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Cours Différents</div>
                        <div class="stat-value" data-target="{{ $demandes->unique('cours_id')->count() }}">0</div>
                    </div>
                </div>

                <div class="stat-card purple" data-animate>
                    <div class="stat-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Villes</div>
                        <div class="stat-value" data-target="{{ $demandes->unique('ville')->count() }}">0</div>
                    </div>
                </div>
            </div>

            @if ($demandes->isEmpty())
                <!-- Empty State -->
                <div class="empty-state" data-animate>
                    <div class="empty-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <h2>Aucune demande de devis</h2>
                    <p>Les demandes de devis apparaîtront ici dès qu'elles seront soumises</p>
                    <button class="btn-action primary" onclick="window.location.href='{{ route('dashboard') }}'">
                        <i class="fas fa-home"></i>
                        <span>Retour au Dashboard</span>
                    </button>
                </div>
            @else
                <!-- Filters & Search -->
                <div class="filters-section" data-animate>
                    <div class="search-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Rechercher par nom, email, cours, ville...">
                    </div>

                    <div class="filters-wrapper">
                        <select class="filter-select" id="filterCours">
                            <option value="">Tous les cours</option>
                            @foreach($demandes->unique('cours_id') as $demande)
                                <option value="{{ $demande->cours->titre }}">{{ $demande->cours->titre }}</option>
                            @endforeach
                        </select>

                        <select class="filter-select" id="filterVille">
                            <option value="">Toutes les villes</option>
                            @foreach($demandes->unique('ville')->sortBy('ville') as $demande)
                                <option value="{{ $demande->ville }}">{{ $demande->ville }}</option>
                            @endforeach
                        </select>

                        <select class="filter-select" id="filterDate">
                            <option value="">Toutes les dates</option>
                            <option value="today">Aujourd'hui</option>
                            <option value="week">Cette semaine</option>
                            <option value="month">Ce mois</option>
                            <option value="year">Cette année</option>
                        </select>

                        <button class="btn-reset" onclick="resetFilters()">
                            <i class="fas fa-redo"></i>
                            <span>Réinitialiser</span>
                        </button>
                    </div>
                </div>

                <!-- Table Card -->
                <div class="table-card" data-animate>
                    <div class="table-header">
                        <h3 class="table-title">Liste des Demandes</h3>
                        <div class="table-info">
                            <span class="results-count" id="resultsCount">{{ $demandes->count() }}</span> demande(s)
                        </div>
                    </div>

                    <div class="table-wrapper">
                        <table class="data-table" id="demandesTable">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">
                                        <div class="th-content">
                                            <span>ID</span>
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th onclick="sortTable(1)">
                                        <div class="th-content">
                                            <span>Cours</span>
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th onclick="sortTable(2)">
                                        <div class="th-content">
                                            <span>Client</span>
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th onclick="sortTable(3)">
                                        <div class="th-content">
                                            <span>Contact</span>
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th onclick="sortTable(4)">
                                        <div class="th-content">
                                            <span>Ville</span>
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th onclick="sortTable(5)">
                                        <div class="th-content">
                                            <span>Date</span>
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes as $demande)
                                <tr data-id="{{ $demande->id }}">
                                    <td>
                                        <span class="badge-id">#{{ $demande->id }}</span>
                                    </td>
                                    <td>
                                        <div class="cours-cell">
                                            <div class="cours-icon">
                                                <i class="fas fa-book"></i>
                                            </div>
                                            <span class="cours-title">{{ $demande->cours->titre }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="client-cell">
                                            <div class="client-avatar">
                                                {{ strtoupper(substr($demande->prenom, 0, 1) . substr($demande->nom, 0, 1)) }}
                                            </div>
                                            <div class="client-info">
                                                <div class="client-name">{{ $demande->prenom }} {{ $demande->nom }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contact-cell">
                                            <div class="contact-item">
                                                <i class="fas fa-phone"></i>
                                                <span>{{ $demande->numero }}</span>
                                            </div>
                                            <div class="contact-item">
                                                <i class="fas fa-envelope"></i>
                                                <span>{{ $demande->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="ville-badge">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $demande->ville }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="date-cell">
                                            <div class="date-main">
                                                <i class="fas fa-calendar"></i>
                                                {{ $demande->created_at->format('d/m/Y') }}
                                            </div>
                                            <div class="date-time">{{ $demande->created_at->format('H:i') }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-icon primary" title="Voir détails" onclick="viewDetails({{ $demande->id }})">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-icon success" title="Contacter" onclick="contactClient('{{ $demande->email }}', '{{ $demande->numero }}')">
                                                <i class="fas fa-phone"></i>
                                            </button>
                                            <button class="btn-icon orange" title="Envoyer devis" onclick="sendQuote({{ $demande->id }})">
                                                <i class="fas fa-file-invoice"></i>
                                            </button>
                                            <button class="btn-icon danger" title="Supprimer" onclick="deleteRequest({{ $demande->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-footer">
                        <div class="footer-info">
                            Affichage de <span id="showingStart">1</span> à <span id="showingEnd">{{ $demandes->count() }}</span> sur <span id="totalResults">{{ $demandes->count() }}</span> résultats
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Detail Modal -->
        <div class="modal-overlay" id="detailModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Détails de la Demande</h3>
                    <button class="modal-close" onclick="closeModal()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Content will be loaded dynamically -->
                </div>
                <div class="modal-footer">
                    <button class="btn-action secondary" onclick="closeModal()">Fermer</button>
                    <button class="btn-action primary" onclick="sendQuoteFromModal()">
                        <i class="fas fa-paper-plane"></i>
                        Envoyer un Devis
                    </button>
                </div>
            </div>
        </div>

        <!-- Contact Modal -->
        <div class="modal-overlay" id="contactModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Contacter le Client</h3>
                    <button class="modal-close" onclick="closeContactModal()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body" id="contactModalBody">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>// ========================================
// INITIALIZATION
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    initializeDemandesDevis();
});

function initializeDemandesDevis() {
    initAnimations();
    initSearch();
    initFilters();
    initSort();
    initCounters();
}

// ========================================
// ANIMATIONS
// ========================================

function initAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                
                // Animate stat counters
                const statValue = entry.target.querySelector('.stat-value');
                if (statValue && statValue.dataset.target) {
                    animateCounter(statValue, parseInt(statValue.dataset.target));
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('[data-animate]').forEach(el => {
        observer.observe(el);
    });
}

function animateCounter(element, target) {
    let current = 0;
    const increment = target / 40;
    const duration = 1000;
    const stepTime = duration / 40;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.ceil(current);
        }
    }, stepTime);
}

function initCounters() {
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        setTimeout(() => {
            const statValue = card.querySelector('.stat-value');
            if (statValue && statValue.dataset.target) {
                animateCounter(statValue, parseInt(statValue.dataset.target));
            }
        }, index * 100);
    });
}

// ========================================
// SEARCH FUNCTIONALITY
// ========================================

function initSearch() {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return;

    searchInput.addEventListener('input', function() {
        filterTable();
    });
}

// ========================================
// FILTERS
// ========================================

function initFilters() {
    const filterCours = document.getElementById('filterCours');
    const filterVille = document.getElementById('filterVille');
    const filterDate = document.getElementById('filterDate');

    if (filterCours) filterCours.addEventListener('change', filterTable);
    if (filterVille) filterVille.addEventListener('change', filterTable);
    if (filterDate) filterDate.addEventListener('change', filterTable);
}

function filterTable() {
    const searchInput = document.getElementById('searchInput');
    const filterCours = document.getElementById('filterCours');
    const filterVille = document.getElementById('filterVille');
    const filterDate = document.getElementById('filterDate');
    const table = document.getElementById('demandesTable');
    
    if (!table) return;

    const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
    const coursFilter = filterCours ? filterCours.value.toLowerCase() : '';
    const villeFilter = filterVille ? filterVille.value.toLowerCase() : '';
    const dateFilter = filterDate ? filterDate.value : '';

    const rows = table.querySelectorAll('tbody tr');
    let visibleCount = 0;

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const cours = row.querySelector('.cours-title')?.textContent.toLowerCase() || '';
        const ville = row.querySelector('.ville-badge')?.textContent.toLowerCase() || '';

        const matchesSearch = text.includes(searchTerm);
        const matchesCours = !coursFilter || cours.includes(coursFilter);
        const matchesVille = !villeFilter || ville.includes(villeFilter);
        const matchesDate = filterByDate(row, dateFilter);

        if (matchesSearch && matchesCours && matchesVille && matchesDate) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    updateResultsCount(visibleCount, rows.length);
}

function filterByDate(row, filter) {
    if (!filter) return true;

    const dateText = row.querySelector('.date-main')?.textContent.trim();
    if (!dateText) return false;

    const parts = dateText.match(/(\d{2})\/(\d{2})\/(\d{4})/);
    if (!parts) return false;

    const rowDate = new Date(parts[3], parts[2] - 1, parts[1]);
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    switch(filter) {
        case 'today':
            return rowDate.toDateString() === today.toDateString();
        case 'week':
            const weekAgo = new Date(today);
            weekAgo.setDate(weekAgo.getDate() - 7);
            return rowDate >= weekAgo;
        case 'month':
            return rowDate.getMonth() === today.getMonth() && 
                   rowDate.getFullYear() === today.getFullYear();
        case 'year':
            return rowDate.getFullYear() === today.getFullYear();
        default:
            return true;
    }
}

function updateResultsCount(visible, total) {
    const resultsCount = document.getElementById('resultsCount');
    const showingStart = document.getElementById('showingStart');
    const showingEnd = document.getElementById('showingEnd');
    const totalResults = document.getElementById('totalResults');

    if (resultsCount) resultsCount.textContent = visible;
    if (showingEnd) showingEnd.textContent = visible;
    if (totalResults) totalResults.textContent = total;
    if (showingStart) showingStart.textContent = visible > 0 ? '1' : '0';
}

function resetFilters() {
    const searchInput = document.getElementById('searchInput');
    const filterCours = document.getElementById('filterCours');
    const filterVille = document.getElementById('filterVille');
    const filterDate = document.getElementById('filterDate');

    if (searchInput) searchInput.value = '';
    if (filterCours) filterCours.value = '';
    if (filterVille) filterVille.value = '';
    if (filterDate) filterDate.value = '';

    filterTable();

    showToast('Filtres réinitialisés', 'info');
}

// ========================================
// TABLE SORTING
// ========================================

function initSort() {
    // Sorting state tracking
    window.sortDirection = {};
}

function sortTable(columnIndex) {
    const table = document.getElementById('demandesTable');
    if (!table) return;

    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr')).filter(row => row.style.display !== 'none');

    if (!window.sortDirection[columnIndex]) {
        window.sortDirection[columnIndex] = 'asc';
    }

    const direction = window.sortDirection[columnIndex] === 'asc' ? 'desc' : 'asc';
    window.sortDirection[columnIndex] = direction;

    rows.sort((a, b) => {
        let aValue = a.children[columnIndex].textContent.trim();
        let bValue = b.children[columnIndex].textContent.trim();

        // Remove special characters
        aValue = aValue.replace(/[#]/g, '');
        bValue = bValue.replace(/[#]/g, '');

        // Try to parse as numbers
        const aNum = parseFloat(aValue.replace(/[^0-9.-]/g, ''));
        const bNum = parseFloat(bValue.replace(/[^0-9.-]/g, ''));

        if (!isNaN(aNum) && !isNaN(bNum)) {
            return direction === 'asc' ? aNum - bNum : bNum - aNum;
        }

        return direction === 'asc' 
            ? aValue.localeCompare(bValue)
            : bValue.localeCompare(aValue);
    });

    // Clear tbody
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    // Append sorted rows
    rows.forEach(row => tbody.appendChild(row));

    // Update sort icons
    const headers = table.querySelectorAll('th');
    headers.forEach((header, index) => {
        const icon = header.querySelector('i');
        if (icon) {
            if (index === columnIndex) {
                icon.className = direction === 'asc' ? 'fas fa-sort-up' : 'fas fa-sort-down';
            } else {
                icon.className = 'fas fa-sort';
            }
        }
    });
}

// ========================================
// EXPORT TO CSV
// ========================================

function exportToCSV() {
    const table = document.getElementById('demandesTable');
    if (!table) return;

    let csv = [];
    const rows = table.querySelectorAll('tr');

    rows.forEach(row => {
        const cols = row.querySelectorAll('td, th');
        const rowData = [];
        
        cols.forEach((col, index) => {
            if (index < cols.length - 1) { // Skip actions column
                const text = col.textContent.trim().replace(/\s+/g, ' ');
                rowData.push('"' + text.replace(/"/g, '""') + '"');
            }
        });
        
        if (rowData.length > 0) {
            csv.push(rowData.join(','));
        }
    });

    const csvContent = csv.join('\n');
    const blob = new Blob(['\ufeff' + csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    
    link.setAttribute('href', url);
    link.setAttribute('download', 'demandes_devis_' + new Date().toISOString().split('T')[0] + '.csv');
    link.style.visibility = 'hidden';
    
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);

    showToast('Export CSV réussi', 'success');
}

// ========================================
// MODAL FUNCTIONS
// ========================================

function viewDetails(id) {
    const row = document.querySelector(`tr[data-id="${id}"]`);
    if (!row) return;

    const modal = document.getElementById('detailModal');
    const modalBody = document.getElementById('modalBody');

    const cours = row.querySelector('.cours-title').textContent;
    const nom = row.querySelector('.client-name').textContent.split(' ')[1] || '';
    const prenom = row.querySelector('.client-name').textContent.split(' ')[0] || '';
    const phone = row.querySelectorAll('.contact-item')[0]?.textContent.trim() || '';
    const email = row.querySelectorAll('.contact-item')[1]?.textContent.trim() || '';
    const ville = row.querySelector('.ville-badge').textContent.trim();
    const date = row.querySelector('.date-main').textContent.trim();
    const time = row.querySelector('.date-time').textContent.trim();

    modalBody.innerHTML = `
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="detail-item">
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.85rem; margin-bottom: 0.5rem; display: block; text-transform: uppercase;">
                    <i class="fas fa-hashtag" style="margin-right: 0.5rem;"></i>ID
                </label>
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary-blue);">#${id}</div>
            </div>

            <div class="detail-item">
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.85rem; margin-bottom: 0.5rem; display: block; text-transform: uppercase;">
                    <i class="fas fa-book" style="margin-right: 0.5rem;"></i>Cours
                </label>
                <div style="font-size: 1.1rem; font-weight: 600; color: var(--text-dark);">${cours}</div>
            </div>

            <div class="detail-item">
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.85rem; margin-bottom: 0.5rem; display: block; text-transform: uppercase;">
                    <i class="fas fa-user" style="margin-right: 0.5rem;"></i>Prénom
                </label>
                <div style="font-size: 1.1rem; font-weight: 600; color: var(--text-dark);">${prenom}</div>
            </div>

            <div class="detail-item">
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.85rem; margin-bottom: 0.5rem; display: block; text-transform: uppercase;">
                    <i class="fas fa-user" style="margin-right: 0.5rem;"></i>Nom
                </label>
                <div style="font-size: 1.1rem; font-weight: 600; color: var(--text-dark);">${nom}</div>
            </div>

            <div class="detail-item">
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.85rem; margin-bottom: 0.5rem; display: block; text-transform: uppercase;">
                    <i class="fas fa-phone" style="margin-right: 0.5rem;"></i>Téléphone
                </label>
                <div style="font-size: 1.1rem; color: var(--text-dark);">
                    <a href="tel:${phone}" style="color: var(--primary-blue); text-decoration: none;">${phone}</a>
                </div>
            </div>

            <div class="detail-item">
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.85rem; margin-bottom: 0.5rem; display: block; text-transform: uppercase;">
                    <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i>Email
                </label>
                <div style="font-size: 1.1rem; color: var(--text-dark); word-break: break-all;">
                    <a href="mailto:${email}" style="color: var(--primary-blue); text-decoration: none;">${email}</a>
                </div>
            </div>

            <div class="detail-item">
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.85rem; margin-bottom: 0.5rem; display: block; text-transform: uppercase;">
                    <i class="fas fa-map-marker-alt" style="margin-right: 0.5rem;"></i>Ville
                </label>
                <div style="font-size: 1.1rem; color: var(--text-dark);">${ville}</div>
            </div>

            <div class="detail-item">
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.85rem; margin-bottom: 0.5rem; display: block; text-transform: uppercase;">
                    <i class="fas fa-calendar" style="margin-right: 0.5rem;"></i>Date de demande
                </label>
                <div style="font-size: 1.1rem; color: var(--text-dark);">${date} à ${time}</div>
            </div>
        </div>
    `;

    modal.classList.add('active');
    modal.dataset.currentId = id;
}

function closeModal() {
    const modal = document.getElementById('detailModal');
    modal.classList.remove('active');
}

function sendQuoteFromModal() {
    const modal = document.getElementById('detailModal');
    const id = modal.dataset.currentId;
    if (id) {
        sendQuote(id);
        closeModal();
    }
}

function contactClient(email, phone) {
    const modal = document.getElementById('contactModal');
    const modalBody = document.getElementById('contactModalBody');

    modalBody.innerHTML = `
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div style="text-align: center; padding: 1rem;">
                <p style="margin-bottom: 1.5rem; color: var(--text-gray);">Choisissez un moyen de contact :</p>
                
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="tel:${phone}" class="btn-action primary" style="text-decoration: none;">
                        <i class="fas fa-phone"></i>
                        <span>Appeler</span>
                    </a>
                    
                    <a href="mailto:${email}" class="btn-action secondary" style="text-decoration: none;">
                        <i class="fas fa-envelope"></i>
                        <span>Envoyer un email</span>
                    </a>
                    
                    <a href="https://wa.me/${phone.replace(/[^0-9]/g, '')}" target="_blank" class="btn-action success" style="text-decoration: none; background: #25D366; color: white;">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: var(--bg-light); padding: 1.5rem; border-radius: 12px;">
                <h4 style="margin-bottom: 1rem; font-size: 1.1rem;">Informations de contact</h4>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <i class="fas fa-phone" style="color: var(--primary-blue); width: 20px;"></i>
                        <span>${phone}</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <i class="fas fa-envelope" style="color: var(--primary-blue); width: 20px;"></i>
                        <span style="word-break: break-all;">${email}</span>
                    </div>
                </div>
            </div>
        </div>
    `;

    modal.classList.add('active');
}

function closeContactModal() {
    const modal = document.getElementById('contactModal');
    modal.classList.remove('active');
}

function sendQuote(id) {
    showToast('Devis en cours d\'envoi...', 'info');
    
    // Simulate sending quote
    setTimeout(() => {
        showToast('Devis envoyé avec succès !', 'success');
    }, 1500);
}

function deleteRequest(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')) {
        const row = document.querySelector(`tr[data-id="${id}"]`);
        if (row) {
            row.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                row.remove();
                filterTable(); // Update counts
                showToast('Demande supprimée avec succès', 'success');
            }, 300);
        }
    }
}

// ========================================
// UTILITY FUNCTIONS
// ========================================

function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.style.cssText = `
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: var(--white);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        z-index: 10001;
        animation: slideInRight 0.3s ease;
        display: flex;
        align-items: center;
        gap: 1rem;
        max-width: 400px;
    `;

    const iconMap = {
        success: 'fa-check-circle',
        error: 'fa-exclamation-circle',
        warning: 'fa-exclamation-triangle',
        info: 'fa-info-circle'
    };

    const colorMap = {
        success: 'var(--success-green)',
        error: 'var(--danger-red)',
        warning: 'var(--primary-orange)',
        info: 'var(--primary-blue)'
    };

    toast.innerHTML = `
        <i class="fas ${iconMap[type]}" style="color: ${colorMap[type]}; font-size: 1.5rem;"></i>
        <span style="flex: 1;">${message}</span>
        <button onclick="this.parentElement.remove()" style="
            border: none;
            background: none;
            cursor: pointer;
            color: var(--text-gray);
            font-size: 1.2rem;
        ">
            <i class="fas fa-times"></i>
        </button>
    `;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

// ========================================
// ANIMATIONS CSS
// ========================================

const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100px);
        }
    }

    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(-100%);
        }
    }
`;

document.head.appendChild(style);

// ========================================
// CLOSE MODALS ON ESC & OUTSIDE CLICK
// ========================================

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeModal();
        closeContactModal();
    }
});

document.querySelectorAll('.modal-overlay').forEach(modal => {
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
});

// ========================================
// CONSOLE LOG
// ========================================

console.log('%c✨ Demandes de Devis - MonProfChezMoi ✨', 
    'color: #5B8CC6; font-size: 20px; font-weight: bold;'
);
console.log('%c📋 Page chargée avec succès!', 
    'color: #48BB78; font-size: 14px; font-weight: bold;'
);
</script>
</body>
</html>
