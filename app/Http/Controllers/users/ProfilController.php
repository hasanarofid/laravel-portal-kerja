<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPencaker;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        $modPencaker = UsersPencaker::where('id', session('pencaker_id'))->first();
        
        return view('users.profil.index', compact('modPencaker'));
    }

    public function simpan_profil(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {
            $updateProfil = UsersPencaker::findOrFail(session('pencaker_id'));

            if ($request->hasFile('foto')) {
                if ($updateProfil->foto && file_exists(public_path('fotoProfil/' . $updateProfil->foto))) {
                    unlink(public_path('fotoProfil/' . $updateProfil->foto));
                }
                // Menentukan nama file yang unik
                $filename = time() . '_' . $request->foto->getClientOriginalName();

                // Menyimpan file 
                $request->foto->move(public_path('fotoProfil'), $filename);
            }
            
            $updateProfil->name = $request->name;
            $updateProfil->alamat = $request->alamat;
            $updateProfil->no_tlp = $request->no_tlp;
            $updateProfil->gender = $request->gender;
            if ($request->password == null) {
                $updateProfil->password = $updateProfil->password;
            }else{
                $updateProfil->password = $request->password;
            }
            $updateProfil->foto = $filename;

            if ($updateProfil->save()) {
                DB::commit();

                return redirect()->route('users.profil')->with('success', 'Selamat, Data Berhasil Di Simpan.');
            } else {
                session()->flash("error", "Harap coba lagi.");
                return redirect()->route('users.profil')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }
}
