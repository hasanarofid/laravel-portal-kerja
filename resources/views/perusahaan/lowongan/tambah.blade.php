@extends('layoutuser.index')
@section('title')
SIKEREN | Dashboard
@endsection
@section('header')
Lowongan
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="row" style="margin-bottom: 25px">
            <div class="col-md-4">
                <a href="{{ route('perusahaan.lowongan.index') }}" class="btn btn-primary">Kembali Ke Lowongan</a>
            </div>
        </div>
        <div class="table-responsive text-center    ">
            <h3><b>Form Data Lowongan Perusahaan</b></h3>
            <hr>
        </div>
        <form class="form-horizontal" id="formLowongan" method="POST" action="{{ route('perusahaan.lowongan.simpanLowongan') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Nama Lowongan</label>
                        <input type="text" class="form-control" name="txtNama" id="txtNama">
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label">JobFair</label>
                        <input type="text" class="form-control datepicker" name="txtJob" id="txtJob">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Detail Pekerjaan</label>
                        <textarea class="form-control" rows="3" name="txtPekerjaan" id="txtPekerjaan"></textarea>
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="control-label">Umur Minimal</label>
                        <input type="text" class="form-control" name="txtMinimal" id="txtMinimal">
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="control-label">Umur Maksimal</label>
                        <input type="text" class="form-control" name="txtMaksimal" id="txtMaksimal">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="cbLajang" id="cbLajang">
                                Lajang
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="cbPria" id="cbPria">
                                Tenaga Kerja Pria
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="cbwanita" id="cbwanita">
                                Tenaga Kerja Wanita
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Tenaga Kerja Pria</label>
                        <textarea class="form-control" rows="3" name="txtTenagaPria" id="txtTenagaPria"></textarea>

                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label">Tenaga Kerja Wanita</label>
                        <textarea class="form-control" rows="3" name="txtTenagaWanita" id="txtTenagaWanita"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <label for="" class="control-label">Batas Tanggal Lowongan</label>
                        <input type="text" class="datepicker form-control" name="txtBatasTgl" id="txtBatasTgl">
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Tanggal Mulai Kerja</label>
                        <input type="text" class="datepicker form-control" name="txtTglMulai" id="txtTglMulai">
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Tanggal Kadaluarsa Lowongan</label>
                        <input type="text" class="datepicker form-control" name="txtTglKadaluarsa" id="txtTglKadaluarsa">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Form WLL</label>
                        <textarea class="form-control" rows="3" name="txtWll" id="txtWll"></textarea>

                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label">Keterangan</label>
                        <textarea class="form-control" rows="3" name="txtKeterangan" id="txtKeterangan"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="" class="control-label">Kualifikasi (Syarat-syarat) Lowongan</label>
                        <textarea class="form-control" rows="3" name="txtKualifikasi" id="txtKualifikasi"></textarea>

                    </div>
                </div>
                <hr>
                <h4><b>Penempatan Lowongan</b></h4>
                <div class="form-group">
                    <div class="col-sm-12">
                        <table class="table" style="width: 100%;">
                            <tr>
                                <th>Provinsi Penempatan</th>
                                <th>Kota Penempatan</th>
                                <th>Keterangan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="stProvinsi" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Provinsi--</option>
                                        @foreach($provisi as $val)
                                        <option value="{{$val->provinsi_tabel_id  }}">{{$val->nama_provinsi }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="stKota" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Kota--</option>
                                        @foreach($kota as $val2)
                                        <option value="{{$val2->kota_tabel_id  }}">{{$val2->nama_kota }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="txtPenempatanKet" id="txtPenempatanKet">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4><b>Fasilitas Lowongan</b></h4>
                <div class="form-group">
                    <div class="col-sm-12">
                        <table class="table" style="width: 100%;">
                            <tr>
                                <th>Fasilitas</th>
                                <th>Nama Fasilitas</th>
                                <th>Keterangan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="stFasilitasId" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Fasilitas--</option>
                                         @foreach($fasilitas as $valfasilitas)
                                        <option value="{{$valfasilitas->fasilitas_id  }}">{{$valfasilitas->nama_fasilitas }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="stFasilitas" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Fasilitas--</option>
                                         @foreach($fasilitas as $valfasilitas)
                                        <option value="{{$valfasilitas->fasilitas_id  }}">{{$valfasilitas->nama_fasilitas }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="txtFasilitasket" id="txtFasilitasket">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4><b>Bidang Pekerjaan</b></h4>
                <div class="form-group">
                    <div class="col-sm-12">
                        <table class="table" style="width: 100%;">
                            <tr>
                                <th>Bidang Pekerjaan</th>
                                <th>Profesi</th>
                                <th>Keterangan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="stBidang" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Bidang--</option>
                                        @foreach($bidang as $val3)
                                        <option value="{{$val3->bidang_id   }}">{{$val3->nama_bidang }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="stProfesi" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Profesi--</option>
                                        @foreach($bidang as $val3)
                                        <option value="{{$val3->nama_bidang   }}">{{$val3->nama_bidang }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="txtBidangKet" id="txtBidangKet">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4><b>Kontrak Ditawarkan</b></h4>
                <div class="form-group">
                    <div class="col-sm-12">
                        <table class="table" style="width: 100%;">
                            <tr>
                                <th>Batas Kontrak</th>
                                <th>Keterangan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="stBatas" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Batas Kontrak--</option>
                                        <option value="1">1 Tahun</option>
                                        <option value="2">2 Tahun</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="txtKontrakKet" id="txtKontrakKet">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4><b>Pendidikan Dibutuhkan</b></h4>
                <div class="form-group">
                    <div class="col-sm-12">
                        <table class="table" style="width: 100%;">
                            <tr>
                                <th>Pendidikan Pekerjaan</th>
                                <th>Jurusan</th>
                                <th>Keterangan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="stPendidikan" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Pendidikan--</option>
                                        <option value="SLTP">SLTP</option>
                                        <option value="SLTA">SLTA</option>
                                        <option value="Kuliah S1">Kuliah S1</option>
                                        <option value="Kuliah S2">Kuliah S2</option>
                                        <option value="Kuliah S3">Kuliah S3</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="stJurusan" class="form-control select2" style="width: 100%;">
                                        <option value="" selected disabled>--Pilih Jurusan--</option>
                                        <!-- <option value="" selected disabled>--Pilih Profesi--</option> -->
                                        @foreach($bidang as $val3)
                                        <option value="{{$val3->nama_bidang   }}">{{$val3->nama_bidang }}</option>
                                        @endforeach
                                        <!-- <option value="Sistem Informasi">stpendidikan</option>
                                        <option value="Desain Grafis">Desain Grafis</option>
                                        <option value="Teknik Informatika">Teknik Informatika</option> -->
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="txtPendidikanKet" id="txtPendidikanKet">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Clear</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy', // atau format yang Anda inginkan
            autoclose: true
        });
    });
</script>
@endsection