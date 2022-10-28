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

        Forum::factory(6)->create([
            'user_id' => $user->id
        ]);

        Event::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
