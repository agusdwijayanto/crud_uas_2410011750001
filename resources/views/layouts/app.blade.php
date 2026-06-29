<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyModul - @yield('title')</title>

    <!-- Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
            background: #ffffff;
            color: #1E293B;
        }

        /* ============================================================
                   WARNA UTAMA
                   ============================================================ */
        :root {
            --primary-green: #22C55E;
            --primary-green-dark: #16A34A;
            --primary-green-light: #86EFAC;
            --primary-blue: #3B82F6;
            --primary-purple: #8B5CF6;
        }

        /* ============================================================
                   NAVBAR
                   ============================================================ */
        .navbar-custom {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 16px 0;
        }

        .logo-text {
            font-size: 26px;
            font-weight: 800;
            text-decoration: none;
        }
        .logo-text .my {
            color: var(--primary-green);
        }
        .logo-text .modul {
            color: #1E293B;
        }

        .logo-icon {
            font-size: 28px;
            color: var(--primary-green);
            margin-right: 8px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            font-size: 15px;
            color: #475569;
            padding: 8px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: var(--primary-green);
            background: #F0FDF4;
        }
        .navbar-nav .nav-link.active {
            color: white;
            background: var(--primary-green);
        }

        /* ============================================================
                   HERO SECTION
                   ============================================================ */
        .hero-section {
            background: linear-gradient(135deg, #EEF2FF 0%, #E0E7FF 30%, #F3E8FF 70%, #FCE7F3 100%);
            padding: 80px 0 60px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.2;
            color: #1E293B;
        }
        .hero-title span {
            color: var(--primary-green);
        }

        .hero-subtitle {
            font-size: 18px;
            color: #475569;
            margin-top: 16px;
            max-width: 500px;
        }

        .hero-image {
            max-width: 100%;
            height: auto;
        }

        /* ============================================================
                   SEARCH BOX
                   ============================================================ */
        .search-box {
            margin-top: 30px;
        }
        .search-box .form-control {
            border-radius: 12px 0 0 12px;
            padding: 14px 20px;
            border: 2px solid #E2E8F0;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }
        .search-box .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.15);
        }

        .search-box .btn-search {
            border-radius: 0 12px 12px 0;
            padding: 14px 28px;
            background: var(--primary-green);
            color: white;
            font-weight: 600;
            border: none;
            font-family: 'Poppins', sans-serif;
        }
        .search-box .btn-search:hover {
            background: var(--primary-green-dark);
        }

        /* ============================================================
                   MODUL CARDS
                   ============================================================ */
        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: #1E293B;
        }
        .section-title span {
            color: var(--primary-green);
        }

        .modul-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            height: 100%;
            overflow: hidden;
        }
        .modul-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.10);
        }

        .modul-card .card-img-top {
            height: 180px;
            object-fit: cover;
            background: #F1F5F9;
        }

        .modul-card .card-body {
            padding: 20px;
        }

        .modul-card .card-title {
            font-weight: 700;
            font-size: 18px;
            color: #1E293B;
        }

        .modul-card .card-text {
            font-size: 14px;
            color: #64748B;
            margin-bottom: 4px;
        }
        .modul-card .card-text strong {
            color: #334155;
        }

        .modul-card .badge-jenjang {
            background: #F0FDF4;
            color: var(--primary-green);
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .modul-card .btn-detail {
            background: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 6px 18px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .modul-card .btn-detail:hover {
            background: #2563EB;
            color: white;
        }

        .modul-card .btn-download {
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 6px 18px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .modul-card .btn-download:hover {
            background: var(--primary-green-dark);
            color: white;
        }

        /* ============================================================
                   FOOTER
                   ============================================================ */
        .footer-custom {
            background: #1E293B;
            color: #94A3B8;
            padding: 30px 0;
            margin-top: 60px;
        }

        .footer-custom .footer-brand {
            font-size: 22px;
            font-weight: 700;
            color: white;
        }
        .footer-custom .footer-brand .my {
            color: var(--primary-green);
        }
        .footer-custom .footer-brand .modul {
            color: white;
        }

        .footer-custom a {
            color: #94A3B8;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-custom a:hover {
            color: var(--primary-green);
        }

        .footer-custom .social-icons a {
            display: inline-block;
            margin: 0 8px;
            font-size: 20px;
            color: #64748B;
            transition: color 0.3s ease;
        }
        .footer-custom .social-icons a:hover {
            color: var(--primary-green);
        }

        /* ============================================================
                   FILTER CHECKBOX
                   ============================================================ */
        .form-check-input.filter-checkbox {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            border: 2px solid #CBD5E1;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .form-check-input.filter-checkbox:checked {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        .form-check-input.filter-checkbox:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.15);
        }

        .form-check-label {
            cursor: pointer;
        }
        .form-check-label:hover {
            color: var(--primary-green) !important;
        }

        /* ============================================================
                   RESPONSIVE
                   ============================================================ */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 34px;
            }
            .hero-section {
                padding: 50px 0 40px 0;
                text-align: center;
            }
            .hero-subtitle {
                margin: 12px auto;
            }

            .search-box .form-control {
                border-radius: 12px;
            }
            .search-box .btn-search {
                border-radius: 12px;
                width: 100%;
                margin-top: 10px;
            }

            .hero-image {
                margin-top: 30px;
                max-width: 70%;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 26px;
            }
            .hero-section {
                padding: 30px 0;
            }

            .modul-card .card-img-top {
                height: 140px;
            }

            .section-title {
                font-size: 22px;
            }

            .logo-text {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <!-- ============================================================
    NAVBAR
    ============================================================ -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand logo-text" href="/">
                <i class="fas fa-book-open logo-icon"></i>
                <span class="my">My</span><span class="modul">Modul</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('publik.modul.*') ? 'active' : '' }}" href="/modul">Modul</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ============================================================
    KONTEN UTAMA
    ============================================================ -->
    @yield('content')

    <!-- ============================================================
    FOOTER
    ============================================================ -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row align-items-center">

                <!-- Kiri: Logo & Slogan -->
                <div class="col-md-4 text-center text-md-start">
                    <div class="footer-brand">
                        <span class="my">My</span><span class="modul">Modul</span>
                    </div>
                    <p class="mt-2 mb-0" style="font-size: 14px; color: #64748B;">
                        Berbagi Ilmu, Membangun Generasi Digital
                    </p>
                </div>

                <!-- Tengah: Copyright -->
                <div class="col-md-4 text-center">
                    <p class="mb-0" style="font-size: 14px;">
                        © 2026 MyModul | Created by <strong style="color: white;">Agus Dwijayanto</strong>
                    </p>
                    <p style="font-size: 13px; color: #64748B; margin-top: 4px;">
                        All rights reserved
                    </p>
                </div>

                <!-- Kanan: Social Media -->
                <div class="col-md-4 text-center text-md-end social-icons">
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>

            </div>
        </div>
    </footer>

    <!-- ============================================================
    SCRIPTS
    ============================================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>
</html>