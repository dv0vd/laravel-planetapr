<?php

declare(strict_types=1);

namespace App\Orchid\Filters\TourResource;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class TypeFilter extends Filter
{
    public function name(): string
    {
        return 'Тип';
    }

    /**
     * @return ?string[]
     */
    public function parameters(): ?array
    {
        return [
            'is_abroad'
        ];
    }

    public function run(Builder $builder): Builder
    {
        if (!is_null($this->request->get('is_abroad'))) {
            $isAbroad = true;
            if ($this->request->get('is_abroad') == 'по России') {
                $isAbroad = false;
            }

            $builder = $builder->where('is_abroad', $isAbroad);
        }

        return $builder;
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        $field = Select::make('is_abroad')
            ->options([
                'заграничный' => 'Заграничный',
                'по России' => 'По России',
            ])
            ->title('Тип')
        ;

        if (!is_null($this->request->get('is_abroad'))) {
            $field = $field->value($this->request->get('is_abroad'));
        } else {
            $field = $field->value('по России');
        }

        return [
            $field,
        ];
    }
}
