@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Информация об объектах</h1>
    </div>
    <div class="col-md-4">
        <form action="/search" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend ">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>
    </div>
</div>
        <table class="table table-bordered">
                <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Адрес</th>
                <th scope="col">Наименование объекта</th>
                <th scope="col">Владелец</th>
                <th scope="col">Статус земли</th>
                <th scope="col">Статус объекта</th>
                <th scope="col">Нарушения</th>
                <th scope="col">Результат принятых мер</th>
                <th scope="col">Примечание</th>
                <th scope="col">Сотрудник</th>
                <th scope="col">Дата обновления</th>
                <th scope="col">Действия</th>
                </thead>

                @foreach($tObjects as $tObject)
                    <tbody>
                    <tr>
                        <td>{{$tObject->id}}</td>
                        <td>{{$tObject->Object_id}}</td>
                        <td>{{$tObject->Name_of_object}}</td>
                        <td>{{$tObject->Owner_name}}</td>
                        <td>{{$tObject->Status_of_the_land}}</td>
                        <td>{{$tObject->Status_of_object}}</td>
                        <td>{{$tObject->Voalation_id}}</td>
                        <td>{{$tObject->Result_of_measures}}</td>
                        <td>{{$tObject->Note}}</td>
                        <td>{{$tObject->Employee_id}}</td>
                        <td>{{$tObject->Date_edit}}</td>
                        <td><a href="/tObject/{{ $tObject->id }}" class="btn btn-primary">Показать</a></td>
                        <td><a href="/tObject/{{ $tObject->id }}/edit" class="btn btn-warning">Редактировать</a></td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

    @endsection