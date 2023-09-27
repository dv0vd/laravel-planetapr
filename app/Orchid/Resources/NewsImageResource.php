<?php

declare(strict_types=1);

namespace App\Orchid\Resources;

use App\Models\News;
use App\Models\NewsImage;
use App\Orchid\Filters\DateFilter;
use App\Orchid\Filters\DescriptionFilter;
use App\Orchid\Filters\PublicationDateFilter;
use App\Orchid\Filters\PublicationPeriodFilter;
use App\Orchid\Filters\TitleFilter;
use App\View\Components\Admin\AttachmentsComponent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Orchid\Attachment\Models\Attachment;
use Orchid\Attachment\Models\Attachmentable;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Upload;
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
        return 'newspaper';
    }

    public static function label(): string
    {
        return 'Изображения новостей';
    }

    public static function singularLabel(): string
    {
        return 'Изображение новости';
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('news.title', 'Новость')
                ->sort()
                // ->filterValue(function ($value) {
                //     return 'heello';
                //     // $user = User::find($value);
                //     // return $user->name;
                // })
            ,
            TD::make('image', 'Название файла')
                    ->sort()
            ,
            // TD::make('title', 'Название')
            //     ->sort()
            //     ->alignCenter()
            // ,
            // TD::make('date', 'Отображаемая дата публикации')
            //     ->sort()
            //     ->alignCenter()
            // ,
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
                // ->searchColumns('title')
            ,
            Input::make('sort')
                ->title('Сортировка')
                ->type('number')
            ,
            Picture::make('image')
                ->storage('news')
            ,
            // Input::make('title')
            //     ->title('Название')
            // ,
            // Quill::make('description')
            //     ->title('Описание')
            //     ->toolbar(['text', 'color', 'quote', 'header', 'list', 'format'])
            // ,
            // DateTimer::make('date')
            //     ->title('Отображаемая дата публикации')
            //     ->format('Y-m-d')
            //     ->allowInput()
            //     ->placeholder('Выберите дату')
            // ,
            // Relation::make('test')
            //     ->title('Фото')
            //     ->fromModel(News::class, 'images')
            // ,
            // Upload::make('attachments')
            //     ->title('Изображения')
            //     ->acceptedFiles('image/*')
            //     ->path('./')
            //     ->storage('news')
            //     // ->media()
            // ,
            // Cropper::make('Изображения')
            // ,
            // Relation::make('images')
            //     ->fromModel(NewsImage::class, 'news_id')
            //     ->multiple()
            //     // ->displayAppend('full')
            //     ->searchColumns('image')
            //     ->title('Изображения')
            // ,
        ];
    }

    /**
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            // Sight::make('title', 'Название')
            // ,
            // Sight::make('description', 'Описание')
            // ,
            // Sight::make('date', 'Отображаемая дата публикации')
            // ,
            Sight::make('news', 'Новость')
                ->render(function () {
                    return 'ssdfsf'; // sdfsdf
            }),
            Sight::make('image', 'Название файла')
            ,
            Sight::make('created_at', 'Дата создания')
                ->usingComponent(DateTimeSplit::class)
            ,
            Sight::make('updated_at', 'Дата обновления')
                ->usingComponent(DateTimeSplit::class)
            ,
            // Sight::make('atachments', 'Изображения')
            //     ->component(AttachmentsComponent::class)
            // ,
            // Sight::make('images', 'Изображения')
            //     ->component(AttachmentsComponent::class)
            // ,
        ];
    }

    /**
     * @return class-string[]
     */
    public function filters(): array
    {
        return [
            // TitleFilter::class,
            // DescriptionFilter::class,
            // PublicationPeriodFilter::class,
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            // 'title.required' => 'Название обязательно для заполнения',
            // 'title.max' => 'Название не может быть больше :max символов',

            // 'description.required' => 'Описание обязательно для заполнения',

            // 'date.required' => 'Дата обязательна для заполнения',
        ];
    }

    // public function onDelete(ResourceRequest $request, Model $model)
    // {

    // }


    // public function onSave(ResourceRequest $request, Model $model)
    // {
    //     // DB::transaction(function () use ($model, $request) {
    //         $model->forceFill($request->except('attachments'))->save();
    //         $news = News::where($request->except('attachments'))->first();

    //         $attachments = [];
    //         if (!empty($request->get('attachments'))) {
    //             foreach ($request->get('attachments') as $attachmentId) {
    //                 $attachments[] = Attachment::find($attachmentId);
    //             }
    //         }
    //         $images = [];
    //         $attachmentable = [];
    //     $i = 0;
    //         foreach ($attachments as $attachment) {
    //         \Log::infO($i);
    //             // foreach ($attachments as $attachment) {
    //             $images[] = [
    //                 'news_id' => $news->id,
    //                 'image' => "$attachment->name.$attachment->extension",
    //                 'sort' => $i,
    //             ];

    //             $attachmentable[] = [
    //                 'attachmentable_type' => NewsImage::class,
    //                 'attachmentable_id' => $news->id,
    //                 // 'attachment_id' => 
    //             ];
    //         $i++;
    //         }

    //         NewsImage::upsert(
    //             $images,
    //             ['news_id', 'image'],
    //             ['image', 'sort']
    //         );

    //         $newsImages = NewsImage::where('news_id', $news->id)->get();
    //         $attachments = [];
    //         foreach ($newsImages as $newsImage) {
    //             $temp = explode('.', $newsImage->image);
    //             $name = $temp[0];
    //             $extension = $temp[1];

    //             $attachmentsIds[] = Attachment::select(['id'])->where('name', $name)->where('extension', $extension)->first();
    //         }
    //     // \Log::info(`---------`, ['newsImages' => $newsImages, 'attch_ids' => $attachmentsIds]);
    //         // dd($newsImages, $attachmentsIds);
    //         for ($i = 0; $i < count($attachmentsIds); $i++) {
    //             $attachmentable[$i]['attachment_id'] = $attachmentsIds[$i]['id'];
    //         }
    //         // dd($attachmentable);
    //         Attachmentable::upsert(
    //             $attachmentable,
    //             ['attachmentable_type', 'attachmentable_id'],
    //             ['attachment_id']
    //         );
    //         // // foreach ($attachmentable as $item) {
    //         // //     $item['attachment_id'] = $news
    //         // // }
    //         // $attachments = Attachment





    //     // }, 3);

    // }

    /**
     * @return string[]
     */
    public function rules(Model $model): array
    {
        return [
            // 'title' => 'required|string|max:255',
            // 'description' => 'required|string',
            // 'date' => 'required|date',
            // 'images' => 'sometimes',
        ];
    }

    // public function modelQuery(ResourceRequest $request, Model $model): Builder
    // {
    //     // dd($model->query()->with('images'));
    //     // return $model->load('attachments');
    //     // dd($model->query()->toSql());
    //     // $model['attachments'] = Attachment::all();
    //     // return $model->query();

    // }

    public function with(): array
    {
        return [
            'news',
        ];
    }

    // public function onSave(ResourceRequest $request, Model $model)
    // {
    //     // DB::transaction(function () use ($model, $request) {
    //         $model->forceFill($request->except('attachments'))->save();
    //         $news = News::where($request->except('attachments'))->first();

    //         $attachments = [];
    //         if (!empty($request->get('attachments'))) {
    //             foreach ($request->get('attachments') as $attachmentId) {
    //                 $attachments[] = Attachment::find($attachmentId);
    //             }
    //         }
    //         $images = [];
    //         $attachmentable = [];
    //     $i = 0;
    //         foreach ($attachments as $attachment) {
    //         \Log::infO($i);
    //             // foreach ($attachments as $attachment) {
    //             $images[] = [
    //                 'news_id' => $news->id,
    //                 'image' => "$attachment->name.$attachment->extension",
    //                 'sort' => $i,
    //             ];

    //             $attachmentable[] = [
    //                 'attachmentable_type' => NewsImage::class,
    //                 'attachmentable_id' => $news->id,
    //                 // 'attachment_id' => 
    //             ];
    //         $i++;
    //         }

    //         NewsImage::upsert(
    //             $images,
    //             ['news_id', 'image'],
    //             ['image', 'sort']
    //         );

    //         $newsImages = NewsImage::where('news_id', $news->id)->get();
    //         $attachments = [];
    //         foreach ($newsImages as $newsImage) {
    //             $temp = explode('.', $newsImage->image);
    //             $name = $temp[0];
    //             $extension = $temp[1];

    //             $attachmentsIds[] = Attachment::select(['id'])->where('name', $name)->where('extension', $extension)->first();
    //         }
    //     // \Log::info(`---------`, ['newsImages' => $newsImages, 'attch_ids' => $attachmentsIds]);
    //         // dd($newsImages, $attachmentsIds);
    //         for ($i = 0; $i < count($attachmentsIds); $i++) {
    //             $attachmentable[$i]['attachment_id'] = $attachmentsIds[$i]['id'];
    //         }
    //         // dd($attachmentable);
    //         Attachmentable::upsert(
    //             $attachmentable,
    //             ['attachmentable_type', 'attachmentable_id'],
    //             ['attachment_id']
    //         );
    //         // // foreach ($attachmentable as $item) {
    //         // //     $item['attachment_id'] = $news
    //         // // }
    //         // $attachments = Attachment





    //     // }, 3);

    // }
}