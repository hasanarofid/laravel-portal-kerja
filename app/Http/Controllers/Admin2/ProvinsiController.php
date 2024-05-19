<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    public function index(Request $request)
    {
        return view('admin2.provinsi.index');
    }

    public function simpan_provinsi(Request $request)
    {
        DB::beginTransaction();

        try {
            $inserProvinsi = Provinsi::create([
                'nama_provinsi'     => $request->nama_provinsi,
                'created_at'        => now(),
            ]);

            if ($inserProvinsi) {
                DB::commit();

                return redirect()->route('admin.provinsi')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            }else{
                session()->flash("error", "Harap coba lagi.");
                return redirect()->route('admin.provinsi')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function hapusdataprov(Request $request)
    {
        Provinsi::where('provinsi_tabel_id', $request->provinsi_tabel_id)->delete();

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }
}
