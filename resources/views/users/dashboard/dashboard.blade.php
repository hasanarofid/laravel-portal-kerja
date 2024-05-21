@php
    use App\LamarPekerjaan;
    use App\Lowongan;
    use App\Perusahaan;
    $modLowongan = Lowongan::get();
    $modLowonganCount = Lowongan::count();
    $modLamarPekerjaan = LamarPekerjaan::where('pencari_kerja_id', session('pencaker_id'))->count();
    $modLamarPekerjaanDiterima = LamarPekerjaan::where('pencari_kerja_id', session('pencaker_id'))
        ->where('status', 1)
        ->count();
    $modLamarPekerjaanDitolak = LamarPekerjaan::where('pencari_kerja_id', session('pencaker_id'))
        ->where('status', 2)
        ->count();
@endphp
@extends('layoutuser.index')
@section('title')
    SIKEREN | Dashboard
@endsection
@section('content')
    <div class="row">
        <div style="text-align: center" class="box-header with-border">
            <b>
                <p style="font-size: 25px">PROSES REKRUTMENT</p>
            </b>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    @if ($modLowonganCount)
                        <h3>{{ $modLowonganCount }}</h3>
                    @else
                        <h3>0</h3>
                    @endif

                    <p>Total</p>
                </div>
                <div class="icon">
                    <i class="fa fa-folder-open-o"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    @if ($modLamarPekerjaan)
                        <h3>{{ $modLamarPekerjaan }}</h3>
                    @else
                        <h3>0</h3>
                    @endif

                    <p>Terbaca</p>
                </div>
                <div class="icon">
                    <i class="fa fa-envelope-o"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    @if ($modLamarPekerjaanDiterima)
                        <h3>{{ $modLamarPekerjaanDiterima }}</h3>
                    @else
                        <h3>0</h3>
                    @endif

                    <p>Diterima</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-square-o"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    @if ($modLamarPekerjaanDitolak)
                        <h3>{{ $modLamarPekerjaanDitolak }}</h3>
                    @else
                        <h3>0</h3>
                    @endif

                    <p>Ditolak</p>
                </div>
                <div class="icon">
                    <i class="fa fa-ban"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <br>
    <div class="box box-primary">
        <div class="box-header with-border">
            <b>
                <p style="font-size: 20px">INFORMASI</p>
            </b>
        </div>
        <div class="box-body">
            @foreach ($modLowongan as $item)
                @php
                    $modPerusahaan = Perusahaan::where('id_perusahaan', $item['id_perusahaan'])->first();
                @endphp
                <p style="font-size: 15px;">
                    <b>{{ $modPerusahaan->nama_perusahaan }}</b> membuka lowongan {{ $item['nama_lowongan'] }},
                    {{ $item['keterangan_lowongan'] }} dengan persyaratan:
                </p>
                <ul>
                    <li>Umur minimal: {{ $item['umur_minimal'] }}</li>
                    <li>Umur maksimal: {{ $item['umur_maksimal'] }}</li>
                    @if ($item['pria'] == 1)
                        <li>Jenis kelamin: Laki-Laki</li>
                    @endif
                    @if ($item['wanita'] == 1)
                        <li>Jenis kelamin: Perempuan</li>
                    @endif
                    @if ($item['lajang'] == 1)
                        <li>Status: Masih Lajang</li>
                    @endif
                    <li>Detail Pekerjaan: {{ $item['detail_pekerjaan'] }}</li>
                    <li>Profesi: {{ $item['profesi'] }}</li>
                    <li>Batas Kontrak: {{ $item['batas_kontrak'] }} Tahun</li>
                    <li>Jurusan: {{ $item['jurusan'] }}</li>
                    <li>Fasilitas: {{ $item['nama_fasilitas'] }}</li>
                </ul>
                <p style="font-size: 15px;">
                    Batas tanggal lowongan: {{ date('d/m/Y', strtotime($item['batas_tgl_lowongan'])) }}
                    Tanggal mulai kerja: {{ date('d/m/Y', strtotime($item['tgl_mulai'])) }} <br>
                    Sekian informasi dari kami.
                </p>
                <hr>
            @endforeach
        </div>
    </div>
    <!-- /.row -->
@endsection
