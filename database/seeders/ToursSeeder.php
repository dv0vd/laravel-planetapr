<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::factory()->count(10)->create();
    }
}
