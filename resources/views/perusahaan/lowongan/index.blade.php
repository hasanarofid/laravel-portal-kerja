@extends('layoutuser.index')
@section('title')
SIKEREN | Dashboard
@endsection
@section('header')
Lowongan
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="row" style="margin-bottom: 25px">
            <div class="col-md-4">
                <a href="{{ route('perusahaan.lowongan.tambah') }}" class="btn btn-primary">Tambah Data</a>

                <!-- <button type="button" class="btn btn-primary">Tambah Data</button> -->
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="table-riwayat">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lowongan</th>
                        <th>Detail Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($model as $data)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$data->nama_lowongan}}</td>
                        <td>{{$data->detail_pekerjaan}}</td>
                        <td>
                            <button type="button" onclick="loadEdtAkses('{{$data->id_lowongan}}')" class="btn btn-warning fs-8" title="Edit Data">
                                <i class="fa fa-fw fa-align-justify"></i>
                            </button>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- start rangka modal --}}
    <div class="modal fade" id="modalLowongan" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="titleLowongan"></h3>
                </div>
                <div class="modal-body" id="bodyLowongan" style="overflow-y:auto;">

                </div>
                <div class="modal-footer" id="footerLowongan">

                </div>
            </div>
        </div>
    </div>
    {{-- finish rangka modal --}}

@endsection
@section('js')
<script>
    function loadEdtAkses(id) {
        $('#modalLowongan').modal('show');
        $('#titleLowongan').html('<h3><b>Loker '+ id + '</b></h3>');
        $('#bodyLowongan').html('');
        $.ajax({
            url: "{{ route('perusahaan.lowongan.loadLowongan', ['id' => '']) }}/" + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#bodyLowongan').html(response.html);
                $('#footerLowongan').html(
                    '<button type="button" class="btn btn-light btn-hover-scale me-5" data-dismiss="modal">Tutup</button>'
                );
            }
        });
    }
</script>
@endsection