@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="/type/{{ $type->id }}" method="post" class="col-10">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Введите новый тип объекта</label>
                    <input type="text" class="form-control" name="name" value="{{ $type->name }}">
                </div>
                <button type="Сохранить" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

@endsection

