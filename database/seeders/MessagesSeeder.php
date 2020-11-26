<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Message;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Message::class)->create(['from_id' => 1, 'to_id' => 2, 'text' => "Hello will there be video games available"]);
        factory(Message::class)->create(['from_id' => 2, 'to_id' => 1, 'text' => "yes there will be !"]);
        factory(Message::class)->create(['from_id' => 1, 'to_id' => 2, 'text' => "Thank you"]);
        factory(Message::class)->create(['from_id' => 2, 'to_id' => 1, 'text' => "Your welcome!"]);
    }
}
