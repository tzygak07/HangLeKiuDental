@extends('layouts.admin')
@section('title', 'Apotek')

@section('navbar')
    @include('components.navbar', ['title' => 'Apotek'])
@endsection

@section('content')
<div class="apt-container">
    {{-- Page Header --}}
    <div class="apt-header">
        <div class="apt-title-area">
            <h1 class="apt-title">Apotek</h1>
            <p class="apt-subtitle">hanglekiu dental specialist</p>
        </div>
        
        {{-- Navigasi Tanggal & Refresh --}}
        <div class="apt-header-actions">
            <div class="apt-date-nav">
                <button class="apt-icon-btn"><i class="fas fa-chevron-left"></i></button>
                <div class="apt-date-text">
                    <span class="apt-date-day">Rabu</span>
                    <span class="apt-date-full">25 Februari 2026</span>
                </div>
                <button class="apt-icon-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
            
            <button class="apt-icon-btn apt-refresh-btn" title="Refresh">
                <x-fluentui-arrow-sync-24-o style="width: 20px; height: 20px; color: currentColor;" />
            </button>
        </div>
    </div>

    {{-- Layout Utama (Sidebar + Konten) --}}
    <div class="apt-layout">
        
        {{-- Sidebar Kiri --}}
        <div class="apt-sidebar-wrapper">
            {{-- Menu Navigasi Apotek --}}
            <div class="apt-sidebar">
                <ul class="apt-menu">
                    <li class="apt-menu-item">Antrian Hari Ini</li>
                    <li class="apt-menu-item active">Obat</li>
                    <li class="apt-menu-item">Penggunaan Obat</li>
                    <li class="apt-menu-item">Kedaluwarsa Obat</li>
                    <li class="apt-menu-item">Bahan Habis Pakai</li>
                    <li class="apt-menu-item">Penggunaan BHP</li>
                    <li class="apt-menu-item">Kedaluwarsa Bahan Habis Pakai</li>
                    <li class="apt-menu-item">Resep Obat</li>
                    <li class="apt-menu-item">Restock / Return</li>
                    <li class="apt-menu-item">Depot</li>
                    <li class="apt-menu-item">Pesanan & Stok Masuk</li>
                </ul>
            </div>

            {{-- Card Statistik Antrian --}}
            <div class="apt-stat-card">
                <div class="apt-stat-header">
                    <span class="apt-stat-number">0</span>
                    <i class="fas fa-users apt-stat-icon"></i>
                </div>
                <p class="apt-stat-title">Total Antrian Hari Ini</p>
                <p class="apt-stat-subtitle">0 sudah ditangani</p>
                <div class="apt-progress-bar">
                    <div class="apt-progress-fill" style="width: 0%;"></div>
                </div>
            </div>

            {{-- Card Peringatan Stok --}}
            <div class="apt-alert-card">
                <div class="apt-alert-header">
                    <span class="apt-alert-title">Peringatan Stok</span>
                    <i class="fas fa-exclamation-triangle apt-alert-icon"></i>
                </div>
                <a href="#" class="apt-alert-link">Restock</a>
            </div>
        </div>

        {{-- Konten Utama Kanan (Tabel Obat) --}}
        <div class="apt-main">
            <div class="apt-card">
                
                {{-- Bagian Atas Tabel (Judul, Pencarian, & Tombol) --}}
                <div class="apt-card-header">
                    <div class="apt-card-title-area">
                        <h2 class="apt-card-title">Data Stok Obat</h2>
                        <p class="apt-card-subtitle">Last Update</p>
                    </div>
                    
                    <div class="apt-card-actions">
                        {{-- Search Box --}}
                        <div class="apt-search-box">
                            <input type="text" placeholder="Cari kode, nama obat atau kategori">
                            <i class="fas fa-search"></i>
                        </div>
                        
                        {{-- Action Buttons --}}
                        <button class="apt-btn-primary">
                            <i class="fas fa-plus"></i> Tambah Data Obat
                        </button>
                        <div class="apt-dropdown">
                            <button class="apt-btn-secondary">
                                Export Excel <i class="fas fa-chevron-down" style="margin-left: 6px;"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Wrapper Tabel --}}
                <div class="apt-table-wrapper">
                    <table class="apt-table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Obat</th>
                                <th>Farmasi</th>
                                <th>Jenis</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga Umum <i class="fas fa-info-circle apt-info-icon"></i></th>
                                <th>Harga Beli <i class="fas fa-info-circle apt-info-icon"></i></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Kondisi Kosong --}}
                            <tr>
                                <td colspan="9" class="apt-empty-state">
                                    Tidak ada data obat yang bisa ditampilkan.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Pagination / Footer Tabel --}}
                <div class="apt-pagination">
                    <div class="apt-page-size">
                        <span>Jumlah baris per halaman:</span>
                        <select>
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                    </div>
                    <div class="apt-page-info">
                        0-0 dari 0 data
                    </div>
                    <div class="apt-page-controls">
                        <button class="apt-page-btn" disabled><i class="fas fa-chevron-left"></i></button>
                        <button class="apt-page-btn" disabled><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .apt-container {
        padding: 0 16px 24px 16px;
        font-family: 'Instrument Sans', sans-serif;
    }

    .apt-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 24px;
    }

    .apt-title {
        font-size: 24px;
        font-weight: 700;
        color: #582C0C;
        margin: 0;
    }

    .apt-subtitle {
        font-size: 14px;
        color: #C58F59;
        margin: 4px 0 0 0;
    }

    .apt-header-actions {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .apt-date-nav {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .apt-date-text {
        display: flex;
        flex-direction: column;
        align-items: center;
        line-height: 1.2;
    }

    .apt-date-day {
        font-size: 14px;
        font-weight: 700;
        color: #C58F59;
    }

    .apt-date-full {
        font-size: 18px;
        font-weight: 700;
        color: #582C0C;
    }

    .apt-icon-btn {
        background: none;
        border: none;
        color: #C58F59;
        cursor: pointer;
        font-size: 16px;
        padding: 4px;
        transition: color 0.2s;
    }

    .apt-icon-btn:hover {
        color: #582C0C;
    }

    .apt-refresh-btn {
        border: 1px solid #E5D6C5;
        border-radius: 6px;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
    }

    .apt-refresh-btn:hover {
        background: rgba(197, 143, 89, 0.05);
        border-color: #C58F59;
    }

    .apt-layout {
        display: flex;
        gap: 24px;
        align-items: flex-start;
    }

    .apt-sidebar-wrapper {
        width: 240px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

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
        padding: 14px 20px;
        font-size: 14px;
        color: #6B513E;
        border-bottom: 1px solid #E5D6C5;
        cursor: pointer;
        transition: background 0.2s;
    }

    .apt-menu-item:last-child {
        border-bottom: none;
    }

    .apt-menu-item:hover {
        background: rgba(197, 143, 89, 0.05);
    }

    .apt-menu-item.active {
        background-color: #C58F59;
        color: white;
        font-weight: 600;
    }

    .apt-stat-card {
        background: white;
        border: 1px solid #E5D6C5;
        border-radius: 8px;
        padding: 16px;
        text-align: center;
    }

    .apt-stat-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
    }

    .apt-stat-number {
        font-size: 28px;
        font-weight: 700;
        color: #582C0C;
        line-height: 1;
    }

    .apt-stat-icon {
        color: #A38C7A;
        font-size: 18px;
    }

    .apt-stat-title {
        font-size: 13px;
        color: #582C0C;
        font-weight: 600;
        margin: 0 0 4px 0;
    }

    .apt-stat-subtitle {
        font-size: 12px;
        color: #10B981;
        margin: 0 0 12px 0;
    }

    .apt-progress-bar {
        height: 12px;
        background: #E5D6C5;
        border-radius: 6px;
        overflow: hidden;
    }

    .apt-progress-fill {
        height: 100%;
        background: #C58F59;
    }

    .apt-alert-card {
        background: white;
        border: 1px solid #E5D6C5;
        border-radius: 8px;
        overflow: hidden;
    }

    .apt-alert-header {
        background: #FEF2F2;
        padding: 12px 16px;
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

    .apt-alert-icon {
        color: #EF4444; 
    }

    .apt-alert-link {
        display: block;
        padding: 12px 16px;
        font-size: 13px;
        color: #C58F59;
        text-decoration: none;
        font-weight: 500;
    }

    .apt-alert-link:hover {
        text-decoration: underline;
    }


    .apt-main {
        flex: 1;
        min-width: 0;
    }

    .apt-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(88, 44, 12, 0.08);
        border: 1px solid #E5D6C5;
    }

    .apt-card-header {
        padding: 20px 24px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        flex-wrap: wrap;
        gap: 16px;
    }

    .apt-card-title {
        font-size: 18px;
        font-weight: 700;
        color: #C58F59; 
        margin: 0 0 8px 0;
    }

    .apt-card-subtitle {
        font-size: 12px;
        color: #6B513E;
        margin: 0;
    }

    .apt-card-actions {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }

    .apt-search-box {
        display: flex;
        align-items: center;
        border: 1px solid #C58F59;
        border-radius: 4px;
        padding: 8px 12px;
        width: 280px;
    }

    .apt-search-box input {
        border: none;
        outline: none;
        font-size: 13px;
        width: 100%;
        color: #582C0C;
    }

    .apt-search-box i {
        color: #582C0C;
    }

    .apt-btn-primary {
        background-color: #C58F59;
        color: white;
        border: none;
        padding: 9px 16px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s;
    }

    .apt-btn-primary:hover {
        background-color: #b07d4a;
    }

    .apt-btn-secondary {
        background-color: #582C0C;
        color: white;
        border: none;
        padding: 9px 16px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: background 0.2s;
    }

    .apt-btn-secondary:hover {
        background-color: #401f08;
    }

    .apt-table-wrapper {
        width: 100%;
        overflow-x: auto;
        padding-bottom: 8px;
        margin-top: 12px;
    }

    .apt-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }
    .apt-table-wrapper::-webkit-scrollbar-track {
        background: #F9FAFB;
        border-radius: 4px;
    }
    .apt-table-wrapper::-webkit-scrollbar-thumb {
        background: #D1D5DB;
        border-radius: 4px;
    }
    .apt-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: #C58F59;
    }

    .apt-table {
        width: 100%;
        min-width: 1000px;
        border-collapse: collapse;
        text-align: left;
    }

    .apt-table th {
        background-color: #FDF8F4;
        color: #582C0C;
        font-size: 13px;
        font-weight: 600;
        padding: 14px 20px;
        border-top: 1px solid #E5D6C5;
        border-bottom: 2px solid #E5D6C5;
        white-space: nowrap;
    }

    .apt-info-icon {
        color: #9CA3AF;
        margin-left: 4px;
        font-size: 12px;
        cursor: help;
    }

    .apt-table td {
        padding: 14px 20px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #E5E7EB;
        white-space: nowrap;
    }

    .apt-empty-state {
        text-align: center;
        padding: 32px !important;
        color: #6B7280 !important;
        background-color: #FAFAF9;
    }

    /* Pagination */
    .apt-pagination {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 16px 24px;
        gap: 24px;
        font-size: 13px;
        color: #6B7280;
    }

    .apt-page-size select {
        border: none;
        outline: none;
        font-weight: 600;
        color: #582C0C;
        margin-left: 8px;
        cursor: pointer;
    }

    .apt-page-controls {
        display: flex;
        gap: 8px;
    }

    .apt-page-btn {
        background: none;
        border: none;
        color: #9CA3AF;
        cursor: pointer;
    }

    .apt-page-btn:not([disabled]):hover {
        color: #582C0C;
    }

    @media (max-width: 1100px) {
        .apt-layout {
            flex-direction: column;
        }
        .apt-sidebar-wrapper {
            width: 100%;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .apt-sidebar {
            flex: 1;
            min-width: 240px;
        }
        .apt-stat-card, .apt-alert-card {
            flex: 1;
            min-width: 200px;
        }
    }
</style>
@endsection