@extends('layoutuser.index')
@section('title')
    SIKEREN | Profil
@endsection
@section('header')
    Profil
@endsection
@section('content')
    <style>
        .custom-height {
            height: 600px;
            /* Sesuaikan tinggi sesuai kebutuhan Anda */
        }

        .profile-picture {
            margin: auto;
            margin-top: 20px;
            width: 200px;
            height: 200px;
            border-radius: 70%;
            overflow: hidden;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .input-file {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload span {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .file-upload i {
            margin-top: 10px;
            margin-right: 5px;
        }
    </style>
    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- left column -->
            <div class="col-md-3" style="text-align:center">
                <!-- general form elements -->
                <div class="box box-primary custom-height">
                    <div class="profile-picture">
                        <img src="{{ asset('img/b1.jpg') }}" alt="Foto Profil">
                    </div>
                    <a href="#" class="file-upload">
                        <input type="file" id="exampleInputFile" class="input-file">
                        <span><i class="fa fa-camera"></i> Unggah Foto</span>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <!-- general form elements -->
                <div class="box box-primary custom-height">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Profil</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="name" value="{{ $modPencaker->name }}" class="form-control" id="name"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat ...">{{ $modPencaker->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input name="no_tlp" value="{{ $modPencaker->no_tlp }}" class="form-control" id="no_tlp" placeholder="No. Telepon">
                        </div>
                        <div class="form-group">
                            <label style="margin-right: 150px;">
                                <input type="radio" name="Laki-Laki" class="flat-red">
                                Laki-Laki
                            </label>
                            <label>
                                <input type="radio" name="Perempuan" class="flat-red">
                                Perempuan
                            </label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input name="password" class="form-control" id="password" placeholder="Password Baru">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input name="password" class="form-control" id="password"
                                    placeholder="Konfirmasi Password">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
