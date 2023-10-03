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
                        媒體露出
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/media/create">新增</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>影片名字</th>
                            <th>影片預覽</th>
                            <th>權重</th>
                            <th width="130">功能</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($mediaes as $media)
                                <tr>
                                    <td>{{$media->name}}</td>
                                    <td>
                                        <video controls width="300">
                                            <source src="{{$media->link}}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>{{$media->sort}}</td>
                                    <td>
                                       <a class="btn btn-sm btn-success" href="/admin/media/edit/{{$media->id}}">編輯</a>
                                        @if($media->id != 1 ) <button class="btn btn-sm btn-danger" data-listid="{{$media->id}}">刪除</button> @endif
                                        <form class="delete-form" action="/admin/media/delete/{{$media->id}}" method="POST" style="display: none;" data-listid="{{$media->id}}">
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
                "order": [[2,'asc']]
            });
        } );
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('.btn-danger').click(function(){
            var listid = $(this).data("listid");
            if (confirm('你確定要刪除此影片?')){
                event.preventDefault();
                $('.delete-form[data-listid="' + listid + '"]').submit();
            }
        });
    </script>
@endsection