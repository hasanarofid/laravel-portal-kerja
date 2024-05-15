<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvdanKeahlian extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'cvdankeahlian_id';
    protected $table = 'cvdankeahlian';
    protected $fillable = [
        'pencari_kerja_id',
        'nama_file',
        'created_at',
        'updated_at',
    ];
}
