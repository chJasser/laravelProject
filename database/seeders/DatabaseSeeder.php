<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Forum;
use App\Models\User;
use App\Models\Event;
use App\Models\Comments;
use App\Models\Reclamation;
use App\Models\Club;
use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => 'hello',
            'role' => 'admin'

        ]);



        Forum::factory(6)->create();
        Event::factory(6)->create([
            'user_id' => $user->id
        ]);
        Comments::factory(10)->create([
            'user_id' => $user->id,
            'event_id' => rand($min = 1, $max = 6)
        ]);
        Reclamation::factory(6)->create([
            'user_id' => $user->id
        ]);
        Club::factory(6)->create([
            'user_id' => $user->id
        ]);
        Course::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
