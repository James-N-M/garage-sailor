<?php

namespace Tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SidebarTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function a_guest_can_see_categories_in_the_sidebar()
    {
        $categories = factory(Category::class, 10)->create();

        $this->get('/ads')->assertOk()->assertSee($categories->first()->name);
        $this->get('/items')->assertOk()->assertSee($categories->first()->name);
    }
}

