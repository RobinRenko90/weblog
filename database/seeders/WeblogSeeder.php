<?php

namespace Database\Seeders;

use App\Models\Weblog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeblogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Weblog::factory()->count(10)->create();
    }
}
