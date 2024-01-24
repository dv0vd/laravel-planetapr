<x-layout>

    <x-slot:title>
        {{ $title }}
    </x-slot>
    <x-slot:description>
        {{ $description }}
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg">
                <h1 class='text-uppercase text-light font-weight-bold text-center'>{{ $h1 }}</h1>
            </div>
            <div class="container mt-3 text-light">
                <div class="row text-center d-flex align-items-center">
                    <div class="col-lg">
                        <a href="tel:+79205739381"><img loading="lazy" src="/img/contacts/phone.webp" alt="Телефон турагентства"
                            class="contactLogo mb-2 socials"></a>
                        <p class='contactText'><a class='text-white' href="tel:+79205739381">+7 (920) 573-93-81</a></p>
                        <a href="tel:+79205614686"><img loading="lazy" src="/img/contacts/phone.webp" alt="Телефон турагентства"
                            class="contactLogo mb-2 socials"></a>
                        <a href="https://t.me/planet_journeys"><img loading="lazy" src="/img/contacts/telegram.png" alt="Telegram турагентства"
                            class="contactLogo mb-2 socials"></a>
                        <a href="https://wa.me/79205614686"><img loading="lazy" src="/img/contacts/whatsapp.png" alt="WhatsApp турагентства"
                            class="contactLogo mb-2 socials"></a>
                        <a href="https://viber.click/79205614686"><img loading="lazy" src="/img/contacts/viber.png" alt="Viber турагентства"
                            class="contactLogo mb-2 socials"></a>
                        <p class='contactText'><a class='text-white' href="tel:+79205614686">+7 (920) 561-46-86</a></p>
                        <a href="mailto:planetapr@mail.ru"><img loading="lazy" src="/img/contacts/email.webp" alt="Электронная почта турагентства"
                            class="contactLogo mb-2 socials"></a>
                        <p class='contactText'><a class='text-white'
                                href="mailto:planetapr@mail.ru">planetapr@mail.ru</a></p>
                        <a rel='nofollow' target='_blank' href='https://vk.com/planeta_travel_bgd' class='socials'><img
                                loading="lazy" src="/img/contacts/vk.webp" alt="ВК турагентства" class="contactLogo mb-2 socials"></a>
                        <a rel='nofollow' target='_blank' href='https://www.instagram.com/planeta.travel.bgd/'
                            class='socials'><img loading="lazy" src="/img/contacts/instagram.webp" alt="Instagram турагентства"
                                class="contactLogo mb-2 socials"></a>
                        <a rel='nofollow' target='_blank' href='https://ok.ru/profile/605327965712'
                            class='socials'><img loading="lazy" src="/img/contacts/ok.png" alt="Одноклассники турагентства"
                                class="contactLogo mb-2 socials"></a>
                    </div>
                    <div class="col-lg">
                        <p class='contactText'>г. Белгород ул. Гостёнская 14 офис 7</p>
                        <p class='contactText'>Авиа- и ж/д кассы: Пн-Пт 10.00 - 18.00</p>
                        <p class='contactText'>Турагентство: Пн-Пт 10.00 - 18.00</p>
                        <p class='contactText'>Перерыв: 13.30 - 14.00</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <iframe class='w-100' id='mapHeight'
                            src="https://www.openstreetmap.org/export/embed.html?bbox=36.570535898208625%2C50.59517033069944%2C36.57819628715516%2C50.599855802965294&amp;layer=mapnik&amp;marker=50.59751312513607%2C36.574366092681885"
                            style="border: 1px solid black"></iframe><br /><small><a rel='nofollow'
                                href="https://www.openstreetmap.org/?mlat=50.59751&amp;mlon=36.57437#map=17/50.59751/36.57437"
                                class='text-dark'>Посмотреть подробнее</a></small>
                    </div>
                    <div class="col-lg text-center mb-3">
                        <video autoplay muted loop id='travelAgencyEntrance'>
                            <source src="/vid/contacts/travel-agency-entrance.mp4">
                        </video>
                    </div>
                    <div class="col-lg">
                        <div id="contactCarausel" class="carousel slide" data-ride="carousel align-self-center">
                            <ol class="carousel-indicators">
                                <li data-target="#contactCarauselTravelAgencyEntrance" data-slide-to="0" class="active">
                                </li>
                                <li data-target="#contactCarauselTravelAgencyReception" data-slide-to="1"></li>
                                <li data-target="#contactCarauselTravelAgencyWorkSchedule" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div id='contactCarauselTravelAgencyEntrance'
                                    class="photoContactCarausel carousel-item active"></div>
                                <div id='contactCarauselTravelAgencyReception'
                                    class="photoContactCarausel carousel-item"></div>
                                <div id='contactCarauselTravelAgencyWorkSchedule'
                                    class="photoContactCarausel carousel-item"></div>
                            </div>
                            <a class="carousel-control-prev" href="#contactCarausel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#contactCarausel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row" id='supporForm'>
                    <div class="col-lg">
                        <h2 class='text-uppercase font-weight-bold mt-3 text-center'>Напишите нам</h2>
                        <h3 class='text-uppercase font-weight-bold font-italic mt-3 text-center'>Ответим в ближайшее
                            время</h3>
                        @if($errors->all())
                            @foreach ($errors->all() as $error)
                                <div class="contactFormMessage alert alert-danger text-center" role="alert">
                                    {{ $error }}</div>
                            @endforeach
                        @elseif(session()->has('message'))
                        <div class="contactFormMessage alert alert-success text-center" role="alert">
                            {{ session()->get('message') }}</div>
                        @endif

                        <form id='contactForm' action="{{ route('contacts.ask') }}" method="POST">
                            @csrf
                            <div class="form-group ">
                                <p>
                                    <label for="contactFormEmail" class='form-label'>Email</label>
                                </p>
                                <p>
                                    <input required type="email" id="contactFormEmail" name="email"
                                        class="form-control text-light bg-secondary" value="{{ old('email') }}">
                                </p>
                                <p>
                                    <label for="contactFormName" class='form-label'>Имя</label>
                                </p>
                                <p>
                                    <input requiredtype="text" id="contactFormName" name="name"
                                        class="form-control text-light bg-secondary" value="{{ old('name') }}">
                                </p>
                                <p>
                                    <label required for="contactFormQuestion" class='form-label'>Вопрос</label>
                                </p>
                                <p>
                                    <textarea id="contactFormQuestion" name="question" class="form-control text-light bg-secondary" rows="5">{{ old('question') }}</textarea>
                                </p>
                                <p class='text-center'>
                                    <input type='submit' value='Отправить' class='btn btn-primary' />
                                </p>
                                <div class="row text-center">
                                    <div class="col-lg">
                                        <div id='formStatus' class=' invisible spinner-border text-primary mt-2 mb-2'
                                            role='status'></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <h2 class='text-uppercase font-weight-bold mt-3 text-center'>Будем рады Вашим отзывам!</h2>
                <div class='row'>
                    <div class='col-lg text-center'>
                        <h2><a rel="nofollow" class='text-warning' target='_blank'
                                href='https://yandex.ru/maps/-/CCUau2C1KD'>Яндекс Карты</a></h2>
                        <a rel="nofollow" class='text-light' target='_blank'
                            href='https://yandex.ru/maps/-/CCUau2C1KD'>
                            <img loading="lazy" class='img-fluid' src='/img/contacts/qr-yandex.webp'
                                alt='QR-код Yandex Карты'>
                        </a>
                    </div>
                    <div class='col-lg text-center'>
                        <h2><a rel="nofollow" class='text-warning' target='_blank'
                                href='https://goo.gl/maps/QsXebLETe2wfc9rM7'>Google Карты</a></h2>
                        <a rel="nofollow" class='text-light' target='_blank'
                            href='https://goo.gl/maps/QsXebLETe2wfc9rM7'>
                            <img loading="lazy" class='img-fluid' src='/img/contacts/qr-google.webp'
                                alt='QR-код Google Maps'>
                        </a>
                    </div>
                    <div class='col-lg text-center'>
                        <h2><a rel="nofollow" class='text-warning' target='_blank'
                                href='https://go.2gis.com/69t92'>2GIS</a></h2>
                        <a rel="nofollow" class='text-light' target='_blank' href='https://go.2gis.com/69t92'>
                            <img loading="lazy" class='img-fluid' src='/img/contacts/qr-2gis.webp'
                                alt='QR-код 2ГИС'>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
