<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use App\Job;
use App\RoleUser;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('index', compact(['searchLocations', 'searchCategories', 'searchByCategory', 'jobs']));
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
    
    public function loginpencariankerja(Request $request)
    {
        return view('navbar.login_pencariankerja');
    }

    public function daftar(Request $request)
    {
        return view('navbar.register_perusahaan');
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
            'name' => 'required',
            'password' => 'required',
        ]);

        $cek = users::where('name', $request->name)->where('password', $request->password)->first();
        $role = RoleUser::where('user_id', $cek->id)->first();

        if ($cek) {
            session()->put('name', $cek->name);
            session()->put('id',$cek->id);
            session()->put('email',$cek->email);
            session()->put('role_id',$role->role_id);
            return redirect()->route('users.dashboard')->with('success', 'Selamat, Anda telah sukses masuk.');
        } else {
            session()->flash("error", "Maaf, Username atau Password yang anda inputkan salah, harap coba lagi.");
            return redirect()->route('loginpencariankerja')->with('failed', 'Gagal');
        }
        
    } 
    
    public function login_proses_perusahaan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $cek = users::where('name', $request->name)->where('password', $request->password)->first();
        $role = RoleUser::where('user_id', $cek->id)->first();

        if ($cek) {
            session()->put('name', $cek->name);
            session()->put('id',$cek->id);
            session()->put('email',$cek->email);
            session()->put('role_id',$role->role_id);
            return redirect()->route('perusahaan.dashboard')->with('success', 'Selamat, Anda telah sukses masuk.');
        } else {
            session()->flash("error", "Maaf, Username atau Password yang anda inputkan salah, harap coba lagi.");
            return redirect()->route('masukPerusahaan')->with('failed', 'Gagal');
        }
        
    }

    public function login_proses_admin(Request $request)
    {
        // dd('masuk');
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $cek = users::where('name', $request->name)->where('password', $request->password)->first();
        $role = RoleUser::where('user_id', $cek->id)->first();

        if ($cek) {
            session()->put('name', $cek->name);
            session()->put('id',$cek->id);
            session()->put('email',$cek->email);
            session()->put('role_id',$role->role_id);
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
