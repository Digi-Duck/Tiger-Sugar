@extends('layouts.backend-template')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        媒體報導管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="{{ route('back.blog_news.create') }}">新增</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="50">來源出處</th>
                                    <th>代表圖片</th>
                                    <th>標題</th>
                                    <th>簡述</th>
                                    <th>權重</th>
                                    <th width="80">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>
                                            <a href="{{ $list->link }}" target="_blank">{{ $list->author }}</a>
                                        </td>
                                        <td><img src="{{ $list->main_photo }}" width="200" alt=""></td>
                                        <td>{{ $list->title }}</td>
                                        <td>{{ $list->info }}</td>
                                        <td>{{ $list->sort }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteData('{{ $list->id }}')">刪除</button>
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

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [
                    [4, 'asc']
                ]
            });
        });
        // $('.btn-danger').click(function(){
        //     var listid = $(this).data("listid");
        //     if (confirm('確定要刪除此媒體報導？')){
        //         event.preventDefault();
        //         $('.delete-form[data-listid="' + listid + '"]').submit();
        //     }
        // });
        function deleteData(id) {
            console.log(id);

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'delete');
            formData.append('id', id);

            Swal.fire({
                title: `確認要刪除資料嗎?`,
                showDenyButton: true,
                confirmButtonText: '取消',
                denyButtonText: '刪除',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    fetch('{{ route('back.blog_news.delete') }}', {
                        method: 'post',
                        body: formData,
                    }).then((res) => {
                        return res.text();
                    }).then((data) => {
                        console.log(data);
                        if (data == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: '刪除成功',
                            }).then((res) => {
                                location.reload();
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
