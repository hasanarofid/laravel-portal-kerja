<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangPerusahaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'bidang_id';
    protected $table = 'bidang_perusahaan';
    protected $guarded = [];
}
