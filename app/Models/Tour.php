<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Tour extends Model
{
    use AsSource;
    use Filterable;
    use HasFactory;

    /**
     * @var string[]
     */
    protected $allowedSorts = [
        'title',
        'date',
        'description',
        'active',
        'created_at',
        'updated_at'
    ];
}
