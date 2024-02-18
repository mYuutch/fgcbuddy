<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function events(){
        return $this->hasMany(Event::class);
    }



    //Event avec le plus grand nombre d'users
    //------------------------------------------
    public function scopePopular($query, $limit)
    {
        return $query
            ->withCount('events')
            ->orderBy('events_count', 'desc')
            ->take($limit)
            ->get();
    }

    //-------------------------------------------

    

    protected $fillable = [
        'name'
    ];

    protected $table = 'categories';
}
