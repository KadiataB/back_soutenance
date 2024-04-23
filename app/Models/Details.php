<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Details extends Model
{
    use HasFactory;
    protected $guarded=[];

    function sites():BelongsToMany {
        return $this->belongsToMany(Site::class,"details_sites")->withPivot('id','details_id');    
    }
}
