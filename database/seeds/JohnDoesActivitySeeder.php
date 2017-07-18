<?php

use App\User;
use App\Thread;
use Illuminate\Database\Seeder;

class JohnDoesActivitySeeder extends Seeder
{
    public function run()
    {
        $id = factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ])->id;

        factory(Thread::class, 5)->create([
            'user_id' => $id,
            'channel_id' => 1
        ]);
    }
}
