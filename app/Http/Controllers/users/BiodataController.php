<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use App\Keterampilan;
use App\Kota;
use App\PencariKerja;
use App\Provinsi;
use App\UsersPencaker;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    public function index(Request $request)
    {   
        $modProvinsi = Provinsi::get();
        $modKota = Kota::get();
        $modKecamatan = Kecamatan::get();
        $modKelurahan = Kelurahan::get();
        $modPencariKerja = PencariKerja::where('users_pencaker_id', session('pencaker_id'))->first();
        if (!empty($modPencariKerja->pencari_kerja_id)) {
            $modKeterampilan = Keterampilan::where('pencari_kerja_id', $modPencariKerja->pencari_kerja_id)->get();
            return view('users.biodata.biodata', compact('modPencariKerja', 'modKeterampilan', 'modProvinsi', 'modKota', 'modKecamatan', 'modKelurahan'));
        }else{
            return view('users.biodata.biodata', compact('modPencariKerja', 'modProvinsi', 'modKota', 'modKecamatan', 'modKelurahan'));
        }
    }

    public function simpan_biodata(Request $request)
    {
        // dd($request->all());
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
                $dateString = $request->tgl_lahir;
                $tgl_lahir = DateTime::createFromFormat('d/m/Y', $dateString);

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
                $updatePencaker->tempat_lahir_id = $request->tempat_lahir_id;
                $updatePencaker->tgl_lahir = $tgl_lahir->format('Y-m-d');
                $updatePencaker->gender = $request->jeniskelamin;
                $updatePencaker->agama = $request->agama;
                $updatePencaker->status_kawin = $request->status_kawin;
                $updatePencaker->kewarganegaraan = $request->kewarganegaraan;
                $updatePencaker->tinggi_badan = $request->tinggi_badan;
                $updatePencaker->berat_badan = $request->berat_badan;
                $updatePencaker->alamat = $request->alamat;
                $updatePencaker->keterangan = $request->keterangan;
                $updatePencaker->provinsi_id = $request->provinsi_id;
                $updatePencaker->kota_id = $request->kota_id;
                $updatePencaker->kecamatan_id = $request->kecamatan_id;
                $updatePencaker->kelurahan_id = $request->kelurahan_id;
                $updatePencaker->rw = $request->rw;
                $updatePencaker->rt = $request->rt;
                $updatePencaker->jml_anak = $request->jml_anak;
                $updatePencaker->tentang_saya = $request->tentang_saya;
                $updatePencaker->link_video = $request->link_video;
                $updatePencaker->updated_at = now();

                if ($updatePencaker->save()) {

                    foreach ($request->ketrampilan as $value) {
                        if (!empty($value['keterampilan_id'])) {
                            $updateKeterampilan = Keterampilan::findOrFail($value['keterampilan_id']);
                            $updateKeterampilan->pencari_kerja_id = $updatePencaker->pencari_kerja_id;
                            $updateKeterampilan->nama_keterampilan = $value['nama_keterampilan'];
                            $updateKeterampilan->keterangan = $value['keterangan'];
                            $updateKeterampilan->save();
                        }else{
                            Keterampilan::create([
                                'pencari_kerja_id'   => $updatePencaker->pencari_kerja_id,
                                'nama_keterampilan'  => $value['nama_keterampilan'],
                                'keterangan'         => $value['keterangan'],
                            ]);
                        }
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
                $dateString = $request->tgl_lahir;
                $tgl_lahir = DateTime::createFromFormat('d/m/Y', $dateString);
                $insertPencaker = PencariKerja::create([
                    'users_pencaker_id'            => session('pencaker_id'),
                    'nama'                         => $request->nama,
                    'foto'                         => !empty($filename) ? $filename : null,
                    'tempat_lahir_id'              => $request->tempat_lahir_id,
                    'tgl_lahir'                    => $tgl_lahir->format('Y-m-d'),
                    'gender'                       => $request->jeniskelamin,
                    'agama'                        => $request->agama,
                    'status_kawin'                 => $request->status_kawin,
                    'kewarganegaraan'              => $request->kewarganegaraan,
                    'tinggi_badan'                 => $request->tinggi_badan,
                    'berat_badan'                  => $request->berat_badan,
                    'alamat'                       => $request->alamat,
                    'provinsi_id'                  => $request->provinsi_id,
                    'kota_id'                      => $request->kota_id,
                    'kecamatan_id'                 => $request->kecamatan_id,
                    'kelurahan_id'                 => $request->kelurahan_id,
                    'keterangan'                   => $request->keterangan,
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
