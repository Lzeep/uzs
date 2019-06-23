@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="/subject/{{ $subject->id }}" method="post" class="col-10">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Введите причину удаления</label>
                    <input type="text" class="form-control" name="delPoint" value="{{ $subject->delPoint }}">
                </div>
                <button type="Сохранить" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

@endsection

