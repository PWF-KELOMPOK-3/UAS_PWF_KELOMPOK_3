@extends('layouts.app2')

@section('content')
<div class="main-content">
    <div class="container mx-auto mt-24">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Tambah Titik Pembuangan</h1>
        <div class="col-md-8 mx-auto">
            <link href="{{ asset('assets/style.css') }}" rel="stylesheet">

            <div class="container my-5 d-flex justify-content-center">
                <div class="cardi shadow-lg" style="border-radius: 15px; padding: 30px; background-color: #f8f9fa; width: 100%; max-width: 800px;">
                    <form action="{{ route('titik_pembuangan.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 inputGroup">
                            <input type="text" id="alamat" name="alamat" required autocomplete="off" class="form-control">
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="mb-4 inputGroup">
                            <input type="text" id="url" name="url" required autocomplete="off" class="form-control">
                            <label for="url">URL Embed Maps</label>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary" style="width: auto;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection