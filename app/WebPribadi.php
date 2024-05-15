<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebPribadi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'webpribadi_id';
    protected $table = 'webpribadi';
    protected $fillable = [
        'pencari_kerja_id',
        'link',
        'nama_web',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
