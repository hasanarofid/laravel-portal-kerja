<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index(Request $request)
    {
        return view('perusahaan.pelamar.index');
    }
}
