<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    public $timestamps = true;
    protected $guarded = ['email_verified_at','remember_token','created_at','updated_at'];
    use HasFactory;
}
