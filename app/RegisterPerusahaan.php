<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterPerusahaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'register_perusahaan';
    protected $fillable = [
        'nama', 
        'username', 
        'email', 
        'no_perusahaan', 
        'alamat',
        'bidang_usaha',
        'url_perusahaan',
        'password',
        'keterangan',
        'kode_perusahaan',
        'role_id',
        'created_at',
    ];
}
