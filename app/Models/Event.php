<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'capacity',
        'price',
        'category_id',
    ];

 
    //Prix stocké en centimes
    //-------------------------------------------
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function getPriceAttribute($value)
    {
        return $value / 100;
    }
    //-------------------------------------------


    //5 prochains events
    //-------------------------------------------
    public function scopeUpcoming($query, $limit)
    {
        return $query->where('start_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->take($limit)
            ->get();
    }
    //-------------------------------------------



    //Event avec le plus grand nombre d'users
    //------------------------------------------
    public function scopePopular($query, $limit)
    {
        return $query
            ->withCount('users')
            ->orderBy('users_count', 'desc')
            ->take($limit)
            ->get();
    }

    //-------------------------------------------



    //Prend les évènements similaires en excluant l'event lui-même
    //-------------------------------------------
    public function scopeSimilar($query, $eventId, $limit)
    {
        $event = $this->findOrFail($eventId);

        return $query->where('category_id', $event->category_id)
                     ->where('id', '<>', $eventId) // ici
                     ->limit($limit)
                     ->get();
    }
    //-------------------------------------------

    //Events avec la même location
    public function scopeClose($query, $eventId, $limit)
    {
        $event = $this->findOrFail($eventId);
        
        return $query->where('location', 'like', '%' . $event->location . '%')
                     ->where('id', '<>', $eventId)
                     ->limit($limit)
                     ->get();
    }


    public function hasFinished(): bool
    {
            return $this->end_date <= Carbon::now();
    }

    public function hasReviewFromUser($userId): bool 
    {
        return $this->reviews()->where('user_id', $userId)->exists();
    }

    // Relations
    //------------------------------------------
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
    //------------------------------------------

}
