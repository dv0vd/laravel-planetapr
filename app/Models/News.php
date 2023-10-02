<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class News extends Model
{
    use AsSource;
    use Filterable;
    use HasFactory;

    /**
     * @var string[]
     */
    protected $allowedSorts = [
        'title',
        'description',
        'active',
        'title',
        'created_at',
        'updated_at'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(NewsImage::class)->orderBy('sort');
    }
}
