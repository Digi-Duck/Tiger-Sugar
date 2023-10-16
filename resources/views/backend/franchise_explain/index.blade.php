@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container" style="padding:0px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        常見問題管理
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <a class="btn btn-success" href="{{ route('back.franchise_explain.create') }}">新增</a>
                        <span>最多顯示20個常見問題</span>
                        <hr>

                        <form action="{{ route('back.franchise_explain.index') }}" method="GET" id="page-numbers"
                            role="search" class="d-flex justify-content-between align-items-center mb-3">
                            @csrf
                            <div>
                                <span>請選擇顯示幾筆資料：</span>
                                <select id="page-select" onchange="changePages()" name="page_numbers">
                                    @if ($page_numbers == 100)
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100" selected>100</option>
                                    @elseif ($page_numbers == 50)
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50" selected>50</option>
                                        <option value="100">100</option>
                                    @elseif ($page_numbers == 25)
                                        <option value="10">10</option>
                                        <option value="25" selected>25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    @else
                                        <option value="10" selected>10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    @endif
                                </select>
                                <span>筆</span>
                            </div>
                            <div class="d-flex justify-between">
                                <input class="form-control me-2" name="keyword" type="text" placeholder="搜尋名稱或描述"
                                    aria-label="Search" value="{{ $keyword }}">
                                <button class="btn btn-success flex-shrink-0 py-0" type="submit">搜尋</button>
                            </div>
                        </form>

                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>標題(100字符以內)</th>
                                    <th>內文(500字符以內)</th>
                                    <th>英文標題(100字符以內)</th>
                                    <th>英文內文(500字符以內)</th>
                                    <th width="10%" style="text-align: center">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>
                                            <div class="scrollable-content">{{ $list->title }}</div>
                                        </td>
                                        <td>
                                            <div class="scrollable-content">{{ $list->content }}</div>
                                        </td>
                                        <td>
                                            <div class="scrollable-content">{{ $list->english_title }}</div>
                                        </td>

                                        <td>
                                            <div class="scrollable-content">{{ $list->english_content }}</div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteData('{{ $list->id }}','{{ $list->title }}')">刪除</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between align-items-center">
                            @if ($count == 0)
                                <div>目前尚無資料</div>
                            @elseif ($count <= $page_numbers)
                                <div>正在顯示{{ $count }}筆資料中，第1筆到第{{ $count }}筆資料</div>
                            @elseif ($count > $page_numbers * $page)
                                <div>
                                    正在顯示{{ $count }}筆資料中，第{{ $page_numbers * ($page - 1) + 1 }}筆到第{{ $page_numbers * $page }}筆資料
                                </div>
                            @else
                                <div>
                                    正在顯示{{ $count }}筆資料中，第{{ $page_numbers * ($page - 1) + 1 }}筆到第{{ $count }}筆資料
                                </div>
                            @endif
                            <div>
                                {{ $lists->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteData(id) {
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
                    fetch('{{ route('back.franchise_explain.delete') }}', {
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

        function changePages() {
            let pageSelect = document.querySelector('#page-select');
            let pageNumbers = document.querySelector('#page-numbers');
            console.log(pageSelect.value);
            pageNumbers.submit();
        }
    </script>
@endsection
