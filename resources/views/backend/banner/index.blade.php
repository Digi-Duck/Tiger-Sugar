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
                        廣告橫幅管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/banner/create">新增</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>類型</th>
                                <th>圖片/影片</th>
                                <th>替代文字</th>
                                <th>權重</th>
                                <th width="80">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->type}}</td>
                                    <td>
                                        @if($list->type == '圖片')
                                            <img src="{{$list->pc_image_url}}" alt="" height="100">
                                        @endif
                                        @if($list->type == '影片')
                                                <iframe frameborder="0" height="100%" width="100%"
                                                        src="https://youtube.com/embed/{{$list->pc_video_url}}?autoplay=1&controls=0&showinfo=0&autohide=1">
                                                </iframe>
                                        @endif

                                    </td>
                                    <td>{{$list->image_alt}}</td>
                                    <td>{{$list->sort}}</td>
                                    <td>
                                        @if($list->id != 1 )<a class="btn btn-sm btn-success" href="/admin/banner/edit/{{$list->id}}">編輯</a> @endif
                                        @if($list->id != 1 ) <button class="btn btn-sm btn-danger" data-listid="{{$list->id}}">刪除</button> @endif
                                        <form class="delete-form" action="/admin/banner/delete/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
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
                "order": [[3,'asc']]
            });
        } );
        $('.btn-danger').click(function(){
            var listid = $(this).data("listid");
            if (confirm('確定要刪除此Banner？')){
                event.preventDefault();
                $('.delete-form[data-listid="' + listid + '"]').submit();
            }
        });
    </script>
@endsection
