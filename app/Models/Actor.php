<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actor extends Model
{
    use HasFactory;
    protected $table= "actor";
    public function movies(){
        return $this->belongsToMant(Movie::class,'movie_actor', 'idmovie','idactor');
    }
}
