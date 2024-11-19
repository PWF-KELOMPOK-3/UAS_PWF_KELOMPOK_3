@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Lokasi Titik Pembuangan Sampah</h2>
    <div class="row">
        @foreach($titikPembuangans as $titik)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-img-top">
                    {!! $titik->url !!}
                </div>

                <div class="card-body">
                    <!-- <h5 class="card-title">{{ $titik->alamat }}</h5> -->
                    <p class="card-text"><strong>Alamat:</strong> {{ $titik->alamat }}</p>
                    <a href="https://www.google.com/maps?q={{ urlencode($titik->alamat) }}" target="_blank" class="btn btn-outline-success">Lihat Peta</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection