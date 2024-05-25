<?php

namespace App\Http\Controllers\perusahaan;

use App\BidangPerusahaan;
use App\Http\Controllers\Controller;
use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilePerusahaanController extends Controller
{
    function index()
    {
        $loadPerusahaan = Perusahaan::where('id_perusahaan', session('id'))->first();
        $data = BidangPerusahaan::where('bidang_id', $loadPerusahaan->id_bidangusaha)->first();
        $data2 = BidangPerusahaan::get();

        return view('perusahaan.profile.index',['loadPerusahaan' => $loadPerusahaan, 'data' => $data, 'data2' => $data2]);
        // return view('perusahaan.profile.index2', ['loadPerusahaan' => $loadPerusahaan]);
    }

    function update(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            if ($request->hasFile('txtUpload')) {
                // Menentukan nama file yang unik
                $filename = time() . '_' . $request->txtUpload->getClientOriginalName();

                // Menyimpan file 
                $request->txtUpload->move(public_path('FotoPerusahaan'), $filename);
            }
            $perusahaan = Perusahaan::find($request->input('txtId')); // Ganti $id dengan ID yang sesuai
            $perusahaan->update([
                'nama_perusahaan' => $request->input('txtNama'),
                'alamat' => $request->input('txtAlamat'),
                'telepon' => $request->input('txtNoPerusahaan'),
                'email' => $request->input('txtEmail'),
                'id_bidangusaha' => $request->input('txtBidang'),
                'deskripsi_perusahaan' => $request->input('txtKeterangan'),
                'website' =>  $request->input('txtUrl'),
                'logo' =>  $filename,
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
