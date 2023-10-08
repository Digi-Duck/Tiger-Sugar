@extends('layouts.backend-template')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        飲品類型管理(中)
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="{{route('back.drink_type.create')}}">新增飲品類型</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>飲品類型</th>
                                <th>權重</th>
                                <th width="80">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->type_name}}</td>
                                    <td>{{$list->sort}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{route('back.drink_type.edit',['id' => $list->id])}}">編輯</a>
                                        <form class="delete-form" action="{{route('back.drink_type.delete',['id' => $list->id])}}" method="POST"  data-listid="{{$list->id}}">
                                            <button class="btn btn-sm btn-danger" data-listid="{{$list->id}}">刪除</button>
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
        // $(document).ready(function() {
        //     $('#table').DataTable({
        //         "order": [[1,'asc']]
        //     });
        // } );
        // $('.btn-danger').click(function(){
        //     var listid = $(this).data("listid");
        //     if (confirm('確定要刪除此飲品類型？')){
        //         event.preventDefault();
        //         $('.delete-form[data-listid="' + listid + '"]').submit();
        //     }
        // });
    </script>
@endsection
