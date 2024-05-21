@extends('layoutuser.index')
@section('title')
    SIKEREN | Lowongan Perusahaan
@endsection
@section('header')
    Lowongan Perusahaan
@endsection
@section('content')
    <form action="{{ route('users.simpan-lamarpekerjaan') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" disabled name="nama_perusahaan" class="form-control"
                        value="{{ $modPerusahaan->nama_perusahaan }}">
                    <input type="hidden" name="id_lowongan" class="form-control"
                        value="{{ $modLowongan->id_lowongan }}">
                </div>
                <div class="form-group">
                    <label>Nama Lowongan</label>
                    <input type="text" disabled name="nama_lowongan" class="form-control"
                        value="{{ $modLowongan->nama_lowongan }}">
                </div>
                <div class="form-group">
                    <label for="foto">File Lampiran Kualifikasi</label>
                    <input type="file" name="lampiran_kualifikasi" id="foto" accept="application/pdf">
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
