<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Ad;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function reply_to_an_existing_comment()
    {
        $ad = factory(Ad::class)->create();

        $comment = $ad->addComment('Foo comment');

        $comment->reply('Reply to foo comment');

        $this->assertCount(1, $comment->replies);
    }

    /** @test */
    public function it_knows_its_parent()
    {
        $ad = factory(Ad::class)->create();

        $comment = $ad->addComment('Foo comment');

        $this->assertNull($comment->parent);

        $reply = $comment->reply('Reply to foo comment');

        $this->assertTrue($reply->parent->is($comment));
    }
}
