@if (count($news->images) > 0)
    @foreach ($news->images as $image)
        <img src="{{ \Storage::disk('news')->url($image->image) }}" class="rounded mw-100" style="height: 300px;width: 300px;object-fit: cover;">
    @endforeach
@else
    <p>Изображений не найдено</p>
@endif
