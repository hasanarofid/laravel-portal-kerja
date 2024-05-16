<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPencaker extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'users_pencaker';
    protected $fillable = [
        'name', 
        'username', 
        'email', 
        'password', 
        'nik',
        'no_tlp',
        'alamat',
        'role_id',
        'foto',
        'gender',
        'created_at',
    ];
}
