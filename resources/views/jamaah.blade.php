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
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset ('/template2/css/styles.css') }}" rel="stylesheet" />
    <!-- <link href="{{asset ('/template3/css/styles.css') }}" rel="stylesheet" /> -->
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" style="position: ;">
        <div class="container">
            <a class="navbar-brand" href="#">Masjid At-Taqwa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#kegiatan">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kas">Kas Masjid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jadwal">Jadwal Khotbah</a>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand justify-content-lg-end" href="/login">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
        </div>
    </nav>
    <section class="page-section" id="">
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="/image/masjid1.jpeg" alt="..." />
                </div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Selamat Datang di Masjid At-Taqwa!</h1>
                    <p>Website ini berisi berbagai informasi seputar Masjid At-Taqwa</p>
                </div>
            </div>
    </section>
    <section class="content-section mt-5" id="kegiatan">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading text-center">
                <h3 class="text-secondary mb-0">Kegiatan</h3>
                <h2 class="mb-5">Kegiatan Terbaru</h2>
            </div>
            @foreach ($kegiatan as $item)
            <div class="row gx-0">
                <div class="col-lg-6" style="margin-left:25%;">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">{{$item->keg}}</div>
                                <p class="mb-0">{{$item->ket}}</p>
                                <p class="mb-0">{{$item->tgl_keg}}</p>
                            </div>
                        </div>
                        <img class="img-fluid" src="{{asset('image/'.$item->gambar)}}" alt="..." width="800px;"
                            height="550px" />
                    </a>
                </div>
            </div><br>
            @endforeach
        </div>
    </section>

    <section class="page-section" id="kas">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading text-center ">
                <h3 class="text-secondary mb-0">Kas Masjid</h3>
                <h2 class="mb-5">Rekap Kas</h2>
            </div>
            <div class="d-flex justify-content-md-center">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-5">
                        <div class="card text-light bg-warning" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total Pemasukan</h5>
                                <h3 class="card-text">Rp. {{ number_format($sum_masuk, 0, ',','.') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card text-light bg-warning" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total Pengeluaran</h5>
                                <h3 class="card-text">Rp. {{ number_format($sum_keluar, 0, ',','.') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card text-light bg-warning" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Saldo Akhir</h5>
                                <h3 class="card-text">Rp. {{ number_format($sum_total, 0, ',','.') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="page-section mt-5" id="jadwal">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading text-center ">
                <h3 class="text-secondary mb-0">jadwal</h3>
                <h2 class="mb-5">Khotbah Jumat</h2>
            </div>
            <div class="d-flex justify-content-md-center">
                <div class="row gx-4 gx-lg-5">
                    @foreach ($jadwalk as $item)
                    <div class="col-md-4 mb-5 mt-3">
                        <div class="card text-light bg-dark" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->tgl_khotbah }}</h5>
                                <h3 class="card-text">{{ $item->penceramah }}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
    <section>
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5">
                <p class="m-0 text-center text-white">Copyright &copy; Sistem Informasi Pengelolaan Masjid</p>
            </div>
        </footer>
    </section>
</body>

</html>
