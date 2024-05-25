<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use DateTime;
use Illuminate\Support\Facades\DB;
class PerusahaanHistoryController extends Controller
{
    function index() {

        return view('perusahaan.perusahaanHistory.index');
    }
    
    function getData(Request $request) {
        if (request()->ajax()) {
            // dd($request->input());
            
            $data = DB::table('lamar_pekerjaan')
            ->leftJoin('lowongan', 'lamar_pekerjaan.lowongan_id', '=', 'lowongan.id_lowongan')
            ->leftJoin('pencari_kerja', 'lamar_pekerjaan.pencari_kerja_id', '=', 'pencari_kerja.pencari_kerja_id')
            ->leftJoin('riwayat_pendidikan', 'lamar_pekerjaan.pencari_kerja_id', '=', 'riwayat_pendidikan.pencari_kerja_id')
            ->where('lowongan.id_perusahaan', session('id'))
            ->select(
                'riwayat_pendidikan.nama_pendidikan',
                'pencari_kerja.tgl_lahir',
                'lowongan.jobfair',
                'lowongan.nama_lowongan'
            );

            if (!empty($request->tgl) && !empty($request->tgl)){
                // dd($request->tgl);
                $dateObject = DateTime::createFromFormat('d/m/Y', $request->tgl);
                $mysqlFormattedDate = $dateObject->format('Y-m-d');
                if ($request->tgl && $request->tgl) {
                    $data->havingBetween('lowongan.jobfair', [$mysqlFormattedDate, $mysqlFormattedDate]);
                }
            }
            # load datatable
            return Datatables::of($data)
                ->addColumn('tgl_lahir', function ($data) {
                    return Carbon::parse($data->tgl_lahir)->format('d-m-Y') ?? '-';
                })
                ->addColumn('pendidikan', function ($data) {
                    return $data->nama_pendidikan ?? '-';
                })
                ->addColumn('nama_lowongan', function ($data) {
                    return $data->nama_lowongan ?? '-';
                })
                
                ->rawColumns(['tgl_lahir', 'pendidikan','nama_lowongan'])
                ->make(true);
        } else {
            return view('perusahaan.perusahaanHistory.index');
        }
    }
}