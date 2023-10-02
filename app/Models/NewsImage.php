<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class NewsImage extends Model
{
    use AsSource;
    use Filterable;
    use HasFactory;

    protected $allowedSorts = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'image'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
