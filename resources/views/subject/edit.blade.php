@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="/subject/{{ $subject->id }}" method="post" class="col-10">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label>Выберите картинки</label>
                    <input type="file" name="logo" multiple>
                </div>
                <div class="'form-group">
                    <label>Район</label>
                    <select class="form-control" name="district_id" id="district">
                        @foreach($districts as $district)
                            <option value="{{$district->id}}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="'form-group">
                    <label>МТУ</label>
                    <select class="form-control" name="mtu_id" id="mtu">
                        @foreach($mtus as $mtu)
                            <option value="{{$mtu->id}}">{{ $mtu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="'form-group">
                    <label>Тип объекта</label>
                    <select class="form-control" name="type_id" id="type">
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Выберите картинки</label>
                    <input type="file" name="images[]" multiple>
                </div>
                <div class="form-group">
                    <label>Адрес</label>
                    <input type="text" class="form-control" name="address" value="{{ $subject->address }}">
                </div>
                <div class="form-group">
                    <label>Наименование объекта</label>
                    <input type="text" class="form-control" name="name" value="{{ $subject->name }}">
                </div>
                <div class="form-group">
                    <label>ФИО Владелеца</label>
                    <input type="text" class="form-control" name="owner" value="{{ $subject->owner }}">
                </div>
                <div class="form-group">
                    <label>Статус земельного участка</label>
                    <select class="form-control" name="status_id" id="">
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}" {{ $status->id === $subject->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Вид нарушения</label>
                    <select class="form-control" name="violation_id" id="">
                        @foreach($violations as $violation)
                            <option value="{{$violation->id}}" {{ $violation->id === $subject->violation_id ? 'selected' : '' }}> {{ $violation->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Результат принятых мер</label>
                    <select name="result_id" class="form-control" id="">
                        @foreach($results as $result)
                            <option value="{{ $result->id }}" {{ $result->id === $subject->result_id ? 'selected:' : '' }}>{{ $result->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Документы</label>
                    <input type="text" class="form-control" name="document" value="{{ $subject->document }}">
                </div>
                <div class="form-group">
                    <label>Сотрудник</label>
                    <select name="employee_id" class="form-control" id="">
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}" {{ $employee->id === $subject->employee_id  ? 'selected' : ''}}>{{$employee->Full_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Дата обновления</label>
                    <input type="date" class="form-control" name="updated_at" value="{{ $subject->updated_at }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <label for="latitude">Широта</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{$subject->latitude}}">
                    </div>
                    <div class="form-group col-3">
                        <label for="longitude">Долгота</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{$subject->longitude}}">
                    </div>

                    <div class="form-group col">
                        <div id="map" style="width: 100%; height: 400px;"></div>
                    </div>

                </div>
                <button type="Сохранить" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
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
                $('#longitude').val(coords[1]);
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
