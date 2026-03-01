{{-- Admin Layout --}}
{{-- Wraps all admin pages with sidebar + content area --}}
{{-- Usage: @extends('layouts.admin') / @section('title', 'Page Title') / @section('content') --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — Hanglekiu Dental</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #F7F7F7;
            color: #582C0C;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 72px;
            height: 100vh;
            background: #582C0C;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 16px 0;
            z-index: 80;
            transition: width 0.3s ease;
            overflow: hidden;
        }

        .sidebar:hover {
            width: 220px;
        }

        .sidebar-logo {
            margin-bottom: 24px;
            width: 72px;
            display: flex;
            justify-content: center;
            flex-shrink: 0;
        }

        .sidebar-logo a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            transition: background 0.2s;
        }

        .sidebar-logo a:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .sidebar-logo img {
            width: 28px;
            height: auto;
            filter: brightness(0) invert(1);
        }

        /* Nav items */
        .sidebar-nav {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
            width: 100%;
            padding: 0 12px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            background: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #F7F7F7;
        }

        .sidebar-item.active {
            background: rgba(197, 143, 89, 0.25);
            color: #C58F59;
        }

        .sidebar-item svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }

        .sidebar-label {
            opacity: 0;
            transition: opacity 0.2s ease 0.1s;
        }

        .sidebar:hover .sidebar-label {
            opacity: 1;
        }

        /* Bottom section */
        .sidebar-bottom {
            width: 100%;
            padding: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 8px;
        }

        .sidebar-bottom form {
            width: 100%;
        }

        .sidebar-bottom .sidebar-item {
            color: rgba(255, 255, 255, 0.4);
        }

        .sidebar-bottom .sidebar-item:hover {
            color: #ff9b9b;
            background: rgba(255, 100, 100, 0.1);
        }

        /* ===== MAIN CONTENT ===== */
        .admin-content {
            margin-left: 72px;
            min-height: 100vh;
            padding: 28px 32px;
            transition: margin-left 0.3s ease;
        }

        /* Top bar */
        .admin-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .admin-topbar h1 {
            font-size: 24px;
            font-weight: 700;
            color: #582C0C;
        }

        .admin-topbar .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-topbar .user-info span {
            font-size: 14px;
            color: #6B513E;
            font-weight: 500;
        }

        .admin-topbar .avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #C58F59;
            color: #F7F7F7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        /* Cards */
        .admin-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 1px 3px rgba(88, 44, 12, 0.06);
        }

        /* ===== MOBILE ELEMENTS (hidden on desktop) ===== */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 16px;
            left: 16px;
            z-index: 60;
            width: 44px;
            height: 44px;
            background: #582C0C;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(88, 44, 12, 0.2);
            transition: all 0.2s;
        }

        .sidebar-toggle:hover {
            background: #6B513E;
        }

        .sidebar-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(88, 44, 12, 0.4);
            z-index: 45;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .sidebar-backdrop.show {
            opacity: 1;
        }

        .sidebar-close {
            display: none;
            position: absolute;
            top: 12px;
            right: 12px;
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
        }

        .sidebar-close:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        body.sidebar-open {
            overflow: hidden;
        }

        /* ===== RESPONSIVE: Tablet ===== */
        @media (max-width: 1024px) {
            .admin-content {
                padding: 24px 20px;
            }
        }

        /* ===== RESPONSIVE: Mobile ===== */
        @media (max-width: 768px) {
            /* Hamburger button */
            .sidebar-toggle {
                display: flex;
            }

            /* Backdrop */
            .sidebar-backdrop {
                display: block;
                pointer-events: none;
            }

            .sidebar-backdrop.show {
                pointer-events: auto;
            }

            /* Sidebar: hidden off-screen, slides in */
            .sidebar {
                width: 260px !important;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar:hover {
                width: 260px !important;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            /* Always show labels on mobile sidebar */
            .sidebar.open .sidebar-label {
                opacity: 1 !important;
            }

            /* Close button */
            .sidebar-close {
                display: flex;
            }

            /* Content full width */
            .admin-content {
                margin-left: 0 !important;
                padding: 72px 16px 24px 16px;
            }

            /* Topbar adjustments */
            .admin-topbar h1 {
                font-size: 20px;
            }

            .admin-topbar .user-info span {
                display: none;
            }
        }
    </style>
</head>
<body>
    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Main Content --}}
    <main class="admin-content">
        {{-- Navbar: included per-page via @section('navbar') --}}
        @hasSection('navbar')
            @yield('navbar')
        @else
            <div class="admin-topbar">
                <h1>@yield('title', 'Dashboard')</h1>
                <div class="user-info">
                    <span>{{ Auth::user()->name }}</span>
                    <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
