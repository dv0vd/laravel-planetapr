<div class='col mb-3'>
    <div class="card h-100">
    <img loading="lazy" alt="{{ $title }}" src="{{ \Storage::disk('tours')->url($image) }}">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        {!! $description !!}
    </div>
    </div>
</div>