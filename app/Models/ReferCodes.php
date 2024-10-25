<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ReferCodes extends Model
{
    use HasFactory;
    protected $table = "refer_codes";
    protected  $primaryKey = "refer_code_id";
    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
}
