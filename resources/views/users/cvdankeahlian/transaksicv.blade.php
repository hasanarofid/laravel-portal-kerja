<form action="{{ route('users.simpan-cvdankeahlian') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-3" style="text-align:center">
        <div class="box box-primary custom-height upload-box">
            <a href="#" class="file-upload">
                <div id="fileInfo" style="margin-bottom: 20px"></div>
                <i class="fa fa-upload upload-icon"> Upload</i>
                <input type="file" name="foto" id="exampleInputFile" class="input-file" accept="application/pdf">
            </a>
        </div>
    </div>
    <div class="col-md-4" style="vertical-align: middle;">
        <p style="margin-top: 50px; color:red">Hanya bisa mengirim file dengan format .pdf</p>
    </div>
    {{-- Riwayat Pendidikan --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;">
                <div class="box-header with-border">
                    <h3 class="box-title">Riwayat Pendidikan</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="table-riwayat">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pendidikan</th>
                                <th>Jurusan</th>
                                <th>Institusi</th>
                                <th>Kota</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Keluar</th>
                                <th>IPK/Denim</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                                <td>
                                    <select name="riwayat[0][nama_pendidikan]" class="form-control select2"
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
                                    <select name="riwayat[0][nama_jurusan]" class="form-control select2"
                                        style="width: 100%;" required>
                                        <option value="" selected disabled>--Pilih Jurusan--</option>
                                        <option value="TKJ">TKJ</option>
                                        <option value="AKUTANSI">AKUTANSI</option>
                                        <option value="Ilmu Komputer">Ilmu Komputer</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="riwayat[0][nama_institusi]" class="form-control select2"
                                        style="width: 100%;" required>
                                        <option value="" selected disabled>--Pilih Institusi--</option>
                                        <option value="Universitas Jember">Universitas Jember</option>
                                        <option value="Universitas Trunojoyo">Universitas Trunojoyo</option>
                                    </select>
                                </td>
                                <td>
                                    <input name="riwayat[0][kota]" class="form-control" placeholder="Kota"
                                        autocomplete="off">
                                </td>
                                <td>
                                    <input name="riwayat[0][thn_masuk]" class="form-control hanyaangka"
                                        placeholder="Tahun Masuk" autocomplete="off">
                                </td>
                                <td>
                                    <input name="riwayat[0][thn_keluar]" class="form-control hanyaangka"
                                        placeholder="Tahun Keluar" autocomplete="off">
                                </td>
                                <td>
                                    <input name="riwayat[0][ipk_denim]" class="form-control hanyaangka"
                                        placeholder="Ipk/Denim" autocomplete="off">
                                </td>
                                <td>
                                    <textarea name="riwayat[0][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="button-container">
                                        <button type="button" onclick="addRowRiwayat()"
                                            class="btn btn-icon btn-success">
                                            <span><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Riwayat Pendidikan --}}

    {{-- Sertifikat --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;">
                <div class="box-header with-border">
                    <h3 class="box-title">Sertifikat</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="table-sertifikat">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Sertifikat</th>
                                <th>Bidang Keahlian</th>
                                <th>Institusi</th>
                                <th>TanggaL Terbit</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                                <td>
                                    <input name="sertifikat[0][nama_sertifikat]" class="form-control"
                                        placeholder="Nama Sertifikat" autocomplete="off">
                                </td>
                                <td>
                                    <input name="sertifikat[0][bidang_keahlian]" class="form-control"
                                        placeholder="Bidang Keahlian" autocomplete="off">
                                </td>
                                <td>
                                    <input name="sertifikat[0][nama_institusi]" class="form-control"
                                        placeholder="Institusi" autocomplete="off">
                                </td>
                                <td>
                                    <input type="text" name="sertifikat[0][tgl_terbit]"
                                        class="form-control pull-right datepicker" placeholder="TanggaL Terbit"
                                        autocomplete="off">
                                </td>
                                <td>
                                    <textarea name="sertifikat[0][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="button-container">
                                        <button type="button" onclick="addRowSertifikat()"
                                            class="btn btn-icon btn-success">
                                            <span><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Sertifikat --}}

    {{-- Pelatihan --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;">
                <div class="box-header with-border">
                    <h3 class="box-title">Pelatihan</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7"
                        id="table-pelatihan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelatihan</th>
                                <th>Penyelenggara</th>
                                <th>TanggaL Terbit Pelatihan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                                <td>
                                    <input name="pelatihan[0][nama_pelatihan]" class="form-control"
                                        placeholder="Nama Pelatihan" autocomplete="off">
                                </td>
                                <td>
                                    <input name="pelatihan[0][penyelenggara]" class="form-control"
                                        placeholder="Penyelenggara" autocomplete="off">
                                </td>
                                <td>
                                    <input type="text" name="pelatihan[0][tgl_terbit]"
                                        class="form-control pull-right datepicker" id="datepicker"
                                        placeholder="TanggaL Terbit Pelatihan" autocomplete="off">
                                </td>
                                <td>
                                    <textarea name="pelatihan[0][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="button-container">
                                        <button type="button" onclick="addRowPelatihan()"
                                            class="btn btn-icon btn-success">
                                            <span><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Pelatihan --}}

    {{-- Bahasa Dikuasai --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;">
                <div class="box-header with-border">
                    <h3 class="box-title">Bahasa Dikuasai</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="table-bahasa">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bahasa</th>
                                <th>Level</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                                <td>
                                    <input name="bahasa[0][nama_bahasa]" class="form-control" placeholder="Bahasa"
                                        autocomplete="off">
                                </td>
                                <td>
                                    <select name="bahasa[0][level]" class="form-control select2" style="width: 100%;"
                                        required>
                                        <option value="" selected disabled>--Pilih Level--</option>
                                        <option value="beginner">beginner</option>
                                        <option value="intermediate">intermediate</option>
                                        <option value="proficient">proficient</option>
                                        <option value="fluent">fluent</option>
                                        <option value="native">native</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="bahasa[0][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="button-container">
                                        <button type="button" onclick="addRowBahasa()"
                                            class="btn btn-icon btn-success">
                                            <span><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Bahasa Dikuasai --}}

    {{-- Pengalaman Kerja --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;">
                <div class="box-header with-border">
                    <h3 class="box-title">Pengalaman Kerja</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7"
                        id="table-pengalaman-kerja">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Bidang</th>
                                <th>Profesi</th>
                                <th>Posisi</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Selesai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                                <td>
                                    <input name="pengalamankerja[0][nama_perusahaan]" class="form-control"
                                        placeholder="Nama Perusahaan" autocomplete="off">
                                </td>
                                <td>
                                    <input name="pengalamankerja[0][bidang]" class="form-control"
                                        placeholder="Bidang" autocomplete="off">
                                </td>
                                <td>
                                    <input name="pengalamankerja[0][profesi]" class="form-control"
                                        placeholder="Profesi" autocomplete="off">
                                </td>
                                <td>
                                    <input name="pengalamankerja[0][posisi]" class="form-control"
                                        placeholder="Posisi" autocomplete="off">
                                </td>
                                <td>
                                    <input type="text" name="pengalamankerja[0][tgl_masuk]"
                                        class="form-control pull-right datepicker" id="datepicker"
                                        placeholder="Tanggal Masuk" autocomplete="off">
                                </td>
                                <td>
                                    <input type="text" name="pengalamankerja[0][tgl_selesai]"
                                        class="form-control pull-right datepicker" id="datepicker"
                                        placeholder="Tanggal Selesai" autocomplete="off">
                                </td>
                                <td>
                                    <textarea name="pengalamankerja[0][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="button-container">
                                        <button type="button" onclick="addRowPengalamanKerja()"
                                            class="btn btn-icon btn-success">
                                            <span><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Pengalaman Kerja --}}

    {{-- Web Pribadi --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;">
                <div class="box-header with-border">
                    <h3 class="box-title">Web Pribadi</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7"
                        id="table-webpribadi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Link</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                                <td>
                                    <input name="webpribadi[0][link]" class="form-control" placeholder="Link"
                                        autocomplete="off">
                                </td>
                                <td>
                                    <input name="webpribadi[0][nama_web]" class="form-control" placeholder="Nama"
                                        autocomplete="off">
                                </td>
                                <td>
                                    <textarea name="webpribadi[0][keterangan]" class="form-control" rows="1" placeholder="Keterangan..."></textarea>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="button-container">
                                        <button type="button" onclick="addRowWebPribadi()"
                                            class="btn btn-icon btn-success">
                                            <span><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Web Pribadi --}}

    <div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
