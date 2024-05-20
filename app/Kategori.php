<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'kategori_id';
    protected $table = 'kategori_perusahaan';
    protected $guarded = [];
}
