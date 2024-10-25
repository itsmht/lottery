<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = "subscriptions";
    protected  $primaryKey = "subscription_id";

    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
    function package()
    {
        return $this->belongsTo('App\Models\Package', 'package_id', 'package_id');
    }
}
