@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="/result/{{ $result->id }}" method="post" class="col-10">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Введите возможное решение</label>
                    <input type="text" class="form-control" name="address" value="{{ $result->name }}">
                </div>
                <button type="Сохранить" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

@endsection

