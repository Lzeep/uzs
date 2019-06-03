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
                        <th>Район</th>
                        <th>МТУ</th>
                        <th>Тип объекта</th>
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
                        <th>Картинки</th>

                    </tr>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Район</th>
                        <th>МТУ</th>
                        <th>Тип объекта</th>
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
                        <th>Картинки</th>

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

    <link rel="stylesheet" href="{{ asset('css/skins/minimal.css') }}"/>
@endpush

@push('scripts')
    <script src='https://code.jquery.com/jquery-3.2.1.min.js' type='text/javascript'></script>
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
    <script src="{{asset("js/lightbox.min.js")}}"></script>
    <script>
        $(function() {
            var table = $('#subject-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatables.getSubjects') !!}',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'district.name', name: 'district.name'},
                        {data: 'mtu.name', name: 'mtu.name'},
                        {data: 'type.name', name: 'type.name'},
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
            $('#subject-table tfoot th').each( function () {
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

        $(document).ready(function (e) {
            // live handler
            lc_lightbox('.elem', {
                wrap_class: 'lcl_fade_oc',
                gallery: true,
                thumb_attr: 'data-lcl-thumb',
                skin: 'minimal',
                radius: 0,
                padding: 0,
                border_w: 0,
            });
        });
    </script>
@endpush
