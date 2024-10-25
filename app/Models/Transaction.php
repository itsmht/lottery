<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    public $timestamps = true;
    use HasFactory;
    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
}
