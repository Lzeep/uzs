{{--<!DOCTYPE html>--}}
{{--<html xmlns="http://www.w3.org/1999/xhtml">--}}
{{--<head>--}}
    {{--<title>Быстрый старт. Размещение интерактивной карты на странице</title>--}}
    {{--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />--}}
    {{--<script src="https://api-maps.yandex.ru/2.1/?apikey=a2435f91-837f-4a88-87c0-7ac7813eb317&lang=ru_RU" type="text/javascript">--}}
    {{--</script>--}}
    {{--<script type="text/javascript">--}}
        {{--ymaps.ready(init);--}}
        {{--function init(){--}}
            {{--var myMap = new ymaps.Map("map", {--}}
                {{--center: [55.76, 37.64],--}}
                {{--zoom: 7--}}
            {{--});--}}
           {{--var myPolyline = new myPolyline([--}}
               {{--[55.86, 37.84],--}}
               {{--[55.70, 37.55],--}}
               {{--[55.8, 37.4]--}}
           {{--], {},--}}
            {{--{--}}
                {{--strokeWidth: 6,--}}
                {{--strokeColor: '#0000FF',--}}
                {{--draggable: true--}}
            {{--});--}}
            {{--myPolyline.editor.startEditing();--}}
        {{--}--}}
    {{--</script>--}}
{{--</head>--}}

{{--<body>--}}
{{--<div id="map" style="width: 600px; height: 400px"></div>--}}
{{--</body>--}}

{{--</html>--}}

        <!DOCTYPE html>
<html>
<head>
    <title>Редактор круга</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--
        Укажите свой API-ключ. Тестовый ключ НЕ БУДЕТ работать на других сайтах.
        Получить ключ можно в Кабинете разработчика: https://developer.tech.yandex.ru/keys/
    -->
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a2435f91-837f-4a88-87c0-7ac7813eb317&lang=ru_RU" type="text/javascript"></script>
    <script src="{{ asset("js/mapsBishkek.js") }}"></script>

    <style>
        html, body, #map {
            width: 100%; height: 100%; padding: 0; margin: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
</body>
</html>
