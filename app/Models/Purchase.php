<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = "purchases";
    protected  $primaryKey = "purchase_id";

    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
    function scheme()
    {
        return $this->belongsTo('App\Models\Scheme', 'scheme_id', 'scheme_id');
    }
    
}
