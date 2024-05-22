<div class="box box-primary">
    <div class="box-header with-border">
        <b>
            <p style="font-size: 20px">List Data Pencaker</p>
        </b>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtKeterampilan">Keterampilan</label>
                    <select name="txtKeterampilan" class="form-control select2" style="width: 100%;" required>
                        <option value="">--Pilih--</option>
                        @foreach ($modKeterampilan as $item)
                        <option value="{{ $item->keterampilan_id }}">
                            {{ $item->nama_keterampilan }}
                        </option>
                        @endforeach
                    </select>
                    <!-- <input type="text" class="form-control" id="txtKeterampilan" placeholder="Keterampilan Pencaker"> -->
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="form-group">
                    <label for="txtPendidikan">Pendidikan Pencaker</label>
                    <input type="text" class="form-control" id="txtPendidikan" placeholder="Keterampilan Pencaker">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtProdi">Prodi pendidikan Pencaker</label>
                    <input type="text" class="form-control" id="txtProdi" placeholder="Pilih Prodi">
                </div>
            </div> -->
            <!-- <div class="col-md-6">
                <div class="form-group">
                    <label for="txtBidang">Bidang Keahlian</label>
                    <input type="text" class="form-control" id="txtBidang" placeholder="Pilih Bidang">
                </div>
            </div> -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtStatus">Status Pekerjaan</label>
                    <select name="txtStatus" id="txtStatus" class="form-control select2" style="width: 100%;" required>
                        <option value="">--Pilih--</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                    <!-- <input type="text" class="form-control" id="txtStatus" placeholder="Pilih Bidang"> -->
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="form-group">
                    <label for="txtMinat">Minat/ Keigininan</label>
                    <input type="text" class="form-control" id="txtMinat" placeholder="Pilih Bidang">
                </div>
            </div> -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtMinat">Jenis Kelamin</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rbGender" id="pria" value="Laki-Laki">
                        <label class="form-check-label" for="Laki-Laki">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rbGender" id="wanita" value="Perempuan">
                        <label class="form-check-label" for="Perempuan">Wanita</label>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtMinat">Usia</label>
                    <table>
                        <tr>
                            <td>
                                <input type="text" class="form-control" id="txtMinimal" name="txtMinimal" placeholder="Pilih Bidang">
                            </td>
                            <td>&nbsp;s/d&nbsp;</td>
                            <td>
                                <input type="text" class="form-control" id="txtMaksimal" name="txtMaksimal" placeholder="Pilih Bidang">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-danger" style="width: 150px;" onclick="refreshTabel()">Cari</button>
    </div>
</div>