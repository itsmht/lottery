<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = "announcements";
    protected  $primaryKey = "announcement_id";
    
    function scheme()
    {
        return $this->belongsTo('App\Models\Scheme', 'scheme_id', 'scheme_id');
    }
}
