@extends('layouts.backend-template')

@section('css')
    <style>
        .max-height-for-container {
            max-height: calc(90vh - 76px)
        }
    </style>
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        全球據點管理-國家列表
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <a class="btn btn-success" href="{{ route('back.country.create') }}">新增國家</a>
                        <hr>

                        <form action="{{ route('back.country.index') }}" method="GET" id="page-numbers" role="search"
                            class="d-flex justify-content-between align-items-center mb-3">
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
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $list->continent->continent_tw }}｜{{ $list->continent->continent_en }}</td>
                                        <td>{{ $list->country_name }}｜{{ $list->country_en_name }}</td>
                                        <td><img src="{{ $list->country_photo }}" width="200" alt=""></td>
                                        <td>{{ $list->shops_count }}</td>
                                        <td>{{ $list->sort }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('back.country.edit', ['id' => $list->id]) }}">編輯</a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteData('{{ $list->id }}','{{ $list->country_name }}')">刪除</button>
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
        function deleteData(id, country_name) {
            console.log(id);

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'delete');
            formData.append('id', id);

            Swal.fire({
                title: `確認要刪除"${country_name}資料嗎?`,
                showDenyButton: true,
                confirmButtonText: '取消',
                denyButtonText: '刪除',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    fetch('{{ route('back.country.delete') }}', {
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
                                text: `目前'${country_name}'類型尚有產品存在，請先刪除產品或更換產品類型`,
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
