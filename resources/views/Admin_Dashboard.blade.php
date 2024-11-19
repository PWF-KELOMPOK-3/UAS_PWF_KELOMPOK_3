@extends('layouts.App2')

@section('content')
<div class="main-content">
    <div class="container mx-auto mt-24">
        <h1 class="text-4xl font-semibold text-gray-800 mb-6">Dashboard</h1>

        <!-- Dashboard Admin -->
        <div class="dashboard-stats">
            <div class="stats-card">
                <h2 class="title">Artikel Terpublish</h2>
                <p class="number">{{ $artikelCount }}</p>
            </div>
            <div class="stats-card">
                <h2 class="title">Titik Pembuangan</h2>
                <p class="number">{{ $titikCount }}</p>
            </div>
        </div>

        <!-- Kelola Artikel -->
        <div class="card">
            <div class="card-header">Kelola Artikel</div>
            <div class="card-body">
                <p>Kelola artikel yang diterbitkan dengan menambah, mengedit, atau menghapusnya sesuai kebutuhan.</p>
                <a href="{{ route('artikel.admin') }}" class="btn mt-4">Kelola Artikel</a>
            </div>
        </div>

        <!-- Kelola Titik Pembuangan -->
        <div class="card">
            <div class="card-header">Kelola Titik Pembuangan</div>
            <div class="card-body">
                <p>Kelola dan perbarui data titik pembuangan sampah di kota untuk mempermudah pengelolaannya.</p>
                <a href="{{ route('titik_admin.index') }}" class="btn mt-4">Kelola Titik</a>
            </div>
        </div>
        
    </div>
</div>
@endsection