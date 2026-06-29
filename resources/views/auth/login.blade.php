<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyModul - Admin Login</title>

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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #D1FAE5 0%, #DBEAFE 50%, #E0E7FF 100%);
            padding: 20px;
        }

        /* ============================================================
                   CARD LOGIN
                   ============================================================ */
        .login-card {
            width: 100%;
            max-width: 440px;
            background: white;
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.10);
            position: relative;
        }

        .login-card .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .login-card .logo i {
            font-size: 36px;
            color: #22C55E;
            background: #F0FDF4;
            padding: 10px;
            border-radius: 14px;
        }

        .login-card .logo-text {
            font-size: 24px;
            font-weight: 700;
            color: #1E293B;
        }

        .login-card .logo-text span {
            color: #22C55E;
        }

        .login-card h2 {
            font-size: 26px;
            font-weight: 700;
            color: #1E293B;
            text-align: center;
            margin-bottom: 6px;
        }

        .login-card .subtitle {
            text-align: center;
            color: #64748B;
            font-size: 14px;
            margin-bottom: 28px;
        }

        /* ===== INPUT GROUP ===== */
        .input-group-custom {
            position: relative;
            margin-bottom: 18px;
        }

        .input-group-custom .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 16px;
            z-index: 4;
        }

        .input-group-custom .form-control {
            padding: 14px 16px 14px 44px;
            border-radius: 12px;
            border: 2px solid #E2E8F0;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #F8FAFC;
        }

        .input-group-custom .form-control:focus {
            border-color: #22C55E;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.10);
            background: white;
        }

        .input-group-custom .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            cursor: pointer;
            font-size: 16px;
            z-index: 4;
            background: none;
            border: none;
        }

        .input-group-custom .toggle-password:hover {
            color: #475569;
        }

        /* ===== REMEMBER ME ===== */
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #22C55E;
            border-radius: 4px;
            cursor: pointer;
        }

        .remember-me label {
            font-size: 14px;
            color: #475569;
            cursor: pointer;
            margin-bottom: 0;
        }

        /* ===== TOMBOL ===== */
        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: #22C55E;
            color: white;
            font-weight: 600;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            margin-bottom: 14px;
        }

        .btn-login:hover {
            background: #16A34A;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.25);
        }

        /* ===== LUPA PASSWORD ===== */
        .forgot-link {
            text-align: right;
        }

        .forgot-link a {
            color: #94A3B8;
            font-size: 13px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-link a:hover {
            color: #22C55E;
        }

        /* ===== ERROR ALERT ===== */
        .alert-custom {
            border-radius: 12px;
            border-left: 4px solid #EF4444;
            background: #FEF2F2;
            color: #991B1B;
            font-size: 14px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }

        /* ============================================================
                   FOOTER
                   ============================================================ */
        .footer-login {
            position: fixed;
            bottom: 20px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 13px;
            color: #94A3B8;
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        .footer-login strong {
            color: #64748B;
        }

        /* ============================================================
                   RESPONSIVE
                   ============================================================ */
        @media (max-width: 576px) {
            .login-card {
                padding: 28px 20px;
            }
            .login-card h2 {
                font-size: 22px;
            }
            .login-card .logo-text {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- ===== CARD LOGIN ===== -->
    <div class="login-card">

        <!-- Logo -->
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <div class="logo-text">MyModul <span>Admin</span></div>
        </div>

        <!-- Judul -->
        <h2>Admin Portal Access</h2>
        <p class="subtitle"></p>

        <!-- Error Alert -->
        @if ($errors->any())
            <div class="alert-custom">
                <i class="fas fa-exclamation-circle me-2"></i> {{ $errors->first() }}
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <!-- Email / Username -->
            <div class="input-group-custom">
                <span class="input-icon"><i class="fas fa-user"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email Anda" value="{{ old('email') }}" required autofocus>
            </div>

            <!-- Password -->
            <div class="input-group-custom">
                <span class="input-icon"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password Anda" required>
                <button type="button" class="toggle-password" id="togglePassword">
                    <i class="fas fa-eye-slash"></i>
                </button>
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Ingat Saya</label>
            </div>

            <!-- Tombol Login -->
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i> Login
            </button>

            <!-- Lupa Password -->
            <div class="forgot-link">
                <a href="#">Lupa Password?</a>
            </div>

        </form>
    </div>

    <!-- ===== FOOTER ===== -->
    <div class="footer-login">
        © 2026 MyModul Admin | <strong>Secure Access</strong> | All rights reserved.
    </div>

    <!-- ===== SCRIPTS ===== -->
    <script>
        // Toggle Password Visibility
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    </script>

</body>
</html>