<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageChannelsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_guest_cannot_create_a_channel()
    {
        $this->withExceptionHandling();
        
        $channel = make('App\Channel');

        $r = $this->json('POST', 'channels', [
            'name' => $channel->name
        ]);

        $r->assertStatus(401);
    }

    /** @test */
    public function a_confirmed_user_can_create_a_channel()
    {
        $this->signIn();

        $channel = make('App\Channel');

        $r = $this->json('POST', 'channels', [
            'name' => $channel->name
        ]);

        $r->assertStatus(200)
            ->assertSee('Channel created');
    }
}
