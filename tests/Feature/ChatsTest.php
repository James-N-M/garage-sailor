<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class ChatsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_chat_another_user()
    {
        $this->signIn();

        $user = factory(User::class)->create();

        $this->get("/chats/{$user->id}")->assertOk()->assertSee($user->name);
    }
}
