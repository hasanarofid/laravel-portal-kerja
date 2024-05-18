<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilePerusahaanController extends Controller
{
    function index()
    {
        $loadPerusahaan = Perusahaan::where('id_perusahaan', session('id'))->first();
        return view('perusahaan.profile.index',['loadPerusahaan' => $loadPerusahaan]);
        // return view('perusahaan.profile.index2', ['loadPerusahaan' => $loadPerusahaan]);
    }

    function update(Request $request)
    {
        // dd($request->input('alasan'));
        DB::beginTransaction();
        try {
            $perusahaan = Perusahaan::find($request->input('txtId')); // Ganti $id dengan ID yang sesuai
            $perusahaan->update([
                'nama_perusahaan' => $request->input('txtNama'),
                'alamat' => $request->input('txtAlamat'),
                'telepon' => $request->input('txtNoPerusahaan'),
                'email' => $request->input('txtEmail'),
                'id_bidangusaha' => $request->input('txtBidang'),
                'deskripsi_perusahaan' => $request->input('txtKeterangan'),
                'website' =>  $request->input('txtUrl'),
            ]);

            if ($perusahaan) {
                DB::commit();
                return redirect()->route('perusahaan.profile.index');
            } else {
                return redirect()->route('perusahaan.profile.index')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }
}
