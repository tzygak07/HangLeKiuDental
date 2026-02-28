<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register — Hanglekiu Dental Clinic</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #F7F7F7;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(88, 44, 12, 0.08);
            width: 400px;
        }

        .logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: #582C0C;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            color: #582C0C;
            line-height: 1.2;
        }

        .form-group {
            margin-bottom: 22px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 14px 0;
            border: none;
            border-bottom: 2px solid #E5D6C5;
            font-size: 15px;
            font-family: 'Instrument Sans', sans-serif;
            color: #582C0C;
            background: transparent;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-group input::placeholder {
            color: #C58F59;
            opacity: 0.6;
        }

        .form-group input:focus {
            border-bottom-color: #C58F59;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #C58F59 0%, #6B513E 100%);
            color: #F7F7F7;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Instrument Sans', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        .btn:hover {
            background: linear-gradient(135deg, #b07d4a 0%, #582C0C 100%);
            box-shadow: 0 6px 20px rgba(197, 143, 89, 0.35);
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .muted {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6B513E;
        }

        .muted a {
            color: #C58F59;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .muted a:hover {
            color: #582C0C;
        }

        .error {
            background-color: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            font-size: 13px;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error div {
            margin: 0;
        }

        .version {
            text-align: right;
            margin-top: 24px;
            font-size: 12px;
            color: #E5D6C5;
        }

        /* Responsive */
        @media (max-width: 992px) {
            body { padding: 20px; }
            .card { width: 100%; max-width: 420px; }
        }

        @media (max-width: 480px) {
            .card { padding: 28px 22px; }
            .logo-text { font-size: 18px; }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <div class="logo-container">
                <div class="logo-icon">🦷</div>
                <span class="logo-text">Hanglekiu<br>Dental Clinic</span>
            </div>
        </div>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password (min 8)" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn" id="register-button">Daftar</button>
        </form>

        <div class="muted">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </div>

        <div class="version">V.1.0.0</div>
    </div>
</body>
</html>
