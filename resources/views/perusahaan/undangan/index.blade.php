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
    $(document).ready(function() {
        load_data_carilowongan();
        $('.txtInterview').datepicker({
            format: 'dd/mm/yyyy', // atau format yang Anda inginkan
            autoclose: true
        });

    })

    function simpanPerubahan() {
        // Ambil nilai dari input atau elemen lainnya dalam modal
        var tgl = $('#txtInterview').val();
        var id = $('#txtId').val(); // hiddenId adalah ID input hidden yang menyimpan nilai id

        // Lakukan operasi simpan, contohnya menggunakan AJAX
        $.ajax({
            url: '{{ Route("perusahaan.undangan.updateInterview") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                'id': id,
                'tgl': tgl
            },
            success: function(response) {
                // Tambahkan logika penanganan sukses di sini
                console.log('Data berhasil Di Update');
                // Tutup modal setelah berhasil disimpan
                $('#exampleModal').modal('hide');
                location.reload();
            },
            error: function(xhr, status, error) {
                // Tambahkan logika penanganan error di sini
                console.error('Terjadi kesalahan:', error);
            }
        });
    }

    function simpanBatal() {
        // Ambil nilai dari input atau elemen lainnya dalam modal
        var txtAlasan = $('#txtAlasan').val();
        var txtIdAlasan = $('#txtIdAlasan').val(); // hiddenId adalah ID input hidden yang menyimpan nilai id

        // Lakukan operasi simpan, contohnya menggunakan AJAX
        $.ajax({
            url: '{{ Route("perusahaan.undangan.batalInterview") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                'id': txtIdAlasan,
                'alasan': txtAlasan
            },
            success: function(response) {
                // Tambahkan logika penanganan sukses di sini
                console.log('Data berhasil Di Update');
                // Tutup modal setelah berhasil disimpan
                $('#batalModal').modal('hide');
                location.reload();
            },
            error: function(xhr, status, error) {
                // Tambahkan logika penanganan error di sini
                console.error('Terjadi kesalahan:', error);
            }
        });
    }

    function refreshTabel() {
        var txtKeterampilan = $('#txtKeterampilan').val();
        var txtPendidikan = $('#txtPendidikan').val();
        var txtProdi = $('#txtProdi').val();
        var txtBidang = $('#txtBidang').val();
        var txtStatus = $('#txtStatus').val();
        var txtMinat = $('#txtMinat').val();
        var rbGender = $('input[name="rbGender"]').val();
        var txtMinimal = $('#txtMinimal').val();
        var txtMaksimal = $('#txtMaksimal').val();

        $('#table-undangan').DataTable().destroy();

        load_data_carilowongan(txtKeterampilan, txtPendidikan, txtProdi, txtBidang, txtStatus, txtMinat, rbGender, txtMinimal, txtMaksimal);
    }

    function load_data_carilowongan(txtKeterampilan = '', txtPendidikan = '', txtProdi = '', txtBidang = '', txtStatus = '', txtMinat = '', rbGender = '', txtMinimal = '', txtMaksimal = '') {
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
                    txtKeterampilan: txtKeterampilan,
                    txtPendidikan: txtPendidikan,
                    txtProdi: txtProdi,
                    txtBidang: txtBidang,
                    txtStatus: txtStatus,
                    txtMinat: txtMinat,
                    rbGender: rbGender,
                    txtMinimal: txtMinimal,
                    txtMaksimal: txtMaksimal,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
            },
            columns: [{
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
                // {
                //     data: 'pendidikan'
                // },
                // {
                //     data: 'bidang_pengalaman'
                // },
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

    function onVerif(id) {
        $('#verifModal').modal('show');
        $('#txtId').val(id);
    }

    function onBatal(id) { 
        $('#batalModal').modal('show');
        $('#txtIdAlasan').val(id);
     }
</script>
@endsection