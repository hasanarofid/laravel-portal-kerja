<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\LamarPekerjaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class UndanganController extends Controller
{
    public function index(Request $request)
    {
        return view('perusahaan.undangan.index');
    }

    function getData(Request $request) {
        if (request()->ajax()) {
            # load data cpd
            // $data = HakaksesmorrisK::with(['ruangan', 'unitkerja']);
            // $data = HakaksesmorrisK::with(['LoginMorris', 'LoginMorris.pegawaiID','LoginMorris.ppdsID']);
            // $data = HakaksesmorrisK::with(['LoginMorris']);
            $data = DB::table('lamar_pekerjaan')
            ->join('lowongan', 'lamar_pekerjaan.lowongan_id', '=', 'lowongan.id_lowongan')
            ->join('pencari_kerja', 'lamar_pekerjaan.pencari_kerja_id', '=', 'pencari_kerja.pencari_kerja_id')
            ->join('riwayat_pendidikan', 'lamar_pekerjaan.pencari_kerja_id', '=', 'riwayat_pendidikan.pencari_kerja_id')
            ->join('pengalaman_kerja', 'lamar_pekerjaan.pencari_kerja_id', '=', 'pengalaman_kerja.pencari_kerja_id')
            ->where('lowongan.id_perusahaan', session('id'))
            ->select(
                'lamar_pekerjaan.created_at',
                'pencari_kerja.nama',
                'pencari_kerja.gender',
                'pencari_kerja.tgl_lahir',
                'riwayat_pendidikan.nama_pendidikan',
                'pengalaman_kerja.bidang',
                'pencari_kerja.no_hp'
            );
            // if (!empty($request->txtNama)) {
            //     if ($request->txtNama !== 'semua') {
            //         // $data->where('loginmoris_k.nama_peneliti', $request->txtNama);
            //         $data->where('loginmoris_k.nama_peneliti', 'ILIKE', '%' . strtolower($request->txtNama) . '%');
            //     }
            // }


            // if (!empty($request->txtAkses)) {
            //     if ($request->txtAkses !== 'semua') {
            //         // $data->where('hakaksesmorris_k.hakaksesmorris_id', 'ILIKE', '%' . strtolower($request->txtAkses) . '%');
            //         $data->where('hakaksesmorris_k.hakaksesmorris_id', $request->txtAkses);
            //     }
            // }


            // if (!empty($request->txtNip)) {
            //     dd($request->txtNip);
            //     if ($request->txtNip !== 'semua') {
            //         $data->whereRaw('LOWER(loginmoris_k.pegawai_id) LIKE ?', ['%' . strtolower($request->txtNip) . '%'])
            //             ->orWhereRaw('LOWER(loginmoris_k.ppds_id) LIKE ?', ['%' . strtolower($request->txtNip) . '%']);
            //         // $data->where('loginmoris_k.nomorindukpegawai', 'ILIKE', '%' . strtolower($request->txtNip) . '%');
            //     }
            // }


            // if (!empty($request->txtStatus)) {
            //     if ($request->txtStatus === 'aktif') {
            //         $data->where('loginmoris_k.loginmoris_status', true);
            //     } elseif ($request->txtStatus === 'nonaktif') {
            //         $data->where('loginmoris_k.loginmoris_status', false);
            //     } elseif ($request->txtStatus === 'semua') {
            //         # refresh tabel normal
            //     }
            // }

            // dd($data->get());
            # load datatable
            return Datatables::of($data)
                ->addColumn('tanggal_melamar', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y') ?? '-';
                })
                ->addColumn('nama', function ($data) {
                    return $data->nama ?? '-';
                })
                ->addColumn('jenis_kelamin', function ($data) {
                    return $data->gender ?? '-';
                })
                ->addColumn('tanggal_lahir', function ($data) {
                    return $data->tgl_lahir;
                })
                ->addColumn('pendidikan', function ($data) {
                    return $data->nama_pendidikan;
                })
                ->addColumn('bidang_pengalaman', function ($data) {
                    return $data->bidang;
                })
                ->addColumn('no_hp', function ($data) {
                    return $data->no_hp;
                })
                ->addColumn('aksi', function ($data) {
                    return '<div class="btn-group" role="group">
                            </div>';
                })
                ->rawColumns(['tanggal_melamar', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'pendidikan', 'bidang_pengalaman', 'no_hp','aksi'])
                ->make(true);
        } else {
            return view('perusahaan.undangan.index');
        }
    }
}
