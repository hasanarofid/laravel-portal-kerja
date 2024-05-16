<?php

use App\Http\Controllers\Admin2\DashboardAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\perusahaan\DashboardPerusahaanController;
use App\Http\Controllers\users\BiodataController;
use App\Http\Controllers\users\CvdanKeahlianController;
use App\Http\Controllers\users\DashboardController;
use App\Http\Controllers\users\HomeController as UsersHomeController;
use App\Http\Controllers\users\ProfilController;
use Illuminate\Support\Facades\Route;
// Route::redirect('/home', '/admin');
// Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/ak1', 'HomeController@ak1')->name('ak1');

// login admin
Route::get('/loginAdmin', 'HomeController@loginAdmin')->name('loginAdmin');
Route::post('/login-proses-admin', [HomeController::class, 'login_proses_admin'])->name('login-proses-admin');
// end 

// login dan register perusahaan
Route::get('/masukPerusahaan', 'HomeController@masukPerusahaan')->name('masukPerusahaan');
Route::post('/masuk-proses-perusahaan', [HomeController::class, 'login_proses_perusahaan'])->name('masuk-proses-perusahaan');
Route::get('/daftar', 'HomeController@daftar')->name('daftar');
Route::post('/register-perusahaan', [HomeController::class, 'register_perusahaan'])->name('register-perusahaan');

// end

// login dan register pencari kerja
Route::get('/loginpencariankerja', 'HomeController@loginpencariankerja')->name('loginpencariankerja');
Route::post('/login-proses-users', [HomeController::class, 'login_proses_users'])->name('login-proses-users');
Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register-proses', [HomeController::class, 'register_proses'])->name('register-proses');
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
 
    Route::get('profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('logout', [HomeController::class, 'logout'])->name('logout');
});

// dashboard perusahaan
Route::group(['prefix' => 'perusahaan/', 'as' => 'perusahaan.', 'middleware' => 'auth.perusahaan'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('dashboard', [DashboardPerusahaanController::class, 'index'])->name('dashboard');
    Route::get('logout', [HomeController::class, 'logoutPerusahaan'])->name('logout');
});

// dashboard admin
Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => 'auth.admin'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::get('logout', [HomeController::class, 'logoutAdmin'])->name('logout');
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
