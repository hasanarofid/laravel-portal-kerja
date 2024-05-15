<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanPendidikan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pelatihanpendidikan_id';
    protected $table = 'pelatihan_pendidikan';
    protected $fillable = [
        'pencari_kerja_id',
        'nama_pelatihan',
        'penyelenggara',
        'tgl_terbit',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
