@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="row justify-content-xl-between">
                <input type="hidden">
                <a href="{{ route('subject.create') }}" class="btn btn-success">Добавить новый объект</a>
            </div>
            <div class="col-12" style="overflow: auto;">
                <table class="table table-bordered" id="subject-table">
                    <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th>Адрес</th>
                        <th>Наименование объекта</th>
                        <th>Владелец</th>
                        <th>Статус земельного участка</th>
                        <th>Вид нарушения</th>
                        <th>Результат принятых мер</th>
                        <th>Документы</th>
                        <th>Сотрудник</th>
                        <th>Дата обновления</th>
                        <th>Действия</th>
                    </tr>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Адрес</th>
                        <th>Наименование объекта</th>
                        <th>Владелец</th>
                        <th>Статус земельного участка</th>
                        <th>Вид нарушения</th>
                        <th>Результат принятых мер</th>
                        <th>Документы</th>
                        <th>Сотрудник</th>
                        <th>Дата обновления</th>
                        <th>Действия</th>
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
            width:100px;

        }
    </style>
    <link rel="stylesheet" href="{{asset('css/dataTables.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/buttons.dataTables.min.css')}}" type="text/css">

@endpush




@push('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

    <script>
        $(function() {
            $('#subject-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatables.getSubjects') !!}',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'address', name: 'address'},
                        {data: 'name', name: 'name'},
                        {data: 'owner', name: 'owner'},
                        {data: 'status.name', name: 'status.name'},
                        {data: 'violation.name', name: 'violation.name'},
                        {data: 'result.name', name: 'result.name'},
                        {data: 'document', name: 'document'},
                        {data: 'employee.Full_name', name: 'employee.Full_name'},
                        {data: 'updated_at', name: 'updated_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},

                    ],

                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend:'print',
                            text: 'Распечатать все',
                            exportOptions: {
                                columns: ':visible',
                                modifier: {
                                    selected: null
                                }
                            }

                        },

                        {
                            extend: 'print',
                            text: 'Печать выбранного'
                        },

                        {
                            extend: 'colvis',
                            text: 'Изменить столбцы',
                            collectionLayout: 'fixed three-column',
                        },

                    ],
                language:{
                  buttons: {
                      colvis: 'Change'
                  }
                },
                select: true,
                columnDefs: [ {
                    targets: -1,
                    visible: false
                } ],

                    "language": {
                        "paginate": {
                            "next": "Следующая",
                            "previous": "Предыдущая"
                        },

                        "info": "Показана страница _PAGE_ из _PAGES_",

                        "search":         "Поиск:",
                        "lengthMenu":     "Показать _MENU_ записей",

                    }
                }
            );
        });
         $(document).ready(function() {
             // Setup - add a text input to each footer cell
             $('#subject-table tfoot th').each( function () {
                 var title = $(this).text();
                 $(this).html( '<input type="text" placeholder="Поиск по '+title+'" />' );
             } );

             // DataTable
             var table = $('#subject-table').DataTable();

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
