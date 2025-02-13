<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = \App\Models\Location::class;

    public function definition()
    {
        return [
            'location_name' => $this->faker->company,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
