<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahasadiKuasai extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'bahasa_dikuasai_id';
    protected $table = 'bahasa_dikuasai';
    protected $fillable = [
        'pencari_kerja_id',
        'nama_bahasa',
        'level',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
