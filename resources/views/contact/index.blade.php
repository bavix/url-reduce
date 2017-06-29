@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Контакты</h1>
                </div>

                <div class="panel-body">

                    <ul class="list-unstyled" itemscope itemtype="http://schema.org/Organization">
                        <li class="space">
                            <address>
                                <span itemprop="name">{{ $cfg('name', config('app.name', 'bavix')) }}</span>,
                                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                    <span itemprop="streetAddress">{{ $cfg('street', 'ул. 8 Марта, д. 57') }}</span>,
                                    <span itemprop="addressLocality">
                                                {{ $cfg('city', 'г. БЕЛОРЕЧЕНСК') }},
                                        {{ $cfg('region', 'Краснодарский край') }}</span>,
                                    <span itemprop="postalCode">{{ $cfg('index', '352631') }}</span>
                                </div>
                            </address>
                        </li>
                        <li>
                            Телефон: <span itemprop="telephone">
                                <a href="tel:{{ phone($cfg('phone', '+7 (86155) 33803')) }}"
                                   title="Телефон">{{ $cfg('phone') }}
                                </a>
                            </span><br/>
                            Электронная почта: <span itemprop="email">
                                <a href="mailto:{{ $cfg('email', 'sut-belora@yandex.ru') }}"
                                   title="Электронная почта">{{ $cfg('email') }}
                                </a>
                            </span>
                        </li>
                    </ul>

                    <div id="map" class="no-visually"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initMap(ymaps) {

            var map = new ymaps.Map('map', {
                center: [55.753994, 37.622093],
                zoom: 9
            });

            ymaps.geocode(
                '{{ $cfg('street', 'ул. 8 Марта, д. 57') }}, ' +
                '{{ $cfg('city', 'г. БЕЛОРЕЧЕНСК') }}, ' +
                '{{ $cfg('region', 'Краснодарский край') }}, ' +
                '{{ $cfg('index', '352631') }}', {

                results: 1

            }).then(function (res) {

                // Выбираем первый результат геокодирования.
                var firstGeoObject = res.geoObjects.get(0);

                // Координаты геообъекта.
                var coords = firstGeoObject.geometry.getCoordinates();

                // Область видимости геообъекта.
                var bounds = firstGeoObject.properties.get('boundedBy');

                // Создает метку в центре Москвы
                var placemark = new ymaps.Placemark(coords,  {
                    balloonContent: '{{ $cfg('name', config('app.name', 'bavix')) }}'
                }, {
                    preset: 'islands#governmentCircleIcon',
                    iconColor: '#3d6277',
                    iconCaptionMaxWidth: '50'
                });

                // Добавляем первый найденный геообъект на карту.
                map.geoObjects.add(placemark);

                // Масштабируем карту на область видимости геообъекта.
                map.setBounds(bounds, {
                    checkZoomRange: true
                });

            });

        }
    </script>

    <script defer src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&mode=debug&onload=initMap"></script>

@endsection
