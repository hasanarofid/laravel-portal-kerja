<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\RegisterPerusahaan;
use Illuminate\Http\Request;

class DashboardPerusahaanController extends Controller
{
    public function index(Request $request)
    {
        // dd(session('id'));
        $cek = RegisterPerusahaan::where('id', session('id'))->first();
        return view('perusahaan.dashboard', ['cek' => $cek]);
    }
}
