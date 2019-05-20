@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="/subject/{{ $subject->id }}" method="post" class="col-10">
                @csrf
                @method('PUT')



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
                <button type="Сохранить" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
