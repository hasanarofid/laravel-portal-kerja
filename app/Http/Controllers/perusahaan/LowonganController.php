<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Lowongan;
use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LowonganController extends Controller
{
    public function index(Request $request)
    {
        $model = Lowongan::get();
        return view('perusahaan.lowongan.index', ['model'=>$model]);
    }
    
    public function tambah(Request $request)
    {
        // dd(session('id'));
        return view('perusahaan.lowongan.tambah');
    }

    function simpanLowongan(Request $request) 
    {
        // dd($request->input());
        DB::beginTransaction();
        try {
             // Ganti $id dengan ID yang sesuai
            $lowongan = Lowongan::create([
                'id_perusahaan' => session('id'),
                'nama_lowongan' => $request->input('txtNama'),
                'jobfair' => $request->input('txtJob'),
                'detail_pekerjaan' => $request->input('txtPekerjaan'),
                'umur_minimal' => $request->input('txtMinimal'),
                'umur_maksimal' => $request->input('txtMaksimal'),
                'lajang' => $request->input('cbLajang') ? true : false,
                'pria' => $request->input('cbPria')  ? true : false ,
                'wanita' => $request->input('cbWanita') ? true : false,
                'tk_pria' => $request->input('txtTenagaPria'),
                'tk_wanita' => $request->input('txtTenagaWanita'),
                'batas_tgl_lowongan' => Carbon::createFromFormat('d/m/Y', $request->input('txtBatasTgl'))->format('Y-m-d'),
                'tgl_mulai' => Carbon::createFromFormat('d/m/Y', $request->input('txtTglMulai'))->format('Y-m-d'),
                'tgl_kadaluarsa' => Carbon::createFromFormat('d/m/Y', $request->input('txtTglKadaluarsa'))->format('Y-m-d'),
                'form_wll' => $request->input('txtWll'),
                'keterangan' => $request->input('txtKeterangan'),
                'kualifikasi' => $request->input('txtKualifikasi'),
                'provinsi_id' => $request->input('stProvinsi'),
                'kota_id' => $request->input('stKota'),
                'keterangan_lowongan' => $request->input('txtPenempatanKet'),
                'fasilitas_id' => $request->input('stFasilitas'),
                'nama_fasilitas' => $request->input('stFasilitas'),
                'keterangan_fasilitas' => $request->input('txtFasilitasket'),
                'bidang_id' => $request->input('stBidang'),
                'profesi' => $request->input('stProfesi'),
                'keterangan_profesi' => $request->input('txtBidangKet'),
                'batas_kontrak' => $request->input('stBatas'),
                'keterangan_kontrak' => $request->input('txtKontrakKet'),
                'pekerjaan_pendidikan' => $request->input('stPendidikan'),
                'jurusan' => $request->input('stJurusan'),
                'keterangan_jurusan' => $request->input('txtPendidikanKet'),
                'role_id' => 2,
                'created_at' => now(),
            ]);

            if ($lowongan) {
                DB::commit();
                return redirect()->route('perusahaan.lowongan.index');
            } else {
                return redirect()->route('perusahaan.lowongan.index')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }    
    }

    function loadLowongan($id)
    {
        $model = Lowongan::where('id_lowongan', $id)
            ->first();
        $html = view('perusahaan.lowongan.loadLowongan', [
            'model' => $model,
        ])->render();
        return response()->json(['html' => $html]);
    }
}
