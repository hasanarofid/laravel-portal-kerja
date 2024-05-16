<script>
    // upload pdf
    document.getElementById('exampleInputFile').addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file && file.type === "application/pdf") {
            const fileInfo = document.getElementById('fileInfo');
            fileInfo.innerHTML = '';

            // Membuat elemen ikon Font Awesome
            const pdfIcon = document.createElement('i');
            pdfIcon.className = 'fa fa-file-pdf-o'; // Menggunakan kelas Font Awesome untuk ikon PDF
            pdfIcon.style.fontSize = '50px'; // Mengatur ukuran ikon dengan CSS inline
            pdfIcon.style.color = 'red'; // Mengatur ukuran ikon dengan CSS inline

            // Membuat elemen teks nama file
            const fileName = document.createElement('span');
            fileName.textContent = file.name;

            // Menambahkan ikon dan nama file ke dalam elemen fileInfo
            fileInfo.appendChild(pdfIcon);
            fileInfo.appendChild(fileName);
        } else {
            alert('Hanya file PDF yang diizinkan.');
        }
    });

    var norow_hiddenriwayat = 1;
    var norow_hiddensertifikat = 1;
    var norow_hiddenpelatihan = 1;
    var norow_hiddenbahasa = 1;
    var norow_hiddenpengalamankerja = 1;
    var norow_hiddenwebpribadi = 1;

    function addRowRiwayat() {
        let len = $('#table-riwayat > tbody').children('tr').length,
            td = `<tr>
                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                    <td>
                        <select name="riwayat[${len}][nama_pendidikan]" class="form-control select2"
                            style="width: 100%;" required>
                            <option value="" selected disabled>--Pilih Pendidikan--</option>
                            <option value="SLTP">SLTP</option>
                            <option value="SLTA">SLTA</option>
                            <option value="Kuliah S1">Kuliah S1</option>
                            <option value="Kuliah S2">Kuliah S2</option>
                            <option value="Kuliah S3">Kuliah S3</option>
                        </select>
                    </td>
                    <td>
                        <select name="riwayat[${len}][nama_jurusan]" class="form-control select2"
                            style="width: 100%;" required>
                            <option value="" selected disabled>--Pilih Jurusan--</option>
                            <option value="TKJ">TKJ</option>
                            <option value="AKUTANSI">AKUTANSI</option>
                            <option value="Ilmu Komputer">Ilmu Komputer</option>
                        </select>
                    </td>
                    <td>
                        <select name="riwayat[${len}][nama_institusi]" class="form-control select2"
                            style="width: 100%;" required>
                            <option value="" selected disabled>--Pilih Institusi--</option>
                            <option value="Universitas Jember">Universitas Jember</option>
                            <option value="Universitas Trunojoyo">Universitas Trunojoyo</option>
                        </select>
                    </td>
                    <td>
                        <input name="riwayat[${len}][kota]" class="form-control" placeholder="Kota"
                            autocomplete="off">
                    </td>
                    <td>
                        <input name="riwayat[${len}][thn_masuk]" class="form-control hanyaangka" placeholder="Tahun Masuk"
                            autocomplete="off">
                    </td>
                    <td>
                        <input name="riwayat[${len}][thn_keluar]" class="form-control hanyaangka"
                            placeholder="Tahun Keluar" autocomplete="off">
                    </td>
                    <td>
                        <input name="riwayat[${len}][ipk_denim]" class="form-control hanyaangka" placeholder="Ipk/Denim"
                            autocomplete="off">
                    </td>
                    <td>
                        <textarea name="riwayat[${len}][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="button-container">
                            <button type="button" onclick="addRowRiwayat()"
                                class="btn btn-icon btn-success">
                                <span><i class="fa fa-plus"></i>
                                </span>
                            </button>
                            <button type="button" onclick="deleteRowRiwayat(this)" class="btn btn-icon btn-danger">
                                <span><i class="fa fa-minus"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>`
        $('#table-riwayat > tbody').append(td);
        norow_hiddenriwayat++;

        renameInputRow($('#table-riwayat')); // menghasilkan urutan
    }

    function deleteRowRiwayat(obj) {
        $(obj).parents("#table-riwayat > tbody > tr").detach();
        renameInputRow($('#table-riwayat'));
    }

    function addRowSertifikat() {
        let len = $('#table-sertifikat > tbody').children('tr').length,
            td = `<tr>
                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                    <td>
                        <input name="sertifikat[${len}][nama_sertifikat]" class="form-control" placeholder="Nama Sertifikat"
                            autocomplete="off">
                    </td>
                    <td>
                        <input name="sertifikat[${len}][bidang_keahlian]" class="form-control" placeholder="Bidang Keahlian"
                            autocomplete="off">
                    </td>
                    <td>
                        <input name="sertifikat[${len}][nama_institusi]" class="form-control" placeholder="Institusi"
                            autocomplete="off">
                    </td>
                    <td>
                        <input type="text" name="sertifikat[${len}][tgl_terbit]" class="form-control pull-right datepicker"
                            id="datepicker" placeholder="TanggaL Terbit" autocomplete="off">
                    </td>
                    <td>
                        <textarea name="sertifikat[${len}][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="button-container">
                            <button type="button" onclick="addRowSertifikat()"
                                class="btn btn-icon btn-success">
                                <span><i class="fa fa-plus"></i>
                                </span>
                            </button>
                            <button type="button" onclick="deleteRowSertifikat(this)" class="btn btn-icon btn-danger">
                                <span><i class="fa fa-minus"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>`
        $('#table-sertifikat > tbody').append(td);
        norow_hiddensertifikat++;
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        renameInputRow($('#table-sertifikat')); // menghasilkan urutan
    }

    function deleteRowSertifikat(obj) {
        $(obj).parents("#table-sertifikat > tbody > tr").detach();
        renameInputRow($('#table-sertifikat'));
    }

    function addRowPelatihan() {
        let len = $('#table-pelatihan > tbody').children('tr').length,
            td = `<tr>
                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                    <td>
                        <input name="pelatihan[${len}][nama_pelatihan]" class="form-control"
                            placeholder="Nama Pelatihan" autocomplete="off">
                    </td>
                    <td>
                        <input name="pelatihan[${len}][penyelenggara]" class="form-control" placeholder="Penyelenggara"
                            autocomplete="off">
                    </td>
                    <td>
                        <input type="text" name="pelatihan[${len}][tgl_terbit]"
                            class="form-control pull-right datepicker" id="datepicker"
                            placeholder="TanggaL Terbit Pelatihan" autocomplete="off">
                    </td>
                    <td>
                        <textarea name="pelatihan[${len}][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="button-container">
                            <button type="button" onclick="addRowPelatihan()"
                                class="btn btn-icon btn-success">
                                <span><i class="fa fa-plus"></i>
                                </span>
                            </button>
                            <button type="button" onclick="deleteRowPelatihan(this)" class="btn btn-icon btn-danger">
                                <span><i class="fa fa-minus"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>`
        $('#table-pelatihan > tbody').append(td);
        norow_hiddenpelatihan++;
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        renameInputRow($('#table-pelatihan')); // menghasilkan urutan
    }

    function deleteRowPelatihan(obj) {
        $(obj).parents("#table-pelatihan > tbody > tr").detach();
        renameInputRow($('#table-pelatihan'));
    }

    function addRowBahasa() {
        let len = $('#table-bahasa > tbody').children('tr').length,
            td = `<tr>
                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                    <td>
                        <input name="bahasa[${len}][nama_bahasa]" class="form-control"
                            placeholder="Bahasa" autocomplete="off">
                    </td>
                    <td>
                        <select name="bahasa[${len}][level]" class="form-control select2"
                            style="width: 100%;" required>
                            <option value="" selected disabled>--Pilih Level--</option>
                            <option value="beginner">beginner</option>
                            <option value="intermediate">intermediate</option>
                            <option value="proficient">proficient</option>
                            <option value="fluent">fluent</option>
                            <option value="native">native</option>
                        </select>
                    </td>
                    <td>
                        <textarea name="bahasa[${len}][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="button-container">
                            <button type="button" onclick="addRowBahasa()"
                                class="btn btn-icon btn-success">
                                <span><i class="fa fa-plus"></i>
                                </span>
                            </button>
                            <button type="button" onclick="deleteRowBahasa(this)" class="btn btn-icon btn-danger">
                                <span><i class="fa fa-minus"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>`
        $('#table-bahasa > tbody').append(td);
        norow_hiddenbahasa++;

        renameInputRow($('#table-bahasa')); // menghasilkan urutan
    }

    function deleteRowBahasa(obj) {
        $(obj).parents("#table-bahasa > tbody > tr").detach();
        renameInputRow($('#table-bahasa'));
    }

    function addRowPengalamanKerja() {
        let len = $('#table-pengalaman-kerja > tbody').children('tr').length,
            td = `<tr>
                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                    <td>
                        <input name="pengalamankerja[${len}][nama_perusahaan]" class="form-control"
                            placeholder="Nama Perusahaan" autocomplete="off">
                    </td>
                    <td>
                        <input name="pengalamankerja[${len}][bidang]" class="form-control" placeholder="Bidang"
                            autocomplete="off">
                    </td>
                    <td>
                        <input name="pengalamankerja[${len}][profesi]" class="form-control" placeholder="Profesi"
                            autocomplete="off">
                    </td> 
                    <td>
                        <input name="pengalamankerja[${len}][posisi]" class="form-control" placeholder="Posisi"
                            autocomplete="off">
                    </td>
                    <td>
                        <input type="text" name="pengalamankerja[${len}][tgl_masuk]"
                            class="form-control pull-right datepicker" id="datepicker"
                            placeholder="Tanggal Masuk" autocomplete="off">
                    </td>
                    <td>
                        <input type="text" name="pengalamankerja[${len}][tgl_selesai]"
                            class="form-control pull-right datepicker" id="datepicker"
                            placeholder="Tanggal Selesai" autocomplete="off">
                    </td>
                    <td>
                        <textarea name="pengalamankerja[${len}][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="button-container">
                            <button type="button" onclick="addRowPengalamanKerja()"
                                class="btn btn-icon btn-success">
                                <span><i class="fa fa-plus"></i>
                                </span>
                            </button>
                            <button type="button" onclick="deleteRowPengalamanKerja(this)" class="btn btn-icon btn-danger">
                                <span><i class="fa fa-minus"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>`
        $('#table-pengalaman-kerja > tbody').append(td);
        norow_hiddenpengalamankerja++;
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        renameInputRow($('#table-pengalaman-kerja')); // menghasilkan urutan
    }

    function deleteRowPengalamanKerja(obj) {
        $(obj).parents("#table-pengalaman-kerja > tbody > tr").detach();
        renameInputRow($('#table-pengalaman-kerja'));
    }

    function addRowWebPribadi() {
        let len = $('#table-webpribadi > tbody').children('tr').length,
            td = ` <tr>
                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                    <td>
                        <input name="webpribadi[${len}][link]" class="form-control"
                            placeholder="Link" autocomplete="off">
                    </td>
                    <td>
                        <input name="webpribadi[${len}][nama_web]" class="form-control" placeholder="Nama"
                            autocomplete="off">
                    </td>
                    <td>
                        <textarea name="webpribadi[${len}][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="button-container">
                            <button type="button" onclick="addRowWebPribadi()"
                                class="btn btn-icon btn-success">
                                <span><i class="fa fa-plus"></i>
                                </span>
                            </button>
                            <button type="button" onclick="deleteRowWebPribadi(this)" class="btn btn-icon btn-danger">
                                <span><i class="fa fa-minus"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>`
        $('#table-webpribadi > tbody').append(td);
        norow_hiddenwebpribadi++;

        renameInputRow($('#table-webpribadi')); // menghasilkan urutan
    }

    function deleteRowWebPribadi(obj) {
        $(obj).parents("#table-webpribadi > tbody > tr").detach();
        renameInputRow($('#table-webpribadi'));
    }

    $(document).on("input", ".hanyaangka", function(e) {
        this.value = this.value.replace(/[^0-9.,]/g, '');
        this.value = this.value.replace(/(\..*)\./g, '$1').replace(/(,.*)\,/g, '$1');
    });

    function deleteRowTersimpanRiwayat(obj, val, val2) {
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
                    url: "{{ Route('users.hapusdataRiwayat') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        riwayatpendidikan_id: val,
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
                                $(obj).parents("#table-riwayat > tbody > tr").detach();
                                renameInputRow($('#table-riwayat'));
                            }
                            if (response.count == 1) {
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

    function deleteRowTersimpanSertifikat(obj, val, val2) {
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
                    url: "{{ Route('users.hapusdataSertifikat') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        sertifikatpendidikan_id: val,
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
                                $(obj).parents("#table-sertifikat > tbody > tr").detach();
                                renameInputRow($('#table-sertifikat'));
                            }
                            if (response.count == 1) {
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

    function deleteRowTersimpanPelatihan(obj, val, val2) {
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
                    url: "{{ Route('users.hapusdataPelatihan') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        pelatihanpendidikan_id: val,
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
                                $(obj).parents("#table-pelatihan > tbody > tr").detach();
                                renameInputRow($('#table-pelatihan'));
                            }
                            if (response.count == 1) {
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

    function deleteRowTersimpanBahasa(obj, val, val2) {
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
                    url: "{{ Route('users.hapusdataBahasa') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        bahasa_dikuasai_id: val,
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
                                $(obj).parents("#table-bahasa > tbody > tr").detach();
                                renameInputRow($('#table-bahasa'));
                            }
                            if (response.count == 1) {
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

    function deleteRowTersimpanPengalamanKerja(obj, val, val2) {
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
                    url: "{{ Route('users.hapusdataPengalaman') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        pengalaman_kerja_id: val,
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
                                $(obj).parents("#table-pengalaman-kerja > tbody > tr").detach();
                                renameInputRow($('#table-pengalaman-kerja'));
                            }
                            if (response.count == 1) {
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

    function deleteRowTersimpanWebPribadi(obj, val, val2) {
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
                    url: "{{ Route('users.hapusdataWeb') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data: {
                        webpribadi_id: val,
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
                                $(obj).parents("#table-webpribadi > tbody > tr").detach();
                                renameInputRow($('#table-webpribadi'));
                            }
                            if (response.count == 1) {
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

    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy', // atau format yang Anda inginkan
            autoclose: true
        });
    });
</script>
