@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        全球據點管理-城市列表
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/city/create">新增</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>國家</th>
                                <th>城市名稱</th>
                                <th width="120">代表圖片</th>
                                <th>店數</th>
                                <th>權重</th>
                                <th width="80">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->country->country_name}}｜{{$list->country->country_en_name}}</td>
                                    <td>{{$list->city_name}}｜{{$list->city_name_en}}</td>
                                    <td><img src="{{$list->city_photo}}" width="200" alt=""></td>
                                    <td>{{$list->shops_count}}</td>
                                    <td>{{$list->sort}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="/admin/city/edit/{{$list->id}}">編輯</a>
                                        <button class="btn btn-sm btn-danger" data-listid="{{$list->id}}">刪除</button>
                                        <form class="delete-form" action="/admin/city/delete/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
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
@endsection

@section('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                order:[[4,"asc"]]
            });
        } );
        $('.btn-danger').click(function(){
            var listid = $(this).data("listid");
            if (confirm('確定要刪除此區域？')){
                event.preventDefault();
                $('.delete-form[data-listid="' + listid + '"]').submit();
            }
        });
    </script>
@endsection
