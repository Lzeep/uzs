@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="row justify-content-xl-center">
                <input type="hidden">
                <a href="{{ route('subject.create') }}" class="btn btn-success">Добавить новый объект</a>
                <a href="{{ url('subject/pdf') }}" class="btn btn-info">Convert into PDF</a>
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
@endpush

@push('scripts')

    <script>
        $(function() {
            $('#subject-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.getSubjects') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'address', name: 'address' },
                    { data: 'name', name: 'name' },
                    { data: 'owner', name: 'owner' },
                    { data: 'status.name', name: 'status.name' },
                    { data: 'violation.name', name: 'violation.name' },
                    { data: 'result.name', name: 'result.name'},
                    { data: 'document', name: 'document' },
                    { data: 'employee.Full_name', name: 'employee.Full_name' },
                    { data: 'updated_at', name: 'updated_at' },
                ]

            });
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


