<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'provinsi_tabel_id';
    protected $table = 'provinsi_tabel';
    protected $fillable = [
        'nama_provinsi',
        'created_at',
        'updated_at',
    ];
}
