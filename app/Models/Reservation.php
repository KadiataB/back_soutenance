<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded=[];

    function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    function site() : BelongsTo {
        return $this->belongsTo(Site::class);
    }
}
