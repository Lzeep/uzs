ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
        center: [42.865388923088396, 74.60104350048829],
        zoom: 8
    }, {
        searchControlProvider: 'yandex#search'
    });

    // Создадим объекты на основе JSON-описания геометрий.
    var objects = ymaps.geoQuery([{
        type: 'Point',
        coordinates: [42.88100060018628, 74.62553472623308]
    }, {
        type: 'Point',
        coordinates: [42.886599039788166, 74.62595736328215]
    }, {
        type: 'Point',
        coordinates: [42.87962834192773, 74.5838106009342]
    }]);

    // Найдем объекты, попадающие в видимую область карты.
    objects.searchInside(myMap)
    // И затем добавим найденные объекты на карту.
        .addToMap(myMap);

    myMap.events.add('boundschange', function () {
        // После каждого сдвига карты будем смотреть, какие объекты попадают в видимую область.
        var visibleObjects = objects.searchInside(myMap).addToMap(myMap);
        // Оставшиеся объекты будем удалять с карты.
        objects.remove(visibleObjects).removeFromMap(myMap);
    });


    counter = 0,

        // Создание макета содержимого балуна.
        // Макет создается с помощью фабрики макетов с помощью текстового шаблона.
        BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="margin: 10px;">' +
            '<b>{{properties.name}}</b><br />' +
            '<i id="count"></i> ' +
            '<button id="counter-button"> +1 </button>' +
            '</div>', {

                // Переопределяем функцию build, чтобы при создании макета начинать
                // слушать событие click на кнопке-счетчике.
                build: function () {
                    // Сначала вызываем метод build родительского класса.
                    BalloonContentLayout.superclass.build.call(this);
                    // А затем выполняем дополнительные действия.
                    $('#counter-button').bind('click', this.onCounterClick);
                    $('#count').html(counter);
                },

                // Аналогично переопределяем функцию clear, чтобы снять
                // прослушивание клика при удалении макета с карты.



            });

    var placemark = new ymaps.Placemark([42.88100060018628, 74.62553472623308], {
        name: 'Считаем'
    }, {
        balloonContentLayout: BalloonContentLayout,
        // Запретим замену обычного балуна на балун-панель.
        // Если не указывать эту опцию, на картах маленького размера откроется балун-панель.
        balloonPanelMaxMapArea: 0
    });

    map.geoObjects.add(placemark);

}
