<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class EventUserSeeder extends Seeder
{
    public function run()
    {
        $users = User::where('user_role', 'user')->get();
        $events = Event::all();

        foreach ($users as $user) {
            $user->events()->attach(
                $events->random(3)->pluck('id')->toArray(),
                ['registration_date' => now(), 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
