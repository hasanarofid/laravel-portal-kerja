@extends('layouts.frontsub')
@section('content')
<!-- rekomendasi lowongan -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Rekomendasi Lowongan</h1>
        </div>
        <div class="row g-2">
            @foreach ($listlowongan as $lowongan)
                <div class="col-lg-3 wow zoomIn" data-wow-delay="0.3s">
                    <div class="card card-lowongan">
                        <div style="position: relative; display: inline-block;">
                            <img src="{{ !empty($lowongan->perusahaan->logo) ? asset('FotoPerusahaan/' . $lowongan->perusahaan->logo) : asset('img/bg1.jpeg') }}" class="card-img-top" style="position: relative; z-index: 1;">
                            <div class="transparan" style="color: white; background-color: rgba(0, 0, 0, 0.5); bottom: 0; position: absolute; z-index: 2; height: 25%; width: 100%; border-radius: 10%;">
                                {{ $lowongan->perusahaan->nama_perusahaan }}
                            </div>
                        </div>
                        <div class="card-body" style="overflow-x: auto; max-width: 100%">
                            <h5 class="card-title">{{ $lowongan->nama_lowongan }}</h5>
                            <table>
                                <tr>
                                    <td>Penempatan</td>
                                    <td> : </td>
                                    <td>{{ $lowongan->kota_id }}</td>
                                </tr>
                                <tr>
                                    <td>Peran Pekerjaan</td>
                                    <td> : </td>
                                    <td>{{ $lowongan->keterangan_lowongan }}</td>
                                </tr>
                                <tr>
                                    <td>Tingkat</td>
                                    <td> : </td>
                                    <td><b>{{ $lowongan->keterangan_profesi }}</b></td>
                                </tr>
                            </table>
                            <a href="{{ route('loker.detail', $lowongan->id_lowongan) }}" class="btn btn-primary" style="float: right; border-radius: 10px; background-color: darkblue; margin-top: 10px;">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
    
</div>
</div>
<!-- end rekomendasi lowongan -->

@endsection