@extends('layoutuser.index')
@section('title')
SIKEREN | Undangan
@endsection
@section('header')
Hsitory Perusahaan
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <b>
            <p style="font-size: 20px">Tambah History</p>
        </b>
    </div>
    <div class="box-body">
        <div class="form-group row">
            <div class="col-md-3">
                <label for="nama_perusahaan" class="col-form-label">Tanggal Jobfair Yang Pernah Diikuti</label>
            </div>
            <div class="col-md-7">
                <!-- <input type="text" class="form-control datepicker" id="tgl" name="tgl" placeholder=""> -->
                <input type="text" class="form-control pull-right datepicker" id="tgl" name="tgl">

            </div>
        </div>
        <div>
            <button type="button" class="btn btn-success" onclick="cari()">save</button>
        </div>
    </div>
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <b>
            <p style="font-size: 20px">List Undangan</p>
        </b>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="table-history">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jabatan</th>
                        <th>Pendidikan</th>
                        <th>Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        load_data_carilowongan();
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy', // atau format yang Anda inginkan
            autoclose: true
        });

    })

    function cari() {
        var tgl = $('#tgl').val();

        $('#table-history').DataTable().destroy();

        load_data_carilowongan(tgl);
    }

    function load_data_carilowongan(tgl = '', ) {
        var table = $('#table-history').DataTable({
            scrollx: true,
            lengthMenu: [5, 10, 25, 50, 100],
            pageLength: 10,
            language: {
                // processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only ml-5">Loading...</span>',
                lengthMenu: "Memuat _MENU_",
                info: "Menampilkan _END_ dari _TOTAL_ data",
                infoEmpty: "Data tidak ditemukan!"
            },
            autoWidth: false,
            searchDelay: 500,
            // processing: false,
            serverSide: true, // note : menggunakan yajra supaya kena
            ajax: {
                url: "{{ Route('perusahaan.perusahaanHistory.getData') }}",
                type: 'GET',
                data: {
                    tgl: tgl,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
            },
            columns: [{
                    data: null
                },
                {
                    data: 'nama_lowongan'
                },
                {
                    data: 'pendidikan'
                },
                {
                    data: 'tgl_lahir'
                },
            ],
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }, ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
            },
        });

        //auto generate row number
        table.on('draw.dt', function() {
            var PageInfo = $('#table-history').DataTable().page.info();
            table.column(0, {
                page: 'current'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            });
        });
    }
</script>
@endsection