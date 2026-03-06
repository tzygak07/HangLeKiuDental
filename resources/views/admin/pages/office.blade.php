@extends('admin.layout.admin')
@section('title', 'Office')

@section('navbar')
    @include('admin.components.navbar', ['title' => 'Office'])
@endsection

@section('content')

@php
    $menuItems = [
        'dashboard-harian'    => 'Dashboard Harian',
        'keuangan'            => 'Keuangan',
        'laporan'             => 'Laporan',
        'pasien'              => 'Pasien',
        'akun'                => 'Akun',
        'fraud-detection'     => 'Fraud Detection',
        'warning'             => 'Warning',
        'merge-rekam-medis'   => 'Merge Rekam Medis',
    ];
    $active = request('menu', 'dashboard-harian');
    $activeTab = request('tab', 'kunjungan');
@endphp

<style>
    .ofc-container, .ofc-container * {
        font-family: 'Instrument Sans', sans-serif;
        font-size: 13px;
        box-sizing: border-box;
    }
    .ofc-page-title    { font-size: 18.75px; font-weight: 700; color: #582C0C; margin: 0 0 4px; line-height: 1.2; }
    .ofc-page-subtitle { font-size: 13px; color: #C58F59; margin: 0; }
    .ofc-section-title { font-size: 18.75px; font-weight: 700; color: #582C0C; margin: 0; }
    .ofc-stat-number   { font-size: 30px; font-weight: 700; line-height: 1; margin: 6px 0 4px; }
    .ofc-container { padding: 0 24px 40px 24px; }

    /* ── HEADER ── */
    .ofc-header {
        padding: 22px 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }
    .ofc-btn-export {
        background: #582C0C; color: #fff;
        border: none; padding: 9px 18px;
        border-radius: 6px; font-size: 13px; font-weight: 600;
        cursor: pointer; display: inline-flex; align-items: center; gap: 7px;
        font-family: inherit; transition: background .2s; white-space: nowrap;
    }
    .ofc-btn-export:hover { background: #401f08; }

    /* ── BODY ── */
    .ofc-body { display: flex; gap: 20px; align-items: flex-start; }
    .ofc-content { flex: 1; min-width: 0; display: flex; flex-direction: column; gap: 28px; }

    /* ── SIDEBAR ── */
    .ofc-sidebar {
        width: 210px; flex-shrink: 0;
        background: #fff;
        border: 1px solid #E5D6C5;
        border-radius: 8px; overflow: hidden;
    }
    .ofc-menu-item {
        display: block; padding: 12px 18px;
        font-size: 13px; color: #6B513E;
        text-decoration: none;
        border-bottom: 1px solid #E5D6C5;
        transition: background .15s;
    }
    .ofc-menu-item:last-child { border-bottom: none; }
    .ofc-menu-item:hover  { background: rgba(197,143,89,.05); }
    .ofc-menu-item.active { background: #C58F59; color: #fff; font-weight: 600; }

    /* ── SECTION LABEL ── */
    .ofc-section-header {
        display: flex; justify-content: space-between; align-items: center;
        margin-bottom: 14px;
    }

    /* ── RINGKASAN CARDS ── */
    .ofc-stat-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }
    .ofc-stat-card {
        background: #fff;
        border: 1px solid #E5D6C5;
        border-radius: 8px;
        padding: 16px 18px;
        box-shadow: 0 1px 3px rgba(88,44,12,.05);
    }
    .ofc-stat-card-top {
        display: flex; justify-content: space-between; align-items: flex-start;
    }
    .ofc-stat-label { font-size: 13px; color: #6B513E; margin: 0; }
    .ofc-stat-icon {
        width: 36px; height: 36px; border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .ofc-stat-icon.blue   { background: #EFF6FF; color: #3B82F6; }
    .ofc-stat-icon.green  { background: #ECFDF5; color: #10B981; }
    .ofc-stat-icon.orange { background: #FFF7ED; color: #F97316; }
    .ofc-stat-icon.purple { background: #F5F3FF; color: #8B5CF6; }
    .ofc-stat-number.green  { color: #10B981; }
    .ofc-stat-number.orange { color: #F97316; }
    .ofc-stat-number.purple { color: #8B5CF6; }
    .ofc-stat-number.default { color: #582C0C; }
    .ofc-stat-change { font-size: 13px; color: #6B513E; display: flex; align-items: center; gap: 4px; }
    .ofc-stat-change.down { color: #9CA3AF; }

    /* ── DETAIL OPERASIONAL ── */
    .ofc-card {
        background: #fff;
        border: 1px solid #E5D6C5;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(88,44,12,.05);
        overflow: hidden;
    }
    .ofc-tabs {
        display: flex; gap: 8px;
        padding: 16px 20px;
        border-bottom: 1px solid #E5D6C5;
        flex-wrap: wrap;
    }
    .ofc-tab {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 8px 18px; border-radius: 6px;
        font-size: 13px; font-weight: 600; cursor: pointer;
        border: none; font-family: inherit;
        transition: all .15s; text-decoration: none;
    }
    .ofc-tab.active   { background: #C58F59; color: #fff; }
    .ofc-tab.inactive { background: #F3EDE6; color: #6B513E; }
    .ofc-tab.inactive:hover { background: #E5D6C5; color: #582C0C; }

    /* detail body */
    .ofc-detail-body {
        display: flex; gap: 0;
    }
    .ofc-filter-col {
        width: 180px; flex-shrink: 0;
        border-right: 1px solid #E5D6C5;
        padding: 16px 0;
    }
    .ofc-filter-item {
        padding: 10px 18px;
        font-size: 13px; color: #6B513E;
        cursor: pointer; border-bottom: 1px solid #F3EDE6;
        transition: background .15s;
    }
    .ofc-filter-item:last-child { border-bottom: none; }
    .ofc-filter-item:hover { background: rgba(197,143,89,.05); }
    .ofc-filter-item.active { background: #fdf8f4; color: #582C0C; font-weight: 600; border-left: 3px solid #C58F59; }

    .ofc-chart-area {
        flex: 1;
        display: flex; flex-direction: column;
        align-items: center; justify-content: center;
        padding: 40px 20px;
        min-height: 220px;
    }
    .ofc-empty-icon {
        width: 52px; height: 52px; margin-bottom: 12px; opacity: .5;
    }
    .ofc-empty-title { font-size: 13px; font-weight: 600; color: #6B513E; margin: 0 0 4px; }
    .ofc-empty-sub   { font-size: 13px; color: #b09a88; margin: 0; }

    /* ── BREAKDOWN KEUANGAN ── */
    .ofc-breakdown-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }
    .ofc-breakdown-card {
        background: #fff;
        border: 1px solid #E5D6C5;
        border-radius: 8px;
        padding: 18px 20px;
        box-shadow: 0 1px 3px rgba(88,44,12,.05);
    }
    .ofc-breakdown-heading {
        display: flex; align-items: center; gap: 8px;
        font-size: 13px; font-weight: 700; color: #582C0C;
        margin: 0 0 14px;
    }
    .ofc-breakdown-row {
        display: flex; justify-content: space-between; align-items: center;
        padding: 9px 0;
        border-bottom: 1px solid #F3EDE6;
        font-size: 13px;
    }
    .ofc-breakdown-row:last-child { border-bottom: none; padding-bottom: 0; }
    .ofc-breakdown-row-label {
        display: flex; align-items: center; gap: 8px; color: #6B513E;
    }
    .ofc-breakdown-row-label svg { color: #C58F59; flex-shrink: 0; }
    .ofc-breakdown-row-amount { font-weight: 600; color: #582C0C; }

    /* ── LABA/RUGI ── */
    .ofc-labarugi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }
    .ofc-labarugi-card {
        border-radius: 8px;
        padding: 22px 20px;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        text-align: center; gap: 6px;
    }
    .ofc-labarugi-card.masuk  { background: #ECFDF5; border: 1px solid #A7F3D0; }
    .ofc-labarugi-card.keluar { background: #FEF2F2; border: 1px solid #FECACA; }
    .ofc-labarugi-card.saldo  { background: #EFF6FF; border: 1px solid #BFDBFE; }
    .ofc-labarugi-label { font-size: 13px; color: #6B513E; margin: 0; }
    .ofc-labarugi-amount { font-size: 30px; font-weight: 700; margin: 0; }
    .ofc-labarugi-card.masuk  .ofc-labarugi-amount { color: #10B981; }
    .ofc-labarugi-card.keluar .ofc-labarugi-amount { color: #EF4444; }
    .ofc-labarugi-card.saldo  .ofc-labarugi-amount { color: #3B82F6; }
    .ofc-labarugi-sub { font-size: 13px; color: #9CA3AF; margin: 0; }
</style>

<div class="ofc-container">

    {{-- Header --}}
    <div class="ofc-header">
        <div>
            <h1 class="ofc-page-title">Office</h1>
            <p class="ofc-page-subtitle">hanglekiu dental specialist</p>
        </div>
    </div>

    <div class="ofc-body">

        {{-- Sidebar --}}
        <div class="ofc-sidebar">
            @foreach ($menuItems as $key => $label)
                <a href="?menu={{ $key }}" class="ofc-menu-item {{ $active === $key ? 'active' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        {{-- Content --}}
        <div class="ofc-content">

            {{-- ═══ RINGKASAN HARIAN ═══ --}}
            <div>
                <div class="ofc-section-header">
                    <h2 class="ofc-section-title">Ringkasan Harian</h2>
                    <button class="ofc-btn-export">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                        Export PDF
                    </button>
                </div>

                <div class="ofc-stat-grid">
                    {{-- Appointment --}}
                    <div class="ofc-stat-card">
                        <div class="ofc-stat-card-top">
                            <p class="ofc-stat-label">Appointment Hari Ini</p>
                            <div class="ofc-stat-icon blue">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                        </div>
                        <p class="ofc-stat-number default">12</p>
                        <p class="ofc-stat-change">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
                            <span style="color:#10B981;">+2</span> dari kemarin
                        </p>
                    </div>

                    {{-- Total Omzet --}}
                    <div class="ofc-stat-card">
                        <div class="ofc-stat-card-top">
                            <p class="ofc-stat-label">Total Omzet</p>
                            <div class="ofc-stat-icon green">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                            </div>
                        </div>
                        <p class="ofc-stat-number green">Rp 4,2 jt</p>
                        <p class="ofc-stat-change">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
                            <span style="color:#10B981;">+12.5%</span> dari kemarin
                        </p>
                    </div>

                    {{-- Total Pengeluaran --}}
                    <div class="ofc-stat-card">
                        <div class="ofc-stat-card-top">
                            <p class="ofc-stat-label">Total Pengeluaran</p>
                            <div class="ofc-stat-icon orange">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
                            </div>
                        </div>
                        <p class="ofc-stat-number orange">Rp 1,8 jt</p>
                        <p class="ofc-stat-change down">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#9CA3AF" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                            0.0% dari kemarin
                        </p>
                    </div>

                    {{-- Saldo Harian --}}
                    <div class="ofc-stat-card">
                        <div class="ofc-stat-card-top">
                            <p class="ofc-stat-label">Saldo Harian</p>
                            <div class="ofc-stat-icon purple">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                            </div>
                        </div>
                        <p class="ofc-stat-number purple">Rp 2,4 jt</p>
                        <p class="ofc-stat-change">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
                            <span style="color:#10B981;">+8.3%</span> dari kemarin
                        </p>
                    </div>
                </div>
            </div>

            {{-- ═══ DETAIL OPERASIONAL ═══ --}}
            <div>
                <h2 class="ofc-section-title" style="margin-bottom:14px;">Detail Operasional</h2>

                <div class="ofc-card">
                    {{-- Tabs --}}
                    <div class="ofc-tabs">
                        <a href="?menu={{ $active }}&tab=kunjungan" class="ofc-tab {{ $activeTab === 'kunjungan' ? 'active' : 'inactive' }}">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            Kunjungan
                        </a>
                        <a href="?menu={{ $active }}&tab=prosedur" class="ofc-tab {{ $activeTab === 'prosedur' ? 'active' : 'inactive' }}">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                            Prosedur
                        </a>
                        <a href="?menu={{ $active }}&tab=resep" class="ofc-tab {{ $activeTab === 'resep' ? 'active' : 'inactive' }}">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21l18 0"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"/><path d="M10 9l4 0"/><path d="M12 7l0 4"/></svg>
                            Resep
                        </a>
                        <a href="?menu={{ $active }}&tab=kasir" class="ofc-tab {{ $activeTab === 'kasir' ? 'active' : 'inactive' }}">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                            Kasir
                        </a>
                    </div>

                    {{-- Body --}}
                    <div class="ofc-detail-body">
                        {{-- Filter col --}}
                        <div class="ofc-filter-col">
                            @if ($activeTab === 'kunjungan')
                                <div class="ofc-filter-item active">Status Kunjungan</div>
                                <div class="ofc-filter-item">Tipe Kunjungan</div>
                                <div class="ofc-filter-item">Tipe Pasien</div>
                                <div class="ofc-filter-item">Jenis Pasien</div>
                            @elseif ($activeTab === 'prosedur')
                                <div class="ofc-filter-item active">Semua Prosedur</div>
                                <div class="ofc-filter-item">Per Dokter</div>
                                <div class="ofc-filter-item">Per Kategori</div>
                            @elseif ($activeTab === 'resep')
                                <div class="ofc-filter-item active">Semua Resep</div>
                                <div class="ofc-filter-item">Per Dokter</div>
                                <div class="ofc-filter-item">Per Obat</div>
                            @else
                                <div class="ofc-filter-item active">Semua Transaksi</div>
                                <div class="ofc-filter-item">Per Metode</div>
                                <div class="ofc-filter-item">Per Dokter</div>
                            @endif
                        </div>

                        {{-- Chart / empty --}}
                        <div class="ofc-chart-area">
                            <svg class="ofc-empty-icon" viewBox="0 0 64 64" fill="none">
                                <rect x="4"  y="32" width="12" height="28" rx="2" fill="#C58F59" opacity=".4"/>
                                <rect x="20" y="20" width="12" height="40" rx="2" fill="#C58F59" opacity=".6"/>
                                <rect x="36" y="12" width="12" height="48" rx="2" fill="#C58F59" opacity=".8"/>
                                <rect x="52" y="24" width="12" height="36" rx="2" fill="#C58F59"/>
                            </svg>
                            <p class="ofc-empty-title">Data Tidak Ditemukan</p>
                            <p class="ofc-empty-sub">Tidak ada data untuk ditampilkan</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══ BREAKDOWN KEUANGAN ═══ --}}
            <div>
                <h2 class="ofc-section-title" style="margin-bottom:14px;">Breakdown Keuangan</h2>

                <div class="ofc-breakdown-grid">

                    {{-- Uang Masuk --}}
                    <div class="ofc-breakdown-card">
                        <p class="ofc-breakdown-heading">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
                            Uang Masuk
                        </p>
                        <div class="ofc-breakdown-row">
                            <span class="ofc-breakdown-row-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                Pasien Umum
                            </span>
                            <span class="ofc-breakdown-row-amount">Rp 3.200.000</span>
                        </div>
                        <div class="ofc-breakdown-row">
                            <span class="ofc-breakdown-row-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21l18 0"/><path d="M5 21v-16a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"/></svg>
                                Return Obat dan BHP
                            </span>
                            <span class="ofc-breakdown-row-amount">Rp 150.000</span>
                        </div>
                    </div>

                    {{-- Uang Keluar --}}
                    <div class="ofc-breakdown-card">
                        <p class="ofc-breakdown-heading">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#EF4444" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                            Uang Keluar
                        </p>
                        <div class="ofc-breakdown-row">
                            <span class="ofc-breakdown-row-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                Gaji & Komisi
                            </span>
                            <span class="ofc-breakdown-row-amount">Rp 1.200.000</span>
                        </div>
                        <div class="ofc-breakdown-row">
                            <span class="ofc-breakdown-row-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21l18 0"/><path d="M5 21v-16a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"/></svg>
                                Restock Obat dan BHP
                            </span>
                            <span class="ofc-breakdown-row-amount">Rp 640.000</span>
                        </div>
                    </div>

                    {{-- Piutang & Hutang --}}
                    <div class="ofc-breakdown-card">
                        <p class="ofc-breakdown-heading">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C58F59" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-4 0v2M12 12v4M10 14h4"/></svg>
                            Piutang & Hutang
                        </p>
                        <div class="ofc-breakdown-row">
                            <span class="ofc-breakdown-row-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
                                Piutang
                            </span>
                            <span class="ofc-breakdown-row-amount" style="color:#10B981;">Rp 1.800.000</span>
                        </div>
                        <div class="ofc-breakdown-row">
                            <span class="ofc-breakdown-row-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#EF4444" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                                Hutang
                            </span>
                            <span class="ofc-breakdown-row-amount" style="color:#EF4444;">Rp 4.200.000</span>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ═══ RINGKASAN LABA/RUGI HARIAN ═══ --}}
            <div>
                <h2 class="ofc-section-title" style="margin-bottom:14px; display:flex; align-items:center; gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#C58F59" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                    Ringkasan Laba/Rugi Harian
                </h2>

                <div class="ofc-labarugi-grid">
                    <div class="ofc-labarugi-card masuk">
                        <p class="ofc-labarugi-label">Total Masuk</p>
                        <p class="ofc-labarugi-amount">Rp 3,35 jt</p>
                    </div>
                    <div class="ofc-labarugi-card keluar">
                        <p class="ofc-labarugi-label">Total Keluar</p>
                        <p class="ofc-labarugi-amount">Rp 1,84 jt</p>
                    </div>
                    <div class="ofc-labarugi-card saldo">
                        <p class="ofc-labarugi-label">Saldo Akhir</p>
                        <p class="ofc-labarugi-amount">Rp 1,51 jt</p>
                        <p class="ofc-labarugi-sub">+45% profit margin</p>
                    </div>
                </div>
            </div>

        </div>{{-- .ofc-content --}}
    </div>{{-- .ofc-body --}}
</div>{{-- .ofc-container --}}

@endsection