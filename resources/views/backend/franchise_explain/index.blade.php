@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/franchiseeExplain.css') }}">

@endsection
{{-- <link rel="stylesheet" href="{{ asset('css/franchiseeExplain.css') }}"> --}}

@section('content')
<div class="container" style="padding:0px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    常見問題管理
                </h4>
                <div class="card-body">
                    <a class="btn btn-success" href="/admin/franchise_explain/create">新增</a>
                    <span>最多顯示20個常見問題</span>
                    <hr>
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>標題(100字符以內)</th>
                            <th>內文(500字符以內)</th>
                            <th>英文標題(100字符以內)</th>
                            <th>英文內文(500字符以內)</th>
                            <th width="10%" style="text-align: center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>
                                        <div class="scrollable-content">{{$list->title}}</div>
                                    </td>
                                    <td>
                                        <div class="scrollable-content">{{$list->content}}</div>
                                    </td>
                                    <td>
                                        <div class="scrollable-content">{{$list->english_title}}</div>
                                    </td>

                                    <td>
                                        <div class="scrollable-content">{{$list->english_content}}</div>
                                    </td>
                                    <td class="middle">
                                        <a class="delete-icon" onclick="delete_alert()" href="/admin/franchise_explain/delete/{{$list->id}}"></a>
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
@endsection
@section('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [[3,'asc']]
            });
        } );
        function delete_alert(){
            var result = confirm("確定要刪除嗎? 刪除後無法還原，只能重新新增!");
            if (result) {
                // 如果用戶按下了“確定”按鈕
                console.log("用戶已確認刪除操作。");
                // 在這裡執行您需要的代碼，例如發送 AJAX 請求以刪除項目
            } else {
                // 如果用戶按下了“取消”按鈕
                console.log("用戶已取消刪除操作。");
                // 用來停止a標籤觸發效果
                event.preventDefault();
            }
        }

    </script>
@endsection
