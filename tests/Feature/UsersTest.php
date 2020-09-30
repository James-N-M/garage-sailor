<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_view_all_users()
    {
        $this->signIn();

        $users = factory(User::class, 5)->create();

        $this->get("/users")->assertOk()->assertSee($users->first()->name);
    }
}
