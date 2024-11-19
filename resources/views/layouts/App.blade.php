<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BersihBumi</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <style>
        /* Custom styles for the green elegant look */
        .navbar-custom {
            background-color: #2d6a4f; /* Dark green */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
        }
        .navbar-custom .nav-link:hover {
            color: #c7f9cc; /* Light green on hover */
        }
        .navbar-custom .btn-login {
            background-color: #40916c;
            color: #fff;
            border: none;
        }
        .navbar-custom .btn-register {
            background-color: #52b788;
            color: #fff;
            border: none;
        }
        .navbar-custom .btn-login:hover, .navbar-custom .btn-register:hover {
            background-color: #74c69d; /* Lighter green on hover */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">BersihBumi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/artikel_user') }}">Artikel Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/Titik_Pembuangan') }}">Titik Pembuangan</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-login me-2 ms-3" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->

        @yield('content')


    <!-- Tombol Buat Artikel di pojok kanan bawah dengan ikon + -->
    <!-- <a href="{{ route('artikel.create') }}" class="btn btn-primary" style="position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 30px; color: white;">
        +
    </a> -->


<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4">
                <h5>Tentang BersihBumi</h5>
                <p>BersihBumi adalah platform yang mendukung program pengelolaan sampah untuk menciptakan lingkungan yang bersih dan sehat. Bergabunglah bersama kami dalam menjaga bumi.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="col-md-4">
                <h5>Tautan Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-white text-decoration-none">Beranda</a></li>
                    <li><a href="#cara-mengikuti" class="text-white text-decoration-none">Cara Mengikuti</a></li>
                    <li><a href="#informasi-olah-sampah" class="text-white text-decoration-none">Informasi Olah Sampah</a></li>
                    <li><a href="#lokasi-buang-sampah" class="text-white text-decoration-none">Lokasi Buang Sampah</a></li>
                    <li><a href="/login" class="text-white text-decoration-none">Login</a></li>
                    <li><a href="/register" class="text-white text-decoration-none">Registrasi</a></li>
                </ul>
            </div>

            <!-- Contact and Social Media Section -->
            <div class="col-md-4">
                <h5>Kontak Kami</h5>
                <p><i class="fas fa-envelope"></i> info@bersihbumi.com</p>
                <p><i class="fas fa-phone"></i> +62 123 4567 890</p>

                <h5>Ikuti Kami</h5>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
            </div>
        </div>

        <hr class="bg-white">
        <div class="text-center py-2">
            <p class="mb-0">&copy; 2024 BersihBumi. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/bootstrap.min.js') }}"></script>
<script>
    document.querySelectorAll('.nav-link, .btn-login, .btn-register').forEach(item => {
        item.addEventListener('mouseover', () => {
            item.style.transform = 'scale(1.05)';
            item.style.transition = 'transform 0.2s ease-in-out';
        });
        item.addEventListener('mouseout', () => {
            item.style.transform = 'scale(1)';
        });
    });
</script>

</body>
</html>
