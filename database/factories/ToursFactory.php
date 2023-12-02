<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class ToursFactory extends Factory
{
    private array $images;
    private Filesystem $storage;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->storage = Storage::disk('public');
        $this->images = $this->storage->files('tours/test');

        $imageNumber = rand(0, count($this->images) - 1);
        $image = last(explode('/', $this->images[$imageNumber]));

        return [
            'title' => fake()->word(),
            'description' => fake()->text(),
            'date' => fake()->date(),
            'active' => fake()->boolean(),
            'is_abroad' => rand(0, 1),
            'image' => "test/$image",
        ];
    }
}
