<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'kota_tabel_id';
    protected $table = 'kota_tabel';
    protected $fillable = [
        'nama_kota',
        'created_at',
        'updated_at',
    ];
}
