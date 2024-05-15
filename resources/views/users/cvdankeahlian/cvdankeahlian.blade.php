@extends('layoutuser.index')
@section('title')
    SIKEREN | CV & Keahlian
@endsection
@section('header')
    CV & Keahlian
@endsection

@section('content')
    <style>
        .file-upload {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .file-upload .input-file {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload .upload-icon {
            font-size: 22px;
            /* color: #007bff; */
        }

        .upload-box {
            text-align: center;
            padding: 20px;
            border: 2px dashed #007bff;
        }

        #fileInfo {
            display: flex;
            align-items: center;
        }

        #fileInfo img {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }
        
        .custom-height {
            height: 135px;
            /* Sesuaikan tinggi sesuai kebutuhan Anda */
        }

        .table-responsive {
            overflow-x: auto;
            white-space: nowrap;
        }

        .table {
            width: 100%;
            min-width: 1900px;
            /* Adjust this value based on the content */
        }

        .table th,
        .table td {
            min-width: 10px;
            /* Adjust this value based on the content */
        }

        .table select,
        .table input,
        .table textarea {
            width: 100%;
        }
    </style>
    @include('users.cvdankeahlian.transaksicv')
@endsection
@section('js')
    @include('users.cvdankeahlian.jsFunction')
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
