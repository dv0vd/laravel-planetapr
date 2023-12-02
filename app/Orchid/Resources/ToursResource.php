<?php

declare(strict_types=1);

namespace App\Orchid\Resources;

use App\Models\Tour;
use App\Orchid\Filters\TourResource\ActiveFilter;
use App\Orchid\Filters\TourResource\DescriptionFilter;
use App\Orchid\Filters\TourResource\PublicationPeriodFilter;
use App\Orchid\Filters\TourResource\TitleFilter;
use App\Orchid\Filters\TourResource\TypeFilter;
use App\View\Components\Admin\TourResource\TourImageComponent;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ToursResource extends Resource
{
    /**
     * @var string
     */
    public static $model = Tour::class;

    public static function sort(): string
    {
        return '2';
    }

    public static function icon(): string
    {
        return 'airplane';
    }

    public static function label(): string
    {
        return 'Туры';
    }

    public static function singularLabel(): string
    {
        return 'Тур';
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
                ->render(function ($tour) {
                    return $tour->active ? 'Активен' : 'Неактивен';
                })
            ,
            TD::make('is_abroad', 'Тип')
                ->sort()
                ->alignCenter()
                ->render(function ($tour) {
                    return $tour->is_abroad ? 'Заграничный' : 'По России';
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
                    1 => 'Активен',
                    0 => 'Неактивен',
                ])
                ->value(0)
            ,
            Select::make('is_abroad')
                ->title('Тип')
                ->options([
                    1 => 'Заграничный',
                    0 => 'По России',
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
            Picture::make('image')
                ->storage('tours')
                ->path('./')
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
            TypeFilter::class,
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
                    return $news->active ? 'Активен' : 'Неактивен';
                })
            ,
            Sight::make('description', 'Описание')
            ,
            Sight::make('is_abroad', 'Тип')
                ->render(function ($tour) {
                    return $tour->is_abroad ? 'Заграничный' : 'По России';
                })
            ,
            Sight::make('date', 'Отображаемая дата публикации')
            ,
            Sight::make('created_at', 'Дата создания')
                ->usingComponent(DateTimeSplit::class)
            ,
            Sight::make('updated_at', 'Дата обновления')
                ->usingComponent(DateTimeSplit::class)
            ,
            Sight::make('image', 'Изображение')
                ->usingComponent(TourImageComponent::class)
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

            'image.required' => 'Необходимо загрузить изображение',

            'title.max' => 'Название не может быть больше :max символов',
            'title.required' => 'Название обязательно для заполнения',
        ];
    }

    public function onSave(ResourceRequest $request, Model $model)
    {
        // $newsId = $request->get('news_id');
        // if ($model?->id) {
        //     $newsImage = NewsImage::where('news_id', $newsId)->where('image', $model->image)->first();
        // } else {
        //     $newsImage = new NewsImage();
        //     $newsImage->news_id = $newsId;
        // }
        $model->title = $request->get('title');
        $model->description = $request->get('description');
        $model->image = last(explode('/', $request->get('image')));
        $model->is_abroad = $request->get('is_abroad');
        $model->active = $request->get('active');
        $model->date = $request->get('date');
        $model->save();
        // $newsImage->sort = $request->get('sort');
        // $newsImage->save();
    }

    /**
     * @return string[]
     */
    public function rules(Model $model): array
    {
        return [
            'date' => 'required|date',
            'description' => 'required|string',
            'image' => 'required|string',
            'title' => 'required|string|max:255',
        ];
    }
}
