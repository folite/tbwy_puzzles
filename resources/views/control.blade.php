<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>控制板</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2">
            <div class="col">
                <table id="table_toppic" class="display">
                    <thead>
                        <tr>
                            <th>題目</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                          <th><div class="input-group mb-3">
                            <input type="text" class="form-control" id="input-topic-new" placeholder="題目" aria-label="題目" aria-describedby="basic-addon1">
                          </div></th>
                          <th><button type="button" class=" btn btn-success button-topic-create">新增</button></th>
                        </tr>
                      </tfoot>
                </table>
            </div>
            <div class="col">
                <table id="table_way" class="display">
                    <thead>
                        <tr>
                            <th>方式</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                          <th><div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="方法" aria-label="方法" id="input-way-new" aria-describedby="basic-addon1">
                          </div></th>
                          <th><button type="button" class=" btn btn-success button-way-create">新增</button></th>
                        </tr>
                      </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table_toppic = $('#table_toppic').DataTable({
                "language": {
                    "processing": "處理中...",
                    "loadingRecords": "載入中...",
                    "lengthMenu": "顯示 _MENU_ 項結果",
                    "zeroRecords": "沒有符合的結果",
                    "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "infoPostFix": "",
                    "search": "搜尋:",
                    "paginate": {
                        "first": "第一頁",
                        "previous": "上一頁",
                        "next": "下一頁",
                        "last": "最後一頁"
                    },
                    "aria": {
                        "sortAscending": ": 升冪排列",
                        "sortDescending": ": 降冪排列"
                    }
                },
                "columnDefs": [{
                        "targets": 0,
                        "data": "topic"
                    },
                    {
                        "targets": -1,
                        "data": null,
                        "defaultContent": '<button type="button" class=" btn btn-danger button-topic-delete">刪除</button>'
                    }
                ],
                "createdRow": function (Row, Data, iDataIndex) {
                    $(Row).attr('data-value', Data['id']);
                },
                "pageLength": -1
            });
            var table_way = $('#table_way').DataTable({
                "language": {
                    "processing": "處理中...",
                    "loadingRecords": "載入中...",
                    "lengthMenu": "顯示 _MENU_ 項結果",
                    "zeroRecords": "沒有符合的結果",
                    "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "infoPostFix": "",
                    "search": "搜尋:",
                    "paginate": {
                        "first": "第一頁",
                        "previous": "上一頁",
                        "next": "下一頁",
                        "last": "最後一頁"
                    },
                    "aria": {
                        "sortAscending": ": 升冪排列",
                        "sortDescending": ": 降冪排列"
                    }
                },
                "columnDefs": [{
                        "targets": 0,
                        "data": "way"
                    },
                    {
                        "targets": -1,
                        "data": "button",
                        "defaultContent": '<button type="button" class=" btn btn-danger button-way-delete">刪除</button>'
                    }
                ],
                "createdRow": function (Row, Data, iDataIndex) {
                    $(Row).attr('data-value', Data['id']);
                },
                "pageLength": -1
            });
            $.ajax({
                type: 'GET',
                url: 'api/topics',
                success: function (msg) {
                    console.log(msg);
                    table_toppic.rows.add(msg).draw();
                }
            });
            $.ajax({
                type: 'GET',
                url: 'api/ways',
                success: function (msg) {
                    console.log(msg);
                    table_way.rows.add(msg).draw();
                }
            });
            $('#table_toppic').on('click', 'tbody tr button', function (event) {
                var row = $(this).parents('tr');
                var rowData = table_toppic.row(row).data();
                console.log(row);
                $.ajax({
                    url: 'api/topic/' + rowData['id'],
                    type: 'DELETE',
                    async: false,
                    error: function (xhr) {
                        console.log(xhr);
                        return false;
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == 1)table_toppic.row(row).remove().draw();
                    }
                });
            });
            $('#table_way').on('click', 'tbody tr button', function (event) {
                var row = $(this).parents('tr');
                var rowData = table_way.row(row).data();
                console.log(row['id']);
                $.ajax({
                    url: 'api/way/' + rowData['id'],
                    type: 'DELETE',
                    async: false,
                    error: function (xhr) {
                        console.log(xhr);
                        return false;
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == 1) table_way.row(row).remove().draw();
                    }
                });
            });
            $('.button-topic-create').on('click',function (event) {
                console.log($('input[id="input-topic-new"]').val());
                $.ajax({
                    url: 'api/topic',
                    type: 'POST',
                    async: false,
                    data:{
                        topic: $('input[id="input-topic-new"]').val()
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        return false;
                    },
                    success: function (response) {
                        console.log(response);
                        if (response != 0) {
                            table_toppic.row.add(response).draw();
                            $('input[id="input-topic-new"]').val("");
                        }
                    }
                });
            });
            $('.button-way-create').on('click',function (event) {
                console.log($('input[id="input-way-new"]').val());
                $.ajax({
                    url: 'api/way',
                    type: 'POST',
                    async: false,
                    data:{
                        way: $('input[id="input-way-new"]').val()
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        return false;
                    },
                    success: function (response) {
                        console.log(response);
                        if (response != 0){
                            table_way.row.add(response).draw();
                            $('input[id="input-way-new"]').val("");
                        }
                    }
                });
            });
        });

    </script>
</body>

</html>
