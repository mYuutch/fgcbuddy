<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

 

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function getPriceAttribute($value)
    {
        return $value / 100;
    }

    public function scopeUpcoming($query, $limit)
    {
        return $query->where('start_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->take($limit)
            ->get();
    }

    public function scopePopular($query, $limit)
    {
        return $query
            ->withCount('users')
            ->orderBy('users_count', 'desc')
            ->take($limit)
            ->get();
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
