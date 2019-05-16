@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="/subject/{{ $subject->id }}" method="post" class="col-10">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label>#</label>
                    <input type="text" class="form-group" name="id" value="{{ $subject->id}}">
                </div>
                <div class="form-group">
                    <label>Адрес</label>
                    <input type="text" class="form-group" name="address" value="{{ $subject->Object_id }}">
                </div>
                <div class="form-group">
                    <label>Наименование</label>
                    <input type="text" class="form-group" name="Name_of_object" value="{{ $subject->Name_of_object }}">
                </div>
                <div class="form-group">
                    <label>Владелец</label>
                    <input type="text" class="form-group" name="Owner_name" value="{{ $subject->Owner_name }}">
                </div>
                <div class="form-group">
                    <label>Статус земли</label>
                    <input type="text" class="form-group" name="Status_of_the_land" value="{{ $subject->Status_of_the_land }}">
                </div>
                <div class="form-group">
                    <label>Статус объекта</label>
                    <input type="text" class="form-group" name="Status_of_object" value="{{ $subject->Status_of_object }}">
                </div>
                <div class="form-group">
                    <label>Нарушения</label>
                    <input type="text" class="form-group" name="Voalation_id" value="{{ $subject->Voalation_id }}">
                </div>
                <div class="form-group">
                    <label>Результат принятых мер</label>
                    <input type="text" class="form-group" name="Result_of_measures" value="{{ $subject->Result_of_measures }}">
                </div>
                <div class="form-group">
                    <label>Примечание</label>
                    <input type="text" class="form-group" name="Note" value="{{ $subject->Note }}">
                </div>
                <div class="form-group">
                    <label>Сотрудник</label>
                    <input type="text" class="form-group" name="Employee_id" value="{{ $subject->Employee_id }}">
                </div>
                <div class="form-group">
                    <label>Дата обновления</label>
                    <input type="date" class="form-group" name="Date_edit" value="{{ $subject->Date_edit }}">
                </div>
            </form>
        </div>
    </div>

@endsection
