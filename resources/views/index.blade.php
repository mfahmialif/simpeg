<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">

    <title>Sistem Menejemen Pegawai</title>

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.741), rgb(1, 7, 0)),
                url("{{ asset('/home/images/gmbar.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .carousel .carousel-item img {
            width: 100%;
            height: 500px;
            border-radius: 20px;
            opacity: 0.7;
        }

        .desc {
            opacity: 0.5;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 575.98px) {
            .carousel .carousel-item img {
                height: 250px;
                width: 100%;

            }

            .logo {
                width: 50%;
            }

            .desc {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <img src="{{ asset('home/images/logo_putih.png') }}" class="logo" width="300" alt="" />
                @if (Route::has('login'))
                    @auth
                        <a class="btn btn-outline-light float-end mt-lg-3 mt-sm-1 ms-2" href="{{ route('logout') }}"
                            onclick="logout(event)">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light float-end mt-lg-3 mt-sm-1 ms-2">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-light float-end mt-lg-3 mt-sm-1">
                                Daftar
                            </a>
                        @endif
                    @endif
                    @endif
                </header>

                <div id="carouselExampleControls" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('home/images/1.jpg') }}" class="d-block" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('home/images/2.jpg') }}" class="d-block" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('home/images/3.jpeg') }}" class="d-block" alt="..." />
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="row align-items-md-stretch desc">
                    <div class="col-md-12">
                        <div class="h-100 p-5 bg-light border rounded-3">
                            <h2>SIMPEG IAI DALWA</h2>
                            <p>
                                Sistem Informasi Manajemen Kepegawaian (SIMPEG) IAI Dalwa.
                                Sistem Informasi Kepegawaian (SIMPEG) adalah sistem yang mampu
                                memberikan informasi data-data pegawai pada suatu perusahaan
                                maupun instansi yang salingberinteraksi mencapai tujuan yang
                                telah ditargetkan. SIMPEG menangani pengelolaan data kepegawaian
                                khususnya meliputi: pendataan ...
                            </p>
                            <button class="btn btn-outline-dark" type="button">
                                Masuk Sekarang
                            </button>
                        </div>
                    </div>
                </div>

                <footer class="pt-3 mt-4 text-muted border-top text-center">
                    Hak Cipta @IAI DALWA 2022. Semua hak dilindungi undang-undang.
                </footer>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <!-- jQuery -->
        <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>

        <!-- SweetAlert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- myscript -->
        <script src="{{ asset('/admin/dist/js/myscript.js') }}"></script>
        <!-- InputMask -->
        <script src="{{ asset('/admin/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('/admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

        <!-- Select2 -->
        <script src="{{ asset('/admin/plugins/select2/js/select2.full.min.js') }}"></script>

        <script>
            //phone mask
            $('[data-mask]').inputmask()
        </script>
    </body>

    </html>
