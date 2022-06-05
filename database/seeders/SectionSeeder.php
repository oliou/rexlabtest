<?php

namespace Database\Seeders;

use App\Sections\Factories\SectionFactory;
use App\Sections\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionFactory::times(20)
            ->create();
    }
}
