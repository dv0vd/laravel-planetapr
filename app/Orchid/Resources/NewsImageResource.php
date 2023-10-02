<?php

declare(strict_types=1);

namespace App\Orchid\Resources;

use App\Models\News;
use App\Models\NewsImage;
use App\Orchid\Filters\NewsImageResource\NewsFilter;
use App\View\Components\Admin\NewsImageResource\NewsImageComponent;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class NewsImageResource extends Resource
{
    /**
     * @var string
     */
    public static $model = NewsImage::class;

    public static function icon(): string
    {
        return 'image';
    }

    public static function label(): string
    {
        return 'Изображения новостей';
    }

    public static function singularLabel(): string
    {
        return 'Изображение новости';
    }

    public static function sort(): string
    {
        return '2';
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('news.title', 'Новость')
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
            Relation::make('news_id')
                ->fromModel(News::class, 'title')
                ->title('Новость')
            ,
            Input::make('sort')
                ->title('Сортировка')
                ->type('number')
                ->value(0)
            ,
            Picture::make('image')
                ->storage('news')
                ->path('./')
            ,
        ];
    }

    /**
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('news', 'Новость')
                ->render(function ($news) {
                    $news = News::find($news->news_id);
                    return $news->title;
                })
            ,

            Sight::make('sort', 'Сортировка')
            ,
            Sight::make('image', 'Изображение')
                ->usingComponent(NewsImageComponent::class)
            ,
            Sight::make('created_at', 'Дата создания')
                ->usingComponent(DateTimeSplit::class)
            ,
            Sight::make('updated_at', 'Дата обновления')
                ->usingComponent(DateTimeSplit::class)
            ,
        ];
    }

    /**
     * @return class-string[]
     */
    public function filters(): array
    {
        return [
            NewsFilter::class,
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'news_id.required' => 'Необходимо выбрать новость для изображения',

            'image.required' => 'Необходимо загрузить изображение',
        ];
    }

    public function onSave(ResourceRequest $request, Model $model)
    {
        $newsId = $request->get('news_id');
        if ($model?->id) {
            $newsImage = NewsImage::where('news_id', $newsId)->where('image', $model->image)->first();
        } else {
            $newsImage = new NewsImage();
            $newsImage->news_id = $newsId;
        }
        $newsImage->image = last(explode('/', $request->get('image')));
        $newsImage->sort = $request->get('sort');
        $newsImage->save();
    }

    /**
     * @return string[]
     */
    public function rules(Model $model): array
    {
        return [
            'image' => 'required|string',
            'news_id' => 'required|integer|min:0|exists:news,id',
            'sort' => 'integer',
        ];
    }

    /**
     * @return string[]
     */
    public function with(): array
    {
        return [
            'news',
        ];
    }
}
