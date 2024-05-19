<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'kelurahan_tabel_id';
    protected $table = 'kelurahan_tabel';
    protected $fillable = [
        'nama_kelurahan',
        'created_at',
        'updated_at',
    ];
}
