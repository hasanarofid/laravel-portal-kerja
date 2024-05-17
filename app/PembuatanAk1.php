<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembuatanAk1 extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pembuatan_ak1_id';
    protected $table = 'pembuatan_ak1';
    protected $fillable = [
        'pencari_kerja_id',
        'name',
        'nik',
        'email',
        'no_hp',
        'tmpt_lahir',
        'tgl_lahir',
        'jeniskelamin',
        'pendidikan_terakhir',
        'alamat',
        'pasfoto',
        'ktp',
        'ijazah',
        'created_at',
        'updated_at',
    ];
}
