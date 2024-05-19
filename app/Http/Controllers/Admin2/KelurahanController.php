<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin2.kelurahan.index');
    }

    public function simpan_kelurahan(Request $request)
    {
        DB::beginTransaction();

        try {
            $inserKelurahan = Kelurahan::create([
                'nama_kelurahan'    => $request->nama_kelurahan,
                'created_at'        => now(),
            ]);

            if ($inserKelurahan) {
                DB::commit();

                return redirect()->route('admin.kelurahan')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            }else{
                session()->flash("error", "Harap coba lagi.");
                return redirect()->route('admin.kelurahan')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function hapusdatakel(Request $request)
    {
        Kelurahan::where('kelurahan_tabel_id', $request->kelurahan_tabel_id)->delete();

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }
}
