<div class="box-body">
    <div class="form-group">
        <label>Deskripsi Pekerjaan</label>
        <br>
        {{$model->detail_pekerjaan}}
    </div>
    <div class="form-group">
        <label>Mengerjakan</label>
        <br>
        <label>Tenaga Kerja Pria : </label>&nbsp; {{$model->tk_pria ? $model->tk_pria : 0}}
        <br>
        <label>Tenaga Kerja Pria : </label>&nbsp; {{$model->tk_wanita ? $model->tk_wanita : 0}}
    </div>
    <hr>
    <div class="form-group">
        <label>Keahlian Yang Dibutuhkan</label>
        <br>
        {{$model->kualifikasi}}
        <br>
        
        <label>Umur : </label>&nbsp; {{$model->umur_minimal}} <label> s/d </label>&nbsp; {{$model->umur_maksimal}}
        <hr>
        <label>Berakhir Pada  : </label>&nbsp; {{$model->batas_tgl_lowongan}}
    </div>
</div>