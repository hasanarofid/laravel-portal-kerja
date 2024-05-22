@extends('layoutuser.index')
@section('title')
    SIKEREN | Undangan
@endsection
@section('header')
    Undangan
@endsection
@section('content')
    @include('perusahaan.undangan.tambahundangan')
    <br>
    @include('perusahaan.undangan.tabeldata')
@endsection
@section('js')
<script>
    $(document).ready(function(){
        load_data_carilowongan();
    })
    function load_data_carilowongan() {
        var table = $('#table-undangan').DataTable({
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
                url: "{{ Route('perusahaan.undangan.getData') }}",
                type: 'GET',
                data: {
                    // nama_perusahaan: nama_perusahaan,
                    // nama_lowongan: nama_lowongan,
                    // bidang_id: bidang_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
            },
            columns: [
                {
                    data: null
                },
                {
                    data: 'tanggal_melamar'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'jenis_kelamin'
                },
                {
                    data: 'tanggal_lahir'
                },
                {
                    data: 'pendidikan'
                },
                {
                    data: 'bidang_pengalaman'
                },
                {
                    data: 'no_hp'
                },
                {
                    data: 'aksi'
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
            var PageInfo = $('#table-undangan').DataTable().page.info();
            table.column(0, {
                page: 'current'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            });
        });
    }
</script>
@endsection
