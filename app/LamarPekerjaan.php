<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamarPekerjaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'lamar_pekerjaan_id';
    protected $table = 'lamar_pekerjaan';
    protected $guarded = [];
}
