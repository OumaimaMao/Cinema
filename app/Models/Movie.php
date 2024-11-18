<?php

namespace App\Models;

use App\Models\Actor;
use App\Models\Ticket;
use App\Models\Comming;
use App\Models\Opening;
use App\Models\Category;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Movie extends Model
{
    use HasFactory;
    protected $table= "movie";
    public function schedules(){
        return $this->hasMany(Schedule::class, 'idmovie');
    }
    public function tickets(){
        return $this->hasMany(Ticket::class, 'idmovie');
    }
    public function actors(){
        return $this->belongsToMany(Actor::class,'movie_actor', 'idmovie','idactor');
    }
    public function opening(){
        return $this->belongsTo(Opening::class);
    }
    public function comming(){
        return $this->belongsTo(Comming::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}