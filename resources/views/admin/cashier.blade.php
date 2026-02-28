@extends('layouts.admin')
@section('title', 'Kasir')

@section('navbar')
    @include('components.navbar', ['title' => 'Kasir'])
@endsection

@section('content')
<div class="admin-card">
    <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 8px;">Kasir</h2>
    <p style="color: #6B513E; font-size: 14px;">Pembayaran dan transaksi. Halaman ini masih dalam pengembangan.</p>
</div>
@endsection
