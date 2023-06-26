<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MasterUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mst_users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
