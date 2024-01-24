<x-layout>

    <x-slot:title>
        {{ $title }}</x-slot>
    <x-slot:description>
        {{ $description }}
    </x-slot>

    <div class="container">
    <div class="row">
        <div class="col-lg">
            <h1 class='text-uppercase text-light font-weight-bold text-center'>{{ $h1 }}</h1>
        </div>
    </div>
        <div class="row">

            <div class="col text-white text-justify">
                <p><a class='text-white' href='/'>"Планета путешествий и развлечений"</a> предлагает Вашему вниманию огромное количество туров по популярным и разнообразным направлениям.</p>
                <p>Для получения более подробной информации <a class='text-white font-italic' href='/contacts'>обращайтесь</a> в наше туристическое агентство или <a class='text-white font-italic' href='/contacts#supporForm'>воспользуйтесь формой обратной связи!</a></p>
                <ul class="nav nav-pills mb-3" id="tours-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-tours-russia-tab" data-toggle="pill" href="#pills-tours-russia" role="tab" aria-controls="pills-tours-russia" aria-selected="true">Туры по России</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-tours-abroad-tab" data-toggle="pill" href="#pills-tours-abroad" role="tab" aria-controls="pills-tours-abroad" aria-selected="false">Заграничные туры</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent-tours">

                    <div class="tab-pane fade show active" id="pills-tours-russia" role="tabpanel" aria-labelledby="pills-tours-russia-tab">
                        <div class='container text-body'>
                            <div class='row row-cols-lg-3 row-cols-md-2 row-cols-sm-1'>
                                @foreach ($russianTours as $tour)
                                    <x-tours-item :title="$tour->title" :description="$tour->description" :image="$tour->image"/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-tours-abroad" role="tabpanel" aria-labelledby="pills-tours-abroad-tab">
                        <div class='container text-body'>
                            <div class='row row-cols-lg-3 row-cols-md-2 row-cols-sm-1'>
                                @foreach ($abroadTours as $tour)
                                    <x-tours-item :title="$tour->title" :description="$tour->description" :image="$tour->image"/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
