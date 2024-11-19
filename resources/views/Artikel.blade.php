@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Artikel Olah Sampah</h2>
    <div class="row">
        @foreach ($artikels as $artikel)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset($artikel->image_url) }}" alt="{{ $artikel->judul }}" style="width: 350px; height: 180px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $artikel->judul }}</h5>
                    <p class="card-text">{{ Str::limit($artikel->konten, 100) }}</p>
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-{{ $artikel->id }}">
                        Detail
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $artikel->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $artikel->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-{{ $artikel->id }}">{{ $artikel->judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <!-- Gambar dengan max-width 70% -->
                        <img src="{{ asset($artikel->image_url) }}" alt="{{ $artikel->judul }}" class="img-fluid mb-3" style="max-height: 40vh; width: auto;">

                        <p>{{ $artikel->konten }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
