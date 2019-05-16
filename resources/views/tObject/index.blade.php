@extends('layouts.app')

@section('content')
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>

    <script src="{{ asset('js/object_list.js') }}"></script>

    <script src="{{ asset('js/groups.js') }}"></script>
    <div class="container-fluid">
        <div class="row">
            <div class="row justify-content-xl-center">
                <input type="hidden">
                <a href="{{ route('tObject.create') }}" class="btn btn-success">Добавить запись</a>
            </div>
            <div class="col-12" style="overflow: auto;">
                <table class="table table-bordered" id="object-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Адрес</th>
                        <th>Наименование объекта</th>
                        <th>Владелец</th>
                        <th>Статус земли</th>
                        <th>Статус объекта</th>
                        <th>Нарушения</th>
                        <th>Результат принятых мер</th>
                        <th>Примечание</th>
                        <th>Сотрудник</th>
                        <th>Широта</th>
                        <th>Долгота</th>
                        <th>Дата обновления</th>
                     </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Адрес</th>
                        <th>Наименование объекта</th>
                        <th>Владелец</th>
                        <th>Статус земли</th>
                        <th>Статус объекта</th>
                        <th>Нарушения</th>
                        <th>Результат принятых мер</th>
                        <th>Примечание</th>
                        <th>Сотрудник</th>
                        <th>Широта</th>
                        <th>Долгота</th>
                        <th>Дата обновления</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
@push('styles')
    <style>
        table {
            width:100%;

        }
    </style>
@endpush

@push('scripts')

    <script>
        $(function() {
            $('#object-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.getObjects') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'object.Address_of_object', name: 'object.Address_of_object' },
                    { data: 'nameOfObject', name: 'nameOfObject' },
                    { data: 'ownerName', name: 'ownerName' },
                    { data: 'land.status_of_the_land', name: 'land.status_of_the_land' },
                    { data: 'stat_object.Status_of_object', name: 'stat_object.Status_of_object' },
                    { data: 'violation.name', name: 'violation.name' },
                    { data: 'resultOfmeasure', name: 'resultOfmeasure' },
                    { data: 'documents', name: 'documents' },
                    { data: 'employee.Full_name', name: 'employee.Full_name' },
                    { data: 'latitude', name: 'latitude' },
                    { data: 'longitude', name: 'longitude' },
                    { data: 'Date_edit', name: 'Date_edit' },
                ]

            });
        });
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#object-table tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );

            // DataTable
            var table = $('#object-table').DataTable();

            // Apply the search
            table.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        } );
    </script>

@endpush



{{--@extends('layouts.app')--}}

{{--@section('content')--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<h1>Информация об объектах</h1>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<form action="/search" method="get">--}}
                        {{--<div class="row justify-content-xl-center">--}}
                            {{--<input type="hidden">--}}
                            {{--<a href="{{ route('tObject.create') }}" class="btn btn-success">Заполнить заявление</a>--}}
                        {{--</div>--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="search" name="search" class="form-control">--}}
                            {{--<span class="input-group-prepend ">--}}
                    {{--<button type="submit" class="btn btn-primary">Search</button>--}}
                {{--</span>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<table class="table table-bordered" class="display" style="width: 100%">--}}
                {{--<thead class="thead-dark">--}}
                {{--<tr>--}}
                    {{--<th>#</th>--}}
                    {{--<th>Адрес</th>--}}
                    {{--<th>Наименование объекта</th>--}}
                    {{--<th>Владелец</th>--}}
                    {{--<th>Статус земли</th>--}}
                    {{--<th>Статус объекта</th>--}}
                    {{--<th>Нарушения</th>--}}
                    {{--<th>Результат принятых мер</th>--}}
                    {{--<th>Примечание</th>--}}
                    {{--<th>Сотрудник</th>--}}
                    {{--<th>Широта</th>--}}
                    {{--<th>Долгота</th>--}}
                    {{--<th>Дата обновления</th>--}}
                    {{--<th>Действия</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}

                {{--@foreach($tobjects as $tobject)--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<td>{{$tobject->id}}</td>--}}
                        {{--<td>{{$tobject->Object_id}}</td>--}}
                        {{--<td>{{$tobject->nameOfObject}}</td>--}}
                        {{--<td>{{$tobject->ownerName}}</td>--}}
                        {{--<td>{{$tobject->statusOfLand}}</td>--}}
                        {{--<td>{{$tobject->statusOfObject}}</td>--}}
                        {{--<td>{{$tobject->violationId}}</td>--}}
                        {{--<td>{{$tobject->resultOfmeasure}}</td>--}}
                        {{--<td>{{$tobject->documents}}</td>--}}
                        {{--<td>{{$tobject->employeeId}}</td>--}}
                        {{--<td>{{$tobject->Latitude}}</td>--}}
                        {{--<td>{{$tobject->longitude}}</td>--}}
                        {{--<td>{{$tobject->Date_edit}}</td>--}}
                        {{--<td><a href="/tObject/{{ $tobject->id }}" class="btn btn-primary">Показать</a>--}}
                            {{--<a href="/tObject/{{ $tobject->id }}/edit" class="btn btn-warning">Редактировать</a></td>--}}

                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--@endforeach--}}
                {{--<tfoot>--}}
                {{--<tr>--}}
                    {{--<th>#</th>--}}
                    {{--<th>Адрес</th>--}}
                    {{--<th>Наименование объекта</th>--}}
                    {{--<th>Владелец</th>--}}
                    {{--<th>Статус земли</th>--}}
                    {{--<th>Статус объекта</th>--}}
                    {{--<th>Нарушения</th>--}}
                    {{--<th>Результат принятых мер</th>--}}
                    {{--<th>Примечание</th>--}}
                    {{--<th>Сотрудник</th>--}}
                    {{--<th>Широта</th>--}}
                    {{--<th>Долгота</th>--}}
                    {{--<th>Дата обновления</th>--}}
                    {{--<th>Действия</th>--}}
                {{--</tr>--}}
                {{--</tfoot>--}}
            {{--</table>--}}
        {{--</div>--}}





    {{--@endsection--}}
{{--@push('scripts')--}}
    {{--<script>--}}
        {{--$(function() {--}}
            {{--$('#object-table').DataTable({--}}
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--ajax: '{!! route('datatables.getObjects') !!}',--}}
                {{--columns: [--}}
                    {{--{ data: 'id', name: 'id' },--}}
                    {{--{ data: 'Object_id', name: 'Object_id' },--}}
                    {{--{ data: 'nameOfObject', name: 'nameOfObject' },--}}
                    {{--{ data: 'ownerName', name: 'ownerName' },--}}
                    {{--{ data: 'statusOfLand', name: 'statusOfLand' },--}}
                    {{--{ data: 'statusOfObject', name: 'statusOfObject' },--}}
                    {{--{ data: 'violationId', name: 'violationId' },--}}
                    {{--{ data: 'resultOfmeasure', name: 'resultOfmeasure' },--}}
                    {{--{ data: 'documents', name: 'documents' },--}}
                    {{--{ data: 'employeeId', name: 'employeeId' },--}}
                    {{--{ data: 'Latitude', name: 'Latitude' },--}}
                    {{--{ data: 'longitude', name: 'longitude' },--}}
                    {{--{ data: 'Date_edit', name: 'Date_edit' },--}}
                {{--]--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}
