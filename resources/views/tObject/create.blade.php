@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('tObject') }}" method="post" class="col-10">
                @csrf
                <div class="form-group">
                    <label>#</label>
                    <input type="text" class="form-control" name="id">
                </div>
                <div class="form-group">
                    <label>Адрес</label>
                    <input type="text" class="form-control" name="Object_id">
                </div>
                <div class="form-group">
                    <label>Наименование объекта</label>
                    <input type="text" class="form-control" name="Name_of_object">
                </div>
                <div class="form-group">
                    <label>Владелец</label>
                    <input type="text" class="form-control" name="Owner_name">
                </div>
                <div class="form-group">
                    <label>Статус земли</label>
                    <input type="text" class="form-control" name="Status_of_the_land">
                </div>
                <div class="form-group">
                    <label>Статус объекта</label>
                    <input type="text" class="form-control" name="Status_of_object">
                </div>
                <div class="form-group">
                    <label>Нарушения</label>
                    <input type="text" class="form-control" name="Voalation_id">
                </div>
                <div class="form-group">
                    <label>Результат принятых мер</label>
                    <input type="text" class="form-control" name="Result_of_measures">
                </div>
                <div class="form-group">
                    <label>Примечание</label>
                    <input type="text" class="form-control" name="Note">
                </div>
                <div class="form-group">
                    <label>Сотрудник</label>
                    <input type="text" class="form-control" name="Employee_id">
                </div>
                <div class="form-group">
                    <label>Дата обновления</label>
                    <input type="text" class="form-control" name="Date_edit">
                </div>
            </form>
        </div>
    </div>
@endsection