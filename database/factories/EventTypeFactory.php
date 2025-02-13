<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventTypeFactory extends Factory
{
    protected $model = \App\Models\EventType::class;

    public function definition()
    {
        return [
            'event_type_name' => $this->faker->randomElement(['Concert', 'Workshop', 'Conference', 'Meetup']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
