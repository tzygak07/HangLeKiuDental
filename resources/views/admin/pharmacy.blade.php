@extends('layouts.admin')
@section('title', 'Apotek')

@section('navbar')
    @include('components.navbar', ['title' => 'Apotek'])
@endsection

@section('content')
<div class="admin-card">
    <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 8px;">Apotek</h2>
    <p style="color: #6B513E; font-size: 14px;">Manajemen obat dan resep. Halaman ini masih dalam pengembangan.</p>
</div>
@endsection
