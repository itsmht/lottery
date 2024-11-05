<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;
    protected $table = "schemes";
    protected  $primaryKey = "scheme_id";

    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
}
