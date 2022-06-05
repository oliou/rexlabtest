<?php

namespace Database\Seeders;

use App\Users\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFactory::times(50)
            ->create();
    }
}
