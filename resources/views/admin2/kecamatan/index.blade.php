@php
    use App\Kecamatan;
    $modKecamatan = Kecamatan::get();
@endphp
@extends('layoutuser.index')
@section('title')
    SIKEREN | Kecamatan
@endsection
@section('header')
    Kecamatan
@endsection
@section('content')
    <form action="{{ route('admin.simpan-kecamatan') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="nama_kecamatan" class="col-form-label">Nama Kecamatan :</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                            placeholder="Nama Kecamatan" autocomplete="off">
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
                <p style="font-size: 20px">Tabel Kecamatan</p>
            </b>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-rounded table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kecamatan</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($modKecamatan)
                            @foreach ($modKecamatan as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama_kecamatan }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <div class="button-container">
                                            <button type="button" onclick="deleteRow( {{ $item->kecamatan_tabel_id }} )"
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
    @include('admin2.kecamatan.jsFunction')
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
