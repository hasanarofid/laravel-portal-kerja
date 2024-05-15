<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertifikatPendidikan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'sertifikatpendidikan_id';
    protected $table = 'sertifikat_pendidikan';
    protected $fillable = [
        'pencari_kerja_id',
        'nama_sertifikat',
        'bidang_keahlian',
        'nama_institusi',
        'tgl_terbit',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
