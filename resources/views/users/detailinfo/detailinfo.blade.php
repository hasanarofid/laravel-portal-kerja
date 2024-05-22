@php
    use App\LamarPekerjaan;
    use App\Lowongan;
    use App\Perusahaan;
    $modLamarPekerjaan = LamarPekerjaan::where('pencari_kerja_id', session('pencaker_id'))->get();
@endphp
@extends('layoutuser.index')
@section('title')
    SIKEREN | Detail Info
@endsection
@section('header')
    Detail Info
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table Histori Lamaran</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Nama Lowongan</th>
                        <th>Detail Pekerjaan</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Tanggal Interview</th>
                        <th>Alasan Ditolak</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($modLamarPekerjaan)
                        @foreach ($modLamarPekerjaan as $key => $item)
                            @php
                                $modLowongan = Lowongan::where('id_lowongan', $item['lowongan_id'])->first();
                                $modPerusahaan = Perusahaan::where(
                                    'id_perusahaan',
                                    $modLowongan->id_perusahaan,
                                )->first();
                            @endphp
                            <tr>
                                <td>{{ $modPerusahaan->nama_perusahaan }}</td>
                                <td>{{ $modLowongan->nama_lowongan }}</td>
                                <td>{{ $modLowongan->detail_pekerjaan }}</td>
                                <td>{{ date('d/m/Y', strtotime($modLowongan->created_at)) }}</td>
                                @if ($item['status'] == 0)
                                    <td style="text-align: center"><button class="btn btn-sm btn-warning"
                                            style="margin-right: 5px;">
                                            <span><i class="fa fa-hourglass-half"></i>
                                                <span>Menunggu</span>
                                            </span>
                                        </button>
                                    </td>
                                @endif
                                @if ($item['status'] == 1)
                                    <td style="text-align: center"><button class="btn btn-sm btn-success"
                                            style="margin-right: 5px;">
                                            <span><i class="fa fa-check"></i>
                                                <span>Diterima</span>
                                            </span>
                                        </button>
                                    </td>
                                @endif
                                @if ($item['status'] == 2)
                                    <td style="text-align: center"><button class="btn btn-sm btn-danger"
                                            style="margin-right: 5px;">
                                            <span><i class="fa fa-remove"></i>
                                                <span>Ditolak</span>
                                            </span>
                                        </button>
                                    </td>
                                @endif
                                <td>{{ !empty($modLowongan->tgl_interview) ? date('d/m/Y', strtotime($modLowongan->tgl_interview)) : "-" }}</td>
                                <td>{{ !empty($modPerusahaan->alasan_ditolak) ? $modPerusahaan->alasan_ditolak : "-" }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
