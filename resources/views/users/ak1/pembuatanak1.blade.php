@extends('layoutuser.index')
@section('title')
    SIKEREN | Pembuatan AK1
@endsection
@section('header')
    Pembuatan AK1
@endsection
@section('content')
    <form action="{{ route('users.simpan-ak1') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box box-primary">
            <div class="box-header with-border">
                <b>
                    <p style="font-size: 20px">Welcome to AK1</p>
                </b>
            </div>
            @php
                use App\PembuatanAk1;
                $modPembuatanAk1 = PembuatanAk1::where('pencari_kerja_id', session('pencaker_id'))->first();
            @endphp
            @if ($modPembuatanAk1)
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap"
                            autocomplete="off" required value="{{ $modPembuatanAk1->name }}">
                        <input type="hidden" name="pembuatan_ak1_id" class="form-control" id="name" placeholder="Nama Lengkap"
                            autocomplete="off" required value="{{ $modPembuatanAk1->pembuatan_ak1_id }}">
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control hanyaangka" id="nik"
                            placeholder="Nomor Induk Keluarga" autocomplete="off" required
                            value="{{ $modPembuatanAk1->nik }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail"
                            autocomplete="off" required value="{{ $modPembuatanAk1->email }}">
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control hanyaangka" id="no_hp"
                            placeholder="Nomor Handphone" autocomplete="off" required value="{{ $modPembuatanAk1->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tmpt_lahir" class="form-control" id="tmpt_lahir"
                            placeholder="Tempat Lahir" autocomplete="off" required
                            value="{{ $modPembuatanAk1->tmpt_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input placeholder="Tanggal Lahir" type="text" name="tgl_lahir"
                                class="form-control pull-right" id="datepicker" autocomplete="off" required
                                value="{{ date('d/m/Y', strtotime($modPembuatanAk1->tgl_lahir)) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control select2" required>
                            <option value="Laki-Laki" {{ $modPembuatanAk1->jeniskelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                Laki-Laki</option>
                            <option value="Perempuan" {{ $modPembuatanAk1->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                        <select name="pendidikan_terakhir" class="form-control select2" required>
                            <option value="SD" {{ $modPembuatanAk1->pendidikan_terakhir == 'SD' ? 'selected' : '' }}>SD
                            </option>
                            <option value="SMP" {{ $modPembuatanAk1->pendidikan_terakhir == 'SMP' ? 'selected' : '' }}>
                                SMP</option>
                            <option value="SMK/SMA"
                                {{ $modPembuatanAk1->pendidikan_terakhir == 'SMK/SMA' ? 'selected' : '' }}>SMK/SMA</option>
                            <option value="KULIAH"
                                {{ $modPembuatanAk1->pendidikan_terakhir == 'KULIAH' ? 'selected' : '' }}>S1,D3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" required
                            autocomplete="off" value="{{ $modPembuatanAk1->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="foto">Upload Pas Foto</label>
                        <input type="file" name="pasfoto" id="foto" accept="image/jpg">
                        Unduh Pas Foto<a id="download-file"
                            href="{{ route('users.download-pas-foto', ['filename' => $modPembuatanAk1->pasfoto]) }}">
                            {{ $modPembuatanAk1->pasfoto }}
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="ktp">Upload Foto Ktp</label>
                        <input type="file" name="ktp" id="ktp" accept="image/jpg">
                        Unduh Pas Ktp<a id="download-file"
                            href="{{ route('users.download-pas-ktp', ['filename' => $modPembuatanAk1->ktp]) }}">
                            {{ $modPembuatanAk1->ktp }}
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Upload Foto Copy Ijazah</label>
                        <input type="file" name="ijazah" id="ijazah" accept="application/pdf">
                        Unduh Ijazah<a id="download-file"
                            href="{{ route('users.download-ijazah', ['filename' => $modPembuatanAk1->ijazah]) }}">
                            {{ $modPembuatanAk1->ijazah }}
                        </a>
                    </div>
                </div>
            @else
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Nama Lengkap" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control hanyaangka" id="nik"
                            placeholder="Nomor Induk Keluarga" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control hanyaangka" id="no_hp"
                            placeholder="Nomor Handphone" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tmpt_lahir" class="form-control" id="tmpt_lahir"
                            placeholder="Tempat Lahir" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input placeholder="Tanggal Lahir" type="text" name="tgl_lahir"
                                class="form-control pull-right" id="datepicker" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control select2" required>
                            <option value="" selected disabled>--Pilih--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                        <select name="pendidikan_terakhir" class="form-control select2" required>
                            <option value="" selected disabled>--Pilih--</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMK/SMA">SMK/SMA</option>
                            <option value="KULIAH">S1,D3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" required
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="foto">Upload Pas Foto</label>
                        <input type="file" name="pasfoto" id="foto" accept="image/jpg">
                    </div>
                    <div class="form-group">
                        <label for="ktp">Upload Foto Ktp</label>
                        <input type="file" name="ktp" id="ktp" accept="image/jpg">
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Upload Foto Copy Ijazah</label>
                        <input type="file" name="ijazah" id="ijazah" accept="application/pdf">
                    </div>
                </div>
            @endif
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    <script>
        document.getElementById('foto').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/jpg'];
                if (!validImageTypes.includes(fileType)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Hanya bisa Upload Foto dengan fotmat Jpg dan Jpeg'
                    });
                    this.value = ''; // Clear the input
                }
            }
        });

        document.getElementById('ktp').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/jpg'];
                if (!validImageTypes.includes(fileType)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Hanya bisa Upload Foto dengan fotmat Jpg dan Jpeg'
                    });
                    this.value = ''; // Clear the input
                }
            }
        });

        $(document).on("input", ".hanyaangka", function(e) {
            this.value = this.value.replace(/[^0-9.,]/g, '');
            this.value = this.value.replace(/(\..*)\./g, '$1').replace(/(,.*)\,/g, '$1');
        });
    </script>
@endsection
@if ($errors->any())
    <script stype="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                text: 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.',
                icon: 'error',
                buttonsStyling: !1,
                confirmButtonText: "Lanjutkan",
                customClass: {
                    confirmButton: "btn btn-danger"
                },
                allowOutsideClick: false,
            });
        });
    </script>
@endif
@if (Session::has('success'))
    <script stype="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "SELAMAT!",
                text: "Data Berhasil Disimpan",
                icon: "success"
            });
        });
    </script>
@endif
@if (Session::has('error'))
    <script stype="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                text: '{{ session('error') }}',
                icon: 'error',
                buttonsStyling: !1,
                confirmButtonText: "Lanjutkan",
                customClass: {
                    confirmButton: "btn btn-danger"
                },
                allowOutsideClick: false,
            });
        });
    </script>
@endif
