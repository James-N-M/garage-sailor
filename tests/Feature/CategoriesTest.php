<?php

namespace Tests\Feature;

use App\Category;
use App\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function a_guest_can_view_categories()
    {
        $categories = factory(Category::class, 10)->create();

        $this->get('/categories')->assertOk()->assertSee($categories->first()->name);
    }

    /** @test */
    public function a_guest_can_view_category_items()
    {
        $item = factory(Item::class)->create();

        $category = $item->category;

        $this->get($category->path())->assertOk()->assertSee($category->name);
    }
}
