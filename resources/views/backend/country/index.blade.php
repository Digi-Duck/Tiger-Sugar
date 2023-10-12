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
                        全球據點管理-國家列表
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="{{route('back.country.create')}}">新增國家</a>
                        <hr>
                            <div class="alert alert-warning" role="alert">
                                全球據點的店數會計算<b>該國家的店舖數量</b>，當數量為0時，會自動於前台顯示 <b>coming soon</b> 字樣。
                            </div>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>洲</th>
                                <th>國家</th>
                                <th>代表圖片</th>
                                <th>店數</th>
                                <th>權重</th>
                                <th width="80">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->continent->continent_tw}}｜{{$list->continent->continent_en}}</td>
                                    <td>{{$list->country_name}}｜{{$list->country_en_name}}</td>
                                    <td><img src="{{$list->country_photo}}" width="200" alt=""></td>
                                    <td>{{$list->shops_count}}</td>
                                    <td>{{$list->sort}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('back.country.edit', ['id' => $list->id]) }}">編輯</a>
                                        <form class="delete-form" action="{{ route('back.country.delete', ['id' => $list->id]) }}" method="POST" data-listid="{{$list->id}}">
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
        //         "order": [[4,'asc']]
        //     });
        // } );
        // $('.btn-danger').click(function(){
        //     var listid = $(this).data("listid");
        //     if (confirm('確定要刪除此海外據點？')){
        //         event.preventDefault();
        //         $('.delete-form[data-listid="' + listid + '"]').submit();
        //     }
        // });
    </script>
@endsection
