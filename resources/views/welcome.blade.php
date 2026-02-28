<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hanglekiu Dental — Selamat Datang</title>
    <meta name="description" content="Hanglekiu Dental — Klinik gigi terpercaya. Login atau daftar untuk mengakses layanan kami.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface font-sans text-dark m-0 min-h-screen flex flex-col">

    {{-- Decorative background --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-primary/10 blur-3xl"></div>
        <div class="absolute -bottom-48 -left-48 w-[600px] h-[600px] rounded-full bg-light/60 blur-3xl"></div>
    </div>

    {{-- Navbar --}}
    <nav class="w-full px-6 md:px-10 py-5 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <div class="w-10 h-10 rounded-xl bg-darkest flex items-center justify-center text-lg">
                🦷
            </div>
            <span class="text-xl font-bold text-darkest tracking-tight">Hanglekiu Dental</span>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="flex-1 flex items-center justify-center px-6 pb-16">
        <div class="w-full max-w-lg text-center">
            {{-- Hero --}}
            <div class="mb-10">
                <div class="inline-flex items-center gap-2 bg-light/80 text-darkest text-xs font-semibold px-4 py-2 rounded-full mb-6 backdrop-blur-sm border border-primary/20">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Klinik Gigi Terpercaya
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-darkest leading-tight mb-4">
                    Senyum Sehat,<br>
                    <span class="text-primary">Hidup Bahagia</span>
                </h1>
                <p class="text-dark/70 text-base md:text-lg max-w-md mx-auto leading-relaxed">
                    Masuk ke akun Anda atau daftar untuk memulai perjalanan perawatan gigi bersama kami.
                </p>
            </div>

            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Login Card --}}
                <a href="{{ route('login') }}" id="login-card"
                   class="group relative bg-white/70 backdrop-blur-md border border-light rounded-2xl p-7 text-left transition-all duration-300 hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-1 hover:border-primary/40 no-underline">
                    <div class="w-12 h-12 rounded-xl bg-darkest flex items-center justify-center mb-5 transition-transform duration-300 group-hover:scale-110">
                        <svg class="w-6 h-6 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-darkest mb-1.5">Login</h2>
                    <p class="text-sm text-dark/60 mb-5 leading-relaxed">Masuk ke akun yang sudah ada untuk mengakses layanan.</p>
                    <div class="flex items-center gap-2 text-primary text-sm font-semibold transition-all duration-300 group-hover:gap-3">
                        Masuk Sekarang
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </a>

                {{-- Register Card --}}
                <a href="{{ route('register') }}" id="register-card"
                   class="group relative bg-darkest text-light rounded-2xl p-7 text-left transition-all duration-300 hover:shadow-xl hover:shadow-darkest/30 hover:-translate-y-1 no-underline">
                    <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center mb-5 transition-transform duration-300 group-hover:scale-110">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-light mb-1.5">Register</h2>
                    <p class="text-sm text-light/60 mb-5 leading-relaxed">Buat akun baru untuk mulai menggunakan layanan kami.</p>
                    <div class="flex items-center gap-2 text-primary text-sm font-semibold transition-all duration-300 group-hover:gap-3">
                        Daftar Gratis
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="pb-6 text-center">
        <p class="text-xs text-dark/40">&copy; {{ date('Y') }} Hanglekiu Dental. All rights reserved.</p>
    </footer>

</body>
</html>
