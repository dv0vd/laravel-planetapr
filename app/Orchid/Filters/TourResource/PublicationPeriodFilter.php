<?php

declare(strict_types=1);

namespace App\Orchid\Filters\TourResource;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateRange;

class PublicationPeriodFilter extends Filter
{
    public function name(): string
    {
        return 'Период публикации';
    }

    /**
     * @return ?string[]
     */
    public function parameters(): ?array
    {
        return [
            'date'
        ];
    }

    public function run(Builder $builder): Builder
    {
        if (!is_null($this->request->get('date'))) {
            $builder->whereBetween('date', $this->request->get('date'));
        }
        return $builder;
    }

    /**
     * @return Field[]
     */
    public function display(): iterable
    {
        return [
            DateRange::make('date')
                ->title('Перид публикации')
                ->value($this->request->get('date'))
        ];
    }
}
