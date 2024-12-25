<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opening extends Model
{
    use HasFactory;
    protected $table= "opening";
    public function movie(){
        return $this->hasOne(Movie::class, 'id', 'idmovie');
    }
}
