<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Вывод списка объектов карты</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--
        Укажите свой API-ключ. Тестовый ключ НЕ БУДЕТ работать на других сайтах.
        Получить ключ можно в Кабинете разработчика: https://developer.tech.yandex.ru/keys/
    -->
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a2435f91-837f-4a88-87c0-7ac7813eb317&lang=ru_RU" type="text/javascript"></script>

    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>

    <script src="{{ asset('js/object_list.js') }}"></script>

    <script src="{{ asset('js/groups.js') }}"></script>

    <style type="text/css">
        html, body{
            width: 100%; padding: 0; margin: 0;
            font-family: Arial;
        }

        #map {
            width: 95%;
            height: 250px;
        }
        /* Оформление меню (начало)*/
        .menu {
            list-style: none;
            padding: 5px;

            margin: 0;
        }
        .submenu {
            list-style: none;

            margin: 0 0 0 20px;
            padding: 0;
        }
        .submenu li {
            font-size: 90%;
        }
        /* Оформление меню (конец)*/
    </style>
</head>

<body>
<div id="map"></div>
</body>

</html>
