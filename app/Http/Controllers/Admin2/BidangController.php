<?php

namespace App\Http\Controllers\Admin2;

use App\BidangPerusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidangController extends Controller
{
    public function index(Request $request)
    {
        return view('admin2.bidang.index');
    }

    public function simpan_bidang(Request $request)
    {
        DB::beginTransaction();

        try {
            $inserBidang = BidangPerusahaan::create([
                'nama_bidang'     => $request->nama_bidang,
                'created_at'        => now(),
            ]);

            if ($inserBidang) {
                DB::commit();

                return redirect()->route('admin.bidang')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            }else{
                session()->flash("error", "Harap coba lagi.");
                return redirect()->route('admin.bidang')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function hapusdatabidang(Request $request)
    {
        BidangPerusahaan::where('bidang_id', $request->bidang_id)->delete();

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }
}
