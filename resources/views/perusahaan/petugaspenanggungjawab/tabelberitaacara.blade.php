<div class="box">
    <div class="box-header">
        <h3 class="box-title">Table Berita Acara</h3>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal Input</th>
                    <th>Nama Petugas</th>
                    <th>Jabatan</th>
                    <th>No Telp</th>
                    <th>Detail Tahapan</th>
                    <th>Tanggal Laporan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($PetugasPj as $value)
                <tr>
                    <td><?= Carbon\Carbon::parse($value->created_at)->format('d-m-Y')?></td>
                    <td>{{$value->nama_petugas}}</td>
                    <td>{{$value->jabatan}}</td>
                    <td>{{$value->no_hp}}</td>
                    <td>
                        {{$value->tahapan_seleksi}}
                        <!-- <button type="button" class="btn btn-success"><i class="fa fa-eye"> View</i></button> -->
                    </td>
                    <td><?= Carbon\Carbon::parse( $value->tgl_laporan)->format('d-m-Y')?></td>
                    <td>
                        <button type="button" class="btn btn-primary"><i class="fa fa-print"> Cetak Berita Acara</i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>
