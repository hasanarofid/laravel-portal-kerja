<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function index(Request $request)
    {
        return view('perusahaan.undangan.index');
    }
}
