@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="row justify-content-xl-between">
                <input type="hidden">
                @hasanyrole('admin|inspector')
                    <a href="{{ route('result.create') }}" class="btn btn-success">Добавить новый результат</a>
                @endhasanyrole
            </div>
            <div class="col-12" style="overflow: auto;">
                <table class="table table-bordered" id="result-table">
                    <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th>Результаты решений</th>
                        <th>Действия</th>


                    </tr>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Результаты решений</th>
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
    <link rel="stylesheet" href="{{ asset('css/lc_lightbox.css') }}"/>
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/skins/minimal.css') }}"/>
@endpush

@push('scripts')

    <script src="{{asset("js/lightbox.min.js")}}"></script>
    <script>
        $(function() {
            var table = $('#result-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatables.getResult') !!}',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},

                    ],
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
            $('#result-table tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Поиск по '+title+'" />' );
            } );
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
        });
        $(document).ready(function() {
            var table = $('#result-table').DataTable();

            $('#result-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );

            $('#button').click( function () {
                table.row('.selected').remove().draw(false);
            } );
        } );


    </script>
@endpush
