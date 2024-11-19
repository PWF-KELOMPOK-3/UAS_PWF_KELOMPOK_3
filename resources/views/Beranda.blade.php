@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BersihBumi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


  <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
</head>

<body>

  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
          <!-- Slide 1 -->
          <div class="carousel-item active col-lg-12 d-flex justify-content-center" style="background-image: url(assets/img/hero.png);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate_animated animate_fadeInDown"><span>BersihBumi</span></h2>
                <p class="animate_animated animate_fadeInUp">Membantu kamu untuk pengelolaan sampah demi lingkungan yang lebih baik!</p>
                <div>

                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <div class="container mt-5" style="max-width: 900px;">
  <div class="section-title">
    <h2>Apa Itu <span>BersihBumi?</span></h2>
  </div>
  <p class="lead text-center">
    BersihBumi adalah inisiatif lingkungan yang bertujuan untuk mengurangi polusi dan melestarikan alam melalui aksi
    kolektif. Kami berfokus pada pengurangan limbah, edukasi lingkungan, dan kolaborasi dengan masyarakat untuk
    menciptakan bumi yang lebih bersih dan sehat untuk generasi mendatang.
  </p>
</div>

  
<!-- SECTION MANFAAT -->
  <section id="manfaat">
  <div class="section-title">
    <h2>Tujuan dari <span>BersihBumi</span></h2>
  </div>
  <div class="card-container">
  <div class="card">Mengurangi Polusi Lingkungan</div>
  <div class="card2">Menghemat Sumber Daya Alam</div>
  <div class="card3">Menciptakan Lapangan Kerja</div>
</div>
  </section>


<!-- cara mempersiapkan sampah -->
<section id="manfaat">
  <div class="section-title">
    <h2>Cara Mempersiapkan<span> Sampah</span></h2>
  </div>
  
<div class="flip-card-container">
  <div class="flip-card">
    <div class="flip-card-inner">
        <!-- Step 1 -->
        <div class="flip-card-front">
            <p class="title">Pilah Sampah</p>
        </div>
        <div class="flip-card-back">
            <p>Pisahkan sampah organik dan anorganik</p>
        </div>
    </div>
</div>

<div class="flip-card">
    <div class="flip-card-inner">
        <!-- Step 2 -->
        <div class="flip-card-front">
            <p class="title">Cuci dan Bersihkan</p>
        </div>
        <div class="flip-card-back">
            <p>Cuci sampah yang bisa dibersihkan seperti botol plastik dan kaleng</p>
        </div>
    </div>
</div>

<div class="flip-card">
    <div class="flip-card-inner">
        <!-- Step 3 -->
        <div class="flip-card-front">
            <p class="title">Kemas dengan Rapi</p>
        </div>
        <div class="flip-card-back">
            <p>Kemas sampah dengan kantong plastik atau wadah yang sesuai</p>
        </div>
    </div>
</div>

<div class="flip-card">
    <div class="flip-card-inner">
        <!-- Step 4 -->
        <div class="flip-card-front">
            <p class="title">Sampah Siap Ditukar</p>
        </div>
        <div class="flip-card-back">
            <p>Datang ke tempat sampah terdekat dan tukarkan sampahmu!</p>
        </div>
    </div>
</div>
</div>




  <main id="main">
   <!-- ======= CARA MENGIKUTI ======= -->
    <section id="CaraMengikuti" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Cara Mengikuti <span>BersihBumi</span></h2>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>Baca Artikel</h4>
              <p>
              Pelajari artikel di menu "Informasi Olah Sampah" untuk mempersiapkan sampah dengan benar.
            </p>

            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>Temukan Lokasi</h4>
              <p>
                Cari lokasi buang sampah terdekat di menu "Lokasi Buang Sampah"
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4>Tukar Sampah</h4>
              <p>
                Kunjungi lokasi, bawa sampah yang sudah dipilah, temui petugas, dan tukarkan sampah sesuai ketentuan untuk mendapatkan poin.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->
</div>

    
  <a href="{{ url("#") }}" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset("/assets/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("/assets/glightbox/js/glightbox.min.js") }}"></script>
  <script src="{{ asset("/assets/isotope-layout/isotope.pkgd.min.js") }}"></script>
  <script src="{{ asset("/assets/swiper/swiper-bundle.min.js") }}"></script>
  <script src="{{ asset("/assets/php-email-form/validate.js") }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset("/assets/main.js") }}"></script>

</body>

</html>
@endsection
