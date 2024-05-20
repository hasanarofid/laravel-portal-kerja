<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        return view('admin2.kategori.index');
    }

    public function simpan_kategori(Request $request)
    {
        DB::beginTransaction();

        try {
            $inserKategori = Kategori::create([
                'nama_kategori'     => $request->nama_kategori,
                'created_at'        => now(),
            ]);

            if ($inserKategori) {
                DB::commit();

                return redirect()->route('admin.kategori')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            }else{
                session()->flash("error", "Harap coba lagi.");
                return redirect()->route('admin.kategori')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function hapusdatakategori(Request $request)
    {
        Kategori::where('kategori_id', $request->kategori_id)->delete();

        return response()->json(['success' => true, 'message' => 'BERHASIL']);
    }
}
