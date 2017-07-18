<?php

use App\Thread;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Thread::class, 20)->create();

        $this->call(JaneDoesActivitySeeder::class);

        $this->call(JohnDoesActivitySeeder::class);
    }
}
