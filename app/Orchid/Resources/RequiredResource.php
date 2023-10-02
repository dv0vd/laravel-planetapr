<?php

declare(strict_types=1);

namespace App\Orchid\Resources;

use Orchid\Attachment\Models\Attachment;
use Orchid\Crud\Resource;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

// todo убрать костыльный ресурс для корректного отображения в dashboard
class RequiredResource extends Resource
{
    /**
     * @var class-string
     */
    public static $model = Attachment::class;

    public static function displayInNavigation(): bool
    {
        return false;
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
        ];
    }

    public function fields(): array
    {
        return [
        ];
    }

    /**
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
        ];
    }
}