<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatabale;

class User extends Authenticatabale
{
    use SoftDeletes;
    protected $hidden = ['password'];
    protected $table ='tb_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['name', 'username', 'password'];
    use HasFactory;
}
