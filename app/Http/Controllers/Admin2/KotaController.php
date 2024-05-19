<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    public function index(Request $request)
    {
        return view('admin2.kota.index');
    }

    public function simpan_kota(Request $request)
    {
        DB::beginTransaction();

        try {
            $inserKota = Kota::create([
                'nama_kota'         => $request->nama_kota,
                'created_at'        => now(),
            ]);

            if ($inserKota) {
                DB::commit();

                return redirect()->route('admin.kota')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            }else{
                session()->flash("error", "Harap coba lagi.");
                return redirect()->route('admin.kota')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function hapusdatakota(Request $request)
    {
        Kota::where('kota_tabel_id', $request->kota_tabel_id)->delete();

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }
}
