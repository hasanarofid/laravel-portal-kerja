<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Perusahaan;
use App\UsersPencaker;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin2.dashboard');
    }

    public function hapusdatausers(Request $request)
    {
        UsersPencaker::where('id', $request->id)
            ->update([
                'is_active' => false,
            ]);

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }

    public function hapusdataperusahaan(Request $request)
    {
        Perusahaan::where('id_perusahaan', $request->id_perusahaan)
            ->update([
                'is_active' => false,
            ]);

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }
}
