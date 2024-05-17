<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\PembuatanAk1;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;

class PembuatanAk1Controller extends Controller
{
    public function index(Request $request)
    {
        return view('users.ak1.pembuatanak1');
    }

    public function simpan_ak1(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {

            if ($request->pembuatan_ak1_id) {
                $updatePembuatanAK1 = PembuatanAk1::findOrFail($request->pembuatan_ak1_id);
                if ($request->hasFile('pasfoto')) {
                    if ($updatePembuatanAK1->pasfoto && file_exists(public_path('PasFotoAk1/' . $updatePembuatanAK1->pasfoto))) {
                        unlink(public_path('PasFotoAk1/' . $updatePembuatanAK1->pasfoto));
                    }
                    // Menentukan nama file yang unik
                    $filenamePasFotoAk1 = time() . '_' . $request->pasfoto->getClientOriginalName();
    
                    // Menyimpan file 
                    $request->pasfoto->move(public_path('PasFotoAk1'), $filenamePasFotoAk1);
                }
    
                if ($request->hasFile('ktp')) {
                    if ($updatePembuatanAK1->ktp && file_exists(public_path('KtpAk1/' . $updatePembuatanAK1->ktp))) {
                        unlink(public_path('KtpAk1/' . $updatePembuatanAK1->ktp));
                    }
                    // Menentukan nama file yang unik
                    $filenameKtpAk1 = time() . '_' . $request->ktp->getClientOriginalName();
    
                    // Menyimpan file 
                    $request->ktp->move(public_path('KtpAk1'), $filenameKtpAk1);
                }
    
                if ($request->hasFile('ijazah')) {
                    if ($updatePembuatanAK1->ijazah && file_exists(public_path('IjazahAk1/' . $updatePembuatanAK1->ijazah))) {
                        unlink(public_path('IjazahAk1/' . $updatePembuatanAK1->ijazah));
                    }
                    // Menentukan nama file yang unik
                    $filenameIjazahAk1 = time() . '_' . $request->ijazah->getClientOriginalName();
    
                    // Menyimpan file 
                    $request->ijazah->move(public_path('IjazahAk1'), $filenameIjazahAk1);
                }
                $dateString = $request->tgl_lahir;
                $tgl_lahir = DateTime::createFromFormat('d/m/Y', $dateString);
                $updatePembuatanAK1->pencari_kerja_id = session('pencaker_id');
                $updatePembuatanAK1->name = $request->name;
                $updatePembuatanAK1->nik = $request->nik;
                $updatePembuatanAK1->email = $request->email;
                $updatePembuatanAK1->no_hp = $request->no_hp;
                $updatePembuatanAK1->tmpt_lahir = $request->tmpt_lahir;
                $updatePembuatanAK1->tgl_lahir = $tgl_lahir;
                $updatePembuatanAK1->jeniskelamin = $request->jeniskelamin;
                $updatePembuatanAK1->pendidikan_terakhir = $request->pendidikan_terakhir;
                $updatePembuatanAK1->alamat = $request->alamat;
                $updatePembuatanAK1->pasfoto = !empty($filenamePasFotoAk1) ? $filenamePasFotoAk1 : $updatePembuatanAK1->pasfoto;
                $updatePembuatanAK1->ktp = !empty($filenameKtpAk1) ? $filenameKtpAk1 : $updatePembuatanAK1->ktp;
                $updatePembuatanAK1->ijazah = !empty($filenameIjazahAk1) ? $filenameIjazahAk1 : $updatePembuatanAK1->ijazah;
                $updatePembuatanAK1->updated_at = now();
                if ($updatePembuatanAK1->save()) {
                    DB::commit();
                    return redirect()->route('users.ak1')->with('success', 'Selamat, Data Berhasil Di Simpan.');
                }else{
                    session()->flash("error", "Harap coba lagi.");
                    return redirect()->route('users.ak1')->with('failed', 'Gagal');
                }

            }else{
                if ($request->hasFile('pasfoto')) {
                    // Menentukan nama file yang unik
                    $filenamePasFotoAk1 = time() . '_' . $request->pasfoto->getClientOriginalName();
    
                    // Menyimpan file 
                    $request->pasfoto->move(public_path('PasFotoAk1'), $filenamePasFotoAk1);
                }
    
                if ($request->hasFile('ktp')) {
                    // Menentukan nama file yang unik
                    $filenameKtpAk1 = time() . '_' . $request->ktp->getClientOriginalName();
    
                    // Menyimpan file 
                    $request->ktp->move(public_path('KtpAk1'), $filenameKtpAk1);
                }
    
                if ($request->hasFile('ijazah')) {
                    // Menentukan nama file yang unik
                    $filenameIjazahAk1 = time() . '_' . $request->ijazah->getClientOriginalName();
    
                    // Menyimpan file 
                    $request->ijazah->move(public_path('IjazahAk1'), $filenameIjazahAk1);
                }
    
                $dateString = $request->tgl_lahir;
                $tgl_lahir = DateTime::createFromFormat('d/m/Y', $dateString);
                $insertPembuatanAk1 = PembuatanAk1::create([
                    'pencari_kerja_id'             => session('pencaker_id'),
                    'name'                         => $request->name,
                    'nik'                          => $request->nik,
                    'email'                        => $request->email,
                    'no_hp'                        => $request->no_hp,
                    'tmpt_lahir'                   => $request->tmpt_lahir,
                    'tgl_lahir'                    => $tgl_lahir,
                    'jeniskelamin'                 => $request->jeniskelamin,
                    'pendidikan_terakhir'          => $request->pendidikan_terakhir,
                    'alamat'                       => $request->alamat,
                    'pasfoto'                      => $filenamePasFotoAk1,
                    'ktp'                          => $filenameKtpAk1,
                    'ijazah'                       => $filenameIjazahAk1,
                    'created_at'                   => now(),
                ]);
    
                if ($insertPembuatanAk1) {
                    DB::commit();
                    return redirect()->route('users.ak1')->with('success', 'Selamat, Data Berhasil Di Simpan.');
                }else{
                    session()->flash("error", "Harap coba lagi.");
                    return redirect()->route('users.ak1')->with('failed', 'Gagal');
                }
            }

        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function download_pas_foto($filename)
    {
        // Path ke file
        $filePath = public_path('PasFotoAk1/' . $filename);

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File not found!');
        }
    }

    public function download_pas_ktp($filename)
    {
        // Path ke file
        $filePath = public_path('KtpAk1/' . $filename);

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File not found!');
        }
    }
    
    public function download_ijazah($filename)
    {
        // Path ke file
        $filePath = public_path('IjazahAk1/' . $filename);

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File not found!');
        }
    }
}
