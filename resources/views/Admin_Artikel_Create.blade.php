@extends('layouts.app2')

@section('content')

<link href="{{ asset('assets/style.css') }}" rel="stylesheet">

<style>
    html, body {
    overflow: hidden; /* Mencegah scrolling */
    height: 100%; /* Pastikan mengambil seluruh tinggi viewport */
}


</style>

<div class="container my-5" style="padding-top: 100px; z-index: 1000; padding-left:500px; position: relative; max-width: 80%; display: flex; justify-content: center; height: 100vh;">
    <div>
        <h1 class="mb-4 text-center">Tambah Artikel Baru</h1>

        <!-- Form Container with Bootstrap styling -->
        <div class="cardi shadow-lg" style="border-radius: 15px; padding: 30px; background-color: #f8f9fa; width: 110%; max-width: 800px;">
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul Field -->
                <div class="mb-4 inputGroup">
                    <input type="text" name="judul" id="judul" required autocomplete="off" class="form-control">
                    <label for="judul">Judul Artikel</label>
                </div>

                <!-- Konten Field -->
                <div class="mb-4 inputGroup">
                    <textarea name="konten" id="konten" required autocomplete="off" rows="4" class="form-control"></textarea>
                    <label for="konten">Konten Artikel</label>
                </div>

                <!-- Gambar Field -->
                <div class="mb-4">
                    <label for="image" class="form-label">Gambar Artikel</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg" style="border-radius: 25px; padding: 10px 20px;">Simpan Artikel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
