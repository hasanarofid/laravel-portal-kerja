<?php

namespace App\Http\Controllers;

use App\BidangPerusahaan;
use App\Category;
use App\Location;
use App\Job;
use App\Lowongan;
use App\PembuatanAk1;
use App\PencariKerja;
use App\Perusahaan;
use App\Roles;
use App\RoleUser;
use App\users;
use App\UsersPencaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $searchLocations = Location::pluck('name', 'id');
        $searchCategories = Category::pluck('name', 'id');
        $searchByCategory = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->pluck('name', 'id');
        $jobs = Job::with('company')
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();
        $totalak1 = PembuatanAk1::count();
        $totaPelamar = UsersPencaker::count();
        $totaPerusahaan = Perusahaan::count();
        $listlowongan = Lowongan::with('perusahaan')
        ->take(8)->get();
        $listpencaker = UsersPencaker::
        join('pencari_kerja','pencari_kerja.users_pencaker_id','=','users_pencaker.id')
        ->take(8)->get();
        // $modPencariKerja = PencariKerja::where('users_pencaker_id', session('pencaker_id'))->first();

        // PencariKerja
        // dd($listpencaker);

        return view('index', compact([
            'searchLocations', 
            'searchCategories', 
            'searchByCategory',
             'jobs',
             'totalak1',
             'totaPelamar',
             'totaPerusahaan',
             'listlowongan',
             'listpencaker'
            ]));
    }

    public function lokerAll(){
        $listlowongan = Lowongan::with('perusahaan')->get();
        return view('loker', compact('listlowongan'));
    }

    public function pencakerAll(){
        $listpencaker = UsersPencaker::
        join('pencari_kerja','pencari_kerja.users_pencaker_id','=','users_pencaker.id')
       ->get();
        return view('pencaker', compact('listpencaker'));
    }

    public function search(Request $request)
    {
        $jobs = Job::with('company')
            ->searchResults()
            ->paginate(7);

        $banner = 'Search results';

        return view('jobs.index', compact(['jobs', 'banner']));
    }

    public function ak1(Request $request)
    {
        return view('navbar.ak1');
    }

    public function register(Request $request)
    {
        return view('navbar.register_pencariankerja');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nik' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $insertUser = UsersPencaker::create([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'password'              => $request->password,
                'username'              => $request->username,
                'nik'                   => $request->nik,
                'no_tlp'                => $request->no_tlp,
                'alamat'                => $request->alamat,
                'role_id'               => 3,
                'created_at'            => now(),
                'remember_token'        => $request->_token,
            ]);

            if ($insertUser) {
                DB::commit();
                return redirect()->route('loginpencariankerja');
            } else {
                return redirect()->route('register')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function loginpencariankerja(Request $request)
    {
        return view('navbar.login_pencariankerja');
    }

    public function daftar(Request $request)
    {
        $bidang = BidangPerusahaan::get();
        return view('navbar.register_perusahaan',['bidang' => $bidang]);
    }

    public function register_perusahaan(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'usernameAdmin' => 'required',
        //     'txtpassword' => 'required',
        //     'email' => 'required',
        //     'noPerusahaan' => 'required',
        //     'alamat' => 'required',
        //     'bidangUsaha' => 'required',
        //     'keterangan' => 'required',
        //     'kodePerusahaan' => 'required',
        // ]);

        // dd( $request->txtpassword);
        DB::beginTransaction();
        try {
            $insertUser = Perusahaan::create([
                'nama_perusahaan'       => $request->name,
                'username'              => $request->usernameAdmin,
                'password'              => $request->txtpassword,
                'email'                 => $request->email,
                'telepon'               => $request->noPerusahaan,
                'alamat'                => $request->alamat,
                'id_bidangusaha'        => $request->bidangUsaha,
                'deskripsi_perusahaan'  => $request->keterangan,
                'kode_perusahaan'       => $request->kodePerusahaan,
                'website'               => $request->urlPerusahaan,
                'role_id'               => 2,
                'created_at'            => now(),
                // 'remember_token'        => $request->_token,
            ]);

            if ($insertUser) {
                DB::commit();
                return redirect()->route('masukPerusahaan');
            } else {
                return redirect()->route('daftar')->with('failed', 'Gagal');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }

    public function masukPerusahaan(Request $request)
    {
        return view('navbar.login_perusahaan');
    }

    public function loginAdmin(Request $request)
    {
        return view('navbar.login_admin');
    }

    public function login_proses_users(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $cek = UsersPencaker::where('username', $request->username)->where('password', $request->password)->where('is_active', true)->first();

        if ($cek) {
            session()->put('pencaker_name', $cek->name);
            session()->put('pencaker_id', $cek->id);
            session()->put('role_id', $cek->role_id);
            session()->put('foto_pencaker', $cek->foto);
            return redirect()->route('users.dashboard')->with('success', 'Selamat, Anda telah sukses masuk.');
        } else {
            session()->flash("error", "Maaf, Username atau Password yang anda inputkan salah, harap coba lagi.");
            return redirect()->route('loginpencariankerja')->with('failed', 'Gagal');
        }
    }

    public function login_proses_perusahaan(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $cek = Perusahaan::where('username', $request->username)->where('password', $request->password)->where('is_active', true)->first();

        if ($cek) {
            session()->put('nama', $cek->nama_perusahaan);
            session()->put('id', $cek->id_perusahaan);
            session()->put('email', $cek->email);
            session()->put('role_id', $cek->role_id);
            return redirect()->route('perusahaan.dashboard')->with('success', 'Selamat, Anda telah sukses masuk.');
        } else {
            session()->flash("error", "Maaf, Username atau Password yang anda inputkan salah, harap coba lagi.");
            return redirect()->route('masukPerusahaan')->with('failed', 'Gagal');
        }
    }

    public function login_proses_admin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        
        $cek = users::where('name', $request->name)->where('password', $request->password)->first();
        $role = RoleUser::where('user_id', $cek->id)->first();

        if ($cek) {
            session()->put('name', $cek->name);
            session()->put('id', $cek->id);
            session()->put('email', $cek->email);
            session()->put('role_id', $role->role_id);
            session()->put('alamat', $role->alamat);
            return redirect()->route('admin.dashboard')->with('success', 'Selamat, Anda telah sukses masuk.');
        } else {
            session()->flash("error", "Maaf, Username atau Password yang anda inputkan salah, harap coba lagi.");
            return redirect()->route('loginAdmin')->with('failed', 'Gagal');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('loginpencariankerja')->with('success', 'Anda Brhasil Keluar.');
    }

    public function logoutPerusahaan()
    {
        session()->flush();
        return redirect()->route('masukPerusahaan')->with('success', 'Anda Brhasil Keluar.');
    }
    public function logoutAdmin()
    {
        session()->flush();
        return redirect()->route('loginAdmin')->with('success', 'Anda Brhasil Keluar.');
    }
}
