<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\NewsImage;
use Illuminate\Database\Seeder;

class NewsImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsImage::factory()->count(50)->create();
    }
}