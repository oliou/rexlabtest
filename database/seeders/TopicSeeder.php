<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Topics\Factories\TopicFactory;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TopicFactory::times(20)
            ->withSection()
            ->withUser()
            ->create();
    }
}
