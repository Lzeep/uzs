@extends('layouts.app')

@section('content')
    <div class="wrap col-sm-auto ">
        <div class="card col-md-12">
            <div class="front"><h3> {{ $result->name }}</h3></div>
            <div class="back">
                <a class="btn btn-success mr-4" href="{{ route('result.edit', $result) }}">Редактировать</a>
                <a class="btn btn-outline-danger mr-4" href="{{ route('result.destroy', $result) }}">Удалить</a>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        body{
            font-family: sans-serif;
        }
        .wrap{
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-color: white;
            justify-content: center;
            align-items: center;
        }
        .card{
            width: 300px;
            height: 300px;
            /*border: 1px solid;*/
            position: relative;
            perspective: 1000px;
        }
        .front, .back{
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 1s;
            backface-visibility: hidden;
            border-radius: 10px;
        }
        .front{
            background-color: white;

        }
        .back{
            background-color: white;
            transform: rotateY(180deg);
        }
        .card:hover .front{transform: rotateY(180deg);}
        .card:hover .back{transform: rotateY(360deg);}

    </style>
    @endpush
