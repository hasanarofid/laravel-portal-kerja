@php
    use App\UsersPencaker;
    use App\Perusahaan;
    $modPencaker = UsersPencaker::where('is_active', true)->get();
    $modPerusahaan = Perusahaan::where('is_active', true)->get();
@endphp
@extends('layoutuser.index')
@section('title')
    SIKEREN | Dashboard
@endsection
@section('header')
    Dashboard
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <b>
                <p style="font-size: 20px">Tabel Pencaker</p>
            </b>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-rounded table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pencaker</th>
                            <th>E-mail</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($modPencaker)
                            @foreach ($modPencaker as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_tlp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <div class="button-container">
                                            <button type="button" onclick="deleteRow( {{ $item->id }} )"
                                                class="btn btn-icon btn-danger">
                                                <span><i class="fa fa-minus"></i></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <b>
                <p style="font-size: 20px">Tabel Perusahaan</p>
            </b>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-rounded table-striped" id="example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>E-mail</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($modPerusahaan)
                            @foreach ($modPerusahaan as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama_perusahaan }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <div class="button-container">
                                            <button type="button" onclick="deleteRow2( {{ $item->id_perusahaan }} )"
                                                class="btn btn-icon btn-danger">
                                                <span><i class="fa fa-minus"></i></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('admin2.jsFunction')
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
                text: '{{ session('success') }}',
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

