<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_lowongan';
    protected $table = 'lowongan';
    protected $guarded = [];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }


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
