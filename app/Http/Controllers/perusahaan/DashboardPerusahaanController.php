<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Perusahaan;
use Illuminate\Http\Request;

class DashboardPerusahaanController extends Controller
{
    public function index(Request $request)
    {
        // dd(session('id'));
        $cek = Perusahaan::where('id_perusahaan', session('id'))->first();
        return view('perusahaan.dashboard', ['cek' => $cek]);
    }
}
