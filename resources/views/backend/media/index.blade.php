@extends('layouts.backend-template')

@section('main')
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        媒體露出
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="{{ route('back.media.create') }}">新增</a>
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
                                @foreach ($mediaes as $media)
                                    <tr>
                                        <td>{{ $media->name }}</td>
                                        <td>
                                            <video controls width="300">
                                                <source src="{{ $media->link }}" type="video/mp4">
                                            </video>
                                        </td>
                                        <td>{{ $media->sort }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('back.media.edit', ['id' => $media->id]) }}">編輯</a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteData('{{ $media->id }}','{{ $media->name }}')">刪除</button>
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




    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [
                    [2, 'asc']
                ]
            });
        });

        function deleteData(id, name) {
            console.log(id);

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'delete');
            formData.append('id', id);

            Swal.fire({
                title: `確認要刪除${name}影片嗎?`,
                showDenyButton: true,
                confirmButtonText: '取消',
                denyButtonText: '刪除',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    fetch('{{ route('back.media.delete') }}', {
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
