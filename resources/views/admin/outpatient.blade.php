@extends('layouts.admin')
@section('title', 'Rawat Jalan')

@section('navbar')
    @include('components.navbar', ['title' => 'Rawat Jalan'])
@endsection

@section('content')
<div class="rj-container">
    {{-- Page Header --}}
    <div class="rj-header">
        <div class="rj-title-area">
            <h1 class="rj-title">Rawat Jalan</h1>
            <p class="rj-subtitle">hanglekiu dental specialist</p>
        </div>
        
        {{-- Status Legend --}}
        <div class="rj-status-legend">
            <span class="rj-status-item"><span class="rj-dot" style="background-color: #EF4444;"></span> Pending</span>
            <span class="rj-status-item"><span class="rj-dot" style="background-color: #F59E0B;"></span> Confirmed</span>
            <span class="rj-status-item"><span class="rj-dot" style="background-color: #8B5CF6;"></span> Waiting</span>
            <span class="rj-status-item"><span class="rj-dot" style="background-color: #3B82F6;"></span> Engaged</span>
            <span class="rj-status-item"><span class="rj-dot" style="background-color: #84CC16;"></span> Succeed</span>
        </div>

        {{-- Date Navigation & Hari Ini Button --}}
        <div class="rj-header-actions">
            <div class="rj-date-nav">
                <button class="rj-icon-btn"><i class="fas fa-chevron-left"></i></button>
                <div class="rj-date-text">
                    <span class="rj-date-day">Rabu</span>
                    <span class="rj-date-full">25 Februari 2026</span>
                </div>
                <button class="rj-icon-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
            <button class="rj-btn-today">HARI INI</button>
        </div>
    </div>

    {{-- Layout Utama (Sidebar + Grid Jadwal) --}}
    <div class="rj-layout">
        
        {{-- Sidebar Daftar Dokter --}}
        <div class="rj-sidebar">
            <div class="rj-sidebar-header">
                Seluruh Dokter
            </div>
            <ul class="rj-doctor-list">
                {{-- Menggunakan nama DUMMY sesuai permintaan --}}
                <li class="rj-doctor-item">drg. Jane Doe Sp.Ortho</li>
                <li class="rj-doctor-item">drg. John Smith Sp.Ortho</li>
                <li class="rj-doctor-item">DR. drg. Alan Turing Sp.BM</li>
                <li class="rj-doctor-item">drg. Ada Lovelace</li>
                <li class="rj-doctor-item">drg. Grace Hopper Sp.Perio</li>
                <li class="rj-doctor-item">drg. Marie Curie Sp.Pros</li>
            </ul>
        </div>

        {{-- Konten Utama Kanan (Grid Jadwal) --}}
        <div class="rj-main">
            <div class="rj-table-wrapper">
                <table class="rj-table">
                    <thead>
                        <tr>
                            <th class="rj-time-col sticky-col">NOW</th>
                            <th>
                                <div class="rj-th-content">
                                    <span>DRG. JANE DOE SP.ORTHO</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </th>
                            <th>
                                <div class="rj-th-content">
                                    <span>DRG. JOHN SMITH SP.ORTHO</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </th>
                            <th>
                                <div class="rj-th-content">
                                    <span>DR. DRG. ALAN TURING SP.BM</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </th>
                            <th>
                                <div class="rj-th-content">
                                    <span>drg. Ada LovelaceM</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </th>
                            <th>
                                <div class="rj-th-content">
                                    <span>drg. Grace Hopper Sp.Perio</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </th>
                            <th>
                                <div class="rj-th-content">
                                    <span>drg. Marie Curie Sp.Pros</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="rj-time-col sticky-col">18:45 WIB</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="rj-time-col sticky-col">19:00 WIB</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="rj-time-col sticky-col">19:15 WIB</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="rj-time-col sticky-col">
                                <span class="rj-current-time-dot"></span> 19:30 WIB
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="rj-time-col sticky-col">19:45 WIB</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="rj-time-col sticky-col">20:00 WIB</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .rj-container {
        padding: 0 16px 24px 16px;
        font-family: 'Instrument Sans', sans-serif;
    }

    .rj-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .rj-title-area {
        flex: 1;
        min-width: 250px;
    }

    .rj-title {
        font-size: 24px;
        font-weight: 700;
        color: #582C0C;
        margin: 0;
    }

    .rj-subtitle {
        font-size: 14px;
        color: #C58F59;
        margin: 4px 0 0 0;
    }

    /* Status Legend */
    .rj-status-legend {
        display: flex;
        gap: 16px;
        align-items: center;
        flex: 1;
        justify-content: center;
        min-width: 300px;
    }

    .rj-status-item {
        font-size: 12px;
        color: #6B513E;
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
    }

    .rj-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
    }

    /* Date Navigation */
    .rj-header-actions {
        display: flex;
        align-items: center;
        gap: 16px;
        flex: 1;
        justify-content: flex-end;
        min-width: 300px;
    }

    .rj-date-nav {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .rj-date-text {
        display: flex;
        flex-direction: column;
        align-items: center;
        line-height: 1.2;
    }

    .rj-date-day {
        font-size: 14px;
        font-weight: 700;
        color: #C58F59;
    }

    .rj-date-full {
        font-size: 16px;
        font-weight: 700;
        color: #582C0C;
    }

    .rj-icon-btn {
        background: none;
        border: none;
        color: #C58F59;
        cursor: pointer;
        font-size: 16px;
        padding: 4px;
        transition: color 0.2s;
    }

    .rj-icon-btn:hover {
        color: #582C0C;
    }

    .rj-btn-today {
        background-color: #582C0C; 
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s;
    }

    .rj-btn-today:hover {
        background-color: #401f08;
    }

    .rj-layout {
        display: flex;
        gap: 20px;
        align-items: flex-start;
    }

    .rj-sidebar {
        width: 260px;
        flex-shrink: 0;
        background: white;
        box-shadow: 0 1px 3px rgba(88, 44, 12, 0.08);
        display: flex;
        flex-direction: column;
    }

    .rj-sidebar-header {
        background-color: #C58F59;
        color: white;
        font-size: 16px;
        font-weight: 600;
        padding: 16px 20px;
        text-align: center;
    }

    .rj-doctor-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .rj-doctor-item {
        padding: 16px 20px;
        font-size: 14px;
        color: #582C0C;
        border: 1px solid #E5D6C5;
        border-top: none;
        background: white;
        cursor: pointer;
        transition: background 0.2s;
    }

    .rj-doctor-item:hover {
        background: rgba(197, 143, 89, 0.05);
    }

    .rj-main {
        flex: 1;
        min-width: 0;
        background: white;
        box-shadow: 0 1px 3px rgba(88, 44, 12, 0.08);
    }

    .rj-table-wrapper {
        width: 100%;
        max-height: 600px;
        overflow-x: auto;
        overflow-y: auto;
    }

    .rj-table-wrapper::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    .rj-table-wrapper::-webkit-scrollbar-track {
        background: #F9FAFB;
    }
    .rj-table-wrapper::-webkit-scrollbar-thumb {
        background: #D1D5DB;
        border-radius: 4px;
    }
    .rj-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: #C58F59;
    }

    .rj-table {
        width: 100%;
        min-width: 900px; 
        border-collapse: collapse;
        table-layout: fixed;
    }


    .sticky-col {
        position: sticky;
        left: 0;
        background-color: white;
        z-index: 2;
        border-right: 1px solid #E5D6C5 !important;
    }

    .rj-table td.rj-time-col.sticky-col {
        position: sticky;
        left: 0;
        z-index: 4;
        background-color: white;
    }

    .rj-table th {
        background-color: #C58F59; 
        color: white;
        font-size: 13px;
        font-weight: 600;
        padding: 16px;
        text-align: left;
        border: 1px solid #b07d4a; 
        position: sticky;
        top: 0;
        z-index: 1;
    }

    .rj-table th.sticky-col {
        z-index: 3;
        width: 100px;
        text-align: center;
    }

    .rj-th-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
    }

    .rj-th-content i {
        cursor: pointer;
    }

    .rj-table td {
        border: 1px solid #E5D6C5;
        height: 70px; 
        padding: 12px;
        vertical-align: top;
    }

    .rj-time-col {
        font-size: 12px;
        color: #582C0C;
        text-align: center;
        font-weight: 500;
        vertical-align: middle !important;
        position: relative;
    }

    .rj-current-time-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #3B82F6;
        border-radius: 50%;
        position: absolute;
        left: 8px;
        top: 50%;
        transform: translateY(-50%);
    }

    @media (max-width: 1200px) {
        .rj-header {
            flex-direction: column;
            align-items: stretch;
        }
        .rj-status-legend, .rj-header-actions {
            justify-content: flex-start;
        }
    }

    @media (max-width: 992px) {
        .rj-layout {
            flex-direction: column;
        }
        .rj-sidebar {
            width: 100%;
        }
        .rj-table-wrapper {
            max-height: 400px;
        }
    }
</style>
@endsection