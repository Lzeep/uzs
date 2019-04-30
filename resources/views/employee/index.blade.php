@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="employees-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>ФИО</th>
                        <th>Адрес</th>
                        <th>Телефон</th>
                        <th>Должность</th>
                        <th>Район</th>
                        <th>Дата создания</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop

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
                    { data: 'position.Position', name: 'position.Position' },
                    { data: 'District', name: 'District' },
                    { data: 'created_at', name: 'created_at' },
                ]
            });
        });
    </script>
@endpush