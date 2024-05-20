@php
    use App\Kota;
    $modKota = Kota::get();
@endphp
@extends('layoutuser.index')
@section('title')
    SIKEREN | Kota
@endsection
@section('header')
    Kota
@endsection
@section('content')
    <form action="{{ route('admin.simpan-kota') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="nama_kota" class="col-form-label">Nama Kota :</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="nama_kota" name="nama_kota"
                            placeholder="Nama Kota" autocomplete="off">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </form>

    <div class="box box-primary">
        <div class="box-header with-border">
            <b>
                <p style="font-size: 20px">Tabel Kota</p>
            </b>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-rounded table-striped" id="table-riwayat">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kota</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($modKota)
                            @foreach ($modKota as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama_kota }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <div class="button-container">
                                            <button type="button" onclick="deleteRow( {{ $item->kota_tabel_id }} )"
                                                class="btn btn-icon btn-danger">
                                                <span><i class="fa fa-minus"></i></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('admin2.kota.jsFunction')
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
