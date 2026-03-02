{{-- Sidebar Component --}}
@php
    $menuItems = [
        [
            'route' => 'admin.dashboard',
            'filled' => false,
            'icon'  => '<path d="M4 6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2l0 -1"/><path d="M4 15a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2l0 -3"/><path d="M14 6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2l0 -12"/>',
        ],
        [
            'route' => 'admin.outpatient',
            'filled' => true,
            'icon'  => '<path d="M16 2c.183 0 .355 .05 .502 .135l.033 .02c.28 .177 .465 .49 .465 .845v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 .514 -.874l.093 -.046l.066 -.025l.1 -.029l.107 -.019l.12 -.007q .083 0 .161 .013l.122 .029l.04 .012l.06 .023c.328 .135 .568 .44 .61 .806l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z"/><path d="M9.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1"/><path d="M13.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1"/><path d="M17.02 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1"/><path d="M12.02 15a1 1 0 0 1 0 2a1.001 1.001 0 1 1 -.005 -2z"/><path d="M9.015 16a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1"/>',
        ],
        [
            'route' => 'admin.registration',
            'filled' => false,
            'icon'  => '<path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/><path d="M7 15a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2l0 -4"/>',
        ],
        [
            'route' => 'admin.emr',
            'filled' => false,
            'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/>',
        ],
        [
            'route' => 'admin.pharmacy',
            'filled' => false,
            'icon'  => '<path d="M3 21l18 0"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"/><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"/><path d="M10 9l4 0"/><path d="M12 7l0 4"/>',
        ],
        [
            'route' => 'admin.messages',
            'filled' => false,
            'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>',
        ],
    ];
@endphp

<aside class="sidebar">
    {{-- Logo Container --}}
    <div class="sidebar-logo">
        <img src="/images/logo-hds.png" alt="HDS">
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">
        @foreach ($menuItems as $item)
            <a href="{{ route($item['route']) }}"
                class="sidebar-item {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                @if ($item['filled'] ?? false)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        {!! $item['icon'] !!}
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        {!! $item['icon'] !!}
                    </svg>
                @endif
            </a>
        @endforeach
    </nav>

    {{-- Logout at bottom --}}
    <div class="sidebar-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sidebar-item logout-btn" title="Logout">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
            </button>
        </form>
    </div>
</aside>

<style>
    .sidebar {
        width: 72px;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        background-color: var(--font-color-primary, #582C0C); 
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 100;
        padding: 24px 0;
    }

    .sidebar-logo {
        width: 44px;
        height: 44px;
        background-color: var(--color-background-primary, #F7F7F7);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 32px;
        position: relative;
        z-index: 2;
    }


    .sidebar-logo img {
        width: 40px;
        height: auto;
        filter: sepia(1) saturate(3) hue-rotate(345deg) brightness(0.5);
    }

    .sidebar-nav {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 12px;
        width: 100%;
        align-items: center;
        overflow-y: auto;
        overflow-x: hidden;
    }
    
    .sidebar-nav::-webkit-scrollbar { display: none; }
    .sidebar-nav { -ms-overflow-style: none; scrollbar-width: none; }

    .sidebar-item {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        color: var(--color-background-primary, #F7F7F7); 
        background-color: transparent;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        flex-shrink: 0; 
    }

    .sidebar-item svg {
        width: 24px;
        height: 24px;
    }

    .sidebar .sidebar-item:hover,
    .sidebar .sidebar-item:focus-visible {
        background-color: rgba(229, 214, 197, 0.5) !important;
        color: var(--font-color-primary, #582C0C) !important;
    }

    .sidebar .sidebar-item:active,
    .sidebar .sidebar-item.active {
        background-color: var(--color-background-secondary, #E5D6C5) !important;
        color: var(--font-color-primary, #582C0C) !important;
    }

    .sidebar-bottom {
        width: 100%;
        display: flex;
        justify-content: center;
        padding-top: 24px;
    }

    .logout-btn {
        color: var(--color-warning, #EF4444); 
    }

    .sidebar .logout-btn:hover,
    .sidebar .logout-btn:active,
    .sidebar .logout-btn:focus-visible {
        background-color: var(--color-background-secondary, #E5D6C5) !important;
        color: var(--color-warning, #EF4444) !important;
    }
</style>