<div class="box box-primary">
    <div class="box-header with-border">
        <b>
            <p style="font-size: 20px">List Undangan</p>
        </b>
    </div>
    <div class="box-body">
        <div class="row" style="margin-bottom: 25px">
            <!-- <div class="col-md-2">
                <label for="nama" class="col-form-label">Pencari Data</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="pencari_data" name="pencari_data"
                    placeholder="Input Kata Kunci">
            </div> -->
            <!-- <div class="col-md-4" style="text-align: center">
                <button type="button" class="btn btn-primary">Cari Pencaker</button>
            </div> -->
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="table-undangan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Melamar</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <!-- <th>Pendidikan</th>
                        <th>Bidang Pengalaman Kerja</th> -->
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="verifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title" id="exampleModalLabel">Terima Pencaker</h2>
            </div>
            <div class="modal-body">
                <label for="">Tanggal Interview</label>
                <br>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right txtInterview" id="txtInterview" name="txtInterview">
                </div>
                <input type="hidden" name="txtId" id="txtId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btnSimpan" onclick="simpanPerubahan()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="batalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title" id="exampleModalLabel">Tolak Pencaker</h2>
            </div>
            <div class="modal-body">
                <label for="">Alasan Ditolak</label><br>
                <input type="text" class="form-control" name="txtAlasan" id="txtAlasan">
                <input type="hidden" name="txtIdAlasan" id="txtIdAlasan">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" onclick="simpanBatal()">Simpan</button>
            </div>
        </div>
    </div>
</div>