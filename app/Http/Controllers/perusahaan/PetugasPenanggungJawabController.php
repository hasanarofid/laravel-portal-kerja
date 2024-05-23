<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\PetugasPj;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasPenanggungJawabController extends Controller
{
    public function index(Request $request)
    {
        $PetugasPj= PetugasPj::get();
        return view('perusahaan.petugaspenanggungjawab.index',['PetugasPj' => $PetugasPj]);
    }

    public function simpanPetugasPj(Request $request)
    {
        DB::beginTransaction();
        try {
            $tambahPetugas = PetugasPj::create([
                'id_perusahaan' => session('id'),
                'nama_petugas' => isset($request->nama_petugas) ? $request->nama_petugas : null,
                'jabatan' => isset($request->jabatan) ? $request->jabatan : null,
                'no_hp' => isset($request->no_hp) ? $request->no_hp : null,
                'tahapan_seleksi' => isset($request->tahapan_interview) ? $request->tahapan_interview : null,
                'tgl_tahapan_seleksi' => isset($request->tglSeleksi) ?  Carbon::createFromFormat('d/m/Y', $request->tglSeleksi)->format('Y-m-d') : null,
                'tgl_laporan' => isset($request->tgl_laporan) ?  Carbon::createFromFormat('d/m/Y', $request->tgl_laporan)->format('Y-m-d') : null,
                'created_at' => now(),
            ]);


            DB::commit();
            return response()->json(['status' => 200]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 500, 'pesan' =>  $th->getMessage()], 500);
        }
    }

}
