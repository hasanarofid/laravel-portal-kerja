<?php

namespace App\Http\Controllers\perusahaan;

use App\BidangPerusahaan;
use App\Http\Controllers\Controller;
use App\Perusahaan;
use Illuminate\Http\Request;

class DashboardPerusahaanController extends Controller
{
    public function index(Request $request)
    {
        // dd(session('id'));
        $cek = Perusahaan::where('id_perusahaan', session('id'))->first();
        $data = BidangPerusahaan::where('bidang_id', $cek->id_bidangusaha)->first();

        return view('perusahaan.dashboard', ['cek' => $cek, 'data' => $data]);
    }
}
