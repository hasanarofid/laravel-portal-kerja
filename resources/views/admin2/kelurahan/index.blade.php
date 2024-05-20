@php
    use App\Kelurahan;
    $modKelurahan = Kelurahan::get();
@endphp
@extends('layoutuser.index')
@section('title')
    SIKEREN | Kelurahan
@endsection
@section('header')
    Kelurahan
@endsection
@section('content')
    <form action="{{ route('admin.simpan-kelurahan') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="nama_kelurahan" class="col-form-label">Nama Kelurahan :</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan"
                            placeholder="Nama Kelurahan" autocomplete="off">
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
                <p style="font-size: 20px">Tabel Kelurahan</p>
            </b>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-rounded table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelurahan</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($modKelurahan)
                            @foreach ($modKelurahan as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama_kelurahan }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <div class="button-container">
                                            <button type="button" onclick="deleteRow( {{ $item->kelurahan_tabel_id }} )"
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
    @include('admin2.kelurahan.jsFunction')
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
