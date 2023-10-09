@extends('layouts.backend-template ')

@section('main')
    @if (Session::has('message'))
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品類型管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="{{ route('back.products_type.create') }}">新增</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    {{-- <th>上傳時間</th> --}}
                                    <th>商品類型(中)</th>
                                    <th>商品類型(英)</th>
                                    <th>權重</th>
                                    <th width="80">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $list)
                                    <tr>
                                        {{-- <td>{{$list->created_at}}</td> --}}
                                        <td>{{ $list->tw_name }}</td>
                                        <td>{{ $list->en_name }}</td>
                                        <td>{{ $list->sort }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('back.products_type.edit', ['id' => $list->id]) }}">編輯</a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteData('{{ $list->id }}','{{ $list->tw_name }}')">刪除</button>
                                            <form class="delete-form"
                                                action="/admin/products_type/delete/{{ $list->id }}" method="POST"
                                                style="display: none;" data-listid="{{ $list->id }}">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // $(document).ready(function() {
        //     $('#table').DataTable({
        //         "order": [
        //             [2, 'asc']
        //         ]
        //     });
        // });
        // $('.btn-danger').click(function() {
        //     var listid = $(this).data("listid");
        //     if (confirm('確定要刪除此最新消息？')) {
        //         event.preventDefault();
        //         $('.delete-form[data-listid="' + listid + '"]').submit();
        //     }
        // });



        // sweet alert
        function deleteData(id, tw_name) {
            console.log(id);
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'delete');
            formData.append('id', id);

            Swal.fire({
                title: `確認要刪除"${tw_name}"資料嗎?`,
                showDenyButton: true,
                confirmButtonText: '取消',
                denyButtonText: '刪除',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    fetch('{{ route('back.products_type.delete') }}', {
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
                                text: `目前'${tw_name}'類型尚有產品存在，請先刪除產品或更換產品類型`,
                            });
                        }
                    });
                }
            });
        }
    </script>

@endsection
