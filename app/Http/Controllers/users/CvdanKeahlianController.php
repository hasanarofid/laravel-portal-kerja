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

            if ($request->hasFile('foto')) {
                // Menentukan nama file yang unik
                $filename = time() . '_' . $request->foto->getClientOriginalName();

                // Menyimpan file 
                $request->foto->move(public_path('CV'), $filename);
            }

            CvdanKeahlian::create([
                'pencari_kerja_id'    => session('pencaker_id'),
                'nama_file'           => $filename,
                'created_at'          => now(),
            ]);

            foreach ($request->riwayat as $key => $value) {
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

            foreach ($request->sertifikat as $key => $value) {
                SertifikatPendidikan::create([
                    'pencari_kerja_id'          => session('pencaker_id'),
                    'nama_sertifikat'           => $value['nama_sertifikat'],
                    'bidang_keahlian'           => $value['bidang_keahlian'],
                    'nama_institusi'            => $value['nama_institusi'],
                    'tgl_terbit'                => date('Y-m-d', strtotime($value['tgl_terbit'])),
                    'keterangan'                => $value['keterangan'],
                    'created_at'                => now(),
                ]);
            }

            foreach ($request->pelatihan as $key => $value) {
                PelatihanPendidikan::create([
                    'pencari_kerja_id'          => session('pencaker_id'),
                    'nama_pelatihan'            => $value['nama_pelatihan'],
                    'penyelenggara'             => $value['penyelenggara'],
                    'tgl_terbit'                => date('Y-m-d', strtotime($value['tgl_terbit'])),
                    'keterangan'                => $value['keterangan'],
                    'created_at'                => now(),
                ]);
            }

            foreach ($request->bahasa as $key => $value) {
                BahasadiKuasai::create([
                    'pencari_kerja_id'          => session('pencaker_id'),
                    'nama_bahasa'               => $value['nama_bahasa'],
                    'level'                     => $value['level'],
                    'keterangan'                => $value['keterangan'],
                    'created_at'                => now(),
                ]);
            }

            foreach ($request->pengalamankerja as $key => $value) {
                PengalamanKerja::create([
                    'pencari_kerja_id'          => session('pencaker_id'),
                    'nama_perusahaan'           => $value['nama_perusahaan'],
                    'bidang'                    => $value['bidang'],
                    'profesi'                   => $value['profesi'],
                    'posisi'                    => $value['posisi'],
                    'tgl_masuk'                 => date('Y-m-d', strtotime($value['tgl_masuk'])),
                    'tgl_selesai'               => date('Y-m-d', strtotime($value['tgl_selesai'])),
                    'keterangan'                => $value['keterangan'],
                    'created_at'                => now(),
                ]);
            }

            foreach ($request->webpribadi as $key => $value) {
                WebPribadi::create([
                    'pencari_kerja_id'          => session('pencaker_id'),
                    'link'                      => $value['link'],
                    'nama_web'                  => $value['nama_web'],
                    'keterangan'                => $value['keterangan'],
                    'created_at'                => now(),
                ]);
            }

            DB::commit();

            return redirect()->route('users.cvdankeahlian')->with('success', 'Selamat, Data Berhasil Di Simpan.');

        }catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

}
