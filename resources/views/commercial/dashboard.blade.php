<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Commercial - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
        --yellow: #F6C60C;
        --light-yellow: #FFF9E6;
        --teal: #38B2AC;
        --light-teal: #E6F7F7;
        --red: #E53E3E;
        --light-red: #FFF5F5;
        --pink: #ED64A6;
        --light-pink: #FFF0F7;
        --indigo: #667EEA;
        --light-indigo: #F0F2FF;
        --text-dark: #2D3748;
        --text-gray: #718096;
        --bg-light: #F7FAFC;
        --white: #FFFFFF;
        --border-color: #E2E8F0;
        --sidebar-width: 280px;
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
        overflow-x: hidden;
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
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
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

    .badge-commercial {
        display: inline-block;
        background: var(--light-orange);
        color: var(--primary-orange);
        font-size: 0.7rem;
        font-weight: 700;
        padding: 0.2rem 0.6rem;
        border-radius: 12px;
        text-transform: uppercase;
        margin-top: 0.25rem;
    }

    .sidebar-close {
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

    .sidebar-close:hover {
        background: var(--primary-blue);
        color: var(--white);
    }

    .sidebar-menu {
        flex: 1;
        padding: 1rem 0;
        overflow-y: auto;
    }

    .menu-section {
        margin-bottom: 1.75rem;
    }

    .menu-section-title {
        padding: 0.75rem 1.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--text-gray);
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.85rem 1.5rem;
        color: var(--text-gray);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
    }

    .menu-item i {
        font-size: 1.15rem;
        width: 24px;
        transition: all 0.3s ease;
    }

    .menu-item:hover {
        background: var(--light-blue);
        color: var(--primary-blue);
    }

    .menu-item.active {
        background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
        color: var(--white);
    }

    .menu-item.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--white);
    }

    .menu-badge {
        margin-left: auto;
        padding: 0.25rem 0.6rem;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .menu-item:hover .menu-badge,
    .menu-item.active .menu-badge {
        background: rgba(255, 255, 255, 0.3);
    }

    .sidebar-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .admin-profile {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .admin-avatar {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, var(--primary-orange), var(--primary-blue));
        color: var(--white);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .admin-name {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 0.9rem;
        max-width: 130px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .admin-role {
        font-size: 0.78rem;
        color: var(--primary-orange);
        font-weight: 600;
    }

    .btn-logout-sidebar {
        background: none;
        border: none;
        color: var(--text-gray);
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-logout-sidebar:hover {
        background: var(--light-red);
        color: var(--red);
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
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .top-bar-left {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex: 1;
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
        transform: scale(1.05);
    }

    .search-bar {
        flex: 1;
        max-width: 450px;
        position: relative;
    }

    .search-bar i {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-gray);
        font-size: 1rem;
    }

    .search-bar input {
        width: 100%;
        padding: 0.8rem 1.25rem 0.8rem 3.25rem;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: var(--bg-light);
    }

    .search-bar input:focus {
        outline: none;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(91, 140, 198, 0.1);
        background: var(--white);
    }

    .top-bar-right {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }

    .btn-topbar-action {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1rem;
        border-radius: 10px;
        border: 1px solid var(--border-color);
        background: var(--bg-light);
        color: var(--text-dark);
        font-weight: 600;
        font-size: 0.88rem;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-topbar-action:hover {
        background: var(--light-red);
        color: var(--red);
        border-color: #FED7D7;
    }

    /* Welcome Section */
    .welcome-section {
        padding: 2rem 2rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .welcome-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 0.3rem;
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

    .welcome-subtitle {
        color: var(--text-gray);
        font-size: 1.05rem;
    }

    .welcome-date {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
        color: var(--white);
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        animation: fadeInRight 0.6s ease;
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1.5rem;
        padding: 0 2rem 2rem;
    }

    .stat-card {
        background: var(--white);
        border-radius: 16px;
        padding: 1.75rem;
        border: 1px solid var(--border-color);
        display: flex;
        flex-direction: column;
        gap: 1rem;
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

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
    }

    .stat-card > div:first-child {
        display: flex;
        align-items: center;
        gap: 1.25rem;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--white);
        flex-shrink: 0;
    }

    .stat-card.yellow .stat-icon { background: linear-gradient(135deg, var(--yellow), #E5B000); }
    .stat-card.teal .stat-icon { background: linear-gradient(135deg, var(--teal), #2C9A92); }
    .stat-card.red .stat-icon { background: linear-gradient(135deg, var(--red), #C53030); }
    .stat-card.indigo .stat-icon { background: linear-gradient(135deg, var(--indigo), #5A67D8); }

    .stat-label {
        font-size: 0.88rem;
        color: var(--text-gray);
        margin-bottom: 0.4rem;
        font-weight: 500;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--text-dark);
        line-height: 1;
        margin-bottom: 0.4rem;
    }

    .stat-progress {
        height: 6px;
        background: var(--bg-light);
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        border-radius: 10px;
        transition: width 1s ease;
    }

    .progress-bar.yellow { background: var(--yellow); }
    .progress-bar.teal { background: var(--teal); }
    .progress-bar.red { background: var(--red); }
    .progress-bar.indigo { background: var(--indigo); }

    /* Content Section */
    .content-section {
        padding: 0 2rem 2.5rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .section-title {
        font-size: 1.45rem;
        font-weight: 800;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .section-title-badge {
        font-size: 0.78rem;
        background: var(--light-blue);
        color: var(--primary-blue);
        padding: 0.25rem 0.7rem;
        border-radius: 20px;
        font-weight: 700;
    }

    .section-actions {
        display: flex;
        gap: 0.6rem;
    }

    .btn-filter {
        padding: 0.55rem 1.15rem;
        border: 2px solid var(--border-color);
        background: var(--white);
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        font-size: 0.88rem;
        color: var(--text-gray);
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        border-color: var(--primary-blue);
        color: var(--primary-blue);
    }

    .btn-filter.active {
        background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
        color: var(--white);
        border-color: transparent;
    }

    /* Quick Actions Grid - 8 buttons */
    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .action-card {
        background: var(--white);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 1.6rem 1.4rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        text-decoration: none;
        transition: all 0.4s ease;
        opacity: 0;
        transform: translateY(30px);
        position: relative;
        overflow: hidden;
    }

    .action-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .action-card:hover::before {
        opacity: 1;
    }

    .action-card.yellow::before { background: var(--yellow); }
    .action-card.teal::before { background: var(--teal); }
    .action-card.red::before { background: var(--red); }
    .action-card.pink::before { background: var(--pink); }
    .action-card.indigo::before { background: var(--indigo); }
    .action-card.orange::before { background: var(--primary-orange); }
    .action-card.green::before { background: var(--success-green); }
    .action-card.purple::before { background: var(--purple); }

    .action-card.animate {
        animation: fadeInUp 0.6s ease forwards;
    }

    .action-card:nth-child(1).animate { animation-delay: 0.05s; }
    .action-card:nth-child(2).animate { animation-delay: 0.1s; }
    .action-card:nth-child(3).animate { animation-delay: 0.15s; }
    .action-card:nth-child(4).animate { animation-delay: 0.2s; }
    .action-card:nth-child(5).animate { animation-delay: 0.25s; }
    .action-card:nth-child(6).animate { animation-delay: 0.3s; }
    .action-card:nth-child(7).animate { animation-delay: 0.35s; }
    .action-card:nth-child(8).animate { animation-delay: 0.4s; }

    .action-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
        border-color: rgba(91, 140, 198, 0.2);
    }

    .action-icon {
        width: 58px;
        height: 58px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        color: var(--white);
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .action-card:hover .action-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .action-icon.yellow { background: linear-gradient(135deg, var(--yellow), #E5B000); }
    .action-icon.teal { background: linear-gradient(135deg, var(--teal), #2C9A92); }
    .action-icon.red { background: linear-gradient(135deg, var(--red), #C53030); }
    .action-icon.pink { background: linear-gradient(135deg, var(--pink), #D53F8C); }
    .action-icon.indigo { background: linear-gradient(135deg, var(--indigo), #5A67D8); }
    .action-icon.orange { background: linear-gradient(135deg, var(--primary-orange), #E76F51); }
    .action-icon.green { background: linear-gradient(135deg, var(--success-green), #38A169); }
    .action-icon.purple { background: linear-gradient(135deg, var(--purple), #805AD5); }

    .action-content {
        flex: 1;
    }

    .action-content h3 {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.25rem;
    }

    .action-content p {
        font-size: 0.85rem;
        color: var(--text-gray);
        margin: 0;
    }

    .action-arrow {
        color: var(--text-gray);
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .action-card:hover .action-arrow {
        transform: translateX(5px);
        color: var(--primary-blue);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar-close {
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
        .top-bar {
            padding: 1rem;
        }

        .welcome-section {
            flex-direction: column;
            align-items: flex-start;
        }

        .welcome-title {
            font-size: 1.5rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div>
                <div class="logo">
                    <i class="fas fa-briefcase"></i>
                    <span>MonProfChezMoi</span>
                </div>
                <span class="badge-commercial">Espace Commercial</span>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-section-title">ACCUEIL</div>
                <a href="{{ route('commercial.dashboard') }}" class="menu-item active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">COMMANDES & BONS</div>
                <a href="{{ route('admin.demandes.index') }}" class="menu-item">
                    <i class="fas fa-envelope"></i>
                    <span>Commandes Formations</span>
                    <span class="menu-badge">{{ $stats['commandes_formations'] }}</span>
                </a>
                <a href="{{ route('commandes.index') }}" class="menu-item">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Commandes Bons</span>
                    <span class="menu-badge">{{ $stats['commandes_bons'] }}</span>
                </a>
                <a href="{{ route('admin.utilisation.index') }}" class="menu-item">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Bons Actifs</span>
                    <span class="menu-badge">{{ $stats['bons_actifs'] }}</span>
                </a>
                <a href="{{ route('admin.utilisation.create') }}" class="menu-item">
                    <i class="fas fa-qrcode"></i>
                    <span>Utiliser Bon</span>
                </a>
                <a href="{{ route('admin.demandes.voir') }}" class="menu-item">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Demandes Cours</span>
                    <span class="menu-badge">{{ $stats['demandes_cours'] }}</span>
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">FORMATEURS</div>
                <a href="{{ route('formateurs.index') }}" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>Liste de Formateur</span>
                    <span class="menu-badge">{{ $stats['formateurs'] }}</span>
                </a>
                <a href="{{ route('formateurs.create') }}" class="menu-item">
                    <i class="fas fa-user-plus"></i>
                    <span>Nouveau Formateur</span>
                </a>
                <a href="{{ route('formateurs.index') }}" class="menu-item">
                    <i class="fas fa-id-card"></i>
                    <span>Fiche Formateur</span>
                </a>
            </div>
        </div>

        <div class="sidebar-footer">
            <div class="admin-profile">
                <div class="admin-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                </div>
                <div class="admin-info">
                    <div class="admin-name">{{ auth()->user()->name ?? 'Commercial' }}</div>
                    <div class="admin-role">Commercial</div>
                </div>
            </div>
            <form method="POST" action="{{ route('commercial.logout') }}">
                @csrf
                <button type="submit" class="btn-logout-sidebar" title="Déconnexion">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
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
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Filtrer les actions commerciales..." id="actionSearch">
                </div>
            </div>

            <div class="top-bar-right">
                <form method="POST" action="{{ route('commercial.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-topbar-action">
                        <i class="fas fa-sign-out-alt text-danger"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="welcome-content">
                <h1 class="welcome-title">Bienvenue, {{ auth()->user()->name ?? 'Commercial' }} 👋</h1>
                <p class="welcome-subtitle">Espace Commercial - Pilotez vos commandes, bons et formateurs</p>
            </div>
            <div class="welcome-date">
                <i class="fas fa-calendar"></i>
                <span id="currentDate"></span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card yellow" data-animate>
                <div>
                    <div class="stat-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Commandes Formations</div>
                        <div class="stat-value" data-target="{{ $stats['commandes_formations'] }}">0</div>
                    </div>
                </div>
                <div class="stat-progress">
                    <div class="progress-bar yellow" style="width: 70%"></div>
                </div>
            </div>

            <div class="stat-card teal" data-animate>
                <div>
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Commandes Bons</div>
                        <div class="stat-value" data-target="{{ $stats['commandes_bons'] }}">0</div>
                    </div>
                </div>
                <div class="stat-progress">
                    <div class="progress-bar teal" style="width: 65%"></div>
                </div>
            </div>

            <div class="stat-card red" data-animate>
                <div>
                    <div class="stat-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Bons Actifs</div>
                        <div class="stat-value" data-target="{{ $stats['bons_actifs'] }}">0</div>
                    </div>
                </div>
                <div class="stat-progress">
                    <div class="progress-bar red" style="width: 80%"></div>
                </div>
            </div>

            <div class="stat-card indigo" data-animate>
                <div>
                    <div class="stat-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Demandes Cours</div>
                        <div class="stat-value" data-target="{{ $stats['demandes_cours'] }}">0</div>
                    </div>
                </div>
                <div class="stat-progress">
                    <div class="progress-bar indigo" style="width: 60%"></div>
                </div>
            </div>
        </div>

        <!-- Content Section : 8 Buttons Only -->
        <div class="content-section">
            <div class="section-header">
                <div class="section-title">
                    <span>Actions Commerciales</span>
                    <span class="section-title-badge">8 Boutons</span>
                </div>
                <div class="section-actions">
                    <button class="btn-filter active" data-filter="all">
                        <i class="fas fa-th"></i>
                        <span>Toutes (8)</span>
                    </button>
                    <button class="btn-filter" data-filter="commandes">
                        <i class="fas fa-shopping-basket"></i>
                        <span>Commandes & Bons</span>
                    </button>
                    <button class="btn-filter" data-filter="formateurs">
                        <i class="fas fa-user-graduate"></i>
                        <span>Formateurs</span>
                    </button>
                </div>
            </div>

            <div class="quick-actions-grid" id="quickActionsGrid">
                <!-- 1. Commandes formations -->
                <a href="{{ route('admin.demandes.index') }}" class="action-card yellow commandes" data-animate>
                    <div class="action-icon yellow">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="action-content">
                        <h3>Commandes formations</h3>
                        <p>Gérer les demandes de formations clients</p>
                    </div>
                    <div class="action-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- 2. Commande bon -->
                <a href="{{ route('commandes.index') }}" class="action-card teal commandes" data-animate>
                    <div class="action-icon teal">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="action-content">
                        <h3>Commande bon</h3>
                        <p>Consulter et valider les commandes de bons</p>
                    </div>
                    <div class="action-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- 3. Bon actif -->
                <a href="{{ route('admin.utilisation.index') }}" class="action-card red commandes" data-animate>
                    <div class="action-icon red">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="action-content">
                        <h3>Bon actif</h3>
                        <p>Consulter la liste des bons en cours d'utilisation</p>
                    </div>
                    <div class="action-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- 4. Utiliser bon -->
                <a href="{{ route('admin.utilisation.create') }}" class="action-card pink commandes" data-animate>
                    <div class="action-icon pink">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div class="action-content">
                        <h3>Utiliser bon</h3>
                        <p>Enregistrer l'utilisation d'un bon cadeau</p>
                    </div>
                    <div class="action-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- 5. Demande cours -->
                <a href="{{ route('admin.demandes.voir') }}" class="action-card indigo commandes" data-animate>
                    <div class="action-icon indigo">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="action-content">
                        <h3>Demande cours</h3>
                        <p>Consulter les demandes de devis et inscriptions cours</p>
                    </div>
                    <div class="action-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- 6. Liste de formateur -->
                <a href="{{ route('formateurs.index') }}" class="action-card orange formateurs" data-animate>
                    <div class="action-icon orange">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="action-content">
                        <h3>Liste de formateur</h3>
                        <p>Voir et gérer la liste complète des formateurs</p>
                    </div>
                    <div class="action-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- 7. Nouveau formateur -->
                <a href="{{ route('formateurs.create') }}" class="action-card green formateurs" data-animate>
                    <div class="action-icon green">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="action-content">
                        <h3>Nouveau formateur</h3>
                        <p>Ajouter et configurer un profil de formateur</p>
                    </div>
                    <div class="action-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>

                <!-- 8. Fiche formateur -->
                <a href="{{ route('formateurs.index') }}" class="action-card purple formateurs" data-animate>
                    <div class="action-icon purple">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="action-content">
                        <h3>Fiche formateur</h3>
                        <p>Consulter les fiches et biographies détaillées</p>
                    </div>
                    <div class="action-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initSidebar();
            initFilters();
            initSearch();
            initAnimations();
            initCounters();
            updateDateTime();
        });

        // Sidebar Management
        function initSidebar() {
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarClose = document.getElementById('sidebarClose');

            if (menuToggle && sidebar) {
                menuToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                });
            }

            if (sidebarClose && sidebar) {
                sidebarClose.addEventListener('click', () => {
                    sidebar.classList.remove('active');
                });
            }

            document.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024 && sidebar && menuToggle) {
                    if (!sidebar.contains(e.target) && !menuToggle.contains(e.target) && sidebar.classList.contains('active')) {
                        sidebar.classList.remove('active');
                    }
                }
            });
        }

        // Action Filters
        function initFilters() {
            const filterButtons = document.querySelectorAll('.btn-filter');
            const actionCards = document.querySelectorAll('.action-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.dataset.filter;

                    actionCards.forEach(card => {
                        if (filter === 'all' || card.classList.contains(filter)) {
                            card.style.display = 'flex';
                            card.classList.remove('animate');
                            setTimeout(() => card.classList.add('animate'), 10);
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        }

        // Live Action Search
        function initSearch() {
            const searchInput = document.getElementById('actionSearch');
            const actionCards = document.querySelectorAll('.action-card');

            if (!searchInput) return;

            searchInput.addEventListener('input', function(e) {
                const query = e.target.value.toLowerCase().trim();

                actionCards.forEach(card => {
                    const text = card.innerText.toLowerCase();
                    if (text.includes(query)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }

        // Animations
        function initAnimations() {
            const cards = document.querySelectorAll('[data-animate]');
            cards.forEach(card => {
                card.classList.add('animate');
            });
        }

        // Counters
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

        function animateCounter(element, target) {
            let current = 0;
            const increment = Math.max(1, Math.ceil(target / 40));
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString('fr-FR');
                    clearInterval(timer);
                } else {
                    element.textContent = current.toLocaleString('fr-FR');
                }
            }, 30);
        }

        // Date Display
        function updateDateTime() {
            const dateElement = document.getElementById('currentDate');
            if (!dateElement) return;

            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            dateElement.textContent = now.toLocaleDateString('fr-FR', options);
        }
    </script>
</body>
</html>
