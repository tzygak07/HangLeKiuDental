@extends('layouts.admin')
@section('title', 'Registration')

@section('navbar')
    @include('components.navbarPendaftaranBaru', ['title' => 'Registration'])
@endsection

@section('content')
<div class="reg-container">
    {{-- Page Header --}}
    <div class="reg-header">
        <div class="reg-title-area">
            <h1 class="reg-title">Registration</h1>
            <p class="reg-subtitle">hanglekiu dental specialist</p>
        </div>
    </div>

    <div class="reg-layout">
        <div class="reg-sidebar">
            <ul class="reg-menu">
                <li class="reg-menu-item active">Rawat Jalan Poli</li>
                <li class="reg-menu-item">AntriCepat</li>
                <li class="reg-menu-item">Gawat Darurat</li>
                <li class="reg-menu-item">Kunjungan Sehat</li>
                <li class="reg-menu-item">Promotif Preventif</li>
                <li class="reg-menu-item">Kegiatan Kelompok</li>
                <li class="reg-menu-item">Antrian Awal</li>
                <li class="reg-menu-item">Screen Antrian</li>
            </ul>
        </div>

        {{-- Konten Utama Kanan --}}
        <div class="reg-main">
            <div class="reg-card">
                
                <div class="reg-card-header">
                    <h2 class="reg-card-title">
                        Rawat Jalan Poli <i class="fas fa-desktop" style="color: #C58F59; margin-left: 8px;"></i>
                    </h2>
                    <div class="reg-card-actions">
                        <button class="reg-icon-btn" title="Informasi"><i class="fas fa-info-circle"></i></button>
                        <button class="reg-btn-outline">EXPORT</button>
                        <button class="reg-icon-btn" title="Print">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; color: currentColor;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18.25 7.034V3.375" /></svg>
                        </button>
                    </div>
                </div>

                {{-- Filter Pencarian --}}
                <div class="reg-filters">
                    <div class="reg-filter-row">
                        <div class="reg-input-group" style="flex: 1;">
                            <label>Tanggal Kunjungan</label>
                            <div class="reg-date-wrapper">
                                <input type="date" class="reg-input" value="2026-02-25">
                                <button class="reg-btn-icon-small"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="reg-input-group" style="flex: 1.5;">
                            <label>Poli *</label>
                            <select class="reg-input">
                                <option>Semua Poli</option>
                            </select>
                        </div>
                    </div>

                    <div class="reg-filter-row">
                        <div class="reg-input-group">
                            <label>Tenaga Medis *</label>
                            <select class="reg-input">
                                <option>Semua Tenaga Medis</option>
                            </select>
                        </div>
                        <div class="reg-input-group">
                            <label>Metode Pembayaran *</label>
                            <select class="reg-input">
                                <option>Semua Metode Pembayaran</option>
                            </select>
                        </div>
                        <div class="reg-input-group" style="flex: 1.5; justify-content: flex-end;">
                            <div class="reg-search-box">
                                <input type="text" placeholder="Nama Pasien, Nomor MR">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Wrapper Tabel --}}
                <div class="reg-table-wrapper">
                    <table class="reg-table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Tanggal<br>Kunjungan</th>
                                <th>Tanggal<br>Dibuat</th>
                                <th>No</th>
                                <th>Poli</th>
                                <th>Nama Pasien</th>
                                <th>Rencana<br>Tindakan</th>
                                <th>Dokter Pemeriksa</th>
                                <th>Metode Bayar</th>
                                <th>Catatan Medis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="reg-status succeed">Succeed</span></td>
                                <td>25/02/2026,<br>13:00</td>
                                <td>25/02/2026,<br>19:32</td>
                                <td>1</td>
                                <td>Gigi</td>
                                <td>Bpk Johndoe,<br>MR000096,<br>40 Tahun</td>
                                <td>-</td>
                                <td>drg. Hanglekiu</td>
                                <td>Asuransi</td>
                                <td>Pembersihan Karang Gigi</td>
                                <td><button class="reg-btn-outline" style="padding: 4px 8px; font-size: 11px;">Detail</button></td>
                            </tr>
                            {{-- Tambahkan baris tr lainnya di sini --}}
                        </tbody>
                    </table>
                </div>

                <div class="reg-pagination">
                    <div class="reg-page-size">
                        <span>Jumlah baris perhalaman:</span>
                        <select>
                            <option>8</option>
                            <option>15</option>
                            <option>50</option>
                        </select>
                    </div>
                    <div class="reg-page-info">
                        1-1 Dari 1 Data
                    </div>
                    <div class="reg-page-controls">
                        <button class="reg-page-btn" disabled><i class="fas fa-chevron-left"></i></button>
                        <button class="reg-page-btn" disabled><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    /* ===== REGISTRATION PAGE - BROWN THEME ===== */
    .reg-container {
        padding: 0 16px 24px 16px;
        font-family: 'Instrument Sans', sans-serif;
    }

    /* Header */
    .reg-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 24px;
    }

    .reg-title {
        font-size: 24px;
        font-weight: 700;
        color: #582C0C;
        margin: 0;
    }

    .reg-subtitle {
        font-size: 14px;
        color: #C58F59;
        margin: 4px 0 0 0;
    }

    .reg-btn-warning {
        background-color: #F59E0B; /* Warna oranye/kuning dari gambar */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 4px rgba(245, 158, 11, 0.2);
    }

    /* Layout */
    .reg-layout {
        display: flex;
        gap: 24px;
        align-items: flex-start;
    }

    /* Sidebar Kiri */
    .reg-sidebar {
        width: 240px;
        flex-shrink: 0;
        background: white;
        border: 1px solid #E5D6C5;
        border-radius: 8px;
        overflow: hidden;
    }

    .reg-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .reg-menu-item {
        padding: 14px 20px;
        font-size: 14px;
        color: #6B513E;
        border-bottom: 1px solid #E5D6C5;
        cursor: pointer;
        transition: background 0.2s;
    }

    .reg-menu-item:last-child {
        border-bottom: none;
    }

    .reg-menu-item:hover {
        background: rgba(197, 143, 89, 0.05);
    }

    /* Active Menu diganti ke warna cokelat tema */
    .reg-menu-item.active {
        background-color: #C58F59;
        color: white;
        font-weight: 600;
    }

    /* Konten Utama Kanan */
    .reg-main {
        flex: 1;
        min-width: 0; /* Penting agar tabel tidak meluber dari flexbox */
    }

    .reg-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(88, 44, 12, 0.08);
        border: 1px solid #E5D6C5;
    }

    .reg-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        border-bottom: 1px solid #E5D6C5;
    }

    .reg-card-title {
        font-size: 18px;
        color: #582C0C;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .reg-card-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .reg-btn-outline {
        border: 1px solid #C58F59;
        background: white;
        color: #582C0C;
        padding: 6px 16px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .reg-icon-btn {
        background: none;
        border: none;
        color: #6B513E;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.2s;
    }

    .reg-icon-btn:hover {
        color: #C58F59;
    }

    /* Filters */
    .reg-filters {
        padding: 20px 24px;
        border-bottom: 1px solid #E5D6C5;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .reg-filter-row {
        display: flex;
        gap: 20px;
        align-items: flex-end;
    }

    .reg-input-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
        flex: 1;
    }

    .reg-input-group label {
        font-size: 12px;
        color: #A38C7A;
    }

    .reg-input {
        border: none;
        border-bottom: 1px solid #C58F59;
        padding: 8px 0;
        font-size: 14px;
        color: #582C0C;
        outline: none;
        background: transparent;
    }

    .reg-date-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
        border-bottom: 1px solid #C58F59;
    }

    .reg-date-wrapper input {
        border: none;
        outline: none;
        padding: 8px 0;
        font-size: 14px;
        color: #582C0C;
        flex: 1;
    }

    .reg-btn-icon-small {
        background: none;
        border: none;
        color: #582C0C;
        cursor: pointer;
    }

    .reg-search-box {
        display: flex;
        align-items: center;
        border: 1px solid #C58F59;
        border-radius: 4px;
        padding: 6px 12px;
    }

    .reg-search-box input {
        border: none;
        outline: none;
        font-size: 13px;
        width: 100%;
        color: #582C0C;
    }

    .reg-search-box i {
        color: #C58F59;
    }

    /* ===== TABLE DENGAN HORIZONTAL SCROLL ===== */
    .reg-table-wrapper {
        width: 100%;
        overflow-x: auto; /* Ini yang membuat tabel bisa digeser Kanan Kiri */
        padding-bottom: 8px;
    }

    /* Kustomisasi Scrollbar agar cantik */
    .reg-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }
    .reg-table-wrapper::-webkit-scrollbar-track {
        background: #F9FAFB;
        border-radius: 4px;
    }
    .reg-table-wrapper::-webkit-scrollbar-thumb {
        background: #D1D5DB;
        border-radius: 4px;
    }
    .reg-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: #C58F59;
    }

    .reg-table {
        width: 100%;
        min-width: 1200px; /* Lebar minimum agar tabel memaksa untuk di-scroll */
        border-collapse: collapse;
        text-align: left;
    }

    .reg-table th {
        background-color: #FDF8F4; /* Warna light cream menyatu dengan tema cokelat */
        color: #582C0C;
        font-size: 13px;
        font-weight: 600;
        padding: 14px 20px;
        border-bottom: 2px solid #E5D6C5;
        white-space: nowrap; /* Teks header tidak turun ke bawah */
    }

    .reg-table td {
        padding: 14px 20px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #E5E7EB;
        vertical-align: top;
        white-space: nowrap; /* Teks data tidak turun ke bawah */
    }

    .reg-table tr:hover td {
        background-color: #FAFAF9;
    }

    .reg-status {
        font-weight: 600;
        font-size: 12px;
    }

    .reg-status.succeed {
        color: #65A30D; /* Warna hijau success */
    }

    /* Pagination */
    .reg-pagination {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 16px 24px;
        gap: 24px;
        font-size: 13px;
        color: #6B7280;
    }

    .reg-page-size select {
        border: none;
        outline: none;
        font-weight: 600;
        color: #582C0C;
        margin-left: 8px;
        cursor: pointer;
    }

    .reg-page-controls {
        display: flex;
        gap: 8px;
    }

    .reg-page-btn {
        background: none;
        border: none;
        color: #9CA3AF;
        cursor: pointer;
    }

    .reg-page-btn:not([disabled]):hover {
        color: #582C0C;
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .reg-layout {
            flex-direction: column;
        }
        .reg-sidebar {
            width: 100%;
        }
        .reg-filter-row {
            flex-direction: column;
            align-items: stretch;
            gap: 16px;
        }
    }
</style>
@endsection