<?php

use App\User;
use App\Thread;
use Illuminate\Database\Seeder;

class JaneDoesActivitySeeder extends Seeder
{
    public function run()
    {
        $id = factory(User::class)->create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com'
        ])->id;

        factory(Thread::class, 5)->create([
            'user_id' => $id,
            'channel_id' => 1
        ]);
    }
}
