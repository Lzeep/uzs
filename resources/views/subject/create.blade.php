    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <form action="{{ route('subject.store') }}" method="post" class="col-10" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Выберите фото объекта</label>
                        <input type="file" name="logo">
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
                    <div class="'form-group">
                        <label>Функциональное назначение</label>
                        <select class="form-control" name="fucntionDoc" id="fucntionDoc">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Адрес</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label>Выберите документы объекта</label>
                        <input type="file" name="images[]" multiple>
                    </div>

                    <div class="form-group">
                        <label>Наименование объекта</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Владелец</label>
                        <input type="text" class="form-control" name="owner">
                    </div>
                    <div class="form-group">
                        <label>Статус земли</label>
                        <select class="form-control" name="status_id" id="status">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Площадь объекта по документам</label>
                        <input id="a" type="text" class="form-control" name="sDoc">
                    </div>
                    <div class="form-group">
                        <label>Фактическая площадь объекта</label>
                        <input id="b" type="text" class="form-control" name="sReal">
                    </div>

                    <div class="form-group">
                        <label>Нарушения</label>
                        <select class="form-control" name="violation_id">
                            @foreach($violations as $violation)
                                <option value="{{ $violation->id }}">{{ $violation->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Результат принятых мер</label>
                        <select class="form-control" name="result_id">
                            @foreach($results as $result)
                                <option value="{{ $result->id }}">{{ $result->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Документы</label>
                        <input type="text" class="form-control" name="document">
                    </div>
                    <div class="form-group">
                        <label>Сотрудник</label>
                        <select class="form-control" name="employee_id" id="employee">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{$employee->Full_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Дата обновления</label>
                        <input type="date" class="form-control" name="updated_at">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-3">
                            <label for="latitude">Широта</label>
                            <input type="text" class="form-control" id="latitude" name="latitude">
                        </div>
                        <div class="form-group col-3">
                            <label for="longitude">Долгота</label>
                            <input type="text" class="form-control" id="longitude" name="longitude">
                        </div>

                        <div class="form-group col">
                            <div id="map" style="width: 100%; height: 400px;"></div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary" onclick="addition();">Submit</button>

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
        {{--<script>--}}
            {{--$(document).ready(function () {--}}
                {{--$('#district').click(function () {--}}
                    {{--var district_id = $('#district').val();--}}
                    {{--$.ajax({--}}
                        {{--url: '/employees',--}}
                        {{--method: 'GET',--}}
                        {{--dataType: 'json',--}}
                        {{--data: {--}}
                            {{--'district_id': district_id--}}
                        {{--},--}}
                        {{--success: function (data) {--}}
                            {{--console.log(data.mtus);--}}
                            {{--$('#employee').removeClass('disabled');--}}
                            {{--$('#employee').empty();--}}
                            {{--for (var employee of data.employees) {--}}
                                {{--$('#employee').append(--}}
                                    {{--'<option value="' + employee.id + '">' + employee.Full_name + '</option>'--}}
                                {{--)--}}
                            {{--}--}}
                        {{--},--}}
                        {{--error: function (error) {--}}
                            {{--console.log('error');--}}
                        {{--}--}}
                    {{--});--}}
                {{--});--}}
            {{--});--}}
        {{--</script>  --}}
        <script>
            $(document).ready(function () {
                $('#district').click(function () {
                    var district_id = $('#district').val();
                    $.ajax({
                        url: '/mtus',
                        method: 'GET',
                        dataType: 'json',
                        data: {
                            'district_id': district_id
                        },
                        success: function (data) {
                            console.log(data.mtus);
                            $('#mtu').removeClass('disabled');
                            $('#mtu').empty();
                            for (var mtu of data.mtus) {
                                $('#mtu').append(
                                    '<option value="' + mtu.id + '">' + mtu.name + '</option>'
                                )
                            }
                        },
                        error: function (error) {
                            console.log('error');
                        }
                    });
                });
            });
        </script>

    @endpush
