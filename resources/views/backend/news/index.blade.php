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
                        <a class="btn btn-success" href="{{ route('back.news.create') }}">新增</a>
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
                                        <a class="btn btn-sm btn-success" href="{{ route('back.news.edit',['id' => $list->id]) }}">編輯</a>
                                        {{-- <form class="delete-form" action="{{ route('back.news.delete',['id' =>$list->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">刪除</button>
                                        </form> --}}
                                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteData('{{ $list->id }}','{{ $list->title }}')">刪除</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteData(id, title) {
        console.log(123);
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('_method', 'delete');
        Swal.fire({
            title: `確認要刪除${title}資料嗎?`,
            showDenyButton: true,
            confirmButtonText: '取消',
            denyButtonText: '刪除',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isDenied) {
                fetch('{{ route('back.news.delete',['9']) }}', {
                    method: 'post',
                    body: formData,
                }).then((res) => {
                    return res.text();
                }).then((data) => {
                    if (data == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: '刪除成功',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '刪除失敗',
                            text: '查無資料',
                        });
                    }
                });
            }
        });
    }
</script>
@endsection

