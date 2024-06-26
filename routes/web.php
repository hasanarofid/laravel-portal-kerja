<?php

use App\Http\Controllers\Admin2\BidangController;
use App\Http\Controllers\Admin2\DashboardAdminController;
use App\Http\Controllers\Admin2\FasilitasController;
use App\Http\Controllers\Admin2\KecamatanController;
use App\Http\Controllers\Admin2\KelurahanController;
use App\Http\Controllers\Admin2\KotaController;
use App\Http\Controllers\Admin2\ProvinsiController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\perusahaan\DashboardPerusahaanController;
use App\Http\Controllers\perusahaan\{DashboardPerusahaanController, ProfilePerusahaanController, UndanganController, PelamarController,LowonganController, PerusahaanHistoryController, PetugasPenanggungJawabController};
use App\Http\Controllers\users\BiodataController;
use App\Http\Controllers\users\CariLowonganController;
use App\Http\Controllers\users\CvdanKeahlianController;
use App\Http\Controllers\users\DashboardController;
use App\Http\Controllers\users\DetailInfoController;
use App\Http\Controllers\users\HomeController as UsersHomeController;
use App\Http\Controllers\users\LamarPekerjaanController;
use App\Http\Controllers\users\LupaPasswordController;
use App\Http\Controllers\users\PembuatanAk1Controller;
use App\Http\Controllers\users\ProfilController;
use App\Kecamatan;
use Illuminate\Support\Facades\Route;
// Route::redirect('/home', '/admin');
// Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/ak1', 'HomeController@ak1')->name('ak1');
Route::get('loker/detail/{id}', [HomeController::class, 'detaillowongan'])->name('loker.detail');
Route::get('loker/all', [HomeController::class, 'lokerAll'])->name('loker.all');
Route::get('pencaker/all', [HomeController::class, 'pencakerAll'])->name('pencaker.all');
// login admin
Route::get('/loginAdmin', 'HomeController@loginAdmin')->name('loginAdmin');
Route::post('/login-proses-admin', [HomeController::class, 'login_proses_admin'])->name('login-proses-admin');

// end 

// login dan register perusahaan
Route::get('/masukPerusahaan', 'HomeController@masukPerusahaan')->name('masukPerusahaan');
Route::post('/masuk-proses-perusahaan', [HomeController::class, 'login_proses_perusahaan'])->name('masuk-proses-perusahaan');
Route::get('/daftar', 'HomeController@daftar')->name('daftar');
Route::post('/register-perusahaan', [HomeController::class, 'register_perusahaan'])->name('register-perusahaan');
Route::get('/LupasPasswordPerusahaan', [LupaPasswordController::class, 'lupaPassword_Perusahaan'])->name('lupasPassword-perusahaan');
Route::post('/resetPasswordPerusahaan', [LupaPasswordController::class, 'resetPassword_Perusahaan'])->name('lupapassword2');
// end

// login dan register pencari kerja
Route::get('/loginpencariankerja', 'HomeController@loginpencariankerja')->name('loginpencariankerja');
Route::post('/login-proses-users', [HomeController::class, 'login_proses_users'])->name('login-proses-users');
Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register-proses', [HomeController::class, 'register_proses'])->name('register-proses');
Route::get('/LupasPasswordPencaker', [LupaPasswordController::class, 'lupaPassword_Pencaker'])->name('lupasPassword-pencaker');
Route::post('/resetPasswordPencaker', [LupaPasswordController::class, 'resetPassword_Pencaker'])->name('lupapassword');
// end 

// dashboard users
Route::group(['prefix' => 'users/', 'as' => 'users.', 'middleware' => 'auth.users'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // end dashboard

    // biodata
    Route::get('biodata', [BiodataController::class, 'index'])->name('biodata');
    Route::post('simpan-biodata', [BiodataController::class, 'simpan_biodata'])->name('simpan-biodata');
    Route::post('hapusdata', [BiodataController::class, 'hapusdata'])->name('hapusdata');
    // end biodata

    // Cv & keahlian
    Route::get('cvdankeahlian', [CvdanKeahlianController::class, 'index'])->name('cvdankeahlian');
    Route::post('simpan-cvdankeahlian', [CvdanKeahlianController::class, 'simpan_cvdankeahlian'])->name('simpan-cvdankeahlian');
    Route::get('download/{filename}', [CvdanKeahlianController::class, 'download'])->name('download-file');
    Route::post('hapusdataRiwayat', [CvdanKeahlianController::class, 'hapusdataRiwayat'])->name('hapusdataRiwayat');
    Route::post('hapusdataSertifikat', [CvdanKeahlianController::class, 'hapusdataSertifikat'])->name('hapusdataSertifikat');
    Route::post('hapusdataPelatihan', [CvdanKeahlianController::class, 'hapusdataPelatihan'])->name('hapusdataPelatihan');
    Route::post('hapusdataBahasa', [CvdanKeahlianController::class, 'hapusdataBahasa'])->name('hapusdataBahasa');
    Route::post('hapusdataPengalaman', [CvdanKeahlianController::class, 'hapusdataPengalaman'])->name('hapusdataPengalaman');
    Route::post('hapusdataWeb', [CvdanKeahlianController::class, 'hapusdataWeb'])->name('hapusdataWeb');
    // end Cv & keahlian

    // profil
    Route::get('profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('simpan-profil', [ProfilController::class, 'simpan_profil'])->name('simpan-profil');
    Route::get('logout', [HomeController::class, 'logout'])->name('logout');
    // end profil

    // ak1
    Route::get('ak1', [PembuatanAk1Controller::class, 'index'])->name('ak1');
    Route::post('simpan-ak1', [PembuatanAk1Controller::class, 'simpan_ak1'])->name('simpan-ak1');
    Route::get('download-pas-foto/{filename}', [PembuatanAk1Controller::class, 'download_pas_foto'])->name('download-pas-foto');
    Route::get('download-pas-ktp/{filename}', [PembuatanAk1Controller::class, 'download_pas_ktp'])->name('download-pas-ktp');
    Route::get('download-pas-ijazah/{filename}', [PembuatanAk1Controller::class, 'download_ijazah'])->name('download-ijazah');
    // end ak1

    // detailinfo
    Route::get('detailinfo', [DetailInfoController::class, 'index'])->name('detailinfo');
    // detailinfo

    // cari lowongan
    Route::get('carilowongan', [CariLowonganController::class, 'index'])->name('carilowongan');
   
    Route::post('setTabelCarilowongan', [CariLowonganController::class, 'setTabelCarilowongan'])->name('setTabelCarilowongan');
    // cari lowongan

    // lamar pekerjaan
    Route::get('lamarpekerjaan/{id}', [LamarPekerjaanController::class, 'index'])->name('lamarpekerjaan');
    Route::post('simpan-lamarpekerjaan', [LamarPekerjaanController::class, 'simpan_lamarpekerjaan'])->name('simpan-lamarpekerjaan');
    // lamar pekerjaan
});

// dashboard perusahaan
Route::group(['prefix' => 'perusahaan/', 'as' => 'perusahaan.', 'middleware' => 'auth.perusahaan'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('dashboard', [DashboardPerusahaanController::class, 'index'])->name('dashboard');
    Route::get('logout', [HomeController::class, 'logoutPerusahaan'])->name('logout');
    # start route input master Menu
    Route::group(['prefix' => 'profile/', 'as' => 'profile.'], function () {
        Route::get('index', [ProfilePerusahaanController::class, 'index'])->name('index');
        Route::post('update', [ProfilePerusahaanController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'undangan/', 'as' => 'undangan.'], function () {
        Route::get('index', [UndanganController::class, 'index'])->name('index');
        Route::get('getData', [UndanganController::class, 'getData'])->name('getData');
        Route::post('updateInterview', [UndanganController::class, 'updateInterview'])->name('updateInterview');
        Route::post('batalInterview', [UndanganController::class, 'batalInterview'])->name('batalInterview');
    });

    Route::group(['prefix' => 'perusahaanHistory/', 'as' => 'perusahaanHistory.'], function () {
        Route::get('index', [PerusahaanHistoryController::class, 'index'])->name('index');
        Route::get('getData', [PerusahaanHistoryController::class, 'getData'])->name('getData');
    });

    Route::group(['prefix' => 'pelamar/', 'as' => 'pelamar.'], function () {
        Route::get('index', [PelamarController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'petugaspenanggungjawab/', 'as' => 'petugaspenanggungjawab.'], function () {
        Route::get('index', [PetugasPenanggungJawabController::class, 'index'])->name('index');
        Route::post('simpanPetugasPj', [PetugasPenanggungJawabController::class, 'simpanPetugasPj'])->name('simpanPetugasPj');
    });


    Route::group(['prefix' => 'lowongan/', 'as' => 'lowongan.'], function () {
        Route::get('index', [LowonganController::class, 'index'])->name('index');
        Route::get('tambah', [LowonganController::class, 'tambah'])->name('tambah');
        Route::post('simpanLowongan', [LowonganController::class, 'simpanLowongan'])->name('simpanLowongan');
        Route::get('loadLowongan/{id?}', [LowonganController::class, 'loadLowongan'])->name('loadLowongan');

            

    });
});

// dashboard admin
Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => 'auth.admin'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::get('logout', [HomeController::class, 'logoutAdmin'])->name('logout');
    Route::post('hapusdatausers', [DashboardAdminController::class, 'hapusdatausers'])->name('hapusdatausers');
    Route::post('hapusdataperusahaan', [DashboardAdminController::class, 'hapusdataperusahaan'])->name('hapusdataperusahaan');

    // provinsi
    Route::get('provinsi', [ProvinsiController::class, 'index'])->name('provinsi');
    Route::post('simpan-provinsi', [ProvinsiController::class, 'simpan_provinsi'])->name('simpan-provinsi');
    Route::post('hapusdataprov', [ProvinsiController::class, 'hapusdataprov'])->name('hapusdataprov');
    // provinsi

    // kecamatan
    Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
    Route::post('simpan-kecamatan', [KecamatanController::class, 'simpan_kecamatan'])->name('simpan-kecamatan');
    Route::post('hapusdatakec', [KecamatanController::class, 'hapusdatakec'])->name('hapusdatakec');
    // kecamatan

    // kelurahan
    Route::get('kelurahan', [KelurahanController::class, 'index'])->name('kelurahan');
    Route::post('simpan-kelurahan', [KelurahanController::class, 'simpan_kelurahan'])->name('simpan-kelurahan');
    Route::post('hapusdatakel', [KelurahanController::class, 'hapusdatakel'])->name('hapusdatakel');
    // kelurahan
    
    // kota
    Route::get('kota', [KotaController::class, 'index'])->name('kota');
    Route::post('simpan-kota', [KotaController::class, 'simpan_kota'])->name('simpan-kota');
    Route::post('hapusdatakota', [KotaController::class, 'hapusdatakota'])->name('hapusdatakota');
    // kota

    // Bidang
    Route::get('bidang', [BidangController::class, 'index'])->name('bidang');
    Route::post('simpan-bidang', [BidangController::class, 'simpan_bidang'])->name('simpan-bidang');
    Route::post('hapusdatabidang', [BidangController::class, 'hapusdatabidang'])->name('hapusdatabidang');
    // Bidang

    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
    Route::post('simpan-fasilitas', [FasilitasController::class, 'simpan_fasilitas'])->name('simpan-fasilitas');
    Route::post('hapusdatafasilitas', [FasilitasController::class, 'hapusdatafasilitas'])->name('hapusdatafasilitas');
    // Bidang
});


Route::get('/lowongan', 'HomeController@lowongan')->name('lowongan');
Route::get('/pencari', 'HomeController@pencari')->name('pencari');
Route::get('search', 'HomeController@search')->name('search');
Route::resource('jobs', 'JobController')->only(['index', 'show']);
Route::get('category/{category}', 'CategoryController@show')->name('categories.show');
Route::get('location/{location}', 'LocationController@show')->name('locations.show');



// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
//     Route::get('/', 'HomeController@index')->name('home');
//     // Permissions
//     Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
//     Route::resource('permissions', 'PermissionsController');

//     // Roles
//     Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
//     Route::resource('roles', 'RolesController');

//     // Users
//     Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
//     Route::resource('users', 'UsersController');

//     // Categories
//     Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
//     Route::resource('categories', 'CategoriesController');

//     // Locations
//     Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
//     Route::resource('locations', 'LocationsController');

//     // Companies
//     Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
//     Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
//     Route::resource('companies', 'CompaniesController');

//     // Jobs
//     Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
//     Route::resource('jobs', 'JobsController');
// });
