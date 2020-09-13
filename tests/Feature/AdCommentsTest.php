<?php

namespace Tests\Feature;

use App\Ad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdCommentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_ad_may_receive_comments()
    {
        $this->signIn();

        $ad = factory(Ad::class)->create();

        $this->post('/ads/' . $ad->id . '/comments', [
            'body' => 'Foo comment'
        ]);

        $this->assertCount(1, $ad->comments);
    }

    /** @test */
    public function a_comment_may_be_replied_to()
    {
        $this->signIn();

        $ad = factory(Ad::class)->create();

        $comment = $ad->addComment('Foo comment');

        $this->post('/ads/' . $ad->id . '/comments', [
            'body' => 'Replying to foo comment',
            'reply_to_id' => $comment->id
        ]);

        $this->assertCount(2, $ad->comments);

        $this->assertTrue($ad->comments->last()->parent->is($comment));
    }
}
