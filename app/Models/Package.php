<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = "packages";
    protected  $primaryKey = "package_id";
    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
}
