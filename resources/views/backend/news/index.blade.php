@extends('layouts.backend-template')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        最新消息管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/news/create">新增</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="120">標題</th>
                                <th>內容</th>
                                <th>權重</th>
                                <th width="80">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->title}}</td>
                                    <td id="summernote">{!! $list->info !!}</td>
                                    <td>{{$list->sort}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="/admin/news/edit/{{$list->id}}">編輯</a>
                                        <button class="btn btn-sm btn-danger" data-listid="{{$list->id}}">刪除</button>
                                        <form class="delete-form" action="/admin/news/delete/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
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
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [[2,'asc']]
            });
        } );
        $('.btn-danger').click(function(){
            var listid = $(this).data("listid");
            if (confirm('確定要刪除此最新消息？')){
                event.preventDefault();
                $('.delete-form[data-listid="' + listid + '"]').submit();
            }
        });
    </script>
@endsection

