<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use App\Job;
use Illuminate\Http\Request;

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
}
