<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profile-picture');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    var norow_hidden = 1;

    function addRow() {
        let len = $('#table-keterampilan > tbody').children('tr').length,
            td = `<tr>
                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                    <td>
                        <input name="ketrampilan[${len}][nama_keterampilan]" class="form-control" placeholder="Nama Keterampilan">
                    </td>
                    <td>
                        <textarea name="ketrampilan[${len}][keterangan]" class="form-control" rows="1" placeholder="Ketrangan. . . . "></textarea>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="button-container">
                            <button type="button" onclick="addRow()"
                                class="btn btn-icon btn-success">
                                <span><i class="fa fa-plus"></i>
                                </span>
                            </button>
                            <button type="button" onclick="deleteRow(this)" class="btn btn-icon btn-danger">
                                <span><i class="fa fa-minus"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>`
        $('#table-keterampilan > tbody').append(td);
        norow_hidden++;

        renameInputRow($('#table-keterampilan')); // menghasilkan urutan
    }

    function deleteRow(obj) {
        $(obj).parents("#table-keterampilan > tbody > tr").detach();
        renameInputRow($('#table-keterampilan'));
    }


    /**
     * rename input row table
     */
    function renameInputRow(obj_table) {
        var row = 0;
        $(obj_table).find("tbody > tr").each(function() {
            $(this).find("#no_urut").html(row + 1);
            $(this).attr("rowdata", row);
            $(this).find('.rowdata').val(row);
            $(this).find('.rowdata2').val(row);
            $(this).find('input,select,textarea').each(function() {
                var old_name = $(this).attr("name").replace(/]/g, "");
                var old_name_arr = old_name.split("[");
                if (old_name_arr.length == 3) {
                    $(this).attr("id", old_name_arr[0] + "_" + row + "_" + old_name_arr[2]);
                    $(this).attr("name", old_name_arr[0] + "[" + row + "][" + old_name_arr[2] + "]");
                }

                if (old_name_arr.length == 4) {
                    $(this).attr("id", old_name_arr[0] + "_" + old_name_arr[1] + "_" + row + "_" +
                        old_name_arr[3]);
                    $(this).attr("name", old_name_arr[0] + "[" + old_name_arr[1] + "][" + row + "][" +
                        old_name_arr[3] + "]");
                }
            });

            row++;
        });
    }

    function deleteRowTersimpan(obj, val, val2) {
        var index = obj.value;
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
                    url: "{{ Route('users.hapusdata') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        keterampilan_id: val,
                        pencari_kerja_id: val2
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
                            // Redirect ke action 'index' pada controller 'InformasiJumlahKasusRSJejaringController'
                            if (response.message == 'BERHASIL') {
                                $(obj).parents("#table-keterampilan > tbody > tr").detach();
                                renameInputRow($('#table-keterampilan'));
                            }
                            if (response.count == 1) {
                                setTimeout(() => {
                                    location.reload();
                                }, 5000);
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
