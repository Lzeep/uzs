<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--
        Укажите свой API-ключ. Тестовый ключ НЕ БУДЕТ работать на других сайтах.
        Получить ключ можно в Кабинете разработчика: https://developer.tech.yandex.ru/keys/
    -->
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a2435f91-837f-4a88-87c0-7ac7813eb317&lang=ru_RU" type="text/javascript"></script>
    <script src="{{asset('js/show_visible_objects.js')}}" type="text/javascript"></script>
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
</head>

<body>
<p>На карту добавляются только метки, попадающие в видимую область</p>
<div id="map"></div>
</body>

</html>


