<?php

declare(strict_types=1);

namespace App\Orchid\Filters\TourResource;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;

class DescriptionFilter extends Filter
{
    public function name(): string
    {
        return 'Описание';
    }

    /**
     * @return ?string[]
     */
    public function parameters(): ?array
    {
        return [
            'description'
        ];
    }

    public function run(Builder $builder): Builder
    {
        if (!is_null($this->request->get('description'))) {
            $builder = $builder->whereRaw('lower(description) like ? ', \Str::lower("%{$this->request->get('description')}%"));
        }

        return $builder;
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Input::make('description')
                ->type('text')
                ->value($this->request->get('description'))
                ->title('Описание')
            ,
        ];
    }
}
