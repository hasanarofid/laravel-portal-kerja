<?php

namespace App\Http\Controllers\Admin2;

use App\Fasilitas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FasilitasController extends Controller
{
    public function index(Request $request)
    {
        return view('admin2.fasilitas.index');
    }

    public function simpan_fasilitas(Request $request)
    {
        DB::beginTransaction();

        try {
            $inserFasilitas = Fasilitas::create([
                'nama_fasilitas'     => $request->nama_fasilitas,
                'created_at'        => now(),
            ]);

            if ($inserFasilitas) {
                DB::commit();

                return redirect()->route('admin.fasilitas')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            }else{
                session()->flash("error", "Harap coba lagi.");
                return redirect()->route('admin.fasilitas')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function hapusdatafasilitas(Request $request)
    {
        Fasilitas::where('fasilitas_id', $request->fasilitas_id)->delete();

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }
}
