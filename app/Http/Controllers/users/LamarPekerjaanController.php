<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\LamarPekerjaan;
use App\Lowongan;
use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LamarPekerjaanController extends Controller
{
    public function index(Request $request)
    {
        $modLowongan = Lowongan::where('id_lowongan', $request->id)->first();
        $modPerusahaan = Perusahaan::where('id_perusahaan', $modLowongan->id_perusahaan)->first();
        return view('users.lamarpekerjaan.index', compact('modLowongan', 'modPerusahaan'));
    }
    
    public function simpan_lamarpekerjaan(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            if ($request->hasFile('lampiran_kualifikasi')) {
                // Menentukan nama file yang unik
                $filename = time() . '_' . $request->lampiran_kualifikasi->getClientOriginalName();

                // Menyimpan file 
                $request->lampiran_kualifikasi->move(public_path('Lampiran'), $filename);

                LamarPekerjaan::create([
                    'pencari_kerja_id'               => session('pencaker_id'),
                    'lowongan_id'                    => $request->id_lowongan,
                    'lampiran_kualifikasi'           => $filename,
                    'status'                         => 0,
                    'created_at'                     => now(),
                ]);

                DB::commit();

                return redirect()->route('users.carilowongan')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }
}
