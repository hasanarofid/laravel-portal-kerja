@php
    use App\RiwayatPendidikan;
    use App\SertifikatPendidikan;
    use App\PelatihanPendidikan;
    use App\BahasadiKuasai;
    use App\PengalamanKerja;
    use App\WebPribadi;
    use App\CvdanKeahlian;
@endphp
<form action="{{ route('users.simpan-cvdankeahlian') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-3" style="text-align:center">
        @php
            $modCvdanKeahlian = CvdanKeahlian::where('pencari_kerja_id', session('pencaker_id'))->first();
        @endphp
        @if ($modCvdanKeahlian)
            Unduh File<a id="download-file"
                href="{{ route('users.download-file', ['filename' => $modCvdanKeahlian->nama_file]) }}">
                {{ $modCvdanKeahlian->nama_file }}
            </a>
            <br><br>
            <div class="box box-primary custom-height upload-box">
                <a href="#" class="file-upload">
                    <div id="fileInfo" style="margin-bottom: 20px"></div>
                    <i class="fa fa-upload upload-icon"> Upload</i>
                    <input type="file" name="foto" id="exampleInputFile" class="input-file"
                        accept="application/pdf">
                </a>
            </div>
            <input name="cvdankeahlian_id" class="form-control" placeholder="Kota" autocomplete="off" type="hidden"
                value="{{ $modCvdanKeahlian->cvdankeahlian_id }}">
        @else
            <div class="box box-primary custom-height upload-box">
                <a href="#" class="file-upload">
                    <div id="fileInfo" style="margin-bottom: 20px"></div>
                    <i class="fa fa-upload upload-icon"> Upload</i>
                    <input type="file" name="foto" id="exampleInputFile" class="input-file"
                        accept="application/pdf">
                </a>
            </div>
        @endif
    </div>
    @if ($modCvdanKeahlian)
        <div class="col-md-4" style="vertical-align: middle;">
            <p style="margin-top: 90px; color:red">Hanya bisa mengirim file dengan format .pdf</p>
        </div>
    @else
        <div class="col-md-4" style="vertical-align: middle;">
            <p style="margin-top: 50px; color:red">Hanya bisa mengirim file dengan format .pdf</p>
        </div>
    @endif
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
                            @php
                                $modRiwayatPendidikan = RiwayatPendidikan::where(
                                    'pencari_kerja_id',
                                    session('pencaker_id'),
                                )->get();
                            @endphp
                            @if ($modRiwayatPendidikan->isEmpty())
                                <tr>
                                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                                    <td>
                                        <select name="riwayat[0][nama_pendidikan]" class="form-control select2"
                                            style="width: 100%;">
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
                                            style="width: 100%;">
                                            <option value="" selected disabled>--Pilih Jurusan--</option>
                                            <option value="TKJ">TKJ</option>
                                            <option value="AKUTANSI">AKUTANSI</option>
                                            <option value="Ilmu Komputer">Ilmu Komputer</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="riwayat[0][nama_institusi]" class="form-control select2"
                                            style="width: 100%;">
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
                            @else
                                @foreach ($modRiwayatPendidikan as $no => $valueriwayat)
                                    <tr>
                                        <td id="no_urut" style="text-align: center; vertical-align: middle;">
                                            {{ $no + 1 }}</td>
                                        <td>
                                            <select name="riwayat[{{ $no }}][nama_pendidikan]"
                                                class="form-control select2" style="width: 100%;">
                                                <option value="SLTP"
                                                    {{ $valueriwayat['nama_pendidikan'] == 'SLTP' ? 'selected' : '' }}>
                                                    SLTP</option>
                                                <option value="SLTA"
                                                    {{ $valueriwayat['nama_pendidikan'] == 'SLTA' ? 'selected' : '' }}>
                                                    SLTA</option>
                                                <option value="Kuliah S1"
                                                    {{ $valueriwayat['nama_pendidikan'] == 'Kuliah S1' ? 'selected' : '' }}>
                                                    Kuliah S1</option>
                                                <option value="Kuliah S2"
                                                    {{ $valueriwayat['nama_pendidikan'] == 'Kuliah S2' ? 'selected' : '' }}>
                                                    Kuliah S2</option>
                                                <option value="Kuliah S3"
                                                    {{ $valueriwayat['nama_pendidikan'] == 'Kuliah S3' ? 'selected' : '' }}>
                                                    Kuliah S3</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="riwayat[{{ $no }}][nama_jurusan]"
                                                class="form-control select2" style="width: 100%;">
                                                <option value="TKJ"
                                                    {{ $valueriwayat['nama_jurusan'] == 'TKJ' ? 'selected' : '' }}>TKJ
                                                </option>
                                                <option value="AKUTANSI"
                                                    {{ $valueriwayat['nama_jurusan'] == 'AKUTANSI' ? 'selected' : '' }}>
                                                    AKUTANSI</option>
                                                <option value="Ilmu Komputer"
                                                    {{ $valueriwayat['nama_jurusan'] == 'Ilmu Komputer' ? 'selected' : '' }}>
                                                    Ilmu Komputer</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="riwayat[{{ $no }}][nama_institusi]"
                                                class="form-control select2" style="width: 100%;">
                                                <option value="Universitas Jember"
                                                    {{ $valueriwayat['nama_institusi'] == 'Universitas Jember' ? 'selected' : '' }}>
                                                    Universitas Jember</option>
                                                <option value="Universitas Trunojoyo"
                                                    {{ $valueriwayat['nama_institusi'] == 'Universitas Trunojoyo' ? 'selected' : '' }}>
                                                    Universitas Trunojoyo</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input name="riwayat[{{ $no }}][kota]" class="form-control"
                                                placeholder="Kota" autocomplete="off"
                                                value="{{ $valueriwayat['kota'] }}">
                                            <input name="riwayat[{{ $no }}][riwayatpendidikan_id]"
                                                class="form-control" placeholder="Kota" autocomplete="off"
                                                type="hidden" value="{{ $valueriwayat['riwayatpendidikan_id'] }}">
                                        </td>
                                        <td>
                                            <input name="riwayat[{{ $no }}][thn_masuk]"
                                                class="form-control hanyaangka" placeholder="Tahun Masuk"
                                                autocomplete="off" value="{{ $valueriwayat['thn_masuk'] }}">
                                        </td>
                                        <td>
                                            <input name="riwayat[{{ $no }}][thn_keluar]"
                                                class="form-control hanyaangka" placeholder="Tahun Keluar"
                                                autocomplete="off" value="{{ $valueriwayat['thn_keluar'] }}">
                                        </td>
                                        <td>
                                            <input name="riwayat[{{ $no }}][ipk_denim]"
                                                class="form-control hanyaangka" placeholder="Ipk/Denim"
                                                autocomplete="off" value="{{ $valueriwayat['ipk_denim'] }}">
                                        </td>
                                        <td>
                                            <textarea name="riwayat[{{ $no }}][keterangan]" class="form-control" rows="1"
                                                placeholder="Keterangan...">{{ $valueriwayat['keterangan'] }}</textarea>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            @if (count($modRiwayatPendidikan) == 1)
                                                <button type="button" onclick="addRowRiwayat()"
                                                    class="btn btn-icon btn-success">
                                                    <span><i class="fa fa-plus"></i></span>
                                                </button>
                                            @else
                                                <button type="button" onclick="addRowRiwayat()"
                                                    class="btn btn-icon btn-success">
                                                    <span><i class="fa fa-plus"></i></span>
                                                </button>
                                                <button type="button" id="buttonHapusTersimpan_{{ $no }}"
                                                    value="{{ $no }}"
                                                    onclick="deleteRowTersimpanRiwayat(this, '{{ $valueriwayat['riwayatpendidikan_id'] }}', '{{ $valueriwayat['pencari_kerja_id'] }}')"
                                                    class="btn btn-icon btn-danger">
                                                    <span><i class="fa fa-minus"></i></span>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7"
                        id="table-sertifikat">
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
                            @php
                                $modSertifikatPendidikan = SertifikatPendidikan::where(
                                    'pencari_kerja_id',
                                    session('pencaker_id'),
                                )->get();
                            @endphp
                            @if ($modSertifikatPendidikan->isEmpty())
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
                            @else
                                @foreach ($modSertifikatPendidikan as $no => $valuesertifikat)
                                    <tr>
                                        <td id="no_urut" style="text-align: center; vertical-align: middle;">
                                            {{ $no + 1 }}</td>
                                        <td>
                                            <input name="sertifikat[{{ $no }}][nama_sertifikat]"
                                                class="form-control" placeholder="Nama Sertifikat" autocomplete="off"
                                                value="{{ $valuesertifikat['nama_sertifikat'] }}">
                                            <input name="sertifikat[{{ $no }}][sertifikatpendidikan_id]"
                                                class="form-control" placeholder="Kota" autocomplete="off"
                                                type="hidden"
                                                value="{{ $valuesertifikat['sertifikatpendidikan_id'] }}">
                                        </td>
                                        <td>
                                            <input name="sertifikat[{{ $no }}][bidang_keahlian]"
                                                class="form-control" placeholder="Bidang Keahlian" autocomplete="off"
                                                value="{{ $valuesertifikat['bidang_keahlian'] }}">
                                        </td>
                                        <td>
                                            <input name="sertifikat[{{ $no }}][nama_institusi]"
                                                class="form-control" placeholder="Institusi" autocomplete="off"
                                                value="{{ $valuesertifikat['nama_institusi'] }}">
                                        </td>
                                        <td>
                                            <input type="text" name="sertifikat[{{ $no }}][tgl_terbit]"
                                                class="form-control pull-right datepicker"
                                                placeholder="TanggaL Terbit" autocomplete="off"
                                                value="{{ date('d/m/Y', strtotime($valuesertifikat['tgl_terbit'])) }}">
                                        </td>
                                        <td>
                                            <textarea name="sertifikat[{{ $no }}][keterangan]" class="form-control" rows="1"
                                                placeholder="Keterangan...">{{ $valuesertifikat['keterangan'] }}</textarea>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="button-container">
                                                @if (count($modSertifikatPendidikan) == 1)
                                                    <button type="button" onclick="addRowSertifikat()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                @else
                                                    <button type="button" onclick="addRowSertifikat()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                    <button type="button"
                                                        id="buttonHapusTersimpan_{{ $no }}"
                                                        value="{{ $no }}"
                                                        onclick="deleteRowTersimpanSertifikat(this, '{{ $valuesertifikat['sertifikatpendidikan_id'] }}', '{{ $valuesertifikat['pencari_kerja_id'] }}')"
                                                        class="btn btn-icon btn-danger">
                                                        <span><i class="fa fa-minus"></i></span>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
                            @php
                                $modPelatihanPendidikan = PelatihanPendidikan::where(
                                    'pencari_kerja_id',
                                    session('pencaker_id'),
                                )->get();
                            @endphp
                            @if ($modPelatihanPendidikan->isEmpty())
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
                            @else
                                @foreach ($modPelatihanPendidikan as $no => $valuepelatihan)
                                    <tr>
                                        <td id="no_urut" style="text-align: center; vertical-align: middle;">
                                            {{ $no + 1 }}</td>
                                        <td>
                                            <input name="pelatihan[{{ $no }}][nama_pelatihan]"
                                                class="form-control" placeholder="Nama Pelatihan" autocomplete="off"
                                                value="{{ $valuepelatihan['nama_pelatihan'] }}">
                                            <input name="pelatihan[{{ $no }}][pelatihanpendidikan_id]"
                                                class="form-control" placeholder="Kota" autocomplete="off"
                                                type="hidden"
                                                value="{{ $valuepelatihan['pelatihanpendidikan_id'] }}">
                                        </td>
                                        <td>
                                            <input name="pelatihan[{{ $no }}][penyelenggara]"
                                                class="form-control" placeholder="Penyelenggara" autocomplete="off"
                                                value="{{ $valuepelatihan['penyelenggara'] }}">
                                        </td>
                                        <td>
                                            <input type="text" name="pelatihan[{{ $no }}][tgl_terbit]"
                                                class="form-control pull-right datepicker" id="datepicker"
                                                placeholder="TanggaL Terbit Pelatihan" autocomplete="off"
                                                value="{{ date('d/m/Y', strtotime($valuepelatihan['tgl_terbit'])) }}">
                                        </td>
                                        <td>
                                            <textarea name="pelatihan[{{ $no }}][keterangan]" class="form-control" rows="1"
                                                placeholder="Keterangan...">{{ $valuepelatihan['keterangan'] }}</textarea>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="button-container">
                                                @if (count($modPelatihanPendidikan) == 1)
                                                    <button type="button" onclick="addRowPelatihan()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                @else
                                                    <button type="button" onclick="addRowPelatihan()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                    <button type="button"
                                                        id="buttonHapusTersimpan_{{ $no }}"
                                                        value="{{ $no }}"
                                                        onclick="deleteRowTersimpanPelatihan(this, '{{ $valuepelatihan['pelatihanpendidikan_id'] }}', '{{ $valuepelatihan['pencari_kerja_id'] }}')"
                                                        class="btn btn-icon btn-danger">
                                                        <span><i class="fa fa-minus"></i></span>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
                            @php
                                $modBahasadikuasai = BahasadiKuasai::where(
                                    'pencari_kerja_id',
                                    session('pencaker_id'),
                                )->get();
                            @endphp
                            @if ($modBahasadikuasai->isEmpty())
                                <tr>
                                    <td id="no_urut" style="text-align: center; vertical-align: middle;">1</td>
                                    <td>
                                        <input name="bahasa[0][nama_bahasa]" class="form-control"
                                            placeholder="Bahasa" autocomplete="off">
                                    </td>
                                    <td>
                                        <select name="bahasa[0][level]" class="form-control select2"
                                            style="width: 100%;">
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
                            @else
                                @foreach ($modBahasadikuasai as $no => $valuebahasa)
                                    <tr>
                                        <td id="no_urut" style="text-align: center; vertical-align: middle;">
                                            {{ $no + 1 }}</td>
                                        <td>
                                            <input name="bahasa[{{ $no }}][nama_bahasa]"
                                                class="form-control" placeholder="Bahasa" autocomplete="off"
                                                value="{{ $valuebahasa['nama_bahasa'] }}">
                                            <input name="bahasa[{{ $no }}][bahasa_dikuasai_id]"
                                                class="form-control" placeholder="Kota" autocomplete="off"
                                                type="hidden" value="{{ $valuebahasa['bahasa_dikuasai_id'] }}">
                                        </td>
                                        <td>
                                            <select name="bahasa[{{ $no }}][level]"
                                                class="form-control select2" style="width: 100%;">
                                                <option value="beginner"
                                                    {{ $valuebahasa['level'] == 'beginner' ? 'selected' : '' }}>
                                                    beginner</option>
                                                <option value="intermediate"
                                                    {{ $valuebahasa['level'] == 'intermediate' ? 'selected' : '' }}>
                                                    intermediate</option>
                                                <option value="proficient"
                                                    {{ $valuebahasa['level'] == 'proficient' ? 'selected' : '' }}>
                                                    proficient</option>
                                                <option value="fluent"
                                                    {{ $valuebahasa['level'] == 'fluent' ? 'selected' : '' }}>fluent
                                                </option>
                                                <option value="native"
                                                    {{ $valuebahasa['level'] == 'native' ? 'selected' : '' }}>native
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <textarea name="bahasa[{{ $no }}][keterangan]" class="form-control" rows="1"
                                                placeholder="Keterangan...">{{ $valuebahasa['keterangan'] }}</textarea>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="button-container">
                                                @if (count($modBahasadikuasai) == 1)
                                                    <button type="button" onclick="addRowBahasa()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                @else
                                                    <button type="button" onclick="addRowBahasa()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                    <button type="button"
                                                        id="buttonHapusTersimpan_{{ $no }}"
                                                        value="{{ $no }}"
                                                        onclick="deleteRowTersimpanBahasa(this, '{{ $valuebahasa['bahasa_dikuasai_id'] }}', '{{ $valuebahasa['pencari_kerja_id'] }}')"
                                                        class="btn btn-icon btn-danger">
                                                        <span><i class="fa fa-minus"></i></span>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
                            @php
                                $modPengalamanKerja = PengalamanKerja::where(
                                    'pencari_kerja_id',
                                    session('pencaker_id'),
                                )->get();
                            @endphp
                            @if ($modPengalamanKerja->isEmpty())
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
                            @else
                                @foreach ($modPengalamanKerja as $no => $valuepengalaman)
                                    <tr>
                                        <td id="no_urut" style="text-align: center; vertical-align: middle;">
                                            {{ $no + 1 }}</td>
                                        <td>
                                            <input name="pengalamankerja[{{ $no }}][nama_perusahaan]"
                                                class="form-control" placeholder="Nama Perusahaan" autocomplete="off"
                                                value="{{ $valuepengalaman['nama_perusahaan'] }}">
                                            <input name="pengalamankerja[{{ $no }}][pengalaman_kerja_id]"
                                                class="form-control" placeholder="Kota" autocomplete="off"
                                                type="hidden" value="{{ $valuepengalaman['pengalaman_kerja_id'] }}">
                                        </td>
                                        <td>
                                            <input name="pengalamankerja[{{ $no }}][bidang]"
                                                class="form-control" placeholder="Bidang" autocomplete="off"
                                                value="{{ $valuepengalaman['bidang'] }}">
                                        </td>
                                        <td>
                                            <input name="pengalamankerja[{{ $no }}][profesi]"
                                                class="form-control" placeholder="Profesi" autocomplete="off"
                                                value="{{ $valuepengalaman['profesi'] }}">
                                        </td>
                                        <td>
                                            <input name="pengalamankerja[{{ $no }}][posisi]"
                                                class="form-control" placeholder="Posisi" autocomplete="off"
                                                value="{{ $valuepengalaman['posisi'] }}">
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pengalamankerja[{{ $no }}][tgl_masuk]"
                                                class="form-control pull-right datepicker" id="datepicker"
                                                placeholder="Tanggal Masuk" autocomplete="off"
                                                value="{{ date('d/m/Y', strtotime($valuepengalaman['tgl_masuk'])) }}">
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pengalamankerja[{{ $no }}][tgl_selesai]"
                                                class="form-control pull-right datepicker" id="datepicker"
                                                placeholder="Tanggal Selesai" autocomplete="off"
                                                value="{{ date('d/m/Y', strtotime($valuepengalaman['tgl_selesai'])) }}">
                                        </td>
                                        <td>
                                            <textarea name="pengalamankerja[{{ $no }}][keterangan]" class="form-control" rows="1"
                                                placeholder="Keterangan...">{{ $valuepengalaman['keterangan'] }}</textarea>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="button-container">
                                                @if (count($modPengalamanKerja) == 1)
                                                    <button type="button" onclick="addRowPengalamanKerja()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                @else
                                                    <button type="button" onclick="addRowPengalamanKerja()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                    <button type="button"
                                                        id="buttonHapusTersimpan_{{ $no }}"
                                                        value="{{ $no }}"
                                                        onclick="deleteRowTersimpanPengalamanKerja(this, '{{ $valuepengalaman['pengalaman_kerja_id'] }}', '{{ $valuepengalaman['pencari_kerja_id'] }}')"
                                                        class="btn btn-icon btn-danger">
                                                        <span><i class="fa fa-minus"></i></span>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
                            @php
                                $modWebPribadi = WebPribadi::where('pencari_kerja_id', session('pencaker_id'))->get();
                            @endphp
                            @if ($modWebPribadi->isEmpty())
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
                            @else
                                @foreach ($modWebPribadi as $no => $valueweb)
                                    <tr>
                                        <td id="no_urut" style="text-align: center; vertical-align: middle;">
                                            {{ $no + 1 }}</td>
                                        <td>
                                            <input name="webpribadi[{{ $no }}][link]" class="form-control"
                                                placeholder="Link" autocomplete="off"
                                                value="{{ $valueweb['link'] }}">
                                            <input name="webpribadi[{{ $no }}][webpribadi_id]"
                                                class="form-control" placeholder="Kota" autocomplete="off"
                                                type="hidden" value="{{ $valueweb['webpribadi_id'] }}">
                                        </td>
                                        <td>
                                            <input name="webpribadi[{{ $no }}][nama_web]"
                                                class="form-control" placeholder="Nama" autocomplete="off"
                                                value="{{ $valueweb['nama_web'] }}">
                                        </td>
                                        <td>
                                            <textarea name="webpribadi[{{ $no }}][keterangan]" class="form-control" rows="1"
                                                placeholder="Keterangan...">{{ $valueweb['keterangan'] }}</textarea>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="button-container">
                                                @if (count($modBahasadikuasai) == 1)
                                                    <button type="button" onclick="addRowWebPribadi()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                @else
                                                    <button type="button" onclick="addRowWebPribadi()"
                                                        class="btn btn-icon btn-success">
                                                        <span><i class="fa fa-plus"></i></span>
                                                    </button>
                                                    <button type="button"
                                                        id="buttonHapusTersimpan_{{ $no }}"
                                                        value="{{ $no }}"
                                                        onclick="deleteRowTersimpanWebPribadi(this, '{{ $valueweb['webpribadi_id'] }}', '{{ $valueweb['pencari_kerja_id'] }}')"
                                                        class="btn btn-icon btn-danger">
                                                        <span><i class="fa fa-minus"></i></span>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
