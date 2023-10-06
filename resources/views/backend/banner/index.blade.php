@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        廣告橫幅管理
                    </h4>
                    <div class="card-body">
                        <form action="" method="GET" class="d-flex column-gap-3" role="search">
                            <input class="form-control mb-3" name="keyword" type="text" placeholder="搜尋名稱或描述" aria-label="Search"></input>
                            <button class="btn btn-success flex-shrink-0" type="submit">搜尋</button>
                        </form>
                        <a class="btn btn-success" href="{{ route('back.banner.create') }}">新增</a>
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
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $list->type }}</td>
                                        <td>
                                            @if ($list->type == '圖片')
                                                <img src="{{ $list->pc_image_url }}" alt="" height="100">
                                            @endif
                                            @if ($list->type == '影片')
                                                <iframe frameborder="0" height="100%" width="100%"
                                                    src="https://youtube.com/embed/{{ $list->pc_video_url }}?autoplay=1&controls=0&showinfo=0&autohide=1">
                                                </iframe>
                                            @endif

                                        </td>
                                        <td>{{ $list->image_alt }}</td>
                                        <td>{{ $list->sort }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('back.banner.edit', ['id' => $list->id]) }}">編輯</a>
                                            @if ($list->id != 1)
                                                <form action="{{ route('back.banner.delete', ['id' => $list->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" type="submit"
                                                        data-listid="{{ $list->id }}">刪除</button>
                                                </form>
                                            @endif
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        // $(document).ready(function() {
        //     $('#table').DataTable({
        //         "order": [
        //             [3, 'asc']
        //         ]
        //     });
        // });
        // $('.btn-danger').click(function() {
        //     var listid = $(this).data("listid");
        //     if (confirm('確定要刪除此Banner？')) {
        //         event.preventDefault();
        //         $('.delete-form[data-listid="' + listid + '"]').submit();
        //     }
        // });
    </script>
@endsection
