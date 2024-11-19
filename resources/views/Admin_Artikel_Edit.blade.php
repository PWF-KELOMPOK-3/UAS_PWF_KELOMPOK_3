<link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">

<div class="container" style="padding-top: 80px;">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Edit Artikel</h1>

            <!-- Form Edit Artikel -->
            <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input type="text" class="form-control" name="judul" value="{{ $artikel->judul }}" required>
                </div>

                <div class="mb-3">
                    <label for="konten" class="form-label">Konten:</label>
                    <textarea class="form-control" name="konten" required>{{ $artikel->konten }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar:</label>
                    <input type="file" class="form-control" name="image">
                </div>

                @if($artikel->image_url)
                <div class="mb-3">
                    <p>Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $artikel->image_url) }}" width="100">
                </div>
                @endif

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Perbarui Artikel</button>
                </div>
            </form>
        </div>
    </div>

</div>