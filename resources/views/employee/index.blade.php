@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="row justify-content-xl-between">
                <input type="hidden">
                @hasanyrole('admin|inspector')
                <a href="{{ route('employee.create') }}" class="btn btn-success">Добавить нового сотрудника</a>
                @endhasanyrole
            </div>
            <div class="col-12" style="overflow: auto;">
                <table class="table table-bordered" id="employees-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>ФИО</th>
                        <th>Адрес</th>
                        <th>Телефон</th>
                        <th>Район</th>
                        <th>Действия</th>

                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>ФИО</th>
                        <th>Адрес</th>
                        <th>Телефон</th>


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
            $('#employees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.getEmployees') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'Full_name', name: 'Full_name' },
                    { data: 'Address', name: 'Address' },
                    { data: 'Phone', name: 'Phone' },
                    { data: 'district.name', name: 'district.name' },
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

            });
        });
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#employees-table tfoot th').each( function () {
                var title = $(this).text();
                if (title) {
                    $(this).html( '<input type="text" placeholder="Поиск '+title+'" />' );
                }
            } );

            // DataTable
            var table = $('#employees-table').DataTable();

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
        }
        );

        // $('#users-table').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: 'https://datatables.yajrabox.com/eloquent/add-edit-remove-column-data',
        //     columns: [
        //         { data: 'id', name: 'id' },
        //         { data: 'Full_name', name: 'Full_name' },
        //         { data: 'Address', name: 'Address' },
        //         { data: 'Phone', name: 'Phone' },
        //         { data: 'position', name: 'position.name' },
        //         { data: 'district_id', name: 'district_id' },
        //         { data: 'created_at', name: 'created_at' },
        //         {data: 'action', name: 'action', orderable: false, searchable: false}
        //     ]
        // });

    </script>
@endpush
