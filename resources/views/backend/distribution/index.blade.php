@extends('layouts.backend-template')



@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品經銷來信管理
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>姓名</th>
                                <th>出生年月日</th>
                                <th>Email</th>
                                <th>電話</th>
                                <th>聯絡地址</th>
                                <th>預定經銷方式</th>
                                <th>預定經銷國家</th>
                                <th>其他</th>
                                <th>寄件日期</th>
                                <th width="100">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->id}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->birthday}}</td>
                                    <td>{{$list->email}}</td>
                                    <td>{{$list->phone}}</td>
                                    <td>{{$list->address}}</td>
                                    <td>{{$list->channel}}</td>
                                    <td>{{$list->city}}</td>
                                    <td>{{$list->other}}</td>
                                    <td>{{$list->created_at}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="/admin/distribution/{{$list->id}}">查看更多</a>
                                        <button class="btn btn-sm btn-danger" data-listid="{{$list->id}}">刪除</button>
                                        <form class="delete-form" action="/admin/distribution/delete/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="clear-distribution-form" action="" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@section('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                "columnDefs": [
                    {
                        "targets": [2,4,5],
                        "visible": false,
                        "searchable": false
                    }
                ],
                "order": [[0,'desc']],
                lengthChange: false,
                buttons: [
                    {
                        extend:"excel",
                        text: '匯出為Excel',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9],
                        },
                        filename: function(){
                            var d = new Date().toISOString().substring(0, 10);
                            return '老虎堂經銷來信-' + d;
                        },
                    }
                ]
            });

            table.buttons().container().appendTo( '#table_wrapper .col-md-6:eq(0)' );
        } );

        // ,
        // {
        //     text: '清空所有資料',
        //     action: function () {
        //         if (confirm('確認是否將所有經銷來信清空？')){
        //             event.preventDefault();
        //             $('#clear-distribution-form').submit();
        //         }
        //     }
        // }

        $('.btn-danger').click(function(){
            var listid = $(this).data("listid");
            if (confirm('確定要刪除此加盟資料？')){
                event.preventDefault();
                $('.delete-form[data-listid="' + listid + '"]').submit();
            }
        });
    </script>
@endsection
