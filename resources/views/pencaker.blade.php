@extends('layouts.frontsub')
@section('content')
<!-- rekomendasi lowongan -->

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            {{-- <h5 class="fw-bold text-primary text-uppercase">Latest Blog</h5> --}}
            <h1 class="mb-0">Pencarian Kerja Terdaftar</h1>
        </div>
        <div class="row">
            @foreach ($listpencaker as $index => $pencaker)
                @php
                    $delay = $index < 3 ? '0.' . ($index + 1) * 3 . 's' : '0.' . ($index - 2) * 3 . 's';
                @endphp
                <div class="col-lg-4 wow slideInUp" data-wow-delay="{{ $delay }}" style="margin-bottom: 50px;">
                    <div class="blog-item bg-white custom-shadow" style="border-radius: 10px;">
                        <div class="row">
                            <div class="col-md-4">
                                <img src=" {{ !empty($pencaker->foto)  ? asset('fotobiodata/' . $pencaker->foto) :  asset('img/b1.jpg') }}" class="rounded me-3" style="width:125px; height:150px">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p style="font-size: 13.5px">
                                        <b>Nama:</b> {{ $pencaker->name }} <br>
                                        {{-- <b>Pendidikan:</b> {{ $pencaker->pendidikan }} <br>
                                        <b>Pengalaman:</b> {{ $pencaker->pengalaman }} <br> --}}
                                        @php
                                            $birthDate = new DateTime($pencaker->tgl_lahir);

                                            // Membuat objek DateTime dari tanggal saat ini
                                            $currentDate = new DateTime('now');

                                            // Menghitung selisih antara tanggal lahir dan tanggal saat ini
                                            $age = $birthDate->diff($currentDate);

                                            // Mendapatkan umur dalam tahun
                                            $umur = $age->y;
                                        @endphp
                                        <b>Umur:</b> {{ $umur }} tahun
                                    </p>
                                    <button class="btn btn-primary" style="float:right; font-size: 12px; border-radius: 8px; background-color: darkblue;">Lihat Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</div>
<!-- end rekomendasi lowongan -->

@endsection