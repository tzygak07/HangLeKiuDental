@extends('layouts.admin')
@section('title', 'Dashboard')

@section('navbar')
    @include('components.navbar', ['title' => 'Dashboard'])
@endsection

@section('content')
<div class="admin-card">
    <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 8px;">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
    <p style="color: #6B513E; font-size: 14px;">Ini adalah halaman dashboard admin Hanglekiu Dental Clinic.</p>
</div>
@endsection
