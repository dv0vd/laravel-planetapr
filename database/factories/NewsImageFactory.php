<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\News;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsImage>
 */
class NewsImageFactory extends Factory
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
        $this->images = $this->storage->files('news/test');
        $news = News::all();

        return [
            'news_id' => $news[rand(0, count($news) - 1)]->id,
            'image' => $this->images[rand(0, count($this->images) - 1)],
        ];
    }
}