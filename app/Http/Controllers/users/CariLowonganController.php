<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Lowongan;
use DataTables;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CariLowonganController extends Controller
{
    public function index(Request $request)
    {
        return view('users.carilowongan.carilowongan');
    }

    public function setTabelCarilowongan(Request $request)
    {
        if (request()->ajax()) {
            $date = Carbon::now()->toDateString();
            $date2 = DateTime::createFromFormat('Y-m-d', $date);
            $date3 = $date2->format('Y-m-d');
            // dd($request->nama_perusahaan, $request->nama_lowongan);
            $data = Lowongan::join('perusahaan as p', 'lowongan.id_perusahaan', '=', 'p.id_perusahaan')
                ->select('lowongan.id_lowongan', 'lowongan.id_perusahaan', 'lowongan.nama_lowongan', 'lowongan.detail_pekerjaan', 'lowongan.tgl_mulai', 'lowongan.batas_tgl_lowongan', 'p.nama_perusahaan', 'lowongan.umur_minimal', 'lowongan.umur_maksimal', 'lowongan.bidang_id')
                ->when($request->nama_perusahaan, function ($query, $nama_perusahaan) {
                    return $query->where('p.nama_perusahaan', $nama_perusahaan);
                })
                ->when($request->nama_lowongan, function ($query, $nama_lowongan) {
                    return $query->where('lowongan.nama_lowongan', $nama_lowongan);
                })
                ->when($request->bidang_id, function ($query, $bidang_id) {
                    return $query->where('lowongan.bidang_id', $bidang_id);
                })
                ->whereDate('lowongan.batas_tgl_lowongan', '>=', Carbon::now()->toDateString())
                ->get();

            return Datatables::of($data)
                ->addColumn('nama_perusahaan', function ($data) {
                    $nama_perusahaan = (!empty($data->nama_perusahaan) ? $data->nama_perusahaan : '');
                    return !empty($nama_perusahaan) ? $nama_perusahaan : '-';
                })
                ->addColumn('nama_lowongan', function ($data) {
                    $nama_lowongan = (!empty($data->nama_lowongan) ? $data->nama_lowongan : '');
                    return !empty($nama_lowongan) ? $nama_lowongan : '-';
                })
                ->addColumn('detail_pekerjaan', function ($data) {
                    $detail_pekerjaan = (!empty($data->detail_pekerjaan) ? $data->detail_pekerjaan : '');
                    return !empty($detail_pekerjaan) ? $detail_pekerjaan : '-';
                }) 
                ->addColumn('umur', function ($data) {
                    $umur = (!empty($data->umur_minimal) ? $data->umur_minimal .' s/d '. $data->umur_maksimal : '');
                    return !empty($umur) ? $umur : '-';
                })
                ->addColumn('tgl_mulai', function ($data) {
                    if (!empty($data->tgl_mulai)) {
                        $tgl_mulai = Carbon::parse($data->tgl_mulai)->format('d/m/Y');
                    } else {
                        $tgl_mulai = '-';
                    }
                    return $tgl_mulai;
                }) 
                ->addColumn('batas_tgl_lowongan', function ($data) {
                    if (!empty($data->batas_tgl_lowongan)) {
                        $batas_tgl_lowongan = Carbon::parse($data->batas_tgl_lowongan)->format('d/m/Y');
                    } else {
                        $batas_tgl_lowongan = '-';
                    }
                    return $batas_tgl_lowongan;
                })
                ->addColumn('insert', function ($data) {
                    $url = route('users.lamarpekerjaan', $data->id_lowongan);
                    // $url = '#';
                    return '<div class="text-center"><a href="' . $url . '" class="btn btn-primary">Lamar Pekerjaan Ini</a></div>';
                })
                ->rawColumns(['nama_perusahaan', 'nama_lowongan', 'detail_pekerjaan', 'umur', 'tgl_mulai', 'batas_tgl_lowongan', 'insert'])
                ->make(true);
        } else {
            return view('users.carilowongan.carilowongan');
        }
    }
}
