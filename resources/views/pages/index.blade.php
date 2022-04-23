@extends('layouts.panel.app')

@section('title')
    All Pages
@endsection

@section('link') {{route('pages.create')}} @endsection
@section('name-link') <i class="fa fa-check-circle"></i> Create new To Do Lists @endsection

@section('content')

    <h2 class="main-container-heading">@yield('title')</h2>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
                <table class="table data_Table table-striped table-hover" id="data_Table">
                    <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {

            "use strict";
            //When Click Delete Button
            $(document).on('click', '.btn_delete_current', function () {
                var id = $(this).data("id");
                var url = "{{ route('pages.deleted') }}";
                $('#ModDelete').modal('show');
                $('#ModDelete #url').val(url);
                $('#iddel').val(id);
                if (id) {
                    $('#data_Table tbody tr').css('background', 'transparent');
                    $('#data_Table tbody #' + id).css('background', 'hsla(64, 100%, 50%, 0.36)');
                }
            });

            //Return All Data in AJAX-DataTables
            Render_Data();

        });

        var Render_Data = function () {
            datatabe = $('#data_Table').DataTable({
                processing: true,
                serverSide: true,
                "fnCreatedRow": function (nRow, aData, iDataIndex) {
                    $(nRow).attr('id', 'item_' + aData['id']);
                },
                order: [0, 'asc'],
                "lengthMenu": [10, 20, 50, 100],
                "columnDefs": [{
                    "targets": [5],
                    "orderable": false
                }],
                "ajax": {
                    "url": "{{ route('pages.get_data') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{csrf_token()}}",
                    }
                },
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "icon"},
                    {"data": "created_at"},
                    {"data": "updated_at"},
                    {"data": "option"}
                ]
            });
        };

    </script>


@endsection
