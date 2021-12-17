<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use SoftDeletes;
 
    protected $table = "users";
   	protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'phone_number',
        'address',
        'name',
        'active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkout()
    {   
        return $this->hasMany(checkout::class);
    }

    public function bill()
    {
        return $this->hasMany(bill::class);
    }

    public function cart()
    {
        return $this->hasMany(cart::class);
    }

    public function logaction()
    {
        return $this->hasMany(logaction::class);
    }

    public function logproduct()
    {
        return $this->hasMany(logproduct::class);
    }
}
