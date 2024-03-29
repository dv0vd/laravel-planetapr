<x-layout>

    <x-slot:title>
        {{ $title }}
    </x-slot>
    <x-slot:description>
        {{ $description }}
    </x-slot>

    <h1 id='transportHead' class='text-uppercase text-light font-weight-bold text-center'>{{ $h1 }}</h1>
    <div class="container mt-3 text-light">
        <div class="row text-justify">
            <div class="col-lg">
            <p>
                🚌Планируете путешествие для большой группы людей? Арендуйте автобус или микроавтобус в нашем турагентстве «Планета путешествий и развлечений»
            </p>
            <p>
                Если вы организуете поездку для:
            </p>
            <ul>
                <li>спортивной команды</li>
                <li>паломников</li>
                <li>экскурсионной группы</li>
                <li>сотрудников предприятия</li>
            </ul>
            <p>🚘 мы подберём для вас подходящий транспорт. За рулём – опытные водители, так что поездка будет комфортной для всех пассажиров.</p>
            <p>
                Вы можете арендовать:
            </p>
                <ul>
                <li>микроавтобус Mercedes-Benz Sprinter для 19 пассажиров</li>
                <li>большой автобус, в который поместятся до 60 человек</li>
                </ul>
            <p>
                Мы предлагаем выгодные условия и безопасное вождение.
            </p>
            <!-- <p>Наши контактные данные находятся на<u><a class="nav-link text-light d-inline" href="/contact">этой</a></u>странице.</p> -->

            </div>
            <div class="col-lg">
            <div id="transportCarausel" class="carousel slide" data-ride="carousel align-self-center">
                <ol class="carousel-indicators">
                    <li data-target="#transportCarauselOrderTransport" data-slide-to="0" class="active"></li>
                    <li data-target="#transportCarauselTransportCatalog" data-slide-to="1"></li>
                    <li data-target="#transportCarauselBus1" data-slide-to="2"></li>
                    <li data-target="#transportCarauselBus2" data-slide-to="3"></li>
                    <li data-target="#transportCarauselMinibus1" data-slide-to="4"></li>
                    <li data-target="#transportCarauselMinibus2" data-slide-to="5"></li>
                    <li data-target="#transportCarauselMinibus3" data-slide-to="6"></li>
                    <li data-target="#transportCarauselPilgrims" data-slide-to="7"></li>
                    <li data-target="#transportCarauselBusGeorgia" data-slide-to="8"></li>
                </ol>
                <div class="carousel-inner">
                    <div id='transportCarauselOrderTransport' class="carousel-item active"></div>
                    <div id='transportCarauselTransportCatalog' class="carousel-item"></div>
                    <div id='transportCarauselBus1' class="carousel-item"></div>
                    <div id='transportCarauselBus2' class="carousel-item"></div>
                    <div id='transportCarauselMinibus1' class="carousel-item"></div>
                    <div id='transportCarauselMinibus2' class="carousel-item"></div>
                    <div id='transportCarauselMinibus3' class="carousel-item"></div>
                    <div id='transportCarauselPilgrims' class="carousel-item"></div>
                    <div id='transportCarauselBusGeorgia' class="carousel-item"></div>
                </div>
                <a class="carousel-control-prev" href="#transportCarausel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#transportCarausel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            </div>
        </div>
    </div>

</x-layout>
