<script>
    function deleteRow(id) {
        // Tampilkan dialog konfirmasi menggunakan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Membuat permintaan AJAX ke server
                $.ajax({
                    type: 'POST',
                    url: "{{ Route('admin.hapusdatausers') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        // Hapus baris dari DOM jika penghapusan berhasil
                        Swal.close();
                        Swal.fire({
                            text: "Data sukses Di Hapus",
                            icon: "success",
                            timer: 600,
                            buttonsStyling: false,
                            confirmButtonText: "Selesai",
                            customClass: {
                                confirmButton: "btn btn-success"
                            }
                        }).then(function(result) {
                            if (response.message == 'BERHASIL') {
                                location.reload();
                            }
                        });
                    },
                    error: function(error) {
                        console.error("Error deleting row:", error);
                    }
                });
            } else {
                console.log("Deletion canceled!");
            }
        });
    }
    function deleteRow2(id) {
        // Tampilkan dialog konfirmasi menggunakan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Membuat permintaan AJAX ke server
                $.ajax({
                    type: 'POST',
                    url: "{{ Route('admin.hapusdataperusahaan') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        id_perusahaan: id,
                    },
                    success: function(response) {
                        // Hapus baris dari DOM jika penghapusan berhasil
                        Swal.close();
                        Swal.fire({
                            text: "Data sukses Di Hapus",
                            icon: "success",
                            timer: 600,
                            buttonsStyling: false,
                            confirmButtonText: "Selesai",
                            customClass: {
                                confirmButton: "btn btn-success"
                            }
                        }).then(function(result) {
                            if (response.message == 'BERHASIL') {
                                location.reload();
                            }
                        });
                    },
                    error: function(error) {
                        console.error("Error deleting row:", error);
                    }
                });
            } else {
                console.log("Deletion canceled!");
            }
        });
    }
</script>