<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a2435f91-837f-4a88-87c0-7ac7813eb317&lang=ru_RU" type="text/javascript"></script>
    {{--<script src="{{asset('js/show_visible_objects.js')}}" type="text/javascript"></script>--}}

    <style>
        body, html {
            font-family: Arial;
            font-size: 11pt;
            padding: 0;
            margin: 0;
            width: 100%;
            height: 95%;
        }
        p {
            padding: 10px;
        }
        #map {
            width: 100%;
            height: 85%;
        }
    </style>
    <body>
<div id="map"></div>
<script type="text/javascript">
    // Функция ymaps.ready() будет вызвана, когда
    // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
    ymaps.ready(init);
    function init(){
        // Создание карты.
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [42.865388923088396, 74.60104350048829],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 13,
            controls: ['zoomControl']
        });
        var events = ['mouseenter', 'mouseleave'];
            @foreach($subjects as $subject)
        var doctorPlacemark{{ $subject->id }} = new ymaps.Placemark([{{ $subject->latitude ?? 42.865388923088396 }}, {{ $subject->longtitude ?? 74.60104350048829 }}], {
                balloonContent: '<p class="font-weight-bold mb-1">{{ $subject->name }}</p>',
                hintContent: '<p class="font-weight-bold mb-1">{{ $subject->name }}</p>' +
                '<p class="mb-0">Адрес: {{ $subject->address }}</p>',

            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6'
            });
        doctorPlacemark{{ $subject->id }}.events
            .add('mouseenter', function (e) {
                // Ссылку на объект, вызвавший событие,
                // можно получить из поля 'target'.
                e.get('target').options.set('iconColor', '#ff0000');
            })
            .add('mouseleave', function (e) {
                e.get('target').options.unset('iconColor', '#0095b6');
            })
            .add('balloonclose', function (e) {
                e.get('target').options.set('iconColor', '#0095b6');
            });
        myMap.geoObjects.add(doctorPlacemark{{ $subject->id }});
            @endforeach
            @foreach($subjects as $subject)
        var targetElement{{ $subject->id }} = document.getElementById('doctor-card-{{ $subject->id }}'),
            divListeners{{ $subject->id }} = ymaps.domEvent.manager.group(targetElement{{ $subject->id }})
                .add(events, function (event) {
                    if ("mouseenter" === event.get('type')) {
                        doctorPlacemark{{ $subject->id }}.options.set('iconColor', '#ff0000');
                        doctorPlacemark{{ $subject->id }}.balloon.open();
                    } else if ("mouseleave" === event.get('type')) {
                        doctorPlacemark{{ $subject->id }}.options.set('iconColor', '#0095b6');
                        doctorPlacemark{{ $subject->id }}.balloon.close();
                    }
                });
        @endforeach
        myMap.setBounds(myMap.geoObjects.getBounds());
    }
</script>
</body>


</head>
</html>





