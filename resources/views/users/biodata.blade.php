@extends('layoutuser.index')
@section('title')
    SIKEREN | Biodata
@endsection
@section('header')
    Biodata
@endsection
<style>
    .custom-height {
        height: 320px;
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
@section('content')
    @if (!empty($modPencariKerja))
        @include('users.detailBiodata')
    @else
        @include('users.transaksiBiodata')
    @endif
@endsection
@section('js')
    @include('users.jsFunction')
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
