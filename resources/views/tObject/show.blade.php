@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <h1>{{ $tObject->name_of_object }}</h1>
        </div>
        <div class="row">
            <h1>{{ $tObject->Owner_name }}</h1>
        </div>
        <div class="row">
            <h1>{{ $tObject->Status_of_the_land }}</h1>
        </div>
        <div class="row">
            <h1>{{ $tObject->Status_of_object }}</h1>
        </div>
        <div class="row">
            <h1>{{ $tObject->Voalation_id }}</h1>
        </div>
        <div class="row">
            <h1>{{ $tObject->Result_of_measures }}</h1>
        </div>
        <div class="row">
            <h1>{{ $tObject->Note }}</h1>
        </div>
        <div class="row">
            <h1>{{ $tObject->Employee_id }}</h1>
        </div>
        <div class="row">
            <h1>{{ $tObject->Date_edit }}</h1>
        </div>
    </div>


@endsection