@extends('layouts.app2')

@section('content')
<div class="main-content">
    <div class="container mx-auto mt-24">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Edit Titik Pembuangan</h1>
        <div class="col-md-8 mx-auto">
            <form action="{{ route('titik_pembuangan.update', $titikPembuangan->id) }}" method="POST" class="bg-white p-6 shadow-lg rounded-lg">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="alamat" class="font-semibold text-gray-700">Alamat</label>
                    <input type="text" class="form-control py-3 px-4 border rounded-md shadow-sm w-full" id="alamat" name="alamat" value="{{ $titikPembuangan->alamat }}" required>
                </div>
                <div class="form-group mb-4">
                    <label for="url" class="font-semibold text-gray-700">URL Embed Maps</label>
                    <input type="text" class="form-control py-3 px-4 border rounded-md shadow-sm w-full" id="url" name="url" value="{{ $titikPembuangan->url }}" required>
                </div>
                <button type="submit" class="btn btn-primary w-full py-3 mt-4">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection