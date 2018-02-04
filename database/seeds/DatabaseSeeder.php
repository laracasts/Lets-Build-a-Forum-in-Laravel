<?php

use Illuminate\Database\Seeder;
use App\Channel;
use App\Thread;
use App\Reply;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel = factory(Channel::class, 5)->create();
        $channel->each(function (Channel $channel) {
            $threads = factory(Thread::class, 10)->create([
                'channel_id' => $channel->id
            ]);
            $threads->each(function (Thread $thread) {
                factory(Reply::class, 10)->create([
                    'thread_id' => $thread->id
                ]);
            });
        });
    }
}
