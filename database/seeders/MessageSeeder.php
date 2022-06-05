<?php

namespace Database\Seeders;

use App\Messages\Factories\MessageFactory;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageFactory::times(20)
            ->withTopic()
            ->withUser()
            ->create();
    }
}
