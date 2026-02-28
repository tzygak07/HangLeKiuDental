<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — Hanglekiu Dental Clinic</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Instrument Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('/images/bg-clinic.png') center/cover no-repeat fixed;
            padding: 20px;
        }

        /* Card container */
        .login-card {
            display: flex;
            width: 100%;
            max-width: 900px;
            background: #F7F7F7;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(88, 44, 12, 0.3);
        }

        /* Left side — dentist photo */
        .card-left {
            flex: 0 0 380px;
            position: relative;
            overflow: hidden;
        }

        .card-left img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Right side — form */
        .card-right {
            flex: 1;
            padding: 48px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Logo */
        .logo {
            margin-bottom: 8px;
        }

        .logo img {
            height: 48px;
            width: auto;
        }

        /* Tagline */
        .tagline {
            font-size: 14px;
            color: #6B513E;
            margin-bottom: 32px;
            line-height: 1.5;
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #582C0C;
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #E5D6C5;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Instrument Sans', sans-serif;
            color: #582C0C;
            background: white;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input::placeholder {
            color: #C58F59;
            opacity: 0.5;
        }

        .form-group input:focus {
            border-color: #C58F59;
            box-shadow: 0 0 0 3px rgba(197, 143, 89, 0.15);
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #C58F59;
            padding: 4px;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #582C0C;
        }

        .password-toggle svg {
            width: 20px;
            height: 20px;
        }

        .forgot-link {
            text-align: right;
            margin-top: 6px;
            margin-bottom: 8px;
        }

        .forgot-link a {
            font-size: 13px;
            color: #C58F59;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-link a:hover {
            color: #582C0C;
        }

        /* Login button */
        .login-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #C58F59 0%, #6B513E 100%);
            color: #F7F7F7;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Instrument Sans', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 6px;
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #b07d4a 0%, #582C0C 100%);
            box-shadow: 0 6px 20px rgba(197, 143, 89, 0.35);
            transform: translateY(-1px);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        /* Divider */
        .divider {
            text-align: center;
            margin: 18px 0;
            font-size: 13px;
            color: #6B513E;
            opacity: 0.6;
        }

        /* Google button */
        .google-btn {
            width: 100%;
            padding: 12px;
            background: white;
            border: 1.5px solid #E5D6C5;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Instrument Sans', sans-serif;
            color: #582C0C;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .google-btn:hover {
            border-color: #C58F59;
            background: rgba(197, 143, 89, 0.05);
            box-shadow: 0 2px 8px rgba(197, 143, 89, 0.15);
        }

        .google-btn svg {
            width: 20px;
            height: 20px;
        }

        /* Register link */
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6B513E;
        }

        .register-link a {
            color: #C58F59;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .register-link a:hover {
            color: #582C0C;
        }

        /* Error */
        .alert-danger {
            background-color: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            font-size: 13px;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-danger p { margin: 0; }

        /* Responsive */
        @media (max-width: 768px) {
            .card-left {
                display: none;
            }

            .login-card {
                max-width: 440px;
            }

            .card-right {
                padding: 36px 28px;
            }
        }

        @media (max-width: 480px) {
            .card-right {
                padding: 28px 22px;
            }

            .logo img {
                height: 38px;
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <!-- Left Side — Dentist Photo -->
        <div class="card-left">
            <img src="/images/dentist.png" alt="Dokter Gigi Hanglekiu Dental">
        </div>

        <!-- Right Side — Login Form -->
        <div class="card-right">
            <div class="logo">
                <img src="/images/logo-hds.png" alt="HDS Logo">
            </div>

            <p class="tagline">Wujudkan Senyum Impian Anda Bersama Tim Spesialis Kami</p>

            @if($errors->any())
                <div class="alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="Email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="email"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password"
                            required
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <svg id="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    <div class="forgot-link">
                        <a href="#">Lupa Kata Sandi</a>
                    </div>
                </div>

                <button type="submit" class="login-btn" id="login-button">Masuk</button>
            </form>

            <div class="divider">Atau</div>

            <button type="button" class="google-btn" onclick="alert('Fitur Google Login akan segera hadir!')">
                <svg viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 01-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Masuk dengan Google
            </button>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                    <line x1="1" y1="1" x2="23" y2="23"/>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                `;
            }
        }
    </script>
</body>
</html>
