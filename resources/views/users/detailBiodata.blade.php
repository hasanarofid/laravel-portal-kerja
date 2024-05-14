<form action="{{ route('users.simpan-biodata') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-3" style="text-align:center">
        <!-- general form elements -->
        <div class="box box-primary custom-height">
            <div class="box-header with-border">
                <h3 class="box-title">Pas Foto Formal</h3>
            </div>
            <div class="profile-picture">
                <img id="profile-picture" src="{{ asset('fotobiodata/' . $modPencariKerja->foto) }}" alt="Foto Profil">
            </div>
            <a href="#" class="file-upload">
                <input type="file" name="foto" id="exampleInputFile" class="input-file"
                    onchange="previewImage(event)">
                <span><i class="fa fa-camera"></i> Unggah Foto</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="padding: 20px;"> <!-- Menambahkan padding pada card -->
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input value="{{ $modPencariKerja->nama }}" name="nama" class="form-control" id="nama"
                        placeholder="Nama Lengkap" required autocomplete="off">
                    <input type="hidden" value="{{ $modPencariKerja->pencari_kerja_id }}" name="pencari_kerja_id" class="form-control" hidden>
                </div>
                <div class="row">
                    <div class="col-md-6 px-3"> <!-- Menambahkan padding kiri dan kanan di sini -->
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <select name="tempat_lahir" class="form-control select2" style="width: 100%;" required>
                                <option value="Jakarta"
                                    {{ $modPencariKerja->tempat_lahir == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                <option value="Surabaya"
                                    {{ $modPencariKerja->tempat_lahir == 'Surabaya' ? 'selected' : '' }}>Surabaya
                                </option>
                                <option value="Bandung"
                                    {{ $modPencariKerja->tempat_lahir == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                <option value="Medan"
                                    {{ $modPencariKerja->tempat_lahir == 'Medan' ? 'selected' : '' }}>Medan</option>
                                <option value="Semarang"
                                    {{ $modPencariKerja->tempat_lahir == 'Semarang' ? 'selected' : '' }}>Semarang
                                </option>
                                <option value="Makassar"
                                    {{ $modPencariKerja->tempat_lahir == 'Makassar' ? 'selected' : '' }}>Makassar
                                </option>
                                <option value="Palembang"
                                    {{ $modPencariKerja->tempat_lahir == 'Palembang' ? 'selected' : '' }}>Palembang
                                </option>
                                <option value="Depok"
                                    {{ $modPencariKerja->tempat_lahir == 'Depok' ? 'selected' : '' }}>Depok</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jeniskelamin" class="form-control select2" style="width: 100%;" required>
                                <option value="Laki-Laki"
                                    {{ $modPencariKerja->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan"
                                    {{ $modPencariKerja->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                                    value="{{ date('d/m/Y', strtotime($modPencariKerja->tgl_lahir)) }}"
                                    class="form-control pull-right" id="datepicker" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat (Sesuai KTP)</label>
                    <input value="{{ $modPencariKerja->alamat }}" name="alamat" class="form-control" id="alamat"
                        placeholder="Alamat Lengkap" required>
                </div>
                <div class="row">
                    <div class="col-md-6 px-3"> <!-- Menambahkan padding kiri dan kanan di sini -->
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" class="form-control select2" style="width: 100%;" required>
                                <option value="Jawa Timur"
                                    {{ $modPencariKerja->provinsi_nama == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur
                                </option>
                                <option value="Jawa Barat"
                                    {{ $modPencariKerja->provinsi_nama == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat
                                </option>
                                <option value="Sumatra"
                                    {{ $modPencariKerja->provinsi_nama == 'Sumatra' ? 'selected' : '' }}>Sumatra
                                </option>
                                <option value="Jawa Tengah"
                                    {{ $modPencariKerja->provinsi_nama == 'Jawa Tengah' ? 'selected' : '' }}>Jawa
                                    Tengah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Kecamatan">Kecamatan</label>
                            <select name="Kecamatan" class="form-control select2" style="width: 100%;" required>
                                <option value="Gubeng"
                                    {{ $modPencariKerja->Kecamatan_nama == 'Gubeng' ? 'selected' : '' }}>Gubeng
                                </option>
                                <option value="Sidoarjo"
                                    {{ $modPencariKerja->Kecamatan_nama == 'Sidoarjo' ? 'selected' : '' }}>Sidoarjo
                                </option>
                                <option value="Antapani"
                                    {{ $modPencariKerja->Kecamatan_nama == 'Antapani' ? 'selected' : '' }}>Antapani
                                </option>
                                <option value="Sukasari"
                                    {{ $modPencariKerja->Kecamatan_nama == 'Sukasari' ? 'selected' : '' }}>Sukasari
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input value="{{ $modPencariKerja->rt }}" name="rt" class="form-control"
                                id="rt" placeholder="RT" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label for="kota_kabupaten">Kota/Kabupate</label>
                            <select name="kota_kabupaten" class="form-control select2" style="width: 100%;" required>
                                <option value="Surabaya"
                                    {{ $modPencariKerja->kota_nama == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                <option value="Palembang"
                                    {{ $modPencariKerja->kota_nama == 'Palembang' ? 'selected' : '' }}>Palembang
                                </option>
                                <option value="Bandung"
                                    {{ $modPencariKerja->kota_nama == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                <option value="Sidoarjo"
                                    {{ $modPencariKerja->kota_nama == 'Sidoarjo' ? 'selected' : '' }}>Sidoarjo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <select name="kelurahan" class="form-control select2" style="width: 100%;" required>
                                <option value="Dukuh Kupang"
                                    {{ $modPencariKerja->kelurahan_nama == '"Dukuh Kupang' ? 'selected' : '' }}>Dukuh
                                    Kupang</option>
                                <option value="Dukuh Pakis"
                                    {{ $modPencariKerja->kelurahan_nama == '"Dukuh Pakis' ? 'selected' : '' }}>Dukuh
                                    Pakis</option>
                                <option value="Gunung Sari"
                                    {{ $modPencariKerja->kelurahan_nama == 'Gunung Sari' ? 'selected' : '' }}>Gunung
                                    Sari</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input value="{{ $modPencariKerja->rw }}" name="rw" class="form-control"
                                id="rw" placeholder="RW" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" class="form-control select2" style="width: 100%;" required>
                        <option value="Islam" {{ $modPencariKerja->agama == 'Islam' ? 'selected' : '' }}>Islam
                        </option>
                        <option value="Kristen" {{ $modPencariKerja->agama == 'Kristen' ? 'selected' : '' }}>Kristen
                        </option>
                        <option value="Budha" {{ $modPencariKerja->agama == 'Budha' ? 'selected' : '' }}>Budha
                        </option>
                        <option value="Konghucu" {{ $modPencariKerja->agama == 'Konghucu' ? 'selected' : '' }}>
                            Konghucu</option>
                        <option value="Hindu" {{ $modPencariKerja->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                        </option>
                        <option value="Katolik" {{ $modPencariKerja->agama == 'Katolik' ? 'selected' : '' }}>Katolik
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_kawin">Status Pernikahan</label>
                    <select name="status_kawin" class="form-control select2" style="width: 100%;" required>
                        <option value="Belum Menikah"
                            {{ $modPencariKerja->status_kawin == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah
                        </option>
                        <option value="Sudah Menikah"
                            {{ $modPencariKerja->status_kawin == 'Sudah Menikah' ? 'selected' : '' }}>Sudah Menikah
                        </option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 px-3"> <!-- Menambahkan padding kiri dan kanan di sini -->
                        <div class="form-group">
                            <label for="jml_anak">Jumlah Anak</label>
                            <input value="{{ $modPencariKerja->jml_anak }}" type="number" name="jml_anak"
                                class="form-control" id="jml_anak" placeholder="Jumlah Anak" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <select name="kewarganegaraan" class="form-control select2" style="width: 100%;"
                                required>
                                <option value="WNI"
                                    {{ $modPencariKerja->kewarganegaraan == 'WNI' ? 'selected' : '' }}>WNI</option>
                                <option value="WNA"
                                    {{ $modPencariKerja->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tentang Saya</label>
                    <textarea name="tentang_saya" class="form-control" rows="3"> {{ $modPencariKerja->tentang_saya }}</textarea>
                </div>
                <div class="form-group">
                    <label for="link_video">Link Video Portofolio Diri</label>
                    <input value="{{ $modPencariKerja->link_video }}" name="link_video" class="form-control"
                        id="link_video" placeholder="Link video" autocomplete="off">
                </div>
                <div class="row">
                    <div class="col-md-6 px-3"> <!-- Menambahkan padding kiri dan kanan di sini -->
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan</label>
                            <div class="input-group">
                                <input value="{{ $modPencariKerja->berat_badan }}" type="number" name="berat_badan"
                                    class="form-control" id="berat_badan" placeholder="Berat Badan"
                                    autocomplete="off">
                                <span class="input-group-addon">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label for="tinggi_badan">Tinggi Badan</label>
                            <div class="input-group">
                                <input value="{{ $modPencariKerja->tinggi_badan }}" type="number"
                                    name="tinggi_badan" class="form-control" id="tinggi_badan"
                                    placeholder="Tinggi Badan" autocomplete="off">
                                <span class="input-group-addon">CM</span>
                            </div>
                        </div>
                    </div>
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
                        @foreach ($modKeterampilan as $key => $value)
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">{{ $key + 1 }}</td>
                                <td>
                                    <input value="{{ $value['nama_keterampilan'] }}"
                                        name="ketrampilan[{{ $key + 1 }}][nama_keterampilan]"
                                        class="form-control" placeholder="Nama Keterampilan">
                                </td>
                                <td>
                                    <input value="{{ $value['keterangan'] }}"
                                        name="ketrampilan[{{ $key + 1 }}][keterangan]" class="form-control"
                                        placeholder="Keterangan">
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div class="button-container">
                                        @if (count($modKeterampilan) == 1)
                                            <button type="button" onclick="addRow()"
                                                class="btn btn-icon btn-success btn-sm mr-1 mb-1 btn-hover-scale">
                                                <span><i class="fa fa-plus"></i></span>
                                            </button>
                                        @else
                                            <button type="button" onclick="addRow()"
                                                class="btn btn-icon btn-success btn-sm mr-1 mb-1 btn-hover-scale">
                                                <span><i class="fa fa-plus"></i></span>
                                            </button>
                                            <button type="button" id="buttonHapusTersimpan_{{ $key }}"
                                                value="{{ $key }}"
                                                onclick="deleteRowTersimpan(this, '{{ $value['keterampilan_id'] }}', '{{ $value['pencari_kerja_id'] }}')"
                                                class="btn btn-icon btn-danger btn-sm mr-1 mb-1 btn-hover-scale">
                                                <span><i class="fa fa-minus"></i></span>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
