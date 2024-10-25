<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refers extends Model
{
    use HasFactory;
    protected $table = "refers";
    protected  $primaryKey = "refer_id";

    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
    function referCode()
    {
        return $this->belongsTo('App\Models\ReferCodes', 'refer_code_id', 'refer_code_id');
    }
}
