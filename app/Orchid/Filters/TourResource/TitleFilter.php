<?php

declare(strict_types=1);

namespace App\Orchid\Filters\TourResource;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;

class TitleFilter extends Filter
{
    public function name(): string
    {
        return 'Название';
    }

    /**
     * @return ?string[]
     */
    public function parameters(): ?array
    {
        return [
            'title'
        ];
    }

    public function run(Builder $builder): Builder
    {
        if (!is_null($this->request->get('title'))) {
            $builder = $builder->whereRaw('lower(title) like ? ', \Str::lower("%{$this->request->get('title')}%"));
        }

        return $builder;
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Input::make('title')
                ->type('text')
                ->title('Название')
                ->value($this->request->get('title'))
            ,
        ];
    }
}
