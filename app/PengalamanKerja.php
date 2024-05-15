<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pengalaman_kerja_id';
    protected $table = 'pengalaman_kerja';
    protected $fillable = [
        'pencari_kerja_id',
        'nama_perusahaan',
        'bidang',
        'profesi',
        'posisi',
        'tgl_masuk',
        'tgl_selesai',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
