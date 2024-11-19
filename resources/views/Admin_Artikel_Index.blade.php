@extends('layouts.App2')

@section('content')
<div class="main-content">
    <div class="container mx-auto mt-24">
<div class="container my-5" style= "position: relative; ">
    <h2 class="mb-4 text-center">Artikel Olah Sampah</h2>

    <!-- Daftar Artikel -->
    <div class="row justify-content-start mt-5" style="display: flex; flex-wrap: wrap; gap: 16px;">
        @foreach($artikels as $artikel)
        <div class="col-md-6 col-lg-4 mb-4" style="flex: 1 1 48%; max-width: 350px;">
            <div class="card shadow-sm" style="width: 100%; height: auto;">
                <!-- Menampilkan gambar artikel -->
                <img src="{{ asset($artikel->image_url) }}" alt="{{ $artikel->judul }}" style="width: 350px; height: 180px; object-fit: cover;"> 

                <div class="card-body">
                    <h5 class="card-title" style="font-size: 16px; line-height: 1.2;">{{ $artikel->judul }}</h5>
                                    
                    <!-- Tombol Edit di kiri dan Delete di kanan, dalam satu baris horizontal -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Tombol Edit di kiri -->
                        <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        
                        <!-- Tombol Delete di kanan -->
                        <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash" style="font-size: 16px;"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Tombol Buat Artikel di pojok kanan bawah dengan ikon + -->
    <a href="{{ route('artikel.create') }}" class="btn btn-primary" 
         style="position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; border-radius: 50%; 
          display: flex; justify-content: center; align-items: center; font-size: 30px; color: white; z-index: 9999;">
        +
    </a>
</div>
</div>
</div>
@endsection
