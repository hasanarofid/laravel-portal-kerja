@php
    use App\Kategori;
    $modKategori = Kategori::get();
@endphp
@extends('layoutuser.index')
@section('title')
    SIKEREN | Kategori
@endsection
@section('header')
    Kategori
@endsection
@section('content')
    <form action="{{ route('admin.simpan-kategori') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="nama_kategori" class="col-form-label">Nama Kategori :</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                            placeholder="Nama Kategori" autocomplete="off">
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
                <p style="font-size: 20px">Tabel Kategori</p>
            </b>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Tanggal Dibuat</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($modKategori)
                        @foreach ($modKategori as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    <div class="button-container">
                                        <button type="button" onclick="deleteRow( {{ $item->kategori_id }} )"
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

@endsection
@section('js')
    @include('admin2.kategori.jsFunction')
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
