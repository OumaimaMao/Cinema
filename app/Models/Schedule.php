<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    protected $table= "schedule";
    public function movies(){
        return $this->belongsTo(Movie::class, 'idmovie');
    }
}
