<form action="{{ route('users.simpan-biodata') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-3" style="text-align:center">
        <!-- general form elements -->
        <div class="box box-primary custom-height">
            <div class="box-header with-border">
                <h3 class="box-title">Pas Foto Formal</h3>
            </div>
            <div class="profile-picture">
                <img id="profile-picture" src="{{ asset('img/image.jpg') }}" alt="Foto Profil">
            </div>
            <a href="#" class="file-upload">
                <input type="file" name="foto" id="exampleInputFile" class="input-file">
                <span><i class="fa fa-camera"></i> Unggah Foto</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;"> <!-- Menambahkan padding pada card -->
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required
                        autocomplete="off">
                </div>
                <div class="row">
                    <div class="col-md-6 px-3"> <!-- Menambahkan padding kiri dan kanan di sini -->
                        <div class="form-group">
                            <label for="tempat_lahir_id">Tempat Lahir</label>
                            <select name="tempat_lahir_id" class="form-control select2" style="width: 100%;" required>
                                <option value="" selected disabled>--Pilih--</option>
                                @foreach ($modKota as $item)
                                    <option value="{{ $item->kota_tabel_id }}">{{ $item->nama_kota }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jeniskelamin" class="form-control select2" style="width: 100%;" required>
                                <option value="" selected disabled>--Pilih--</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input placeholder="Tanggal Lahir" type="text" name="tgl_lahir"
                                    class="form-control pull-right" id="datepicker" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat (Sesuai KTP)</label>
                    <input name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" required
                        autocomplete="off">
                </div>
                <div class="row">
                    <div class="col-md-6 px-3"> <!-- Menambahkan padding kiri dan kanan di sini -->
                        <div class="form-group">
                            <label for="provinsi_id">Provinsi</label>
                            <select name="provinsi_id" class="form-control select2" style="width: 100%;" required>
                                <option value="" selected disabled>--Pilih--</option>
                                @foreach ($modProvinsi as $item)
                                    <option value="{{ $item->provinsi_tabel_id }}">{{ $item->nama_provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan_id">Kecamatan</label>
                            <select name="kecamatan_id" class="form-control select2" style="width: 100%;" required>
                                <option value="" selected disabled>--Pilih--</option>
                                @foreach ($modKecamatan as $item)
                                    <option value="{{ $item->kecamatan_tabel_id }}">{{ $item->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input name="rt" class="form-control" id="rt" placeholder="RT" required
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label for="kota_id">Kota/Kabupaten</label>
                            <select name="kota_id" class="form-control select2" style="width: 100%;" required>
                                <option value="" selected disabled>--Pilih--</option>
                                @foreach ($modKota as $item)
                                    <option value="{{ $item->kota_tabel_id }}">{{ $item->nama_kota }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan_id">Kelurahan</label>
                            <select name="kelurahan_id" class="form-control select2" style="width: 100%;" required>
                                <option value="" selected disabled>--Pilih--</option>
                                @foreach ($modKelurahan as $item)
                                    <option value="{{ $item->kelurahan_tabel_id }}">{{ $item->nama_kelurahan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input name="rw" class="form-control" id="rw" placeholder="RW" required
                                autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" class="form-control select2" style="width: 100%;" required>
                        <option value="" selected disabled>--Pilih--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Katolik">Katolik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_kawin">Status Pernikahan</label>
                    <select name="status_kawin" class="form-control select2" style="width: 100%;" required>
                        <option value="" selected disabled>--Pilih--</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 px-3"> <!-- Menambahkan padding kiri dan kanan di sini -->
                        <div class="form-group">
                            <label for="jml_anak">Jumlah Anak</label>
                            <input type="number" name="jml_anak" class="form-control" id="jml_anak"
                                placeholder="Jumlah Anak" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <select name="kewarganegaraan" class="form-control select2" style="width: 100%;"
                                required>
                                <option value="" selected disabled>--Pilih--</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tentang Saya</label>
                    <textarea name="tentang_saya" class="form-control" rows="3" placeholder="Tentang Saya. . . . "></textarea>
                </div>
                <div class="form-group">
                    <label for="link_video">Link Video Portofolio Diri</label>
                    <input name="link_video" class="form-control" id="link_video" placeholder="Link video"
                        autocomplete="off">
                </div>
                <div class="row">
                    <div class="col-md-6 px-3"> <!-- Menambahkan padding kiri dan kanan di sini -->
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan</label>
                            <div class="input-group">
                                <input type="number" name="berat_badan" class="form-control" id="berat_badan"
                                    placeholder="Berat Badan" autocomplete="off">
                                <span class="input-group-addon">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label for="tinggi_badan">Tinggi Badan</label>
                            <div class="input-group">
                                <input type="number" name="tinggi_badan" class="form-control" id="tinggi_badan"
                                    placeholder="Tinggi Badan" autocomplete="off">
                                <span class="input-group-addon">CM</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Ketrangan. . . . "></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;"> <!-- Menambahkan padding pada card -->
                <div class="box-header with-border">
                    <h3 class="box-title">Keterampilan/Keahlian Pencaker</h3>
                </div>
                <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="table-keterampilan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Keterampilan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">1</td>
                            <td>
                                <input name="ketrampilan[0][nama_keterampilan]" class="form-control"
                                    placeholder="Nama Keterampilan">
                            </td>
                            <td>
                                <textarea name="ketrampilan[0][keterangan]" class="form-control" rows="1" placeholder="Ketrangan. . . . "></textarea>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <div class="button-container">
                                    <button type="button" onclick="addRow()" class="btn btn-icon btn-success">
                                        <span><i class="fa fa-plus"></i>
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
