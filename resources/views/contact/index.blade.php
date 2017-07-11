@extends('layouts.app')

@section('content')
    <article class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ __('blocks.contact') }}</h1>
                </div>

                <div class="panel-body">

                    <ul class="list-unstyled" itemscope itemtype="http://schema.org/Organization">
                        <li class="space">
                            <address>
                                <span itemprop="name">{{ bxCfg('app.name') }}</span>,
                                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                    <span itemprop="streetAddress">{{ bxCfg('bx.street') }}</span>,
                                    <span itemprop="addressLocality">
                                                {{ bxCfg('bx.city') }},
                                        {{ bxCfg('bx.region') }}</span>,
                                    <span itemprop="postalCode">{{ bxCfg('bx.index') }}</span>
                                </div>
                            </address>
                        </li>
                        <li>
                            Телефон: <span itemprop="telephone">
                                <a href="tel:{{ phone(bxCfg('bx.phone')) }}"
                                   title="Телефон">{{ bxCfg('bx.phone') }}
                                </a>
                            </span><br/>
                            Электронная почта: <span itemprop="email">
                                <a href="mailto:{{ bxCfg('bx.email') }}"
                                   title="Электронная почта">{{ bxCfg('bx.email') }}
                                </a>
                            </span>
                        </li>
                    </ul>

                    <div id="map" class="no-visually"></div>
                </div>
            </div>
        </div>
    </article>

    <script>
        function initMap(ymaps) {

            var map = new ymaps.Map('map', {
                center: [44.768123, 39.860306], //[55.753994, 37.622093],
                zoom: 9
            });

            ymaps.geocode(
                '{{ bxCfg('bx.street') }}, ' +
                '{{ bxCfg('bx.city') }}, ' +
                '{{ bxCfg('bx.region') }}, ' +
                '{{ bxCfg('bx.index') }}', {

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
                    balloonContent: '{{ bxCfg('app.name') }}'
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
