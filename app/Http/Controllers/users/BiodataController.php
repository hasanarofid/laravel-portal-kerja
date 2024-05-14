<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Keterampilan;
use App\PencariKerja;
use App\UsersPencaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    public function index(Request $request)
    {
        $modPencariKerja = PencariKerja::where('users_pencaker_id', session('pencaker_id'))->first();
        if (!empty($modPencariKerja->pencari_kerja_id)) {
            $modKeterampilan = Keterampilan::where('pencari_kerja_id', $modPencariKerja->pencari_kerja_id)->get();
            return view('users.biodata', compact('modPencariKerja', 'modKeterampilan'));
        }else{
            return view('users.biodata', compact('modPencariKerja'));
        }
    }

    public function simpan_biodata(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'nik' => 'required',
        //     'no_tlp' => 'required',
        //     'alamat' => 'required',
        //      'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        DB::beginTransaction();

        try {
            if (!empty($request->pencari_kerja_id)) {

                $updatePencaker = PencariKerja::findOrFail($request->pencari_kerja_id);

                if ($request->hasFile('foto')) {
                    if ($updatePencaker->foto && file_exists(public_path('fotobiodata/' . $updatePencaker->foto))) {
                        unlink(public_path('fotobiodata/' . $updatePencaker->foto));
                    }

                    // Menentukan nama file yang unik
                    $filename = time() . '_' . $request->foto->getClientOriginalName();

                    // Menyimpan file
                    $request->foto->move(public_path('fotobiodata'), $filename);
                }

                $updatePencaker->users_pencaker_id = session('pencaker_id');
                $updatePencaker->nama = $request->nama;
                if (!empty($filename)) {
                    $updatePencaker->foto = $filename;
                }
                $updatePencaker->tempat_lahir = $request->tempat_lahir;
                $updatePencaker->tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
                $updatePencaker->gender = $request->jeniskelamin;
                $updatePencaker->agama = $request->agama;
                $updatePencaker->status_kawin = $request->status_kawin;
                $updatePencaker->kewarganegaraan = $request->kewarganegaraan;
                $updatePencaker->tinggi_badan = $request->tinggi_badan;
                $updatePencaker->berat_badan = $request->berat_badan;
                $updatePencaker->alamat = $request->alamat;
                $updatePencaker->provinsi_nama = $request->provinsi;
                $updatePencaker->kota_nama = $request->kota_kabupaten;
                $updatePencaker->kecamatan_nama = $request->Kecamatan;
                $updatePencaker->kelurahan_nama = $request->kelurahan;
                $updatePencaker->rw = $request->rw;
                $updatePencaker->rt = $request->rt;
                $updatePencaker->jml_anak = $request->jml_anak;
                $updatePencaker->tentang_saya = $request->tentang_saya;
                $updatePencaker->link_video = $request->link_video;
                $updatePencaker->updated_at = now();

                if ($updatePencaker->save()) {

                    // Hapus keterampilan lama
                    Keterampilan::where('pencari_kerja_id', $request->pencari_kerja_id)->delete();

                    // Tambahkan keterampilan baru
                    foreach ($request->ketrampilan as $value) {
                        Keterampilan::create([
                            'pencari_kerja_id'   => $updatePencaker->pencari_kerja_id,
                            'nama_keterampilan'  => $value['nama_keterampilan'],
                            'keterangan'         => $value['keterangan'],
                        ]);
                    }

                    DB::commit();

                    return redirect()->route('users.biodata')->with('success', 'Selamat, Data Berhasil Di Simpan.');
                } else {
                    session()->flash("error", "Harap coba lagi.");
                    return redirect()->route('users.biodata')->with('failed', 'Gagal');
                }
            } else {
                if ($request->hasFile('foto')) {
                    // Menentukan nama file yang unik
                    $filename = time() . '_' . $request->foto->getClientOriginalName();

                    // Menyimpan file 
                    $request->foto->move(public_path('fotobiodata'), $filename);
                }
                $insertPencaker = PencariKerja::create([
                    'users_pencaker_id'            => session('pencaker_id'),
                    'nama'                         => $request->nama,
                    'foto'                         => $filename,
                    'tempat_lahir'                 => date('Y-m-d', strtotime($request->tempat_lahir)),
                    'tgl_lahir'                    => date('Y-m-d', strtotime($request->tgl_lahir)),
                    'gender'                       => $request->jeniskelamin,
                    'agama'                        => $request->agama,
                    'status_kawin'                 => $request->status_kawin,
                    'kewarganegaraan'              => $request->kewarganegaraan,
                    'tinggi_badan'                 => $request->tinggi_badan,
                    'berat_badan'                  => $request->berat_badan,
                    'alamat'                       => $request->alamat,
                    'provinsi_nama'                => $request->provinsi,
                    'kota_nama'                    => $request->kota_kabupaten,
                    'kecamatan_nama'               => $request->Kecamatan,
                    'kelurahan_nama'               => $request->kelurahan,
                    'rw'                           => $request->rw,
                    'rt'                           => $request->rt,
                    'jml_anak'                     => $request->jml_anak,
                    'tentang_saya'                 => $request->tentang_saya,
                    'link_video'                   => $request->link_video,
                    'created_at'                   => now(),
                ]);

                if ($insertPencaker) {

                    foreach ($request->ketrampilan as $key => $value) {
                        $insertPencaker = Keterampilan::create([
                            'pencari_kerja_id'    => $insertPencaker->pencari_kerja_id,
                            'nama_keterampilan'   => $value['nama_keterampilan'],
                            'keterangan'          => $value['keterangan'],
                        ]);
                    }

                    DB::commit();

                    return redirect()->route('users.biodata')->with('success', 'Selamat, Data Berhasil Di Simpan.');
                } else {
                    session()->flash("error", "Harap coba lagi.");
                    return redirect()->route('users.biodata')->with('failed', 'Gagal');
                }
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function hapusData(Request $request)
    {
        Keterampilan::where('keterampilan_id', $request->keterampilan_id)->delete();

        $count = DB::table('keterampilan')
            ->where('pencari_kerja_id', $request->pencari_kerja_id)
            ->count();

        return response()->json(['success' => true, 'message' => 'BERHASIL', 'count' => $count]);
    }
}
