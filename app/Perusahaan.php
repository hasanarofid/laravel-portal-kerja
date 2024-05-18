<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_perusahaan';
    protected $table = 'perusahaan';
    protected $guarded = [];

    // protected $fillable = [
    //     'nama', 
    //     'username', 
    //     'email', 
    //     'no_perusahaan', 
    //     'alamat',
    //     'bidang_usaha',
    //     'url_perusahaan',
    //     'password',
    //     'keterangan',
    //     'kode_perusahaan',
    //     'role_id',
    //     'created_at',
    // ];
}
