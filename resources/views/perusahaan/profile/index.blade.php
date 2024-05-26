@extends('layoutuser.index')
@section('title')
SIKEREN | Dashboard
@endsection
@section('header')
<!-- Profile -->
@endsection
@section('content')
<style>
    .black-box {
        position: relative;
        border: 2px solid black;
        height: 200px;
        margin-bottom: 10px;
        /* margin: 30px; */
        background-image: url('{{ asset('FotoPerusahaan/' . $loadPerusahaan->logo) }}');
        background-size: cover;
        background-position: center;

    }

    .g-block-1 {
        width: 50%;
        height: 100%;
        float: left;
        display: inline-block;
        padding-right: 10px;
    }

    .g-block-2 {
        width: 50%;
        float: right;
        height: 100%;
        display: inline-block;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>
<div class="col">
    <div class="col-md-12 black-box"></div>

    <div class="g-block-1">
        <div class="box box-info">
            <img src='{{ asset('FotoPerusahaan/' . $loadPerusahaan->logo) }}' style="margin: 15px;width: 250px; height: 100px;">
            <div class="box-header with-border">
                <h3 class="box-title"><b>{{$loadPerusahaan->nama_perusahaan}}</b></h3>
            </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <i class="fa fa-fw fa-list"></i>
                <h3 class="box-title">Keterangan</h3>
                <br>
                <br>
                <p>{{$loadPerusahaan->deskripsi_perusahaan}}</p>
            </div>
        </div>
    </div>
    <div class="g-block-2">
        <div class="box">
            <div class="box-header with-border">
                <i class="fa fa-fw fa-map-pin"></i>
                <h3 class="box-title">Alamat</h3>
                <br>
                <br>
                <p>{{$loadPerusahaan->alamat}}</p>
            </div>
            <div class="box-header with-border">
                <i class="fa fa-fw fa-phone"></i>
                <h3 class="box-title">Telepon Perusahaan</h3>
                <br>
                <br>
                <p>{{$loadPerusahaan->telepon}}</p>
            </div>
            <div class="box-header with-border">
                <i class="fa fa-fw fa-envelope"></i>
                <h3 class="box-title">Email Perusahaan</h3>
                <br>
                <br>
                <p>{{$loadPerusahaan->email}}</p>
            </div>
            <div class="box-header with-border">
                <i class="fa fa-fw fa-briefcase"></i>
                <h3 class="box-title">Bidang Perusahaan</h3>
                <br>
                <br>
                <p>{{$data->nama_bidang}}</p>
            </div>
            <div class="box-header with-border">
                <i class="fa fa-fw fa-link"></i>
                <h3 class="box-title">Url Perusahaan</h3>
                <br>
                <br>
                <p>{{$loadPerusahaan->website}}</p>
            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-block btn-danger btn-sm " onclick="profile('{{$loadPerusahaan->id_perusahaan}}')">Edit</button>
    </div>
</div>
<div class="modal fade in" id="modal-default" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Data Profile</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formProfile" method="post" action='{{ Route("perusahaan.profile.update") }}' enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="txtNama" class="col-sm-2 control-label">Nama Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtNama" id="txtNama" value="{{$loadPerusahaan->nama_perusahaan}}">
                                <input type="hidden" class="form-control" name="txtId" id="txtId" value="{{$loadPerusahaan->id_perusahaan}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtAlamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="txtAlamat" id="txtAlamat">{{$loadPerusahaan->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtNoPerusahaan" class="col-sm-2 control-label">Telepon Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtNoPerusahaan" id="txtNoPerusahaan" value="{{$loadPerusahaan->telepon}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtEmail" class="col-sm-2 control-label">Email Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail" value="{{$loadPerusahaan->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtBidang" class="col-sm-2 control-label">Bidang Perusahaan</label>
                            <div class="col-sm-10">
                            <select name="txtBidang" id="txtBidang" class="form-control" required>
                                @foreach($data2 as $val)
                                    <option value="{{ $val->bidang_id  }}" {{ $loadPerusahaan->id_bidangusaha == $val->bidang_id  ? 'selected' : '' }}>
                                    {{ $val->nama_bidang }}</option>
                                @endforeach
                            </select>
                                <!-- <input type="text" class="form-control" name="txtBidang" id="txtBidang" value="{{$loadPerusahaan->id_bidangusaha}}"> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtUrl" class="col-sm-2 control-label">Url Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtUrl" id="txtUrl" value="{{$loadPerusahaan->website}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtKeterangan" class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="txtKeterangan" id="txtKeterangan">{{$loadPerusahaan->deskripsi_perusahaan}}</textarea>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="txtSektorBidang" class="col-sm-2 control-label">Bidang</label>
                            <div class="col-sm-10">
                                <select name="txtSektorBidang" id="txtSektorBidang" style="width: 50%;">
                                    <option value="1">Pengembangan Perangkat Lunak</option>
                                    <option value="2">Layanan Cloud Computing</option>
                                    <option value="3">Jaringan dan Infrastruktur TI</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="txtSektorKeterangan" class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="txtSektorKeterangan" id="txtSektorKeterangan"></textarea>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="txtUpload" class="col-sm-2 control-label">Upload Logo Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="file" id="txtUpload" name="txtUpload">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    &nbsp;<button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
@section('js')
<script>
    function profile(id) {
        $('#modal-default').modal('show');
    }

    // function simpanPerubahan() {

    //     var id = $('#txtId').val();
    //     var alasan = $('#txtNama').val();
    //     $.ajax({
    //         url: '{{ Route("perusahaan.profile.update") }}',
    //         method: 'POST',
    //         data: {
    //             _token: '{{ csrf_token() }}',
    //             'id': id,
    //             'alasan': alasan
    //         },
    //         contentType: false,
    //         processData: false,
    //         success: function(data) {
    //             if (data.status == 200) {

    //             } else if (data.status == 400) {

    //             }
    //         },
    //         error: function(request, status, error) {
    //             errorMessage(request);
    //         }
    //     });
    // }
</script>
@endsection