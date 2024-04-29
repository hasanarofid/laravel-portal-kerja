@extends('layouts.front')
@section('content')
<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->

<!-- Facts Start -->
<div class="container-fluid facts py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-12 wow zoomIn" data-wow-delay="0.3s">
                <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <!-- <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Projects Done</h5>
                            <h1 class="mb-0" data-toggle="counter-up">12345</h1>
                        </div> -->
                    <table style="width:100%; ">
                        <tr>
                            <td rowspan=2>
                                <img src="{{ asset('img/icon-doc.png') }}" class="card-img-top" style="width: 50px; height: 50px;">
                            </td>
                            <td>
                                <h5 class="text-primary mb-0" style="text-align: center;">Jumlah Pembuatan AK1</h5>
                            </td>
                            <td rowspan=2>
                                <img src="{{ asset('img/icon-pengguna.png') }}" class="card-img-top" style="width: 50px; height: 50px;">
                            </td>
                            <td>
                                <h5 class="text-primary mb-0" style="text-align: center;">Jumlah Pelamar</h5>
                            </td>
                            <td rowspan=2>
                                <img src="{{ asset('img/icon-office.png') }}" class="card-img-top" style="width: 50px; height: 50px;">
                            </td>
                            <td>
                                <h5 class="text-primary mb-0" style="text-align: center;">Jumlah Perusahaan</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h1 class="mb-0" data-toggle="counter-up" style="text-align: center;">0</h1>
                            </td>
                            <td>
                                <h1 class="mb-0" data-toggle="counter-up" style="text-align: center;">0</h1>
                            </td>
                            <td>
                                <h1 class="mb-0" data-toggle="counter-up" style="text-align: center;">0</h1>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facts Start -->


<!-- Service Start -->
<!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0">Rekomendasi Lowongan Kerja</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-shield-alt text-white"></i>
                        </div>
                        <h4 class="mb-3">Cyber Security</h4>
                        <p class="m-0">Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-chart-pie text-white"></i>
                        </div>
                        <h4 class="mb-3">Data Analytics</h4>
                        <p class="m-0">Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-code text-white"></i>
                        </div>
                        <h4 class="mb-3">Web Development</h4>
                        <p class="m-0">Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fab fa-android text-white"></i>
                        </div>
                        <h4 class="mb-3">Apps Development</h4>
                        <p class="m-0">Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">SEO Optimization</h4>
                        <p class="m-0">Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                        <h3 class="text-white mb-3">Call Us For Quote</h3>
                        <p class="text-white mb-3">Clita ipsum magna kasd rebum at ipsum amet dolor justo dolor est magna
                            stet eirmod</p>
                        <h2 class="text-white mb-0">+012 345 6789</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- Service End -->

<!-- rekomendasi lowongan -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Rekomendasi Lowongan</h1>
        </div>
        <div class="row g-2">
            @for ($i = 1; $i <= 4; $i++) <div class="col-lg-3 wow zoomIn" data-wow-delay="0.3s">
                <div class="card card-lowongan">
                    <div style=" position: relative;display: inline-block;">
                        <img src="{{ asset('img/bg1.jpeg') }}" class="card-img-top" style="position: relative;z-index: 1;">
                        <div class="transparan" style="color: white ;background-color: rgba(0, 0, 0, 0.5); bottom: 0; position: absolute; z-index: 2;height: 25%; width: 100%; border-radius: 10%;">
                            PT. ALIM RUGI HOYONG UNTUNG
                        </div>

                    </div>
                    <div class="card-body" style="overflow-x: auto;max-width: 100%">
                        <h5 class="card-title">Bedah Rumah</h5>
                        <table>
                            <tr>
                                <td>Penempatan</td>
                                <td> : </td>
                                <td>bandung Barat</td>
                            </tr>
                            <tr>
                                <td>Peran Pekerjaan</td>
                                <td> : </td>
                                <td>Menghancurkan Rumah</td>
                            </tr>
                            <tr>
                                <td>Tingkat</td>
                                <td> : </td>
                                <td><b>Newbie</b></td>
                            </tr>
                        </table>
                        <a href="#" class="btn btn-primary" style="float: right; border-radius: 10px; background-color: darkblue; margin-top: 10px;">Lihat Detail</a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    <div class="wow zoomIn" data-wow-delay="0.1s" style="display: flex; justify-content: center; padding-top: 10%;">
        <button class="btn btn-primary" style="border-radius: 8px;background-color: darkblue;">Lihat Lebih Banyak</button>
    </div>
</div>
</div>
<!-- end rekomendasi lowongan -->

<div class="wow zoomIn" data-wow-delay="0.1s">
    <hr style="width: 70%; margin: 0 auto; border: 2px solid black;">
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            {{-- <h5 class="fw-bold text-primary text-uppercase">Latest Blog</h5> --}}
            <h1 class="mb-0">Pencarian Kerja Terdaftar</h1>
        </div>
        <div class="row">
            @for ($i = 1; $i <= 6; $i++) @php $delay=$i <=3 ? '0.' . $i * 3 . 's' : '0.' . ($i - 3) * 3 . 's' ; @endphp <div class="col-lg-4 wow slideInUp" data-wow-delay="{{ $delay }}" style="margin-bottom: 50px;">
                <div class="blog-item bg-white custom-shadow" style="border-radius: 10px;">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ ('img/b1.jpg') }}" class="rounded me-3" style="width:125px; height:150px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p style="font-size: 13.5px">
                                    <b>Nama</b><br>
                                    Pendidikan <br>
                                    Pengalaman <br>
                                    Umur
                                </p>
                                <button class="btn btn-primary" style="float:right; font-size: 12px; border-radius: 8px; background-color: darkblue;">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    <div class="wow zoomIn" data-wow-delay="0.1s" style="display: flex; justify-content: center;">
        <button class="btn btn-primary" style="border-radius: 8px; background-color: darkblue;">Lihat Lebih Banyak</button>
    </div>
</div>
</div>
@endsection