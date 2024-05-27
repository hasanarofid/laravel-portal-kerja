<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $primaryKey = 'fasilitas_id';
    protected $table = 'fasilitas';
    protected $guarded = [];
}
