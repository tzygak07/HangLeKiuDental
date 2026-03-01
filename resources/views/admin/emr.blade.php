@extends('layouts.admin')
@section('title', 'Electronic Medical Record')

@section('navbar')
    @include('components.navbarSearch', ['title' => 'Electronic Medical Record'])
@endsection

@section('content')
    <div class="emr-container">
        <div class="emr-header">
            <div class="emr-title-area">
                <h1 class="emr-title">Electronic Medical Record</h1>
                <p class="emr-subtitle">hanglekiu dental specialist</p>
            </div>

            <div class="emr-status-legend">
                <span class="emr-status-item"><span class="emr-dot" style="background-color: #EF4444;"></span> Pending</span>
                <span class="emr-status-item"><span class="emr-dot" style="background-color: #F59E0B;"></span>
                    Confirmed</span>
                <span class="emr-status-item"><span class="emr-dot" style="background-color: #8B5CF6;"></span>
                    Waiting</span>
                <span class="emr-status-item"><span class="emr-dot" style="background-color: #3B82F6;"></span>
                    Engaged</span>
                <span class="emr-status-item"><span class="emr-dot" style="background-color: #84CC16;"></span>
                    Succeed</span>
            </div>

            <div class="emr-header-actions">
                <button class="emr-icon-btn">
                    <x-fluentui-print-48-o class="emr-action-icon" />
                </button>
                <button class="emr-icon-btn">
                    <x-elusive-refresh class="emr-action-icon" />
                </button>
            </div>
        </div>

        <div class="emr-layout">
            <div class="emr-sidebar">
                <div class="emr-filter-box">
                    <select class="emr-select">
                        <option value="semua">Semua</option>
                    </select>
                </div>

                <div class="emr-queue-alert">
                    Tidak ada antrean pasien
                </div>
            </div>

            <div class="emr-main">
                <div class="emr-empty-state">
                    <img src="{{ asset('../images/empty-queue.png') }}" alt="Tidak ada antrean" class="emr-empty-img">

                    <h2 class="emr-empty-title">Tidak ada antrean pasien hari ini</h2>
                    <p class="emr-empty-desc">Gunakan search bar atau advance search pada pojok kiri atas untuk mencari
                        pasien.</p>
                </div>
            </div>
        </div>

    </div>

    <style>
        .emr-container {
            padding: 0 16px 24px 16px;
            position: relative;
            min-height: calc(100vh - 100px);
            font-family: 'Instrument Sans', sans-serif;
        }


        .emr-search-icon {
            position: absolute;
            left: 12px;
            color: #C58F59;
            font-size: 14px;
        }

        .emr-search-user-icon {
            position: absolute;
            right: 12px;
            color: #C58F59;
            font-size: 14px;
        }

        .emr-search-input {
            width: 300px;
            padding: 8px 36px;
            border: 1px solid #E5D6C5;
            border-radius: 20px;
            font-size: 13px;
            color: #582C0C;
            outline: none;
            transition: border-color 0.2s;
        }

        .emr-search-input:focus {
            border-color: #C58F59;
        }

        .emr-search-input::placeholder {
            color: #A38C7A;
        }

        .emr-btn-primary {
            background-color: #C58F59;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            letter-spacing: 0.3px;
        }

        .emr-btn-primary:hover {
            background-color: #b07d4a;
            box-shadow: 0 2px 8px rgba(197, 143, 89, 0.2);
        }

        .emr-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .emr-title {
            font-size: 24px;
            font-weight: 700;
            color: #582C0C;
            margin: 0;
        }

        .emr-subtitle {
            font-size: 14px;
            color: #C58F59;
            margin: 4px 0 0 0;
        }

        .emr-status-legend {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .emr-status-item {
            font-size: 12px;
            color: #6B513E;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .emr-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .emr-header-actions {
            display: flex;
            gap: 8px;
        }

        .emr-icon-btn {
            background: white;
            border: 1.5px solid #E5D6C5;
            color: #C58F59;
            width: 36px;
            height: 36px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .emr-action-icon {
            width: 20px;
            height: 20px;
        }

        .emr-icon-btn:hover {
            background: rgba(197, 143, 89, 0.05);
            border-color: #C58F59;
        }

        .emr-layout {
            display: flex;
            gap: 24px;
        }

        .emr-sidebar {
            width: 250px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .emr-select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #E5D6C5;
            border-radius: 6px;
            font-size: 14px;
            color: #582C0C;
            background-color: white;
            outline: none;
            font-weight: 500;
            transition: border-color 0.2s;
        }

        .emr-select:focus {
            border-color: #C58F59;
        }

        .emr-queue-alert {
            background: white;
            border: 1px solid #E5D6C5;
            border-left: 3px solid #EF4444;
            color: #EF4444;
            padding: 12px 16px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
            box-shadow: 0 1px 3px rgba(88, 44, 12, 0.04);
        }


        .emr-main {
            flex: 1;
            background: #FCFAF8;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 400px;
            border: 1px dashed #E5D6C5;
        }

        .emr-empty-state {
            text-align: center;
            max-width: 400px;
        }

        .emr-empty-img {
            width: 300px;
            height: auto;
            margin: 0 auto 24px;

        }

        .emr-empty-title {
            font-size: 18px;
            font-weight: 700;
            color: #582C0C;
            margin: 0 0 10px 0;
        }

        .emr-empty-desc {
            font-size: 13px;
            color: #6B513E;
            line-height: 1.5;
            margin: 0;
        }

        @media (max-width: 992px) {
            .emr-layout {
                flex-direction: column;
            }

            .emr-sidebar {
                width: 100%;
            }

            .emr-status-legend {
                flex-wrap: wrap;
            }
        }
    </style>
@endsection
