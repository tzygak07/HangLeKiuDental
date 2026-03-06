{{--
    Component: apt-sidebar
    Usage: @include('admin.components.apt-sidebar', ['activeMenu' => 'obat', 'queueCount' => 0, 'queueDone' => 0])
--}}

@php
    $menus = [
        'antrian'  => 'Antrian Hari Ini',
        'obat'     => 'Obat',
        'peng-obat'=> 'Penggunaan Obat',
        'kdl-obat' => 'Kedaluwarsa Obat',
        'bhp'      => 'Bahan Habis Pakai',
        'peng-bhp' => 'Penggunaan BHP',
        'kdl-bhp'  => 'Kedaluwarsa Bahan Habis Pakai',
        'resep'    => 'Resep Obat',
        'restock'  => 'Restock / Return',
        'depot'    => 'Depot',
        'pesanan'  => 'Pesanan & Stok Masuk',
    ];
    $queueCount      = $queueCount      ?? 0;
    $queueDone       = $queueDone       ?? 0;
    $hasStockWarning = $hasStockWarning ?? false;
    $progress        = $queueCount > 0 ? round(($queueDone / $queueCount) * 100) : 0;
@endphp

<div class="apt-sidebar-wrapper">

    {{-- Menu --}}
    <div class="apt-sidebar">
        <ul class="apt-menu">
            @foreach ($menus as $key => $label)
                <li class="apt-menu-item {{ ($activeMenu ?? '') === $key ? 'active' : '' }}">
                    {{ $label }}
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Stat Card --}}
    <div class="apt-stat-card">
        <div class="apt-stat-header">
            <span class="apt-stat-number">{{ $queueCount }}</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#A38C7A" stroke-width="1.8">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>
        <p class="apt-stat-title">Total Antrian Hari Ini</p>
        <p class="apt-stat-subtitle">{{ $queueDone }} sudah ditangani</p>
        <div class="apt-progress-bar">
            <div class="apt-progress-fill" style="width: {{ $progress }}%"></div>
        </div>
    </div>

    {{-- Alert Card --}}
    <div class="apt-alert-card">
        <div class="apt-alert-header">
            <span class="apt-alert-title">Peringatan Stok</span>
            <svg width="15" height="15" viewBox="0 0 24 24" fill="#EF4444">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                <line x1="12" y1="9" x2="12" y2="13" stroke="white" stroke-width="2" stroke-linecap="round"/>
                <line x1="12" y1="17" x2="12.01" y2="17" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <a href="#" class="apt-alert-link">Restock</a>
    </div>

</div>

<style>
/* ─── SIDEBAR WRAPPER ─── */
.apt-sidebar-wrapper {
    width: 240px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
    font-family: 'Instrument Sans', sans-serif;
    font-size: 13px;
}

/* ─── MENU LIST ─── */
.apt-sidebar {
    background: white;
    border: 1px solid #E5D6C5;
    border-radius: 8px;
    overflow: hidden;
}

.apt-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.apt-menu-item {
    padding: 11px 20px;
    font-size: 13px;
    font-weight: 400;
    color: #6B513E;
    border-bottom: 1px solid #E5D6C5;
    cursor: pointer;
    transition: background 0.15s;
    line-height: 1.4;
}

.apt-menu-item:last-child {
    border-bottom: none;
}

.apt-menu-item:hover:not(.active) {
    background: rgba(197, 143, 89, 0.06);
}

.apt-menu-item.active {
    background: #C58F59;
    color: white;
    font-weight: 600;
}

/* ─── STAT CARD ─── */
.apt-stat-card {
    background: white;
    border: 1px solid #E5D6C5;
    border-radius: 8px;
    padding: 16px;
}

.apt-stat-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 8px;
}

.apt-stat-number {
    font-size: 30px;
    font-weight: 700;
    color: #582C0C;
    line-height: 1;
}

.apt-stat-title {
    font-size: 13px;
    font-weight: 600;
    color: #582C0C;
    margin: 0 0 4px 0;
}

.apt-stat-subtitle {
    font-size: 13px;
    color: #10B981;
    margin: 0 0 12px 0;
}

.apt-progress-bar {
    height: 10px;
    background: #E5D6C5;
    border-radius: 5px;
    overflow: hidden;
}

.apt-progress-fill {
    height: 100%;
    background: #C58F59;
    border-radius: 5px;
    transition: width 0.3s ease;
}

/* ─── ALERT CARD ─── */
.apt-alert-card {
    background: white;
    border: 1px solid #E5D6C5;
    border-radius: 8px;
    overflow: hidden;
}

.apt-alert-header {
    background: #FEF2F2;
    padding: 11px 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #FEE2E2;
}

.apt-alert-title {
    font-size: 13px;
    font-weight: 600;
    color: #582C0C;
}

.apt-alert-link {
    display: block;
    padding: 11px 16px;
    font-size: 13px;
    color: #C58F59;
    text-decoration: none;
    font-weight: 500;
}

.apt-alert-link:hover {
    text-decoration: underline;
}
</style>
