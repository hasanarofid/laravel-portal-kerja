<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'riwayatpendidikan_id';
    protected $table = 'riwayat_pendidikan';
    protected $fillable = [
        'pencari_kerja_id',
        'nama_pendidikan',
        'nama_jurusan',
        'nama_institusi',
        'kota',
        'thn_masuk',
        'thn_keluar',
        'ipk_denim',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
