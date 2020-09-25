<?php

namespace Tests\Feature;

use App\Ad;
use App\Mail\ContactAdCreator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactAdCreatorTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function an_authenticated_user_can_email_an_ad_creator()
    {
        \Mail::fake();

        \Mail::assertNothingSent();

        $ad = factory(Ad::class)->create();

        $creator = $ad->creator;

        $this->signIn();

        $this->post("/contact" . $ad->path(), ['body' => "Hello are you selling any golf clubs"])
            ->assertRedirect();

        \Mail::assertSent(ContactAdCreator::class, function ($mail) use ($creator) {
            return $mail->hasTo($creator->email);
        });
    }
}
