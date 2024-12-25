<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;
    protected $table= "category";
    public function movie(){
        return $this->hasMany(Movie::class, 'idcategory');
    }
}
