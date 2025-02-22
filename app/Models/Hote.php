<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hote extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function sites(){
        return $this->hasMany(Site::class, 'site_id');
    }
}
