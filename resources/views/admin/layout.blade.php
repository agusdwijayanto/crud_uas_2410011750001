<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyModul - Admin @yield('title')</title>

    <!-- Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ============================================================
                   RESET & BASE
                   ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #F8FAFC;
            color: #1E293B;
        }

        :root {
            --primary-green: #22C55E;
            --primary-green-dark: #16A34A;
            --sidebar-bg: #0F172A;
            --sidebar-hover: #1E293B;
        }

        /* ============================================================
                   SIDEBAR
                   ============================================================ */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: var(--sidebar-bg);
            color: #94A3B8;
            padding: 20px 0;
            overflow-y: auto;
            z-index: 1050;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .sidebar .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 20px 20px 20px;
            border-bottom: 1px solid #1E293B;
            margin-bottom: 20px;
        }

        .sidebar .logo i {
            font-size: 28px;
            color: var(--primary-green);
            background: #1E293B;
            padding: 8px;
            border-radius: 12px;
        }

        .sidebar .logo-text {
            font-size: 20px;
            font-weight: 700;
            color: white;
        }

        .sidebar .logo-text span {
            color: var(--primary-green);
        }

        .sidebar .nav-menu {
            flex: 1;
        }

        .sidebar .nav-item {
            margin-bottom: 4px;
        }

        .sidebar .nav-link {
            color: #94A3B8;
            padding: 10px 20px;
            border-radius: 8px;
            margin: 0 8px;
            transition: all 0.3s ease;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar .nav-link:hover {
            background: var(--sidebar-hover);
            color: white;
        }

        .sidebar .nav-link.active {
            background: var(--primary-green);
            color: white;
        }

        .sidebar .nav-sub {
            padding-left: 28px;
        }

        .sidebar .nav-sub .nav-link {
            font-size: 13px;
            padding: 8px 20px;
        }

        .sidebar .nav-sub .nav-link i {
            font-size: 12px;
        }

        /* ===== LOGOUT DI SIDEBAR BAWAH ===== */
        .sidebar .sidebar-footer {
            border-top: 1px solid #1E293B;
            padding: 16px 20px 0 20px;
            margin-top: auto;
        }

        .sidebar .sidebar-footer .nav-link {
            color: #EF4444;
        }

        .sidebar .sidebar-footer .nav-link:hover {
            background: #450A0A;
            color: #FCA5A5;
        }

        /* ============================================================
                   MAIN CONTENT
                   ============================================================ */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        /* ============================================================
                   TOP NAVBAR
                   ============================================================ */
        .top-navbar {
            background: white;
            padding: 12px 30px;
            border-bottom: 1px solid #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .top-navbar .search-box {
            display: flex;
            align-items: center;
            background: #F1F5F9;
            border-radius: 30px;
            padding: 6px 18px;
            gap: 10px;
            max-width: 300px;
            width: 100%;
        }

        .top-navbar .search-box input {
            border: none;
            background: transparent;
            outline: none;
            font-size: 14px;
            padding: 6px 0;
            width: 100%;
            font-family: 'Poppins', sans-serif;
        }

        .top-navbar .search-box i {
            color: #94A3B8;
            font-size: 14px;
        }

        .top-navbar .right-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .top-navbar .right-icons .icon-btn {
            position: relative;
            color: #475569;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s ease;
            background: none;
            border: none;
        }

        .top-navbar .right-icons .icon-btn:hover {
            color: var(--primary-green);
        }

        .top-navbar .right-icons .icon-btn .badge {
            position: absolute;
            top: -6px;
            right: -8px;
            background: #EF4444;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 50%;
        }

        /* ===== DROPDOWN PROFIL ===== */
        .top-navbar .profile-dropdown .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            color: #1E293B;
            font-family: 'Poppins', sans-serif;
        }

        .top-navbar .profile-dropdown .dropdown-toggle img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #E2E8F0;
        }

        .top-navbar .profile-dropdown .dropdown-toggle .name {
            font-size: 14px;
            font-weight: 500;
        }

        .top-navbar .profile-dropdown .dropdown-menu {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.10);
            padding: 8px 0;
            min-width: 180px;
        }

        .top-navbar .profile-dropdown .dropdown-menu .dropdown-item {
            font-size: 14px;
            padding: 8px 20px;
            color: #1E293B;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-navbar .profile-dropdown .dropdown-menu .dropdown-item:hover {
            background: #F1F5F9;
        }

        .top-navbar .profile-dropdown .dropdown-menu .dropdown-item.text-danger {
            color: #EF4444;
        }

        .top-navbar .profile-dropdown .dropdown-menu .dropdown-item.text-danger:hover {
            background: #FEF2F2;
        }

        .top-navbar .profile-dropdown .dropdown-menu .dropdown-divider {
            margin: 6px 0;
            border-color: #E2E8F0;
        }

        /* ============================================================
                   CONTENT AREA
                   ============================================================ */
        .content-area {
            padding: 30px;
        }

        /* ============================================================
                   STAT CARDS
                   ============================================================ */
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            border: 1px solid #F1F5F9;
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.06);
        }

        .stat-card .stat-icon {
            font-size: 28px;
            color: var(--primary-green);
            background: #F0FDF4;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .stat-card .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #1E293B;
        }

        .stat-card .stat-label {
            font-size: 14px;
            color: #64748B;
            font-weight: 500;
        }

        .stat-card .stat-change {
            font-size: 13px;
            font-weight: 500;
        }

        .stat-card .stat-change.up {
            color: var(--primary-green);
        }

        .stat-card .stat-change.down {
            color: #EF4444;
        }

        /* ============================================================
                   TABLE
                   ============================================================ */
        .table-container {
            background: white;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            border: 1px solid #F1F5F9;
            margin-top: 25px;
        }

        .table-container .table-title {
            font-size: 18px;
            font-weight: 600;
            color: #1E293B;
            margin-bottom: 16px;
        }

        .table-container .table {
            margin-bottom: 0;
        }

        .table-container .table thead th {
            background: #F8FAFC;
            color: #475569;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px;
            border-bottom: 2px solid #E2E8F0;
        }

        .table-container .table tbody td {
            padding: 12px 16px;
            font-size: 14px;
            color: #1E293B;
            vertical-align: middle;
        }

        .table-container .table tbody td .badge-status {
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .table-container .table tbody td .badge-status.active {
            background: #D1FAE5;
            color: #065F46;
        }

        .table-container .table tbody td .badge-status.archived {
            background: #FEE2E2;
            color: #991B1B;
        }

        .table-container .table tbody td .action-btns {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .table-container .table tbody td .action-btns .btn-sm {
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 6px;
        }

        /* ============================================================
                   ACTIVITY LOG
                   ============================================================ */
        .activity-log {
            background: white;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            border: 1px solid #F1F5F9;
            margin-top: 25px;
        }

        .activity-log .activity-title {
            font-size: 18px;
            font-weight: 600;
            color: #1E293B;
            margin-bottom: 16px;
        }

        .activity-log .activity-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid #F1F5F9;
        }

        .activity-log .activity-item:last-child {
            border-bottom: none;
        }

        .activity-log .activity-item .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #475569;
            font-size: 16px;
            flex-shrink: 0;
        }

        .activity-log .activity-item .info {
            flex: 1;
        }

        .activity-log .activity-item .info .name {
            font-weight: 500;
            color: #1E293B;
            font-size: 14px;
        }

        .activity-log .activity-item .info .desc {
            font-size: 13px;
            color: #64748B;
        }

        .activity-log .activity-item .time {
            font-size: 12px;
            color: #94A3B8;
        }

        /* ============================================================
                   WELCOME
                   ============================================================ */
        .welcome {
            font-size: 28px;
            font-weight: 700;
            color: #1E293B;
            margin-bottom: 25px;
        }

        .welcome span {
            color: var(--primary-green);
        }

        /* ============================================================
                   FOOTER
                   ============================================================ */
        .admin-footer {
            background: white;
            padding: 16px 30px;
            border-top: 1px solid #E2E8F0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 30px;
        }

        .admin-footer .copyright {
            font-size: 14px;
            color: #64748B;
        }

        .admin-footer .copyright strong {
            color: #1E293B;
        }

        .admin-footer .public-link a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .admin-footer .public-link a:hover {
            text-decoration: underline;
        }

        /* ============================================================
                   RESPONSIVE
                   ============================================================ */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .top-navbar .search-box {
                max-width: 200px;
            }

            .welcome {
                font-size: 22px;
            }

            .stat-card .stat-number {
                font-size: 22px;
            }
        }

        @media (max-width: 576px) {
            .top-navbar {
                padding: 10px 16px;
                flex-wrap: wrap;
                gap: 8px;
            }

            .top-navbar .search-box {
                max-width: 100%;
                order: 3;
                flex-basis: 100%;
            }

            .top-navbar .profile-dropdown .dropdown-toggle .name {
                display: none;
            }

            .content-area {
                padding: 16px;
            }

            .welcome {
                font-size: 18px;
            }

            .stat-card .stat-number {
                font-size: 18px;
            }

            .admin-footer {
                flex-direction: column;
                text-align: center;
                padding: 12px 16px;
            }

            .table-container {
                padding: 12px 12px;
                overflow-x: auto;
            }

            .table-container .table {
                font-size: 12px;
            }

            .table-container .table thead th,
            .table-container .table tbody td {
                padding: 8px 10px;
            }

            .table-container .table tbody td .action-btns .btn-sm {
                padding: 2px 8px;
                font-size: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- ============================================================
    SIDEBAR
    ============================================================ -->
    <div class="sidebar" id="sidebar">
        <!-- Logo -->
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <div class="logo-text">MyModul <span>Admin</span></div>
        </div>

        <!-- Nav Menu -->
        <div class="nav-menu">
            <nav class="nav flex-column">

                <!-- Dashboard -->
                <div class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </div>

                <!-- Modul (dengan submenu) -->
                <div class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.modul.*') ? 'active' : '' }}" data-bs-toggle="collapse" href="#modulSub" role="button" aria-expanded="{{ request()->routeIs('admin.modul.*') ? 'true' : 'false' }}">
                        <i class="fas fa-file-alt"></i> Modul
                        <i class="fas fa-chevron-down ms-auto" style="font-size: 10px;"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.modul.*') ? 'show' : '' }}" id="modulSub">
                        <div class="nav-sub">
                            <a class="nav-link {{ request()->routeIs('admin.modul.index') ? 'active' : '' }}" href="{{ route('admin.modul.index') }}">
                                <i class="fas fa-list"></i> Semua Modul
                            </a>
                            <a class="nav-link {{ request()->routeIs('admin.modul.create') ? 'active' : '' }}" href="{{ route('admin.modul.create') }}">
                                <i class="fas fa-plus-circle"></i> Tambah Modul
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Kategori (UI only) -->
                <div class="nav-item">
                    <a class="nav-link" href="#" onclick="alert('Fitur sedang dalam pengembangan.')">
                        <i class="fas fa-folder"></i> Kategori
                    </a>
                </div>

                <!-- Manajemen User (UI only) -->
                <div class="nav-item">
                    <a class="nav-link" href="#" onclick="alert('Fitur sedang dalam pengembangan.')">
                        <i class="fas fa-users"></i> Manajemen User
                    </a>
                </div>

                <!-- Pengaturan Sistem (UI only) -->
                <div class="nav-item">
                    <a class="nav-link" href="#" onclick="alert('Fitur sedang dalam pengembangan.')">
                        <i class="fas fa-cog"></i> Pengaturan Sistem
                    </a>
                </div>

            </nav>
        </div>

        <!-- ===== LOGOUT DI SIDEBAR BAWAH ===== -->
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="nav-link w-100 text-start" style="background: none; border: none; color: #EF4444; width: 100%; padding: 10px 20px; border-radius: 8px; margin: 0 8px; display: flex; align-items: center; gap: 12px; font-size: 14px; font-weight: 500; transition: all 0.3s ease;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- ============================================================
    MAIN CONTENT
    ============================================================ -->
    <div class="main-content">

        <!-- Top Navbar -->
        <div class="top-navbar">
            <!-- Search Box -->
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search..." aria-label="Search">
            </div>

            <!-- Right Icons + Profile Dropdown -->
            <div class="right-icons">
                <button class="icon-btn" onclick="alert('Pengaturan')">
                    <i class="fas fa-cog"></i>
                </button>
                <button class="icon-btn" onclick="alert('Notifikasi')">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </button>

                <!-- Profile Dropdown -->
                <div class="dropdown profile-dropdown">
                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/profil.jpg') }}" alt="Profile" onerror="this.style.display='none'">
                        <span class="name">{{ Auth::user()->name ?? 'Admin' }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#" onclick="alert('Profil')"><i class="fas fa-user-circle"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#" onclick="alert('Pengaturan Akun')"><i class="fas fa-cog"></i> Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            @yield('content')
        </div>

        <!-- ===== FOOTER ===== -->
        <div class="admin-footer">
            <div class="copyright">
                © 2026 <strong>MyModul Admin</strong> | Secure Dashboard | All rights reserved.
            </div>
            <div class="public-link">
                <a href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-external-link-alt me-1"></i> Lihat Situs Publik
                </a>
            </div>
        </div>

    </div>

    <!-- ============================================================
    SCRIPTS
    ============================================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>