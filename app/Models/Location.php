<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name',
        'address',
        'city',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    
}
