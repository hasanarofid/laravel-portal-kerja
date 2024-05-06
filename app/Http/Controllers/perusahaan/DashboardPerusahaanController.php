<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPerusahaanController extends Controller
{
    public function index(Request $request)
    {
        // dd(session('name'));
        return view('perusahaan.dashboard');
    }
}
