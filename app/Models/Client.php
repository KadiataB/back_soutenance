<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable;

class Client extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;
    protected $guarded=[];
    protected $hidden=[
        "created_at",
        "updated_at"
    ];
    
}
