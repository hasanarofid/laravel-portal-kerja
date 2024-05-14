<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencariKerja extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pencari_kerja_id';
    protected $table = 'pencari_kerja';
    protected $fillable = [
        'nomor_ktp',
        'users_pencaker_id',
        'password',
        'email',
        'tgl_daftar',
        'nama',
        'foto',
        'tempat_lahir',
        'tgl_lahir',
        'gender',
        'agama',
        'status_kawin',
        'kewarganegaraan',
        'tinggi_badan',
        'berat_badan',
        'no_hp',
        'telepon',
        'id_sekolah',
        'alamat',
        'provinsi_nama',
        'kota_nama',
        'kecamatan_nama',
        'kelurahan_nama',
        'rw',
        'rt',
        'jml_anak',
        'tentang_saya',
        'link_video',
        'keterangan',
        'gaji_harapan',
        'harapan_lokasipekerjaan',
        'created_at',
        'updated_at',
    ];
}
