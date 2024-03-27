<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Site extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    function hote():BelongsTo {
        return $this->belongsTo(User::class, "hote_id");
    }
}