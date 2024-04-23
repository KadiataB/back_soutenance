<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Site extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    function hote():BelongsTo {
        return $this->belongsTo(User::class, "hote_id");
    }
    function details(){
        return $this->belongsToMany(Details::class,"details_sites")->withPivot('id','details_id');    
    }
   
    function medias(){
        return $this->hasMany(Medias::class);
    }
}
