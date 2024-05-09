<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPencaker;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        $modPencaker = UsersPencaker::where('id', session('pencaker_id'))->first();
        
        return view('users.profil.index', compact('modPencaker'));
    }
}
