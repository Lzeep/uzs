@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12" style="overflow: auto;">
                <table class="table table-bordered" id="employees-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>ФИО</th>
                        <th>Адрес</th>
                        <th>Телефон</th>
                        <th>Должность</th>
                        <th>Район</th>

                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>ФИО</th>
                        <th>Адрес</th>
                        <th>Телефон</th>
                        <th></th>
                        <th></th>

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
                ajax: '{!! route('datatables.getemployees') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'Full_name', name: 'Full_name' },
                    { data: 'Address', name: 'Address' },
                    { data: 'Phone', name: 'Phone' },
                    { data: 'position', name: 'position.name' },
                    { data: 'district_id', name: 'district_id' },

                ]
            });
        });
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#employees-table tfoot th').each( function () {
                var title = $(this).text();
                if (title) {
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
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
        } );

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
