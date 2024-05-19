<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'kecamatan_tabel_id';
    protected $table = 'kecamatan_tabel';
    protected $fillable = [
        'nama_kecamatan',
        'created_at',
        'updated_at',
    ];
}
