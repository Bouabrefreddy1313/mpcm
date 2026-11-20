<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
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
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--primary-blue);
}

.logo i {
    color: var(--primary-orange);
    font-size: 2rem;
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
    margin-bottom: 2rem;
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
    padding: 0.9rem 1.5rem;
    color: var(--text-gray);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    position: relative;
}

.menu-item i {
    font-size: 1.2rem;
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
    max-width: 500px;
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
    padding: 0.9rem 1.25rem 0.9rem 3.25rem;
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

.search-results {
    position: absolute;
    top: calc(100% + 0.5rem);
    left: 0;
    right: 0;
    background: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    max-height: 400px;
    overflow-y: auto;
    display: none;
    z-index: 1000;
}

.search-results.active {
    display: block;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.top-bar-right {
    display: flex;
    gap: 0.75rem;
    align-items: center;
}

.top-bar-item {
    position: relative;
}

.notification-btn,
.top-bar-item > button {
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

.notification-btn:hover,
.top-bar-item > button:hover {
    background: var(--primary-blue);
    color: var(--white);
    transform: translateY(-2px);
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: var(--red);
    color: var(--white);
    width: 20px;
    height: 20px;
    border-radius: 50%;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.notification-dropdown {
    position: absolute;
    top: calc(100% + 1rem);
    right: 0;
    width: 350px;
    background: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    display: none;
    z-index: 1000;
}

.notification-dropdown.active {
    display: block;
    animation: slideDown 0.3s ease;
}

.notification-header {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notification-header h4 {
    font-size: 1rem;
    font-weight: 700;
    margin: 0;
}

.mark-read {
    background: none;
    border: none;
    color: var(--primary-blue);
    font-size: 0.85rem;
    cursor: pointer;
    font-weight: 600;
}

.notification-list {
    max-height: 400px;
    overflow-y: auto;
}

.notification-item {
    padding: 1rem 1.25rem;
    display: flex;
    gap: 1rem;
    border-bottom: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.notification-item:hover {
    background: var(--bg-light);
}

.notification-item.unread {
    background: var(--light-blue);
}

.notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: var(--white);
}

.notification-icon.blue { background: var(--primary-blue); }
.notification-icon.orange { background: var(--primary-orange); }
.notification-icon.green { background: var(--success-green); }

.notification-content p {
    margin: 0;
    font-size: 0.9rem;
    color: var(--text-dark);
}

.notification-time {
    font-size: 0.8rem;
    color: var(--text-gray);
}

.notification-footer {
    padding: 0.75rem 1.25rem;
    border-top: 1px solid var(--border-color);
    text-align: center;
}

.notification-footer a {
    color: var(--primary-blue);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
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
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
}

.stat-card > div:first-child {
    display: flex;
    align-items: center;
    gap: 1.25rem;
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

.stat-card.blue .stat-icon { background: linear-gradient(135deg, var(--primary-blue), #4A7AB8); }
.stat-card.orange .stat-icon { background: linear-gradient(135deg, var(--primary-orange), #E76F51); }
.stat-card.green .stat-icon { background: linear-gradient(135deg, var(--success-green), #38A169); }
.stat-card.purple .stat-icon { background: linear-gradient(135deg, var(--purple), #805AD5); }

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
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-trend {
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.stat-trend.up { color: var(--success-green); }

.stat-trend i {
    font-size: 0.75rem;
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

.progress-bar.blue { background: var(--primary-blue); }
.progress-bar.orange { background: var(--primary-orange); }
.progress-bar.green { background: var(--success-green); }
.progress-bar.purple { background: var(--purple); }

/* Content Section */
.content-section {
    padding: 0 2rem 2rem;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-dark);
}

.section-actions {
    display: flex;
    gap: 0.75rem;
}

.btn-filter {
    padding: 0.6rem 1.25rem;
    border: 2px solid var(--border-color);
    background: var(--white);
    border-radius: 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
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

.btn-link {
    color: var(--primary-blue);
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-link:hover {
    gap: 0.75rem;
}

/* Quick Actions Grid */
.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.action-card {
    background: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1.75rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    text-decoration: none;
    transition: all 0.4s ease;
    opacity: 0;
    transform: translateY(30px);
}

.action-card.animate {
    animation: fadeInUp 0.6s ease forwards;
}

.action-card:nth-child(1).animate { animation-delay: 0.1s; }
.action-card:nth-child(2).animate { animation-delay: 0.2s; }
.action-card:nth-child(3).animate { animation-delay: 0.3s; }
.action-card:nth-child(4).animate { animation-delay: 0.4s; }
.action-card:nth-child(5).animate { animation-delay: 0.5s; }
.action-card:nth-child(6).animate { animation-delay: 0.6s; }
.action-card:nth-child(7).animate { animation-delay: 0.7s; }
.action-card:nth-child(8).animate { animation-delay: 0.8s; }
.action-card:nth-child(9).animate { animation-delay: 0.9s; }

.action-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
    border-color: transparent;
}

.action-icon {
    width: 60px;
    height: 60px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: var(--white);
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.action-card:hover .action-icon {
    transform: scale(1.1) rotate(5deg);
}

.action-icon.blue { background: linear-gradient(135deg, var(--primary-blue), #4A7AB8); }
.action-icon.orange { background: linear-gradient(135deg, var(--primary-orange), #E76F51); }
.action-icon.green { background: linear-gradient(135deg, var(--success-green), #38A169); }
.action-icon.purple { background: linear-gradient(135deg, var(--purple), #805AD5); }
.action-icon.yellow { background: linear-gradient(135deg, var(--yellow), #E5B000); }
.action-icon.teal { background: linear-gradient(135deg, var(--teal), #2C9A92); }
.action-icon.red { background: linear-gradient(135deg, var(--red), #C53030); }
.action-icon.pink { background: linear-gradient(135deg, var(--pink), #D53F8C); }
.action-icon.indigo { background: linear-gradient(135deg, var(--indigo), #5A67D8); }

.action-content {
    flex: 1;
}

.action-content h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
}

.action-content p {
    font-size: 0.9rem;
    color: var(--text-gray);
    margin: 0;
}

.action-arrow {
    color: var(--text-gray);
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.action-card:hover .action-arrow {
    transform: translateX(5px);
    color: var(--primary-blue);
}

/* Activity Timeline */
.activity-timeline {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.activity-item {
    background: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.25rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateX(-30px);
}

.activity-item.animate {
    animation: fadeInLeft 0.6s ease forwards;
}

.activity-item:nth-child(1).animate { animation-delay: 0.1s; }
.activity-item:nth-child(2).animate { animation-delay: 0.2s; }
.activity-item:nth-child(3).animate { animation-delay: 0.3s; }
.activity-item:nth-child(4).animate { animation-delay: 0.4s; }

.activity-item:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.activity-item .activity-icon {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.activity-item .activity-icon.blue { background: var(--primary-blue); }
.activity-item .activity-icon.orange { background: var(--primary-orange); }
.activity-item .activity-icon.green { background: var(--success-green); }
.activity-item .activity-icon.purple { background: var(--purple); }

.activity-content p {
    margin: 0 0 0.25rem 0;
    color: var(--text-dark);
}

.activity-time {
    font-size: 0.85rem;
    color: var(--text-gray);
}

/* Visites du site */
.visites-resume {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.25rem;
    margin-bottom: 1.25rem;
}

.visites-carte {
    background: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1.25rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.visites-carte-icone {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: var(--white);
    flex-shrink: 0;
}

.visites-carte.blue .visites-carte-icone { background: linear-gradient(135deg, var(--primary-blue), #4A7AB8); }
.visites-carte.orange .visites-carte-icone { background: linear-gradient(135deg, var(--primary-orange), #E76F51); }
.visites-carte.green .visites-carte-icone { background: linear-gradient(135deg, var(--success-green), #38A169); }

.visites-chiffre {
    font-size: 1.9rem;
    font-weight: 800;
    line-height: 1.1;
    font-variant-numeric: tabular-nums;
}

.visites-sous {
    font-size: 0.82rem;
    color: var(--text-gray);
}

.visites-graphe-carte {
    background: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1.25rem 1.5rem 1rem;
}

.visites-graphe-titre {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.visites-legende {
    font-size: 0.8rem;
    font-weight: 500;
    color: var(--text-gray);
    display: flex;
    align-items: center;
    gap: 6px;
}

.visites-legende i {
    width: 12px;
    height: 12px;
    border-radius: 3px;
    background: var(--primary-blue);
    display: inline-block;
}

.visites-graphe {
    display: flex;
    align-items: flex-end;
    gap: 4px;
    height: 220px;
    border-bottom: 1px solid var(--border-color);
    overflow-x: auto;
}

.visites-barre {
    flex: 1 1 0;
    min-width: 16px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    position: relative;
}

.visites-barre-valeur {
    font-size: 0.7rem;
    font-weight: 600;
    color: var(--text-gray);
    margin-bottom: 3px;
    font-variant-numeric: tabular-nums;
}

.visites-barre-remplie {
    width: 100%;
    max-width: 38px;
    background: var(--primary-blue);
    border-radius: 4px 4px 0 0;
    min-height: 2px;
    transition: height 0.5s ease, background 0.2s ease;
}

.visites-barre:hover .visites-barre-remplie { background: var(--primary-orange); }
.visites-barre.vide .visites-barre-remplie { background: var(--border-color); }

.visites-barre-bulle {
    display: none;
    position: absolute;
    bottom: calc(100% - 10px);
    left: 50%;
    transform: translateX(-50%);
    background: var(--text-dark);
    color: var(--white);
    font-size: 0.75rem;
    padding: 6px 10px;
    border-radius: 8px;
    white-space: nowrap;
    z-index: 5;
    pointer-events: none;
}

.visites-barre:hover .visites-barre-bulle { display: block; }

.visites-axe {
    display: flex;
    gap: 4px;
    margin-top: 6px;
}

.visites-axe span {
    flex: 1 1 0;
    min-width: 16px;
    text-align: center;
    font-size: 0.7rem;
    color: var(--text-gray);
    white-space: nowrap;
    overflow: hidden;
}

.visites-note {
    font-size: 0.8rem;
    color: var(--text-gray);
    margin: 0.9rem 0 0;
}

.visites-detail-entete {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.75rem;
    margin: 1.75rem 0 1rem;
}

.visites-sous-titre {
    font-size: 1.15rem;
    font-weight: 800;
    margin: 0;
}

.visites-periode {
    display: inline-flex;
    background: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 10px;
    padding: 3px;
    gap: 2px;
}

.visites-periode button {
    border: none;
    background: transparent;
    padding: 0.4rem 0.9rem;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--text-gray);
    cursor: pointer;
}

.visites-periode button.active {
    background: var(--primary-blue);
    color: var(--white);
}

.visites-alerte {
    background: var(--light-yellow);
    border: 1px solid #F3DE8A;
    border-radius: 12px;
    padding: 0.8rem 1rem;
    font-size: 0.85rem;
    margin-bottom: 1rem;
}

.visites-alerte code { font-size: 0.8rem; }

.visites-detail-grille {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 1.25rem;
}

.visites-detail-carte {
    background: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1.1rem 1.25rem;
    min-width: 0;
}

.visites-detail-carte.large { grid-column: 1 / -1; }

.visites-detail-titre {
    font-weight: 700;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.visites-detail-titre i { color: var(--primary-blue); }

.visites-liste {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 0.55rem;
}

.visites-ligne-haut {
    display: flex;
    justify-content: space-between;
    gap: 0.75rem;
    font-size: 0.87rem;
}

.visites-ligne-nom {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.visites-ligne-valeur {
    font-weight: 700;
    font-variant-numeric: tabular-nums;
    white-space: nowrap;
}

.visites-ligne-barre {
    height: 6px;
    background: var(--bg-light);
    border-radius: 6px;
    overflow: hidden;
    margin-top: 4px;
}

.visites-ligne-barre span {
    display: block;
    height: 100%;
    background: var(--primary-blue);
    border-radius: 6px;
}

.visites-vide {
    font-size: 0.85rem;
    color: var(--text-gray);
}

.visites-table { font-size: 0.85rem; }
.visites-table th { color: var(--text-gray); font-weight: 600; white-space: nowrap; }
.visites-page { max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

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

    .search-bar {
        max-width: none;
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

    .section-actions {
        flex-wrap: wrap;
    }
}

@media (max-width: 576px) {
    .logo-text {
        display: none;
    }

    .notification-dropdown {
        width: calc(100vw - 2rem);
        right: -1rem;
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
                <button class="sidebar-close" id="sidebarClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="sidebar-menu">
                <div class="menu-section">
                    <div class="menu-section-title">PRINCIPAL</div>
                    <a href="#" class="menu-item active">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('formations.index') }}" class="menu-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Thématique</span>
                        <span class="menu-badge">{{ $stats['formations'] }}</span>
                    </a>
                    <a href="{{ route('sous_formations.index') }}" class="menu-item">
                        <i class="fas fa-layer-group"></i>
                        <span>Sous-Thématiques</span>
                        <span class="menu-badge">{{ $stats['sous_formations'] }}</span>
                    </a>
                    <a href="{{ route('cours.index') }}" class="menu-item">
                        <i class="fas fa-book"></i>
                        <span>Formation</span>
                        <span class="menu-badge">{{ $stats['cours'] }}</span>
                    </a>
                </div>

                <div class="menu-section">
                    <div class="menu-section-title">GESTION DES COMMANDES</div>
                    <a href="{{ route('admin.demandes.index') }}" class="menu-item">
                        <i class="fas fa-envelope"></i>
                        <span>Demandes Formations</span>
                    </a>
                    <a href="{{ route('commandes.index') }}" class="menu-item">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Commandes Bons</span>
                    </a>
                    <a href="{{ route('admin.utilisation.index') }}" class="menu-item">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Bons Actifs</span>
                    </a>
                    <a href="{{ route('admin.demandes.voir') }}" class="menu-item">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Demande de devis</span>
                    </a>
                </div>
            </div>

            <div class="sidebar-footer">
                <div class="admin-profile">
                    <div class="admin-avatar">A</div>
                    <div class="admin-info">
                        <div class="admin-name">Administrateur</div>
                        <div class="admin-role">Super Admin</div>
                    </div>
                </div>
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
                        <input type="text" placeholder="Rechercher formations, cours, clients..." id="globalSearch">
                        <div class="search-results" id="searchResults"></div>
                    </div>
                </div>

                <div class="top-bar-right">
                    <div class="top-bar-item">
                        <button class="notification-btn" id="notificationBtn">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">5</span>
                        </button>
                        <div class="notification-dropdown" id="notificationDropdown">
                            <div class="notification-header">
                                <h4>Notifications</h4>
                                <button class="mark-read">Tout marquer comme lu</button>
                            </div>
                            <div class="notification-list">
                                <div class="notification-item unread">
                                    <div class="notification-icon blue">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p>Nouvelle inscription à la formation</p>
                                        <span class="notification-time">Il y a 5 min</span>
                                    </div>
                                </div>
                                <div class="notification-item unread">
                                    <div class="notification-icon orange">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p>Nouvelle commande de bon</p>
                                        <span class="notification-time">Il y a 15 min</span>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <div class="notification-icon green">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p>Formation validée avec succès</p>
                                        <span class="notification-time">Il y a 1h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-footer">
                                <a href="#">Voir toutes les notifications</a>
                            </div>
                        </div>
                    </div>
                    <button class="top-bar-item">
                        <i class="fas fa-cog"></i>
                    </button>
                </div>
            </div>

            <!-- Welcome Section -->
            <div class="welcome-section">
                <div class="welcome-content">
                    <h1 class="welcome-title">Bienvenue, Administrateur 👋</h1>
                    <p class="welcome-subtitle">Voici un aperçu de votre plateforme aujourd'hui</p>
                </div>
                <div class="welcome-date">
                    <i class="fas fa-calendar"></i>
                    <span id="currentDate"></span>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card blue" data-animate>
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Formations</div>
                        <div class="stat-value" data-target="{{ $stats['formations'] }}">0</div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>+12% ce mois</span>
                        </div>
                    </div>
                    <div class="stat-progress">
                        <div class="progress-bar blue" style="width: 75%"></div>
                    </div>
                </div>

                <div class="stat-card orange" data-animate>
                    <div class="stat-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Sous-Formations</div>
                        <div class="stat-value" data-target="{{ $stats['sous_formations'] }}">0</div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>+8% ce mois</span>
                        </div>
                    </div>
                    <div class="stat-progress">
                        <div class="progress-bar orange" style="width: 60%"></div>
                    </div>
                </div>

                <div class="stat-card green" data-animate>
                    <div class="stat-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Cours</div>
                        <div class="stat-value" data-target="{{ $stats['cours'] }}">0</div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>+15% ce mois</span>
                        </div>
                    </div>
                    <div class="stat-progress">
                        <div class="progress-bar green" style="width: 85%"></div>
                    </div>
                </div>

                <div class="stat-card purple" data-animate>
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Ventes</div>
                        <div class="stat-value" data-target="{{ $stats['ventes'] ?? 0 }}">0</div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>+22% ce mois</span>
                        </div>
                    </div>
                    <div class="stat-progress">
                        <div class="progress-bar purple" style="width: 90%"></div>
                    </div>
                </div>
            </div>

            <!-- ===== SECTION VISITES DU SITE ===== -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-chart-line" style="color: var(--primary-blue); margin-right: 8px;"></i>
                        Visites du site
                    </h2>
                    <div class="section-actions" role="tablist">
                        <button type="button" class="btn-filter active" data-visites="jour"><i class="fas fa-calendar-day"></i><span>Par jour</span></button>
                        <button type="button" class="btn-filter" data-visites="semaine"><i class="fas fa-calendar-week"></i><span>Par semaine</span></button>
                        <button type="button" class="btn-filter" data-visites="mois"><i class="fas fa-calendar-alt"></i><span>Par mois</span></button>
                    </div>
                </div>

                <div class="visites-resume">
                    @foreach ([
                        'jour'    => ["Aujourd'hui", 'fa-sun', 'blue'],
                        'semaine' => ['Cette semaine', 'fa-calendar-week', 'orange'],
                        'mois'    => ['Ce mois-ci', 'fa-calendar-alt', 'green'],
                    ] as $cle => [$libelle, $icone, $couleur])
                        <div class="visites-carte {{ $couleur }}">
                            <div class="visites-carte-icone"><i class="fas {{ $icone }}"></i></div>
                            <div>
                                <div class="stat-label">{{ $libelle }}</div>
                                <div class="visites-chiffre">{{ number_format($visites['resume'][$cle]['visiteurs'], 0, ',', ' ') }}</div>
                                <div class="visites-sous">visiteurs · {{ number_format($visites['resume'][$cle]['pages'], 0, ',', ' ') }} pages vues</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="visites-graphe-carte">
                    <div class="visites-graphe-titre">
                        <span id="visitesTitre">Visiteurs uniques — 30 derniers jours</span>
                        <span class="visites-legende"><i></i> Visiteurs uniques</span>
                    </div>
                    <div class="visites-graphe" id="visitesGraphe"></div>
                    <p class="visites-note">
                        Ne sont comptées que les pages publiques du site. Les pages d'administration, les utilisateurs connectés et les robots sont exclus.
                    </p>
                </div>

                <!-- Détail des visiteurs -->
                <div class="visites-detail-entete">
                    <h3 class="visites-sous-titre">D'où viennent les visiteurs ?</h3>
                    <div class="visites-periode" role="tablist">
                        <button type="button" class="active" data-detail="jour">Aujourd'hui</button>
                        <button type="button" data-detail="semaine">Cette semaine</button>
                        <button type="button" data-detail="mois">Ce mois-ci</button>
                    </div>
                </div>

                @unless ($visites['geo_active'])
                    <div class="visites-alerte">
                        <i class="fas fa-info-circle"></i>
                        La localisation (pays, ville) n'est pas encore activée : il manque le fichier de géolocalisation
                        <code>storage/{{ \App\Support\InfosVisiteur::FICHIER_GEO }}</code>. Les autres informations sont déjà enregistrées.
                    </div>
                @endunless

                <div class="visites-detail-grille">
                    @foreach ([
                        'pays'        => ['Pays', 'fa-globe-africa'],
                        'villes'      => ['Villes', 'fa-city'],
                        'sources'     => ['Provenance', 'fa-share-alt'],
                        'appareils'   => ['Appareils', 'fa-mobile-alt'],
                        'navigateurs' => ['Navigateurs', 'fa-compass'],
                        'systemes'    => ['Systèmes', 'fa-laptop'],
                    ] as $cle => [$titre, $icone])
                        <div class="visites-detail-carte">
                            <div class="visites-detail-titre"><i class="fas {{ $icone }}"></i> {{ $titre }}</div>
                            <ul class="visites-liste" data-liste="{{ $cle }}"></ul>
                        </div>
                    @endforeach
                    <div class="visites-detail-carte large">
                        <div class="visites-detail-titre"><i class="fas fa-file-alt"></i> Pages les plus vues</div>
                        <ul class="visites-liste" data-liste="pages" data-unite="vues"></ul>
                    </div>
                </div>

                <!-- Dernières visites -->
                <div class="visites-graphe-carte" style="margin-top: 1.25rem;">
                    <div class="visites-graphe-titre"><span><i class="fas fa-history" style="color: var(--primary-blue);"></i> Dernières visites</span></div>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle visites-table mb-0">
                            <thead>
                                <tr><th>Date</th><th>Page</th><th>Lieu</th><th>Appareil</th><th>Navigateur</th><th>Provenance</th></tr>
                            </thead>
                            <tbody>
                                @forelse ($visites['dernieres'] as $v)
                                    <tr>
                                        <td class="text-nowrap">{{ $v['quand'] }}</td>
                                        <td class="visites-page" title="{{ $v['page'] }}">{{ $v['page'] }}</td>
                                        <td>{{ $v['lieu'] }}</td>
                                        <td>{{ $v['appareil'] ?? '—' }}</td>
                                        <td>{{ $v['navigateur'] ?: '—' }}</td>
                                        <td>{{ $v['source'] ?? '—' }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center text-muted py-4">Aucune visite enregistrée pour le moment.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ===== FIN SECTION VISITES DU SITE ===== -->

            <!-- Quick Actions -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Actions Rapides</h2>
                    <div class="section-actions">
                        <button class="btn-filter active" data-filter="all">
                            <i class="fas fa-th"></i>
                            <span>Toutes</span>
                        </button>
                        <button class="btn-filter" data-filter="create">
                            <i class="fas fa-plus"></i>
                            <span>Créer</span>
                        </button>
                        <button class="btn-filter" data-filter="manage">
                            <i class="fas fa-cog"></i>
                            <span>Gérer</span>
                        </button>
                    </div>
                </div>

                <div class="quick-actions-grid">
                    <a href="{{ route('domaines.create') }}" class="action-card create" data-animate>
                        <div class="action-icon blue">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="action-content">
                            <h3>Nouveau Domaine </h3>
                            <p>Créer un Domaine</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                    <!-- Dans la section Quick Actions ou créez une nouvelle section -->
<a href="{{ route('admin.telechargements.index') }}" class="action-card manage" data-animate>
    <div class="action-icon purple">
        <i class="fas fa-download"></i>
    </div>
    <div class="action-content">
        <h3>Téléchargements PDF</h3>
        <p>Voir les personnes qui ont téléchargé les catalogues</p>
    </div>
    <div class="action-arrow">
        <i class="fas fa-arrow-right"></i>
    </div>
</a>
                    
                    <a href="{{ route('formations.create') }}" class="action-card create" data-animate>
                        <div class="action-icon blue">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="action-content">
                            <h3>Nouvelle Thématique </h3>
                            <p>Créer une thématique complète</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                    <a href="{{ route('avis.create') }}" class="action-card list" data-animate>

    <div class="action-icon green">
        <i class="fas fa-star"></i>
    </div>

    <div class="action-content">
        <h3>Ajouter un avis</h3>
        <p>Créer et enregistrer les avis des participants</p>
    </div>

    <div class="action-arrow">
        <i class="fas fa-arrow-right"></i>
    </div>

</a>
                    
                    <a href="{{ route('admin.formations.index') }}" class="action-card create" data-animate>
                        <div class="action-icon blue">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="action-content">
                            <h3>Modifier ou supprimer une thématique </h3>
                            <p>Gérer les thématique </p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('sous_formations.create') }}" class="action-card create" data-animate>
                        <div class="action-icon orange">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="action-content">
                            <h3>Nouvelle Sous-Thématique</h3>
                            <p>Ajouter un module de formation</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                    <a href="{{ route('admin.sousformations.index') }}" class="action-card create" data-animate>
                        <div class="action-icon orange">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="action-content">
                            <h3>Gérer les Sous-Thématique</h3>
                            <p>Gérer les modules de formation</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('cours.create') }}" class="action-card create" data-animate>
                        <div class="action-icon green">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="action-content">
                            <h3>Nouvelle Formation</h3>
                            <p>Créer un cours interactif</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                     <a href="{{ route('admin.cours.index') }}" class="action-card create" data-animate>
                        <div class="action-icon green">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="action-content">
                            <h3>Gérer les Formations</h3>
                            <p>Gérer les formations interactif</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('admin.bons.create') }}" class="action-card create" data-animate>
                        <div class="action-icon purple">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div class="action-content">
                            <h3>Nouveau Bon</h3>
                            <p>Créer un bon de commande</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('admin.demandes.index') }}" class="action-card manage" data-animate>
                        <div class="action-icon yellow">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="action-content">
                            <h3>Commandes Formations </h3>
                            <p>Gérer les demandes clients</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('commandes.index') }}" class="action-card manage" data-animate>
                        <div class="action-icon teal">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="action-content">
                            <h3>Commandes Bons</h3>
                            <p>Suivre les commandes</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('admin.utilisation.index') }}" class="action-card manage" data-animate>
                        <div class="action-icon red">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="action-content">
                            <h3>Bons Actifs</h3>
                            <p>Consulter les bons valides</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('admin.bons.create') }}" class="action-card manage" data-animate>
                        <div class="action-icon red">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="action-content">
                            <h3>Crée un Bons </h3>
                            <p>Création de bon </p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('admin.utilisation.create') }}" class="action-card manage" data-animate>
                        <div class="action-icon pink">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <div class="action-content">
                            <h3>Utiliser un Bon</h3>
                            <p>Activer un bon de formation</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('admin.demandes.voir') }}" class="action-card manage" data-animate>
                        <div class="action-icon indigo">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="action-content">
                            <h3>Demandes Cours</h3>
                            <p>Voir les inscriptions aux cours</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                    <!-- Bouton 1 : Liste des formateurs -->
<a href="{{ route('formateurs.index') }}" class="action-card list" data-animate>
    <div class="action-icon orange">
        <i class="fas fa-users"></i>
    </div>
    <div class="action-content">
        <h3>Liste des formateurs</h3>
        <p>Voir et gérer tous les formateurs</p>
    </div>
    <div class="action-arrow">
        <i class="fas fa-arrow-right"></i>
    </div>
</a>

<!-- Bouton 2 : Ajouter un formateur -->
<a href="{{ route('formateurs.create') }}" class="action-card create" data-animate>
    <div class="action-icon pink">
        <i class="fas fa-user-plus"></i>
    </div>
    <div class="action-content">
        <h3>Nouveau formateur</h3>
        <p>Créer un profil de formateur</p>
    </div>
    <div class="action-arrow">
        <i class="fas fa-arrow-right"></i>
    </div>
</a>

<!-- Bouton 3 : Fiches formateurs -->
<a href="{{ route('formateurs.index') }}" class="action-card view" data-animate>
    <div class="action-icon purple">
        <i class="fas fa-id-card"></i>
    </div>
    <div class="action-content">
        <h3>Fiches formateurs</h3>
        <p>Consulter les fiches détaillées</p>
    </div>
    <div class="action-arrow">
        <i class="fas fa-arrow-right"></i>
    </div>
</a>
                </div>
            </div>

            <!-- ===== SECTION LIENS D'ÉVALUATION ===== -->
            <div class="content-section" style="margin-top: 1.5rem;">
                <div class="section-header" style="margin-bottom: 1rem;">
                    <h2 class="section-title">
                        <i class="fas fa-star" style="color:#f59e0b; margin-right:8px;"></i>
                        Liens d'évaluation des cours
                    </h2>
                    <a href="{{ route('avis.create') }}" class="btn-link">
                        <i class="fas fa-plus" style="margin-right:4px;"></i> Formulaire général
                    </a>
                </div>

                <p style="color:#6b7280; font-size:0.9rem; margin-bottom:1.2rem;">
                    Copiez le lien ci-dessous et envoyez-le par WhatsApp, e-mail ou SMS à votre client pour qu'il note le cours directement.
                </p>

                <!-- Barre de recherche de cours -->
                <div style="margin-bottom: 1rem; position: relative;">
                    <input type="text" id="searchCours"
                        placeholder="🔍 Rechercher un cours..."
                        oninput="filtrerCours(this.value)"
                        style="
                            width: 100%;
                            padding: 11px 16px;
                            border: 1.5px solid #e5e7eb;
                            border-radius: 10px;
                            font-size: 0.95rem;
                            background: #f9fafb;
                            outline: none;
                            box-sizing: border-box;
                            transition: border-color 0.2s, box-shadow 0.2s;
                        "
                        onfocus="this.style.borderColor='#2563eb'; this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.1)'"
                        onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'"
                    >
                </div>

                <div id="coursListeAvis" style="display: flex; flex-direction: column; gap: 10px; max-height: 500px; overflow-y: auto; padding-right: 4px;">
                    @forelse($coursList as $c)
                    <div class="cours-avis-row" data-titre="{{ strtolower($c->titre) }}"
                        style="
                            background: white;
                            border: 1.5px solid #e5e7eb;
                            border-radius: 12px;
                            padding: 14px 18px;
                            display: flex;
                            align-items: center;
                            gap: 14px;
                            flex-wrap: wrap;
                            transition: box-shadow 0.2s, border-color 0.2s;
                        "
                        onmouseover="this.style.boxShadow='0 4px 15px rgba(37,99,235,0.1)'; this.style.borderColor='#c7d2fe';"
                        onmouseout="this.style.boxShadow='none'; this.style.borderColor='#e5e7eb';"
                    >
                        <!-- Icône -->
                        <div style="
                            width: 40px; height: 40px;
                            background: linear-gradient(135deg, #2563eb, #4f46e5);
                            border-radius: 10px;
                            display: flex; align-items: center; justify-content: center;
                            color: white; font-size: 1rem;
                            flex-shrink: 0;
                        ">
                            <i class="fas fa-book-open"></i>
                        </div>

                        <!-- Titre + nb avis -->
                        <div style="flex: 1; min-width: 0;">
                            <div style="font-weight: 700; color: #1f2937; font-size: 0.95rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $c->titre }}
                            </div>
                            <div style="font-size: 0.8rem; color: #6b7280; margin-top: 2px;">
                                <i class="fas fa-star" style="color:#f59e0b;"></i>
                                {{ $c->avis_count }} avis
                                &nbsp;·&nbsp;
                                <a href="{{ route('cours.show', $c->id) }}" target="_blank" style="color:#2563eb; text-decoration:none;">Voir la fiche</a>
                            </div>
                        </div>

                        <!-- URL copiable -->
                        <div style="
                            display: flex;
                            align-items: center;
                            gap: 8px;
                            flex-wrap: wrap;
                        ">
                            <code style="
                                font-size: 0.75rem;
                                background: #f1f5f9;
                                border: 1px solid #e2e8f0;
                                border-radius: 6px;
                                padding: 4px 10px;
                                color: #2563eb;
                                max-width: 220px;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                display: block;
                            " title="{{ route('cours.noter', $c->id) }}">{{ route('cours.noter', $c->id) }}</code>

                            <button
                                onclick="dashCopierLien('{{ route('cours.noter', $c->id) }}', this)"
                                title="Copier le lien pour le client"
                                style="
                                    padding: 7px 14px;
                                    background: #2563eb;
                                    color: white;
                                    border: none;
                                    border-radius: 8px;
                                    font-size: 0.82rem;
                                    font-weight: 600;
                                    cursor: pointer;
                                    display: flex;
                                    align-items: center;
                                    gap: 6px;
                                    white-space: nowrap;
                                    transition: all 0.2s;
                                "
                                onmouseover="this.style.background='#1d4ed8'"
                                onmouseout="this.style.background='#2563eb'"
                            >
                                <i class="fas fa-copy"></i> Copier le lien
                            </button>

                            <a href="{{ route('cours.noter', $c->id) }}" target="_blank"
                                style="
                                    padding: 7px 12px;
                                    background: white;
                                    border: 1.5px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 0.82rem;
                                    font-weight: 600;
                                    color: #374151;
                                    text-decoration: none;
                                    display: flex;
                                    align-items: center;
                                    gap: 5px;
                                    white-space: nowrap;
                                    transition: all 0.2s;
                                "
                                onmouseover="this.style.background='#f3f4f6'"
                                onmouseout="this.style.background='white'"
                                title="Aperçu du formulaire client"
                            >
                                <i class="fas fa-external-link-alt"></i> Aperçu
                            </a>
                        </div>
                    </div>
                    @empty
                        <div style="text-align:center; color:#9ca3af; padding: 2rem;">
                            <i class="fas fa-book" style="font-size:2rem; margin-bottom:8px; display:block;"></i>
                            Aucun cours disponible pour le moment.
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- ===== FIN SECTION LIENS D'ÉVALUATION ===== -->

            <!-- Recent Activity -->
            <div class="content-section">
                <div class="section-header">                    <h2 class="section-title">Activité Récente</h2>
                    <a href="#" class="btn-link">Voir tout</a>
                </div>

                <div class="activity-timeline">
                    <div class="activity-item" data-animate>
                        <div class="activity-icon blue">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <p><strong>Nouvelle inscription</strong> - Formation Web Development</p>
                            <span class="activity-time">Il y a 5 minutes</span>
                        </div>
                    </div>

                    <div class="activity-item" data-animate>
                        <div class="activity-icon orange">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="activity-content">
                            <p><strong>Nouvelle commande</strong> - Bon de formation x3</p>
                            <span class="activity-time">Il y a 15 minutes</span>
                        </div>
                    </div>

                    <div class="activity-item" data-animate>
                        <div class="activity-icon green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <p><strong>Formation validée</strong> - Marketing Digital</p>
                            <span class="activity-time">Il y a 1 heure</span>
                        </div>
                    </div>

                    <div class="activity-item" data-animate>
                        <div class="activity-icon purple">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="activity-content">
                            <p><strong>Nouveau cours</strong> - Introduction à Python</p>
                            <span class="activity-time">Il y a 2 heures</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ========================================
// CONFIGURATION & INITIALIZATION
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    initializeDashboard();
    initVisites();
});

// ========================================
// VISITES DU SITE (jour / semaine / mois)
// ========================================

const VISITES_SERIES = @json($visites['series']);
const VISITES_TITRES = {
    jour: 'Visiteurs uniques — 30 derniers jours',
    semaine: 'Visiteurs uniques — 12 dernières semaines',
    mois: 'Visiteurs uniques — 12 derniers mois'
};

function initVisites() {
    const boutons = document.querySelectorAll('[data-visites]');
    boutons.forEach(btn => {
        btn.addEventListener('click', () => {
            boutons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            afficherVisites(btn.dataset.visites);
        });
    });
    afficherVisites('jour');

    const boutonsDetail = document.querySelectorAll('[data-detail]');
    boutonsDetail.forEach(btn => {
        btn.addEventListener('click', () => {
            boutonsDetail.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            afficherDetails(btn.dataset.detail);
        });
    });
    afficherDetails('jour');
}

const VISITES_DETAILS = @json($visites['details']);

function echapper(texte) {
    const div = document.createElement('div');
    div.textContent = texte ?? '';
    return div.innerHTML;
}

function afficherDetails(periode) {
    const donnees = VISITES_DETAILS[periode] || {};
    document.querySelectorAll('[data-liste]').forEach(ul => {
        const lignes = donnees[ul.dataset.liste] || [];
        const unite = ul.dataset.unite || 'visiteurs';
        if (lignes.length === 0) {
            ul.innerHTML = '<li class="visites-vide">Aucune donnée sur cette période.</li>';
            return;
        }
        const total = lignes.reduce((s, l) => s + l.visiteurs, 0);
        const max = Math.max(...lignes.map(l => l.visiteurs));
        ul.innerHTML = lignes.map(l => `
            <li>
                <div class="visites-ligne-haut">
                    <span class="visites-ligne-nom" title="${echapper(l.nom)}">${echapper(l.nom)}</span>
                    <span class="visites-ligne-valeur">${l.visiteurs} ${unite === 'vues' ? 'vues' : ''}${unite !== 'vues' ? `<small class="text-muted"> · ${Math.round(l.visiteurs / total * 100)} %</small>` : ''}</span>
                </div>
                <div class="visites-ligne-barre"><span style="width: ${(l.visiteurs / max) * 100}%"></span></div>
            </li>
        `).join('');
    });
}

function afficherVisites(periode) {
    const serie = VISITES_SERIES[periode] || [];
    const graphe = document.getElementById('visitesGraphe');
    document.getElementById('visitesTitre').textContent = VISITES_TITRES[periode];

    const max = Math.max(1, ...serie.map(p => p.visiteurs));
    // En vue « par jour », on n'affiche qu'une étiquette sur trois pour rester lisible
    const pas = periode === 'jour' ? 3 : 1;

    graphe.innerHTML = serie.map(p => `
        <div class="visites-barre ${p.visiteurs === 0 ? 'vide' : ''}">
            <div class="visites-barre-bulle">${p.detail}<br><strong>${p.visiteurs}</strong> visiteurs · ${p.pages} pages vues</div>
            ${periode !== 'jour' && p.visiteurs > 0 ? `<span class="visites-barre-valeur">${p.visiteurs}</span>` : ''}
            <div class="visites-barre-remplie" style="height: ${(p.visiteurs / max) * 85}%"></div>
        </div>
    `).join('');

    let axe = graphe.nextElementSibling;
    if (!axe || !axe.classList.contains('visites-axe')) {
        axe = document.createElement('div');
        axe.className = 'visites-axe';
        graphe.after(axe);
    }
    axe.innerHTML = serie.map((p, i) => {
        const montrer = (serie.length - 1 - i) % pas === 0;
        return `<span>${montrer ? p.label : ''}</span>`;
    }).join('');
}

function initializeDashboard() {
    initSidebar();
    initTopBar();
    initSearch();
    initNotifications();
    initAnimations();
    initFilters();
    initCounters();
    updateDateTime();
    initKeyboardShortcuts();
}

// ========================================
// SIDEBAR MANAGEMENT
// ========================================

function initSidebar() {
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarClose = document.getElementById('sidebarClose');
    const mainContent = document.getElementById('mainContent');

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            
            // Add overlay for mobile
            if (window.innerWidth <= 1024) {
                toggleOverlay();
            }
        });
    }

    if (sidebarClose) {
        sidebarClose.addEventListener('click', () => {
            sidebar.classList.remove('active');
            removeOverlay();
        });
    }

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', (e) => {
        if (window.innerWidth <= 1024) {
            if (!sidebar.contains(e.target) && 
                !menuToggle.contains(e.target) && 
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
                removeOverlay();
            }
        }
    });

    // Menu item active state
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // Don't change active state, let the page navigation handle it
            if (window.innerWidth <= 1024) {
                setTimeout(() => {
                    sidebar.classList.remove('active');
                    removeOverlay();
                }, 300);
            }
        });
    });
}

function toggleOverlay() {
    let overlay = document.querySelector('.sidebar-overlay');
    
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            animation: fadeIn 0.3s ease;
        `;
        document.body.appendChild(overlay);
        
        overlay.addEventListener('click', () => {
            document.getElementById('sidebar').classList.remove('active');
            removeOverlay();
        });
    }
}

function removeOverlay() {
    const overlay = document.querySelector('.sidebar-overlay');
    if (overlay) {
        overlay.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => overlay.remove(), 300);
    }
}

// ========================================
// TOP BAR & NOTIFICATIONS
// ========================================

function initTopBar() {
    // Sticky header effect
    const topBar = document.querySelector('.top-bar');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > lastScroll && currentScroll > 100) {
            topBar.style.transform = 'translateY(-100%)';
        } else {
            topBar.style.transform = 'translateY(0)';
        }
        
        lastScroll = currentScroll;
    });
}

function initNotifications() {
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationDropdown = document.getElementById('notificationDropdown');

    if (notificationBtn && notificationDropdown) {
        notificationBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle('active');
            
            // Close search results if open
            const searchResults = document.getElementById('searchResults');
            if (searchResults) {
                searchResults.classList.remove('active');
            }
        });

        // Mark as read functionality
        const markReadBtn = notificationDropdown.querySelector('.mark-read');
        if (markReadBtn) {
            markReadBtn.addEventListener('click', () => {
                const unreadItems = notificationDropdown.querySelectorAll('.notification-item.unread');
                unreadItems.forEach(item => {
                    item.classList.remove('unread');
                    item.style.animation = 'fadeOut 0.3s ease';
                });
                
                // Update badge
                const badge = notificationBtn.querySelector('.notification-badge');
                if (badge) {
                    badge.style.animation = 'scaleOut 0.3s ease';
                    setTimeout(() => {
                        badge.textContent = '0';
                        badge.style.display = 'none';
                    }, 300);
                }
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!notificationDropdown.contains(e.target) && 
                !notificationBtn.contains(e.target)) {
                notificationDropdown.classList.remove('active');
            }
        });
    }
}

// ========================================
// SEARCH FUNCTIONALITY
// ========================================

function initSearch() {
    const searchInput = document.getElementById('globalSearch');
    const searchResults = document.getElementById('searchResults');

    if (!searchInput || !searchResults) return;

    // Sample search data (replace with actual data from your backend)
    const searchData = [
        { type: 'formation', name: 'Développement Web', icon: 'fa-graduation-cap', url: '#' },
        { type: 'formation', name: 'Marketing Digital', icon: 'fa-graduation-cap', url: '#' },
        { type: 'cours', name: 'Introduction à JavaScript', icon: 'fa-book', url: '#' },
        { type: 'cours', name: 'Design Thinking', icon: 'fa-book', url: '#' },
        { type: 'client', name: 'Jean Dupont', icon: 'fa-user', url: '#' },
        { type: 'client', name: 'Marie Martin', icon: 'fa-user', url: '#' }
    ];

    let searchTimeout;

    searchInput.addEventListener('input', function(e) {
        clearTimeout(searchTimeout);
        const query = e.target.value.toLowerCase().trim();

        if (query.length < 2) {
            searchResults.classList.remove('active');
            return;
        }

        searchTimeout = setTimeout(() => {
            performSearch(query, searchData, searchResults);
        }, 300);
    });

    // Close search results when clicking outside
    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.remove('active');
        }
    });

    // Handle enter key
    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            const firstResult = searchResults.querySelector('.search-result-item');
            if (firstResult) {
                window.location.href = firstResult.getAttribute('href');
            }
        }
    });
}

function performSearch(query, data, resultsContainer) {
    const results = data.filter(item => 
        item.name.toLowerCase().includes(query)
    );

    if (results.length === 0) {
        resultsContainer.innerHTML = `
            <div style="padding: 2rem; text-align: center; color: var(--text-gray);">
                <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 0.5rem; opacity: 0.3;"></i>
                <p>Aucun résultat trouvé</p>
            </div>
        `;
        resultsContainer.classList.add('active');
        return;
    }

    const html = `
        <div style="padding: 0.75rem 0;">
            <div style="padding: 0.5rem 1.25rem; font-size: 0.75rem; font-weight: 700; color: var(--text-gray); text-transform: uppercase;">
                ${results.length} résultat(s)
            </div>
            ${results.map(item => `
                <a href="${item.url}" class="search-result-item" style="
                    display: flex;
                    align-items: center;
                    gap: 1rem;
                    padding: 0.9rem 1.25rem;
                    text-decoration: none;
                    color: var(--text-dark);
                    transition: all 0.3s ease;
                    border-left: 3px solid transparent;
                ">
                    <div style="
                        width: 40px;
                        height: 40px;
                        background: var(--light-blue);
                        color: var(--primary-blue);
                        border-radius: 10px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        flex-shrink: 0;
                    ">
                        <i class="fas ${item.icon}"></i>
                    </div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; margin-bottom: 0.25rem;">${highlightMatch(item.name, query)}</div>
                        <div style="font-size: 0.85rem; color: var(--text-gray);">${item.type}</div>
                    </div>
                    <i class="fas fa-arrow-right" style="color: var(--text-gray); font-size: 0.9rem;"></i>
                </a>
            `).join('')}
        </div>
    `;

    resultsContainer.innerHTML = html;
    resultsContainer.classList.add('active');

    // Add hover effects
    const resultItems = resultsContainer.querySelectorAll('.search-result-item');
    resultItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.background = 'var(--light-blue)';
            this.style.borderLeftColor = 'var(--primary-blue)';
        });
        item.addEventListener('mouseleave', function() {
            this.style.background = 'transparent';
            this.style.borderLeftColor = 'transparent';
        });
    });
}

function highlightMatch(text, query) {
    const regex = new RegExp(`(${query})`, 'gi');
    return text.replace(regex, '<mark style="background: var(--light-orange); color: var(--primary-orange); padding: 0 0.25rem; border-radius: 4px;">$1</mark>');
}

// ========================================
// ANIMATIONS
// ========================================

function initAnimations() {
    // Intersection Observer for scroll animations
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
                
                // Animate progress bars
                const progressBar = entry.target.querySelector('.progress-bar');
                if (progressBar) {
                    const width = progressBar.style.width;
                    progressBar.style.width = '0';
                    setTimeout(() => {
                        progressBar.style.width = width;
                    }, 100);
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with data-animate
    document.querySelectorAll('[data-animate]').forEach(el => {
        observer.observe(el);
    });
}

function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const duration = 1500;
    const stepTime = duration / 50;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target.toLocaleString('fr-FR');
            clearInterval(timer);
        } else {
            element.textContent = Math.ceil(current).toLocaleString('fr-FR');
        }
    }, stepTime);
}

function initCounters() {
    // Immediate counter animation for visible elements
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
// FILTERS
// ========================================

function initFilters() {
    const filterButtons = document.querySelectorAll('.btn-filter[data-filter]');
    const actionCards = document.querySelectorAll('.action-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');

            // Get filter value
            const filter = this.dataset.filter;

            // Filter action cards
            actionCards.forEach(card => {
                if (filter === 'all') {
                    card.style.display = 'flex';
                    // Re-trigger animation
                    card.classList.remove('animate');
                    setTimeout(() => card.classList.add('animate'), 10);
                } else {
                    if (card.classList.contains(filter)) {
                        card.style.display = 'flex';
                        card.classList.remove('animate');
                        setTimeout(() => card.classList.add('animate'), 10);
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        });
    });
}

// ========================================
// DATE & TIME
// ========================================

function updateDateTime() {
    const dateElement = document.getElementById('currentDate');
    if (!dateElement) return;

    function update() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        const dateString = now.toLocaleDateString('fr-FR', options);
        dateElement.textContent = dateString;
    }

    update();
    setInterval(update, 60000); // Update every minute
}

// ========================================
// KEYBOARD SHORTCUTS
// ========================================

function initKeyboardShortcuts() {
    document.addEventListener('keydown', (e) => {
        // Ctrl/Cmd + K : Focus search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.getElementById('globalSearch');
            if (searchInput) {
                searchInput.focus();
                searchInput.select();
            }
        }

        // Escape : Close modals/dropdowns
        if (e.key === 'Escape') {
            const notificationDropdown = document.getElementById('notificationDropdown');
            const searchResults = document.getElementById('searchResults');
            const sidebar = document.getElementById('sidebar');

            if (notificationDropdown) {
                notificationDropdown.classList.remove('active');
            }
            if (searchResults) {
                searchResults.classList.remove('active');
            }
            if (sidebar && window.innerWidth <= 1024) {
                sidebar.classList.remove('active');
                removeOverlay();
            }
        }

        // Ctrl/Cmd + B : Toggle sidebar
        if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
            e.preventDefault();
            const sidebar = document.getElementById('sidebar');
            if (sidebar) {
                sidebar.classList.toggle('active');
                if (window.innerWidth <= 1024) {
                    toggleOverlay();
                }
            }
        }
    });
}

// ========================================
// UTILITY FUNCTIONS
// ========================================

// Smooth scroll to top
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Show toast notification
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
        z-index: 10000;
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
        error: 'var(--red)',
        warning: 'var(--yellow)',
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

// Loading state for buttons
function setButtonLoading(button, loading = true) {
    if (loading) {
        button.dataset.originalText = button.innerHTML;
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Chargement...';
    } else {
        button.disabled = false;
        button.innerHTML = button.dataset.originalText || button.innerHTML;
    }
}

// Confirm dialog
function confirmAction(message, callback) {
    if (confirm(message)) {
        callback();
    }
}

// Format numbers
function formatNumber(num) {
    return num.toLocaleString('fr-FR');
}

// Format currency
function formatCurrency(amount) {
    return new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'XOF'
    }).format(amount);
}

// ========================================
// ADD CUSTOM ANIMATIONS TO STYLE
// ========================================

const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }

    @keyframes scaleOut {
        from { transform: scale(1); opacity: 1; }
        to { transform: scale(0); opacity: 0; }
    }

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

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: var(--bg-light);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--border-color);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--text-gray);
    }

    /* Selection color */
    ::selection {
        background: var(--light-blue);
        color: var(--primary-blue);
    }
`;

document.head.appendChild(style);

// ========================================
// CONSOLE STYLING
// ========================================

console.log('%c✨ Dashboard Admin - MonProfChezMoi ✨', 
    'color: #5B8CC6; font-size: 24px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);'
);
console.log('%c🚀 Dashboard chargé avec succès!', 
    'color: #48BB78; font-size: 16px; font-weight: bold;'
);
console.log('%c📊 Toutes les fonctionnalités sont opérationnelles', 
    'color: #718096; font-size: 14px;'
);

// ========================================
// EXPORT FUNCTIONS (if needed)
// ========================================

window.dashboardUtils = {
    showToast,
    setButtonLoading,
    confirmAction,
    formatNumber,
    formatCurrency,
    scrollToTop
};

    // ===== SECTION LIENS D'ÉVALUATION – FILTRE ET COPIE =====

    function filtrerCours(query) {
        const q = query.toLowerCase().trim();
        document.querySelectorAll('#coursListeAvis .cours-avis-row').forEach(function(row) {
            const titre = row.getAttribute('data-titre') || '';
            row.style.display = titre.includes(q) ? '' : 'none';
        });
    }

    function dashCopierLien(url, btn) {
        function flash() {
            const originalInner = btn.innerHTML;
            const originalBg    = btn.style.background;
            btn.innerHTML = '<i class="fas fa-check"></i> Copié !';
            btn.style.background = '#10b981';
            setTimeout(function() {
                btn.innerHTML = originalInner;
                btn.style.background = originalBg || '#2563eb';
            }, 2500);
        }

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(url).then(flash).catch(function() {
                fallbackDashCopy(url, btn, flash);
            });
        } else {
            fallbackDashCopy(url, btn, flash);
        }
    }

    function fallbackDashCopy(url, btn, cb) {
        var inp = document.createElement('input');
        inp.value = url;
        document.body.appendChild(inp);
        inp.select();
        document.execCommand('copy');
        document.body.removeChild(inp);
        cb();
    }

    </script>
</body>
</html>
