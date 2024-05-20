@extends('layoutuser.index')
@section('title')
SIKEREN | Dashboard
@endsection
@section('header')
Lowongan
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="row" style="margin-bottom: 25px">
            <div class="col-md-4" >
                <a href="{{ route('perusahaan.lowongan.tambah') }}" class="btn btn-primary">Tambah Data</a>

                <!-- <button type="button" class="btn btn-primary">Tambah Data</button> -->
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="table-riwayat">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lowongan</th>
                        <th>Detail Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection