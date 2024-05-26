@extends('layoutuser.index')
@section('title')
SIKEREN | Dashboard
@endsection
@section('header')
Dashboard
@endsection
@section('content')

<div>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class=" img-responsive" src="{{ asset('FotoPerusahaan/' . $cek->logo) }}" alt="User profile picture" align="left" style="height: 100px;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3">
                            <h3><b>{{$cek->nama_perusahaan}}</b></h3>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$cek->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Telp</td>
                        <td>:</td>
                        <td>{{$cek->telepon}}</td>
                    </tr>
                    <tr>
                        <td>Bidang Usaha</td>
                        <td>:</td>
                        <td>{{$data->nama_bidang}}</td>
                    </tr>
                    <tr>
                        <td>{{$cek->email}}</td>
                        <td></td>
                        <td>{{$cek->website}}</td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><b>{{$lowongan}} Lowongan</b></h3>
                <br>
                <p>Total Lowongan Yang Pernah Di Daftarkan Di Disnaker</p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><b>{{$lowongan2}} Lowongan Aktif</b></h3>
                <br>
                <p>Total Lowongan Yang Aktif Saat Ini Di Disnaker</p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h1 class="box-title"><b>Berita Terbaru</b></h1>
                <br><br>
                <button type="button" style="width: 250px; float: right;" class="btn btn-block btn-primary btn-sm">Lihat Semua Berita</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        </div>

    </div>
</div>
<br>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Agenda Perusahaan</b></h3>
            <div class="box-body">
                @if ($modLamar)
                @foreach ($modLamar as $item)
                <p style="font-size: 15px;">
                    <b>Interview</b> Pada Tanggal {{ date('d/m/Y', strtotime($item->tgl_interview)) }},
                </p>
                <ul>
                    <li>Nama Pencaker : {{ $item->nama }}</li>
                    <li>Jenis Kelamin: {{ $item->gender }}</li>
                    <li>Umur: {{ $item->umur }}</li>
                    <li>Email: {{ $item->email }}</li>
                    <li>Melamar Sebagai: {{ $item->nama_lowongan }}</li>
                </ul>
                <hr>
                @endforeach
                @endif
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
    </div>

</div>

@endsection