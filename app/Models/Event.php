<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'description',
        'start_time',
        'end_time',
        'location_id',
        'event_type_id',
        'organizer_id',
        'picture',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'event_user')->withTimestamps();
    }
}
