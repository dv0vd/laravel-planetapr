<?php

declare(strict_types=1);

namespace App\Orchid\Resources;

use App\Models\News;
use App\Models\NewsImage;
use App\Orchid\Filters\NewsResource\ActiveFilter;
use App\Orchid\Filters\NewsResource\DescriptionFilter;
use App\Orchid\Filters\NewsResource\PublicationPeriodFilter;
use App\Orchid\Filters\NewsResource\TitleFilter;
use App\View\Components\Admin\NewsResource\NewsImagesComponent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Orchid\Crud\Resource;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class NewsResource extends Resource
{
    /**
     * @var string
     */
    public static $model = News::class;

    public static function sort(): string
    {
        return '1';
    }

    public static function icon(): string
    {
        return 'newspaper';
    }

    public static function label(): string
    {
        return 'Новости';
    }

    public static function singularLabel(): string
    {
        return 'Новость';
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Название')
                ->sort()
                ->alignCenter()
            ,
            TD::make('active', 'Активность')
                ->sort()
                ->alignCenter()
                ->render(function ($news) {
                    return $news->active ? 'Активна' : 'Неактивна';
                })
            ,
            TD::make('date', 'Отображаемая дата публикации')
                ->sort()
                ->alignCenter()
            ,
            TD::make('created_at', 'Дата создания')
                ->sort()
                ->alignCenter()
                ->usingComponent(DateTimeSplit::class)
            ,
            TD::make('updated_at', 'Дата обновления')
                ->sort()
                ->alignCenter()
                ->usingComponent(DateTimeSplit::class)
            ,
        ];
    }

    public function fields(): array
    {
        return [
            Input::make('title')
                ->title('Название')
            ,
            Select::make('active')
                ->title('Активность')
                ->options([
                    1 => 'Активна',
                    0 => 'Неактивна',
                ])
                ->value(0)
            ,
            Quill::make('description')
                ->title('Описание')
                ->toolbar(['text', 'color', 'quote', 'header', 'list', 'format'])
            ,
            DateTimer::make('date')
                ->title('Отображаемая дата публикации')
                ->format('Y-m-d')
                ->allowInput()
                ->placeholder('Выберите дату')
            ,
        ];
    }

    /**
     * @return class-string[]
     */
    public function filters(): array
    {
        return [
            TitleFilter::class,
            ActiveFilter::class,
            DescriptionFilter::class,
            PublicationPeriodFilter::class,
        ];
    }

    /**
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('title', 'Название')
            ,
            Sight::make('active', 'Активность')
                ->render(function ($news) {
                    return $news->active ? 'Активна' : 'Неактивна';
                })
            ,
            Sight::make('description', 'Описание')
            ,
            Sight::make('date', 'Отображаемая дата публикации')
            ,
            Sight::make('created_at', 'Дата создания')
                ->usingComponent(DateTimeSplit::class)
            ,
            Sight::make('updated_at', 'Дата обновления')
                ->usingComponent(DateTimeSplit::class)
            ,
            Sight::make('images', 'Изображения')
                ->component(NewsImagesComponent::class)
            ,
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'date.required' => 'Дата обязательна для заполнения',

            'description.required' => 'Описание обязательно для заполнения',

            'title.max' => 'Название не может быть больше :max символов',
            'title.required' => 'Название обязательно для заполнения',
        ];
    }

    public function onDelete(Model $model)
    {
        DB::transaction(function () use ($model) {
            NewsImage::where('news_id', $model->id)->delete();

            $model->delete();
        });
    }

    /**
     * @return string[]
     */
    public function rules(Model $model): array
    {
        return [
            'date' => 'required|date',
            'description' => 'required|string',
            'title' => 'required|string|max:255',
        ];
    }
}
