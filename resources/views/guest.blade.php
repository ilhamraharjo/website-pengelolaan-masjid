<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI Pengelolaan Masjid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand mr-5" href="">
                Masjid At-Taqwa
            </a>
            <a class="navbar-brand justify-content-lg-end" href="/login">
            <i class="bi bi-box-arrow-in-right"></i>  Login
            </a>
        </div>
    </nav>
    <div>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="width: 100%;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/image/masjid1.jpeg" class="d-block w-100" alt="..." style >
      <div class="carousel-caption d-none d-md-block">
        <h5>السلام عليكم ورحمة الله وبركاته</h5>
        <b>Selamat Datang di Masjid At-Taqwa</b>
      </div>
    </div>
  </div>
</div>
    </div>
    <h2 class="m-5" style="text-align: center">Kegiatan</h2>
    <!-- <div class="container"> -->
    <div class="row m-4">
        @foreach ($kegiatan as $item)
        <div class="col d-flex justify-content-center" >
            <div class="card" style="width: 24rem; border: 2px solid black;" >
                <img class="card-img-top" src="{{asset('image/'.$item->gambar)}}" width="100px;" height="200px"
                    alt="Card image cap">
                <div class="card-body">
                    <h1 class="card-title">{{$item->keg}}</h1>
                    <p class="card-text">{{$item->tgl_keg}}</p>
                    <p class="card-text">{{$item->ket}}</p>
                </div>
            </div>
        </div>
        @endforeach
        <h2 class="m-5" style="text-align: center">Rekap Kas</h2>
        <div class="d-flex justify-content-md-center">
        <div class="row" >
        <div class="col d-flex justify-content-center" style=" align-content: center; align-items: center;">
        <div class="col-4">
            <div class="card text-light bg-primary" style="width: 20rem;">
                <div class="card-body">
                <h3 class="card-title">Total Pemasukan</h3>
                    <h2 class="card-text">Rp. {{ number_format($sum_masuk, 0, ',','.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-light bg-info" style="width: 20rem;">
                <div class="card-body">
                <h3 class="card-title">Total Pengeluaran</h3>
                    <h2 class="card-text">Rp. {{ number_format($sum_keluar, 0, ',','.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-light bg-success" style="width: 20rem;">
                <div class="card-body">
                <h3 class="card-title">Saldo Akhir</h3>
                    <h2 class="card-text">Rp. {{ number_format($sum_total, 0, ',','.') }}</h2>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</body>

</html>
