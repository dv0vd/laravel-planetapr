<?php

declare(strict_types=1);

namespace App\Orchid\Filters\NewsImageResource;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class NewsFilter extends Filter
{
    public function name(): string
    {
        return 'Новости';
    }

    /**
     * @return ?string[]
     */
    public function parameters(): ?array
    {
        return [
            'news'
        ];
    }

    public function run(Builder $builder): Builder
    {
        if (!is_null($this->request->get('news'))) {
            $builder->whereIn('news_id', $this->request->get('news'));
        }

        return $builder;
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Select::make('news')
                ->fromModel(News::class, 'title', 'id')
                ->title('Новость')
                ->multiple()
                ->value($this->request->get('news'))
            ,
        ];
    }
}
