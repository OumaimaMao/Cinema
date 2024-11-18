<?php

namespace App\Models;

use App\Models\Movie;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $table= "ticket";
    public function movies(){
        return $this->belongsTo(Movie::class, 'idmovie');
    }
    public function place(){
        return $this->hasOne(Place::class);
    }
}
