<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Keterampilan;
use App\LamarPekerjaan;
use App\RiwayatPendidikan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use DateTime;
use Illuminate\Support\Facades\DB;

class UndanganController extends Controller
{
    public function index(Request $request)
    {
        $modKeterampilan = Keterampilan::query()
        ->orderBy('nama_keterampilan', 'ASC')
        ->distinct('nama_keterampilan')
        ->limit(10)
        ->get();

        // $modPendidik = RiwayatPendidikan::query()
        // ->orderBy('nama_pendidikan', 'ASC')
        // ->distinct('nama_pendidikan')
        // ->limit(10)
        // ->get();
        return view('perusahaan.undangan.index', ['modKeterampilan' => $modKeterampilan]);
    }

    function getData(Request $request) {
        if (request()->ajax()) {
            // dd($request->input());
            
            $data = DB::table('lamar_pekerjaan')
            ->leftJoin('lowongan', 'lamar_pekerjaan.lowongan_id', '=', 'lowongan.id_lowongan')
            ->leftJoin('pencari_kerja', 'lamar_pekerjaan.pencari_kerja_id', '=', 'pencari_kerja.pencari_kerja_id')
            ->leftJoin('users_pencaker', 'lamar_pekerjaan.pencari_kerja_id', '=', 'users_pencaker.id')
            // ->leftJoin('keterampilan', 'lamar_pekerjaan.pencari_kerja_id', '=', 'keterampilan.pencari_kerja_id')
            // ->leftJoin('riwayat_pendidikan', 'lamar_pekerjaan.pencari_kerja_id', '=', 'riwayat_pendidikan.pencari_kerja_id')
            // ->leftJoin('pengalaman_kerja', 'lamar_pekerjaan.pencari_kerja_id', '=', 'pengalaman_kerja.pencari_kerja_id')
            ->where('lowongan.id_perusahaan', session('id'))
            ->select(
                'lamar_pekerjaan.lamar_pekerjaan_id',
                'lamar_pekerjaan.tgl_interview',
                'lamar_pekerjaan.alasan_ditolak',
                'lamar_pekerjaan.created_at',
                'pencari_kerja.nama',
                'pencari_kerja.gender',
                'pencari_kerja.tgl_lahir',
                'users_pencaker.is_active',
                // 'riwayat_pendidikan.nama_pendidikan',
                // 'pengalaman_kerja.bidang',
                'pencari_kerja.no_hp',
                DB::raw('TIMESTAMPDIFF(YEAR, pencari_kerja.tgl_lahir, CURDATE()) as umur')
            );

            if (!empty($request->rbGender)) {
                if ($request->rbGender !== 'semua') {
                    // $data->where('loginmoris_k.nama_peneliti', $request->txtNama);
                    $data->where('pencari_kerja.gender', $request->rbGender);
                }
            }

            if (!empty($request->txtStatus)) {
                if ($request->txtStatus === 'Aktif') {
                    $data->where('users_pencaker.is_active', true);
                } elseif ($request->txtStatus === 'Tidak Aktif') {
                    $data->where('users_pencaker.is_active', false);
                } elseif ($request->txtStatus === 'semua') {
                    # refresh tabel normal
                }
            }

            if (!empty($request->txtMinimal) && !empty($request->txtMaksimal)){
                if ($request->txtMinimal && $request->txtMaksimal) {
                    $data->havingBetween('umur', [$request->txtMinimal, $request->txtMaksimal]);
                }
            }
            // if (!empty($request->txtKeterampilan)) {
            //     if ($request->txtKeterampilan !== 'semua') {
            //         // $data->where('loginmoris_k.nama_peneliti', $request->txtNama);
            //         $data->where('keterampilan.nama_keterampilan', $request->txtKeterampilan);
            //     }
            // }
            // dd($data->get());



            // if (!empty($request->txtNip)) {
            //     dd($request->txtNip);
            //     if ($request->txtNip !== 'semua') {
            //         $data->whereRaw('LOWER(loginmoris_k.pegawai_id) LIKE ?', ['%' . strtolower($request->txtNip) . '%'])
            //             ->orWhereRaw('LOWER(loginmoris_k.ppds_id) LIKE ?', ['%' . strtolower($request->txtNip) . '%']);
            //         // $data->where('loginmoris_k.nomorindukpegawai', 'ILIKE', '%' . strtolower($request->txtNip) . '%');
            //     }
            // }

            // dd($data->get());
            # load datatable
            return Datatables::of($data)
                ->addColumn('tanggal_melamar', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y') ?? '-';
                })
                ->addColumn('nama', function ($data) {
                    return $data->nama ?? '-';
                })
                ->addColumn('jenis_kelamin', function ($data) {
                    return $data->gender ?? '-';
                })
                ->addColumn('tanggal_lahir', function ($data) {
                    return Carbon::parse($data->tgl_lahir)->format('d-m-Y') ?? '-';
                })
                // ->addColumn('pendidikan', function ($data) {
                //     return $data->nama_pendidikan;
                // })
                // ->addColumn('bidang_pengalaman', function ($data) {
                //     return $data->bidang;
                // })
                ->addColumn('no_hp', function ($data) {
                    return $data->no_hp;
                })
                ->addColumn('aksi', function ($data) {
                    if (!empty($data->tgl_interview) || !empty($data->alasan_ditolak)) {
                        return '<div class="btn-group" role="group">

                                </div>';
                    }
                    else{
                        return '<div class="btn-group" role="group">
                                    <button type="button" class="btn-sm btn-success" id="btn-update-verifikasi" onclick="onVerif('. $data->lamar_pekerjaan_id.')"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn-sm btn-danger btn-batal" onclick="onBatal('. $data->lamar_pekerjaan_id.')"><i class="fa fa-ban"></i></button>
                                </div>';

                    }
                })
                ->rawColumns(['tanggal_melamar', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'no_hp','aksi'])
                ->make(true);
        } else {
            return view('perusahaan.undangan.index');
        }
    }

    function updateInterview(Request $request) {
        try {
            $date = DateTime::createFromFormat('d/m/Y', $request->input('tgl'));
            $formattedDate = $date->format('Y-m-d');
            // dd($formattedDate);
            $update = LamarPekerjaan::where('lamar_pekerjaan_id', $request->input('id'))->update(['tgl_interview' => $formattedDate]);
            if ($update > 0) {
               DB::commit();
               return 'SUKSES';
            } else return 'GAGAL';
         } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
         }
    }

    function batalInterview(Request $request) {
        try {
            $update = LamarPekerjaan::where('lamar_pekerjaan_id', $request->input('id'))->update(['alasan_ditolak' => $request->input('alasan')]);
            if ($update > 0) {
               DB::commit();
               return 'SUKSES';
            } else return 'GAGAL';
         } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
         }
    }
}
