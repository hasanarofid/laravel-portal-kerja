<?php

namespace App\Http\Controllers\perusahaan;

use App\BidangPerusahaan;
use App\Http\Controllers\Controller;
use App\Lowongan;
use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPerusahaanController extends Controller
{
    public function index(Request $request)
    {
        // dd(session('id'));
        $cek = Perusahaan::where('id_perusahaan', session('id'))->first();
        $data = BidangPerusahaan::where('bidang_id', $cek->id_bidangusaha)->first();
        $lowongan = Lowongan::count();
        $lowongan2 = Lowongan::where('tgl_kadaluarsa', '>', now())->count();
        $modLamar = DB::table('lamar_pekerjaan')
            ->leftJoin('lowongan', 'lamar_pekerjaan.lowongan_id', '=', 'lowongan.id_lowongan')
            ->leftJoin('pencari_kerja', 'lamar_pekerjaan.pencari_kerja_id', '=', 'pencari_kerja.pencari_kerja_id')
            ->where('lowongan.id_perusahaan', session('id'))
            ->whereNotNull('lamar_pekerjaan.tgl_interview')
            ->select(
                'lamar_pekerjaan.tgl_interview',
                'pencari_kerja.nama',
                'pencari_kerja.gender',
                'pencari_kerja.email',
                'lowongan.nama_lowongan',
                DB::raw('TIMESTAMPDIFF(YEAR, pencari_kerja.tgl_lahir, CURDATE()) as umur')
            )
            ->get()
            ->toArray(); // Convert collection to array

            
        return view('perusahaan.dashboard', ['cek' => $cek, 'data' => $data, 'lowongan' => $lowongan, 'lowongan2' => $lowongan2, 'modLamar' => $modLamar]);
    }
}
