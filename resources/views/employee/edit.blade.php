@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="/employee/{{ $employee->id }}" method="post" class="col-10">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label>Введите МТУ</label>
                    <input type="text" class="form-control" name="Full_name" value="{{ $employee->Full_name }}">
                </div>
                <div class="form-group">
                    <label>Введите МТУ</label>
                    <input type="text" class="form-control" name="Address" value="{{ $employee->Address }}">
                </div>
                <div class="form-group">
                    <label>Введите МТУ</label>
                    <input type="text" class="form-control" name="Phone" value="{{ $employee->Phone }}">
                </div>
                <div class="'form-group">
                    <label>Район</label>
                    <select class="form-control" name="district_id" id="district">
                        @foreach($districts as $district)
                            <option value="{{$district->id}}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="Сохранить" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

@endsection

