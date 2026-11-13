<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Utilisations des Bons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-utilisations.css') }}">
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
    --sidebar-width: 280px;
    --sidebar-collapsed: 80px;
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

/* Sidebar */
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    height: 100vh;
    width: var(--sidebar-width);
    background: var(--white);
    border-right: 1px solid var(--border-color);
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    z-index: 1000;
}

.sidebar-header {
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-blue);
}

.logo i {
    color: var(--primary-orange);
    font-size: 1.8rem;
}

.sidebar-toggle {
    display: none;
    width: 35px;
    height: 35px;
    border: none;
    background: var(--light-blue);
    color: var(--primary-blue);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.sidebar-toggle:hover {
    background: var(--primary-blue);
    color: var(--white);
}

.sidebar-menu {
    flex: 1;
    padding: 1rem;
    overflow-y: auto;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.9rem 1rem;
    border-radius: 10px;
    color: var(--text-gray);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    margin-bottom: 0.5rem;
}

.menu-item i {
    font-size: 1.2rem;
    width: 24px;
}

.menu-item:hover {
    background: var(--light-blue);
    color: var(--primary-blue);
}

.menu-item.active {
    background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
    color: var(--white);
}

.sidebar-footer {
    padding: 1rem;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.admin-profile {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.admin-avatar {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
    color: var(--white);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.2rem;
}

.admin-name {
    font-weight: 600;
    color: var(--text-dark);
    font-size: 0.95rem;
}

.admin-role {
    font-size: 0.8rem;
    color: var(--text-gray);
}

.logout-btn {
    width: 40px;
    height: 40px;
    background: var(--light-red);
    color: var(--danger-red);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.logout-btn:hover {
    background: var(--danger-red);
    color: var(--white);
}

/* Main Content */
.main-content {
    margin-left: var(--sidebar-width);
    min-height: 100vh;
    transition: all 0.3s ease;
}

/* Top Bar */
.top-bar {
    background: var(--white);
    border-bottom: 1px solid var(--border-color);
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 100;
}

.top-bar-left {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.menu-toggle {
    display: none;
    width: 40px;
    height: 40px;
    border: none;
    background: var(--light-blue);
    color: var(--primary-blue);
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.menu-toggle:hover {
    background: var(--primary-blue);
    color: var(--white);
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.9rem;
}

.breadcrumb-item {
    color: var(--text-gray);
}

.breadcrumb-item.active {
    color: var(--primary-blue);
    font-weight: 600;
}

.breadcrumb i {
    font-size: 0.7rem;
    color: var(--text-gray);
}

.top-bar-right {
    display: flex;
    gap: 0.75rem;
}

.top-bar-btn {
    width: 40px;
    height: 40px;
    border: none;
    background: var(--bg-light);
    color: var(--text-gray);
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.top-bar-btn:hover {
    background: var(--primary-blue);
    color: var(--white);
}

.top-bar-btn .badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: var(--danger-red);
    color: var(--white);
    width: 18px;
    height: 18px;
    border-radius: 50%;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

/* Page Header */
.page-header {
    padding: 2rem 2rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.page-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.page-subtitle {
    color: var(--text-gray);
    font-size: 1rem;
}

.page-actions {
    display: flex;
    gap: 1rem;
}

.btn-action {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-action.primary {
    background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
    color: var(--white);
}

.btn-action.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(91, 140, 198, 0.3);
}

.btn-action.secondary {
    background: var(--bg-light);
    color: var(--text-dark);
    border: 1px solid var(--border-color);
}

.btn-action.secondary:hover {
    background: var(--white);
    border-color: var(--primary-blue);
    color: var(--primary-blue);
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    padding: 0 2rem 2rem;
}

.stat-card {
    background: var(--white);
    border-radius: 16px;
    padding: 1.75rem;
    border: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    gap: 1.25rem;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
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

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.stat-icon {
    width: 65px;
    height: 65px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
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
    font-size: 0.85rem;
    color: var(--text-gray);
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.stat-value {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-dark);
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-trend {
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.stat-trend.up {
    color: var(--success-green);
}

.stat-trend i {
    font-size: 0.75rem;
}

/* Filters Section */
.filters-section {
    padding: 0 2rem 1.5rem;
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
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
    background: var(--white);
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

.btn-filter {
    padding: 0.9rem 1.5rem;
    background: var(--bg-light);
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-filter:hover {
    background: var(--white);
    border-color: var(--primary-blue);
    color: var(--primary-blue);
}

/* Table Card */
.table-card {
    margin: 0 2rem 2rem;
    background: var(--white);
    border-radius: 16px;
    border: 1px solid var(--border-color);
    overflow: hidden;
    opacity: 0;
    transform: translateY(20px);
}

.table-card.animate {
    animation: fadeInUp 0.6s ease 0.3s forwards;
}

.table-card-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
}

.table-info {
    color: var(--text-gray);
    font-size: 0.95rem;
}

.table-info span {
    color: var(--primary-blue);
    font-weight: 700;
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
}

.badge-id {
    background: var(--light-blue);
    color: var(--primary-blue);
    padding: 0.4rem 0.9rem;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.85rem;
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
    font-size: 1.1rem;
    flex-shrink: 0;
}

.client-name {
    font-weight: 600;
    color: var(--text-dark);
}

.code-badge {
    background: var(--light-orange);
    color: var(--primary-orange);
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-family: 'Courier New', monospace;
    font-size: 0.9rem;
}

.formation-tag {
    background: var(--light-green);
    color: var(--success-green);
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-weight: 600;
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

.btn-icon.danger {
    background: var(--light-red);
    color: var(--danger-red);
}

.btn-icon.danger:hover {
    background: var(--danger-red);
    color: var(--white);
    transform: translateY(-2px);
}

/* Pagination */
.table-pagination {
    padding: 1.5rem 2rem;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
}

.pagination-btn {
    width: 36px;
    height: 36px;
    border: 1px solid var(--border-color);
    background: var(--white);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.pagination-btn:hover:not(:disabled) {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

.pagination-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-pages {
    display: flex;
    gap: 0.5rem;
}

.page-btn {
    width: 36px;
    height: 36px;
    border: 1px solid var(--border-color);
    background: var(--white);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
}

.page-btn:hover {
    border-color: var(--primary-blue);
    color: var(--primary-blue);
}

.page-btn.active {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 5rem 2rem;
}

.empty-icon {
    width: 100px;
    height: 100px;
    background: var(--light-blue);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    color: var(--primary-blue);
    font-size: 3.5rem;
}

.empty-state h3 {
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: var(--text-gray);
    font-size: 1rem;
}

/* Modal */
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
    z-index: 2000;
    padding: 2rem;
}

.modal-overlay.active {
    display: flex;
}

.modal-content {
    background: var(--white);
    border-radius: 20px;
    max-width: 600px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
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
}

.modal-close {
    width: 36px;
    height: 36px;
    border: none;
    background: var(--bg-light);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.modal-close:hover {
    background: var(--danger-red);
    color: var(--white);
}

.modal-body {
    padding: 2rem;
}

/* Responsive */
@media (max-width: 1024px) {
    .sidebar {
        transform: translateX(-100%);
    }

    .sidebar.active {
        transform: translateX(0);
    }

    .sidebar-toggle {
        display: block;
    }

    .main-content {
        margin-left: 0;
    }

    .menu-toggle {
        display: block;
    }
}

@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .page-title {
        font-size: 1.5rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .filters-section {
        flex-direction: column;
    }

    .search-wrapper {
        width: 100%;
    }

    .filters-wrapper {
        width: 100%;
    }

    .filter-select {
        flex: 1;
        min-width: auto;
    }

    .top-bar {
        padding: 1rem;
    }

    .breadcrumb {
        display: none;
    }

    .data-table {
        min-width: 800px;
    }
}

@media (max-width: 576px) {
    .logo-text {
        display: none;
    }

    .admin-info {
        display: none;
    }

    .page-actions {
        width: 100%;
    }

    .btn-action {
        flex: 1;
        justify-content: center;
    }
}

</style>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i>
                <span class="logo-text">MonProfChezMoi</span>
            </div>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <a href="" class="menu-item">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="#" class="menu-item active">
                <i class="fas fa-chart-line"></i>
                <span>Utilisations</span>
            </a>
            
        </div>

        <div class="sidebar-footer">
            <div class="admin-profile">
                <div class="admin-avatar">A</div>
                <div class="admin-info">
                    <div class="admin-name">Administrateur</div>
                    <div class="admin-role">Admin</div>
                </div>
            </div>
            <a href="#" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="top-bar-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="breadcrumb">
                    <span class="breadcrumb-item">Dashboard</span>
                    <i class="fas fa-chevron-right"></i>
                    <span class="breadcrumb-item active">Utilisations des Bons</span>
                </div>
            </div>

            <div class="top-bar-right">
                <button class="top-bar-btn" id="notificationBtn">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </button>
                <button class="top-bar-btn">
                    <i class="fas fa-envelope"></i>
                </button>
            </div>
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-title-wrapper">
                <h1 class="page-title">Utilisations de Bons de Formation</h1>
                <p class="page-subtitle">Suivez et gérez toutes les utilisations de bons en temps réel</p>
            </div>
            <div class="page-actions">
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
        <div class="stats-grid">
            <div class="stat-card blue" data-animate>
                <div class="stat-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-label">Total Utilisations</div>
                    <div class="stat-value" data-target="{{ count($utilisations) }}">0</div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i>
                        <span>+12% ce mois</span>
                    </div>
                </div>
            </div>

            <div class="stat-card orange" data-animate>
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-label">Clients Uniques</div>
                    <div class="stat-value" data-target="{{ $utilisations->unique('nom_client')->count() }}">0</div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i>
                        <span>+8% ce mois</span>
                    </div>
                </div>
            </div>

            <div class="stat-card green" data-animate>
                <div class="stat-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-label">Formations Distinctes</div>
                    <div class="stat-value" data-target="{{ $utilisations->unique('formation')->count() }}">0</div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i>
                        <span>+5 nouvelles</span>
                    </div>
                </div>
            </div>

            <div class="stat-card purple" data-animate>
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-label">Ce Mois-ci</div>
                    <div class="stat-value" data-target="{{ $utilisations->where('created_at', '>=', now()->startOfMonth())->count() }}">0</div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i>
                        <span>En progression</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters & Search -->
        <div class="filters-section">
            <div class="search-wrapper">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Rechercher par nom, code, formation...">
            </div>

            <div class="filters-wrapper">
                <select class="filter-select" id="filterFormation">
                    <option value="">Toutes les formations</option>
                    @foreach($utilisations->unique('formation') as $utilisation)
                        <option value="{{ $utilisation->formation }}">{{ $utilisation->formation }}</option>
                    @endforeach
                </select>

                <select class="filter-select" id="filterDate">
                    <option value="">Toutes les dates</option>
                    <option value="today">Aujourd'hui</option>
                    <option value="week">Cette semaine</option>
                    <option value="month">Ce mois</option>
                    <option value="year">Cette année</option>
                </select>

                <button class="btn-filter" onclick="resetFilters()">
                    <i class="fas fa-redo"></i>
                    Réinitialiser
                </button>
            </div>
        </div>

        <!-- Table Card -->
        <div class="table-card" data-animate>
            <div class="table-card-header">
                <h3 class="table-card-title">Liste des Utilisations</h3>
                <div class="table-info">
                    <span id="showingCount">{{ count($utilisations) }}</span> résultat(s)
                </div>
            </div>

            @if(count($utilisations) > 0)
            <div class="table-wrapper">
                <table class="data-table" id="utilisationsTable">
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
                                    <span>Client</span>
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th onclick="sortTable(2)">
                                <div class="th-content">
                                    <span>Code Unique</span>
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th onclick="sortTable(3)">
                                <div class="th-content">
                                    <span>Formation</span>
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th onclick="sortTable(4)">
                                <div class="th-content">
                                    <span>Date d'Utilisation</span>
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($utilisations as $utilisation)
                        <tr data-id="{{ $utilisation->id }}">
                            <td>
                                <span class="badge-id">#{{ $utilisation->id }}</span>
                            </td>
                            <td>
                                <div class="client-cell">
                                    <div class="client-avatar">
                                        {{ strtoupper(substr($utilisation->nom_client, 0, 1)) }}
                                    </div>
                                    <div class="client-details">
                                        <div class="client-name">{{ $utilisation->nom_client }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="code-badge">
                                    <i class="fas fa-barcode"></i>
                                    {{ $utilisation->bon->code_unique }}
                                </span>
                            </td>
                            <td>
                                <span class="formation-tag">{{ $utilisation->formation }}</span>
                            </td>
                            <td>
                                <div class="date-cell">
                                    <div class="date-main">
                                        <i class="fas fa-calendar"></i>
                                        {{ $utilisation->created_at->format('d/m/Y') }}
                                    </div>
                                    <div class="date-time">{{ $utilisation->created_at->format('H:i') }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon primary" title="Voir détails" onclick="viewDetails({{ $utilisation->id }})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon success" title="Télécharger" onclick="downloadCertificate({{ $utilisation->id }})">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn-icon danger" title="Supprimer" onclick="deleteUtilisation({{ $utilisation->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-pagination">
                <button class="pagination-btn" disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="pagination-pages">
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                </div>
                <button class="pagination-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-inbox"></i>
                </div>
                <h3>Aucune utilisation enregistrée</h3>
                <p>Les utilisations de bons apparaîtront ici</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal-overlay" id="detailModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Détails de l'Utilisation</h3>
                <button class="modal-close" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebarToggle');

if (menuToggle) {
    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
}

if (sidebarToggle) {
    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.remove('active');
    });
}

// Close sidebar when clicking outside on mobile
document.addEventListener('click', (e) => {
    if (window.innerWidth <= 1024) {
        if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
            sidebar.classList.remove('active');
        }
    }
});

// Animate stats on scroll
const observerOptions = {
    threshold: 0.3
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate');
            
            // Animate counter
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

// Counter animation
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.ceil(current);
        }
    }, 30);
}

// Search functionality
const searchInput = document.getElementById('searchInput');
const table = document.getElementById('utilisationsTable');
const showingCount = document.getElementById('showingCount');

if (searchInput && table) {
    searchInput.addEventListener('input', function() {
        filterTable();
    });
}

// Filter functionality
const filterFormation = document.getElementById('filterFormation');
const filterDate = document.getElementById('filterDate');

if (filterFormation) {
    filterFormation.addEventListener('change', filterTable);
}

if (filterDate) {
    filterDate.addEventListener('change', filterTable);
}

function filterTable() {
    const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
    const formationFilter = filterFormation ? filterFormation.value.toLowerCase() : '';
    const dateFilter = filterDate ? filterDate.value : '';
    
    const rows = table.querySelectorAll('tbody tr');
    let visibleCount = 0;

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const formation = row.querySelector('.formation-tag')?.textContent.toLowerCase() || '';
        
        const matchesSearch = text.includes(searchTerm);
        const matchesFormation = !formationFilter || formation.includes(formationFilter);
        const matchesDate = filterByDate(row, dateFilter);

        if (matchesSearch && matchesFormation && matchesDate) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    if (showingCount) {
        showingCount.textContent = visibleCount;
    }
}

function filterByDate(row, filter) {
    if (!filter) return true;

    const dateText = row.querySelector('.date-main')?.textContent.trim();
    if (!dateText) return false;

    // Parse date (format: dd/mm/yyyy)
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

function resetFilters() {
    if (searchInput) searchInput.value = '';
    if (filterFormation) filterFormation.value = '';
    if (filterDate) filterDate.value = '';
    filterTable();
}

// Table sorting
let sortDirection = {};

function sortTable(columnIndex) {
    if (!table) return;

    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr:not([style*="display: none"])'));

    if (!sortDirection[columnIndex]) {
        sortDirection[columnIndex] = 'asc';
    }

    const direction = sortDirection[columnIndex] === 'asc' ? 'desc' : 'asc';
    sortDirection[columnIndex] = direction;

    rows.sort((a, b) => {
        let aValue = a.children[columnIndex].textContent.trim();
        let bValue = b.children[columnIndex].textContent.trim();

        // Remove special characters for comparison
        aValue = aValue.replace(/[#]/g, '');
        bValue = bValue.replace(/[#]/g, '');

        const aNum = parseFloat(aValue.replace(/[^0-9.-]/g, ''));
        const bNum = parseFloat(bValue.replace(/[^0-9.-]/g, ''));

        if (!isNaN(aNum) && !isNaN(bNum)) {
            return direction === 'asc' ? aNum - bNum : bNum - aNum;
        }

        return direction === 'asc' 
            ? aValue.localeCompare(bValue)
            : bValue.localeCompare(aValue);
    });

    // Get all rows including hidden ones
    const allRows = Array.from(tbody.querySelectorAll('tr'));
    
    // Clear tbody
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    // Append sorted visible rows first, then hidden rows
    rows.forEach(row => tbody.appendChild(row));
    allRows.forEach(row => {
        if (row.style.display === 'none' && !rows.includes(row)) {
            tbody.appendChild(row);
        }
    });

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

// Export to CSV
function exportToCSV() {
    if (!table) return;

    let csv = [];
    const rows = table.querySelectorAll('tr');

    rows.forEach(row => {
        const cols = row.querySelectorAll('td, th');
        const rowData = [];
        
        cols.forEach((col, index) => {
            if (index < cols.length - 1) {
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
    link.setAttribute('download', 'utilisations_bons_' + new Date().toISOString().split('T')[0] + '.csv');
    link.style.visibility = 'hidden';
    
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Modal functions
const detailModal = document.getElementById('detailModal');
const modalBody = document.getElementById('modalBody');

function viewDetails(id) {
    const row = document.querySelector(`tr[data-id="${id}"]`);
    if (!row) return;

    const client = row.querySelector('.client-name').textContent;
    const code = row.querySelector('.code-badge').textContent.trim();
    const formation = row.querySelector('.formation-tag').textContent;
    const date = row.querySelector('.date-main').textContent.trim();
    const time = row.querySelector('.date-time').textContent;

    modalBody.innerHTML = `
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div>
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.9rem; margin-bottom: 0.5rem; display: block;">Client</label>
                <div style="font-size: 1.1rem; font-weight: 600; color: var(--text-dark);">${client}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.9rem; margin-bottom: 0.5rem; display: block;">Code du Bon</label>
                <div style="font-family: 'Courier New', monospace; font-size: 1.1rem; color: var(--primary-orange); font-weight: 700;">${code}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.9rem; margin-bottom: 0.5rem; display: block;">Formation</label>
                <div style="font-size: 1.1rem; font-weight: 600; color: var(--text-dark);">${formation}</div>
            </div>
            <div>
                <label style="font-weight: 600; color: var(--text-gray); font-size: 0.9rem; margin-bottom: 0.5rem; display: block;">Date d'Utilisation</label>
                <div style="font-size: 1.1rem; color: var(--text-dark);">${date} à ${time}</div>
            </div>
        </div>
    `;

    detailModal.classList.add('active');
}

function closeModal() {
    detailModal.classList.remove('active');
}

function downloadCertificate(id) {
    alert(`Téléchargement du certificat pour l'utilisation #${id}`);
    // Implement download logic here
}

function deleteUtilisation(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette utilisation ?')) {
        alert(`Suppression de l'utilisation #${id}`);
        // Implement delete logic here
    }
}

// Close modal on overlay click
if (detailModal) {
    detailModal.addEventListener('click', (e) => {
        if (e.target === detailModal) {
            closeModal();
        }
    });
}

// Keyboard shortcuts
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeModal();
        sidebar.classList.remove('active');
    }
    if (e.ctrlKey && e.key === 'k') {
        e.preventDefault();
        if (searchInput) searchInput.focus();
    }
});

console.log('%c✨ Dashboard Admin - MonProfChezMoi ✨', 'color: #5B8CC6; font-size: 20px; font-weight: bold;');
console.log('%cPage chargée avec succès', 'color: #48BB78; font-size: 14px;');

    </script>
</body>
</html>
