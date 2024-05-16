<?php

namespace App\Http\Controllers\users;

use App\BahasadiKuasai;
use App\CvdanKeahlian;
use App\Http\Controllers\Controller;
use App\PelatihanPendidikan;
use App\PengalamanKerja;
use App\RiwayatPendidikan;
use App\SertifikatPendidikan;
use App\WebPribadi;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CvdanKeahlianController extends Controller
{
    public function index(Request $request)
    {
        return view('users.cvdankeahlian.cvdankeahlian');
    }

    public function simpan_cvdankeahlian(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {

            if (!empty($request->cvdankeahlian_id)) {
                $updateCVdanKeahlian = CvdanKeahlian::findOrFail($request->cvdankeahlian_id);

                if ($request->hasFile('foto')) {
                    // Menentukan nama file yang unik
                    if ($updateCVdanKeahlian->nama_file && file_exists(public_path('CV/' . $updateCVdanKeahlian->nama_file))) {
                        unlink(public_path('CV/' . $updateCVdanKeahlian->nama_file));
                    }

                    $filename = time() . '_' . $request->foto->getClientOriginalName();

                    // Menyimpan file 
                    $request->foto->move(public_path('CV'), $filename);
                }

                $updateCVdanKeahlian->pencari_kerja_id = session('pencaker_id');
                $updateCVdanKeahlian->updated_at = now();
                if (!empty($filename)) {
                    $updateCVdanKeahlian->nama_file = $filename;
                }
                $updateCVdanKeahlian->save();
            } else {
                if ($request->hasFile('foto')) {
                    // Menentukan nama file yang unik
                    $filename = time() . '_' . $request->foto->getClientOriginalName();

                    // Menyimpan file 
                    $request->foto->move(public_path('CV'), $filename);

                    CvdanKeahlian::create([
                        'pencari_kerja_id'    => session('pencaker_id'),
                        'nama_file'           => $filename,
                        'created_at'          => now(),
                    ]);
                }
            }

            if ($request->riwayat) {
                foreach ($request->riwayat as $key => $value) {
                    if (!empty($value['riwayatpendidikan_id'])) {
                        $updateRiwayatPendidikan = RiwayatPendidikan::findOrFail($value['riwayatpendidikan_id']);
                        $updateRiwayatPendidikan->pencari_kerja_id = session('pencaker_id');
                        $updateRiwayatPendidikan->nama_pendidikan = $value['nama_pendidikan'];
                        $updateRiwayatPendidikan->nama_jurusan = $value['nama_jurusan'];
                        $updateRiwayatPendidikan->nama_institusi = $value['nama_institusi'];
                        $updateRiwayatPendidikan->kota = $value['kota'];
                        $updateRiwayatPendidikan->thn_masuk = $value['thn_masuk'];
                        $updateRiwayatPendidikan->thn_keluar = $value['thn_keluar'];
                        $updateRiwayatPendidikan->ipk_denim = $value['ipk_denim'];
                        $updateRiwayatPendidikan->keterangan = $value['keterangan'];
                        $updateRiwayatPendidikan->updated_at = now();
                        $updateRiwayatPendidikan->save();
                    } else {
                        if ($value['nama_pendidikan'] != null) {
                            RiwayatPendidikan::create([
                                'pencari_kerja_id'          => session('pencaker_id'),
                                'nama_pendidikan'           => $value['nama_pendidikan'],
                                'nama_jurusan'              => $value['nama_jurusan'],
                                'nama_institusi'            => $value['nama_institusi'],
                                'kota'                      => $value['kota'],
                                'thn_masuk'                 => $value['thn_masuk'],
                                'thn_keluar'                => $value['thn_keluar'],
                                'ipk_denim'                 => $value['ipk_denim'],
                                'keterangan'                => $value['keterangan'],
                                'created_at'                => now(),
                            ]);
                        }
                    }
                }
            }

            if ($request->sertifikat) {
                foreach ($request->sertifikat as $key => $value) {
                    $dateString = $value['tgl_terbit'];
                    $tgl_terbit = DateTime::createFromFormat('d/m/Y', $dateString);

                    if (!empty($value['sertifikatpendidikan_id'])) {
                        $updateSertifikat = SertifikatPendidikan::findOrFail($value['sertifikatpendidikan_id']);
                        $updateSertifikat->pencari_kerja_id = session('pencaker_id');
                        $updateSertifikat->nama_sertifikat = $value['nama_sertifikat'];
                        $updateSertifikat->bidang_keahlian = $value['bidang_keahlian'];
                        $updateSertifikat->nama_institusi = $value['nama_institusi'];
                        $updateSertifikat->tgl_terbit = $tgl_terbit->format('Y-m-d');
                        $updateSertifikat->keterangan = $value['keterangan'];
                        $updateSertifikat->updated_at = now();
                        $updateSertifikat->save();
                    } else {
                        if ($value['nama_sertifikat'] != null) {
                            SertifikatPendidikan::create([
                                'pencari_kerja_id'          => session('pencaker_id'),
                                'nama_sertifikat'           => $value['nama_sertifikat'],
                                'bidang_keahlian'           => $value['bidang_keahlian'],
                                'nama_institusi'            => $value['nama_institusi'],
                                'tgl_terbit'                => $tgl_terbit->format('Y-m-d'),
                                'keterangan'                => $value['keterangan'],
                                'created_at'                => now(),
                            ]);
                        }
                    }
                }
            }

            if ($request->pelatihan) {
                foreach ($request->pelatihan as $key => $value) {
                    $dateString = $value['tgl_terbit'];
                    $tgl_terbit = DateTime::createFromFormat('d/m/Y', $dateString);
                    
                    if (!empty($value['pelatihanpendidikan_id'])) {
                        $updatePelatihanPendidikan = PelatihanPendidikan::findOrFail($value['pelatihanpendidikan_id']);
                        $updatePelatihanPendidikan->pencari_kerja_id = session('pencaker_id');
                        $updatePelatihanPendidikan->nama_pelatihan = $value['nama_pelatihan'];
                        $updatePelatihanPendidikan->penyelenggara = $value['penyelenggara'];
                        $updatePelatihanPendidikan->tgl_terbit = $tgl_terbit->format('Y-m-d');
                        $updatePelatihanPendidikan->keterangan = $value['keterangan'];
                        $updatePelatihanPendidikan->updated_at = now();
                        $updatePelatihanPendidikan->save();
                    } else {
                        if ($value['nama_pelatihan'] != null) {
                            PelatihanPendidikan::create([
                                'pencari_kerja_id'          => session('pencaker_id'),
                                'nama_pelatihan'            => $value['nama_pelatihan'],
                                'penyelenggara'             => $value['penyelenggara'],
                                'tgl_terbit'                => $tgl_terbit->format('Y-m-d'),
                                'keterangan'                => $value['keterangan'],
                                'created_at'                => now(),
                            ]);
                        }
                    }
                }
            }

            if ($request->bahasa) {
                foreach ($request->bahasa as $key => $value) {
                    if (!empty($value['bahasa_dikuasai_id'])) {
                        $updateBahasadiKuasai = BahasadiKuasai::findOrFail($value['bahasa_dikuasai_id']);
                        $updateBahasadiKuasai->pencari_kerja_id = session('pencaker_id');
                        $updateBahasadiKuasai->nama_bahasa = $value['nama_bahasa'];
                        $updateBahasadiKuasai->level = $value['level'];
                        $updateBahasadiKuasai->keterangan = $value['keterangan'];
                        $updateBahasadiKuasai->updated_at = now();
                        $updateBahasadiKuasai->save();
                    } else {
                        if ($value['nama_bahasa'] != null) {
                            BahasadiKuasai::create([
                                'pencari_kerja_id'          => session('pencaker_id'),
                                'nama_bahasa'               => $value['nama_bahasa'],
                                'level'                     => $value['level'],
                                'keterangan'                => $value['keterangan'],
                                'created_at'                => now(),
                            ]);
                        }
                    }
                }
            }

            if ($request->pengalamankerja) {
                foreach ($request->pengalamankerja as $key => $value) {
                    $dateString1 = $value['tgl_masuk'];
                    $tgl_masuk = DateTime::createFromFormat('d/m/Y', $dateString1);

                    $dateString = $value['tgl_selesai'];
                    $tgl_selesai = DateTime::createFromFormat('d/m/Y', $dateString);

                    if (!empty($value['pengalaman_kerja_id'])) {
                        $updatePengalamanKerja = PengalamanKerja::findOrFail($value['pengalaman_kerja_id']);
                        $updatePengalamanKerja->pencari_kerja_id = session('pencaker_id');
                        $updatePengalamanKerja->nama_perusahaan = $value['nama_perusahaan'];
                        $updatePengalamanKerja->bidang = $value['bidang'];
                        $updatePengalamanKerja->profesi = $value['profesi'];
                        $updatePengalamanKerja->posisi = $value['posisi'];
                        $updatePengalamanKerja->tgl_masuk = $tgl_masuk->format('Y-m-d');
                        $updatePengalamanKerja->tgl_selesai = $tgl_selesai->format('Y-m-d');
                        $updatePengalamanKerja->keterangan = $value['keterangan'];
                        $updatePengalamanKerja->updated_at = now();
                        $updatePengalamanKerja->save();
                    } else {
                        if ($value['nama_perusahaan'] != null) {
                            PengalamanKerja::create([
                                'pencari_kerja_id'          => session('pencaker_id'),
                                'nama_perusahaan'           => $value['nama_perusahaan'],
                                'bidang'                    => $value['bidang'],
                                'profesi'                   => $value['profesi'],
                                'posisi'                    => $value['posisi'],
                                'tgl_masuk'                 => $tgl_masuk->format('Y-m-d'),
                                'tgl_selesai'               => $tgl_selesai->format('Y-m-d'),
                                'keterangan'                => $value['keterangan'],
                                'created_at'                => now(),
                            ]);
                        }
                    }
                }
            }

            if ($request->webpribadi) {
                foreach ($request->webpribadi as $key => $value) {
                    if (!empty($value['webpribadi_id'])) {
                        $updateWebPribadi = WebPribadi::findOrFail($value['webpribadi_id']);
                        $updateWebPribadi->pencari_kerja_id = session('pencaker_id');
                        $updateWebPribadi->link = $value['link'];
                        $updateWebPribadi->nama_web = $value['nama_web'];
                        $updateWebPribadi->keterangan = $value['keterangan'];
                        $updateWebPribadi->updated_at = now();
                        $updateWebPribadi->save();
                    } else {
                        if ($value['link'] != null) {
                            WebPribadi::create([
                                'pencari_kerja_id'          => session('pencaker_id'),
                                'link'                      => $value['link'],
                                'nama_web'                  => $value['nama_web'],
                                'keterangan'                => $value['keterangan'],
                                'created_at'                => now(),
                            ]);
                        }
                    }
                }
            }

            DB::commit();

            return redirect()->route('users.cvdankeahlian')->with('success', 'Selamat, Data Berhasil Di Simpan.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function download($filename)
    {
        // Path ke file
        $filePath = public_path('CV/' . $filename);

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File not found!');
        }
    }

    public function hapusdataRiwayat(Request $request)
    {
        RiwayatPendidikan::where('riwayatpendidikan_id', $request->riwayatpendidikan_id)->delete();

        $count = DB::table('riwayat_pendidikan')
            ->where('pencari_kerja_id', $request->pencari_kerja_id)
            ->count();

        return response()->json(['success' => true, 'message' => 'BERHASIL', 'count' => $count]);
    }

    public function hapusdataSertifikat(Request $request)
    {
        SertifikatPendidikan::where('sertifikatpendidikan_id', $request->sertifikatpendidikan_id)->delete();

        $count = DB::table('sertifikat_pendidikan')
            ->where('pencari_kerja_id', $request->pencari_kerja_id)
            ->count();

        return response()->json(['success' => true, 'message' => 'BERHASIL', 'count' => $count]);
    }

    public function hapusdataPelatihan(Request $request)
    {
        PelatihanPendidikan::where('pelatihanpendidikan_id', $request->pelatihanpendidikan_id)->delete();

        $count = DB::table('pelatihan_pendidikan')
            ->where('pencari_kerja_id', $request->pencari_kerja_id)
            ->count();

        return response()->json(['success' => true, 'message' => 'BERHASIL', 'count' => $count]);
    }

    public function hapusdataBahasa(Request $request)
    {
        BahasadiKuasai::where('bahasa_dikuasai_id', $request->bahasa_dikuasai_id)->delete();

        $count = DB::table('bahasa_dikuasai')
            ->where('pencari_kerja_id', $request->pencari_kerja_id)
            ->count();

        return response()->json(['success' => true, 'message' => 'BERHASIL', 'count' => $count]);
    }

    public function hapusdataPengalaman(Request $request)
    {
        PengalamanKerja::where('pengalaman_kerja_id', $request->pengalaman_kerja_id)->delete();

        $count = DB::table('pengalaman_kerja')
            ->where('pencari_kerja_id', $request->pencari_kerja_id)
            ->count();

        return response()->json(['success' => true, 'message' => 'BERHASIL', 'count' => $count]);
    }

    public function hapusdataWeb(Request $request)
    {
        WebPribadi::where('webpribadi_id', $request->webpribadi_id)->delete();

        $count = DB::table('webpribadi')
            ->where('pencari_kerja_id', $request->pencari_kerja_id)
            ->count();

        return response()->json(['success' => true, 'message' => 'BERHASIL', 'count' => $count]);
    }
}
