<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset='utf-8'>
    <meta name="keywords" content="туристическое агентство, авиабилеты, туры, жд билеты, автобусные билеты, авиакасса, жд касса, бронирование жилья, бронирование отелей, пассажирские перевозки, планета путешествий развлечений, турагентство">
    <meta name="yandex-verification" content="82c12996534abb30">
    <meta name="google-site-verification" content="K5GbYdWVM0wxWxhwXzcRwnFjJSDfrYjqe-8bocWJP4A">
    <meta name="msvalidate.01" content="D189239F6433AA8859184F28E0DA229F">
    <meta name='wmail-verification' content="8972a97c5163a9bd598728fa7b43d1fa">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $title }}</title>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(72995719, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/72995719" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>

<body class='bg-dark'>
    <header class="container-fluid text-center bg-primary mb-3">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/">
                <img alt="Логотип" src="{{ asset('img/logo.webp') }}" width=50 height=50>
                <span class='text-uppercase font-weight-bold text-light' id='brand'>Планета путешествий и развлечений</span>
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/#aboutus" id='aboutLink'>О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/news">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/tours">Туры</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/transport">Пассажирские перевозки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/contacts">Контакты</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    {{ $slot }}

    <footer class="container-fluid text-center mt-3 text-light bg-primary">
        <div class="row align-items-center">
            <div class="col-lg">
                <p>ООО "Планета путешествий и развлечений"</p>
                <p><a class="text-light" href="/contacts">Контакты</a></p>
            </div>
            <div class="col-lg">
                <p>ИНН</p>
                <p>3123084912</p>
            </div>
            <div class="col-lg">
                <p>ОГРН</p>
                <p>1023101647360</p>
            </div>
            <div class="col-lg">
                <p>Номер в Общероссийском генеральном реестре туристических агентств</p>
                <p>BH100443</p>
            </div>
        </div>
    </footer>
    
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>