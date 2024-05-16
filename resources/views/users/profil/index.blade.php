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
    <form action="{{ route('users.simpan-profil') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- left column -->
            <div class="col-md-3" style="text-align:center">
                <!-- general form elements -->
                <div class="box box-primary custom-height">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pas Foto Formal</h3>
                    </div>
                    @if ($modPencaker->foto == null)
                        <div class="profile-picture">
                            <img id="profile-picture" src="{{ asset('img/image.jpg') }}" alt="Foto Profil">
                        </div>
                    @else
                        <div class="profile-picture">
                            <img id="profile-picture" src="{{ asset('fotoProfil/' . $modPencaker->foto) }}"
                                alt="Foto Profil">
                        </div>
                    @endif
                    <a href="#" class="file-upload">
                        <input type="file" name="foto" id="exampleInputFile" class="input-file"
                            onchange="previewImage(event)">
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
                            <input name="no_tlp" value="{{ $modPencaker->no_tlp }}" class="form-control" id="no_tlp"
                                placeholder="No. Telepon">
                        </div>
                        <div class="form-group">
                            <label style="margin-right: 150px;">
                                <input type="radio" name="gender" class="flat-red" value="Laki-Laki" {{ $modPencaker->gender == 'Laki-Laki' ? 'checked' : '' }}>
                                Laki-Laki
                            </label>
                            <label>
                                <input type="radio" name="gender" class="flat-red" value="Perempuan" {{ $modPencaker->gender == 'Perempuan' ? 'checked' : '' }}>
                                Perempuan
                            </label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="password" class="form-control" id="new_password"
                                    placeholder="Password Baru">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password" class="form-control" id="confirm_password"
                                    placeholder="Konfirmasi Password">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button id="submit_button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.getElementById('submit_button').addEventListener('click', function(event) {
            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var genderSelected = document.querySelector('input[name="gender"]:checked');

            if (!genderSelected) {
                event.preventDefault(); // Mencegah form submit
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Silakan pilih jenis kelamin!'
                });
                return;
            }

            if (newPassword !== confirmPassword) {
                event.preventDefault(); // Mencegah form submit
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password dan Konfirmasi Password tidak sama!'
                });

            }
        });

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profile-picture');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
@if ($errors->any())
    <script stype="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                text: 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.',
                icon: 'error',
                buttonsStyling: !1,
                confirmButtonText: "Lanjutkan",
                customClass: {
                    confirmButton: "btn btn-danger"
                },
                allowOutsideClick: false,
            });
        });
    </script>
@endif
@if (Session::has('success'))
    <script stype="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "SELAMAT!",
                text: "Data Berhasil Disimpan",
                icon: "success"
            });
        });
    </script>
@endif
@if (Session::has('error'))
    <script stype="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                text: '{{ session('error') }}',
                icon: 'error',
                buttonsStyling: !1,
                confirmButtonText: "Lanjutkan",
                customClass: {
                    confirmButton: "btn btn-danger"
                },
                allowOutsideClick: false,
            });
        });
    </script>
@endif
