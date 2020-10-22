<?php

namespace Tests\Unit;

use App\Category;
use App\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $category = factory(Category::class)->create();

        $this->assertEquals('/categories/' . $category->id, $category->path());
    }

    /** @test */
    public function it_belongs_to_many_items()
    {
        $category = factory(Category::class)->create();

        factory(Item::class, 5)->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Item::class, $category->items->first());
    }
}
