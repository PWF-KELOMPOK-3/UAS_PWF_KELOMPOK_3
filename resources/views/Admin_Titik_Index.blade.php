@extends('layouts.app2')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
<div class="main-content">
    <div class="container mx-auto mt-24">
        <h1 class="text-4xl font-semibold text-gray-800 mb-6">Titik Pembuangan</h1>
        <a href="{{ route('titik_pembuangan.create') }}" class="btn btn-primary btn-sm">Tambah Titik Pembuangan</a>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th class="alamat-col">Alamat</th>
                    <th>Link Maps</th>
                    <th class="aksi-col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($titikPembuangans as $titik)
                <tr>
                    <td class="alamat-col">{{ $titik->alamat }}</td>
                    <td>
                        <!-- Menampilkan iframe embed map dari URL -->
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $titik->url !!}
                        </div>
                    </td>
                    <td class="aksi-col">
                        <!-- Tombol Edit dan Hapus -->
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('titik_pembuangan.edit', $titik->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('titik_pembuangan.destroy', $titik->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection