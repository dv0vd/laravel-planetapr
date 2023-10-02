<div class="container-fluid rounded bg-secondary mb-3">
    <div class="row">
        <div class="col-lg-10 text-light">
            <h2 class="font-italic text-warning text-center mb-3">{{ $title }}</h2>
        </div>
        <div class="col-lg text-light">
            <p class="text-right">{{ $date }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg text-ligh text-justify">
            {!! $description !!}
        </div>
    </div>

    @foreach ($images as $image)
        <div class="row text-center">
            <div class="col-lg">
                <img loading="lazy" alt="{{ $title }}" src="{{ \Storage::disk('news')->url($image->image) }}" class="img-fluid mb-3">
            </div>
        </div>
    @endforeach

</div>
<div class="container-fluid mb-3 text-center">
    <div class="row">
        <div class="col-lg">
            <a class="upNewsLink text-white" href="#news">Наверх</a>
        </div>
    </div>
    @if (request()->is('news'))
        <div class="row">
            <div class="col-lg">
                <a class="text-white" href="{{ url(route('news')) }}">К началу новостей</a>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg">
            <a class=" text-white" href="/">На главную</a>
        </div>
    </div>
</div>
