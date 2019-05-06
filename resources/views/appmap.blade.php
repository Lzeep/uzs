@extends('layouts.app')

@section('content')





<div class="form-row py-5">
    <div class="form-group col-3">
        <label for="latitude">Latitude</label>
        <input type="text" id="latitude" name="latitude" class="form-control">
    </div>
    <div class="form-group col-3">
        <label for="longtitude">Longtitude</label>
        <input type="text" id="longtitude" name="longtitude" class="form-control">
    </div>
    <div class="form-group col">
        <div id="map" style="width: 100%; height: 400px;"></div>
    </div>
</div>








    </div>
    <input type="hidden" name="attent_rating" value="0">
    <input type="hidden" name="manner_rating" value="0">
    <input type="hidden" name="time_rating" value="0">
    <input type="hidden" name="rating" value="0">
</div>
@stop

@push('scripts')
    <script>
        ymaps.ready(init);
        function init() {
            var myPlacemark,
                myMap = new ymaps.Map('map', {
                    center: [42.865388923088396, 74.60104350048829],
                    zoom: 12
                }, {
                    searchControlProvider: 'yandex#search'
                });
            // Слушаем клик на карте.
            myMap.events.add('click', function (e) {
                var coords = e.get('coords');
                $('#latitude').val(coords[0]);
                $('#longtitude').val(coords[1]);
                // Если метка уже создана – просто передвигаем ее.
                if (myPlacemark) {
                    myPlacemark.geometry.setCoordinates(coords);
                }
                // Если нет – создаем.
                else {
                    myPlacemark = createPlacemark(coords);
                    myMap.geoObjects.add(myPlacemark);
                    // Слушаем событие окончания перетаскивания на метке.
                    myPlacemark.events.add('dragend', function () {
                        getAddress(myPlacemark.geometry.getCoordinates());
                    });
                }
                getAddress(coords);
            });
            // Создание метки.
            function createPlacemark(coords) {
                return new ymaps.Placemark(coords, {
                    iconCaption: 'поиск...'
                }, {
                    preset: 'islands#violetDotIconWithCaption',
                    draggable: true
                });
            }
            // Определяем адрес по координатам (обратное геокодирование).
            function getAddress(coords) {
                myPlacemark.properties.set('iconCaption', 'поиск...');
                ymaps.geocode(coords).then(function (res) {
                    var firstGeoObject = res.geoObjects.get(0);
                    console.log(firstGeoObject.getAddressLine());
                    myPlacemark.properties
                        .set({
                            // Формируем строку с данными об объекте.
                            iconCaption: [
                                // Название населенного пункта или вышестоящее административно-территориальное образование.
                                firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                                // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                                firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                            ].filter(Boolean).join(', '),
                            // В качестве контента балуна задаем строку с адресом объекта.
                            balloonContent: firstGeoObject.getAddressLine()
                        });
                });
            }
        }
    </script>
@endpush
