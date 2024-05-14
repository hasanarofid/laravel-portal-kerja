<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterampilan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'keterampilan_id';
    protected $table = 'keterampilan';
    protected $fillable = [
       'pencari_kerja_id',
       'nama_keterampilan',
       'keterangan',
    ];
}
