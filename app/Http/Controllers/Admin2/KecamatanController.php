<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin2.kecamatan.index');
    }

    public function simpan_kecamatan(Request $request)
    {
        DB::beginTransaction();

        try {
            $inserKecamatan = Kecamatan::create([
                'nama_kecamatan'     => $request->nama_kecamatan,
                'created_at'        => now(),
            ]);

            if ($inserKecamatan) {
                DB::commit();

                return redirect()->route('admin.kecamatan')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            }else{
                session()->flash("error", "Harap coba lagi.");
                return redirect()->route('admin.kecamatan')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function hapusdatakec(Request $request)
    {
        Kecamatan::where('kecamatan_tabel_id', $request->kecamatan_tabel_id)->delete();

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }
}
