<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Perusahaan;
use App\UsersPencaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LupaPasswordController extends Controller
{
    public function lupaPassword_Pencaker(Request $request)
    {
        return view('navbar.lupapassword_pencarikerja');
    } 
    
    public function lupaPassword_Perusahaan(Request $request)
    {
        return view('navbar.lupapassword_perusahaan');
    }

    public function resetPassword_Pencaker(Request $request)
    {
        DB::beginTransaction();

        try {
            $modUserPencaker = UsersPencaker::where('email', $request->email)->first();
            if ($modUserPencaker) {
                $modUserPencaker->password = $request->password;
                $modUserPencaker->updated_at = now();
                $modUserPencaker->save();
                DB::commit();

                return redirect()->route('loginpencariankerja')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            } else {
                session()->flash("error", "Email Tidak DItemukan!, Harap Periksa Penulisan Email");
                return redirect()->route('LupasPasswordPencaker')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function resetPassword_Perusahaan(Request $request)
    {
        DB::beginTransaction();

        try {
            $modUserPerusahaan = Perusahaan::where('email', $request->email)->first();
            if ($modUserPerusahaan) {
                $modUserPerusahaan->password = $request->password;
                $modUserPerusahaan->updated_at = now();
                $modUserPerusahaan->save();
                DB::commit();

                return redirect()->route('masukPerusahaan')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            } else {
                session()->flash("error", "Email Tidak DItemukan!, Harap Periksa Penulisan Email");
                return redirect()->route('LupasPasswordPerusahaan')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }
}
