<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function refers()
    {
        return $this->hasMany('App\Models\ReferCodes', 'refer_code_id', 'refer_code_id');
    }
    function refer()
    {
        return $this->hasMany('App\Models\Refers', 'refer_id', 'refer_id');
    }
    function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'user_id', 'user_id');
    }
    function package()
    {
        return $this->hasMany('App\Models\Package', 'package_id', 'package_id');
    }
    function sub()
    {
        return $this->hasMany('App\Models\Subscription', 'subscription_id', 'subscription_id');
    }
    function scheme()
    {
        return $this->hasMany('App\Models\Scheme', 'scheme_id', 'scheme_id');
    }
    function purchase()
    {
        return $this->hasMany('App\Models\Purchase', 'purchase_id', 'purchase_id');
    }
}
