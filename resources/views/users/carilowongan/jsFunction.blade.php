<script>
    // button cari
    function refreshTabel() {
        var nama_perusahaan = $('input[name="nama_perusahaan"]').val();
        var nama_lowongan = $('input[name="nama_lowongan"]').val();
        var bidang_id = $('select[name="bidang_id"]').val();

        $('#table_carilowongan').DataTable().destroy();

        load_data_carilowongan(nama_perusahaan, nama_lowongan, bidang_id);
    }
    /**
     * load datatable rsjejaring
     */
    function load_data_carilowongan(nama_perusahaan = '', nama_lowongan = '', bidang_id = '') {
        var table = $('#table_carilowongan').DataTable({
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
                url: "{{ Route('users.setTabelCarilowongan') }}",
                type: 'POST',
                data: {
                    nama_perusahaan: nama_perusahaan,
                    nama_lowongan: nama_lowongan,
                    bidang_id: bidang_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
            },
            columns: [{
                    data: null
                },
                {
                    data: 'nama_perusahaan'
                },
                {
                    data: 'nama_lowongan'
                },
                {
                    data: 'detail_pekerjaan'
                },
                {
                    data: 'umur'
                },
                {
                    data: 'tgl_mulai'
                },
                {
                    data: 'batas_tgl_lowongan'
                },
                {
                    data: 'insert'
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
            var PageInfo = $('#table_carilowongan').DataTable().page.info();
            table.column(0, {
                page: 'current'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            });
        });
    }
</script>
