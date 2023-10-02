<?php

declare(strict_types=1);

namespace App\Orchid\Filters\NewsResource;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class ActiveFilter extends Filter
{
    public function name(): string
    {
        return 'Активность';
    }

    /**
     * @return ?string[]
     */
    public function parameters(): ?array
    {
        return [
            'active'
        ];
    }

    public function run(Builder $builder): Builder
    {
        if (!is_null($this->request->get('active'))) {
            $active = true;
            if ($this->request->get('active') == 'нет') {
                $active = false;
            }

            $builder = $builder->where('active', $active);
        }

        return $builder;
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        $field = Select::make('active')
            ->options([
                'нет' => 'Неактивна',
                'да' => 'Активна',
            ])
            ->title('Активность')
        ;

        if (!is_null($this->request->get('active'))) {
            $field = $field->value($this->request->get('active'));
        } else {
            $field = $field->value('да');
        }

        return [
            $field,
        ];
    }
}
