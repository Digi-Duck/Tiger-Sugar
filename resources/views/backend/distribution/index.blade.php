@extends('layouts.backend-template')



@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品經銷來信管理
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <button id="excel-btn" type="button" class="btn btn-success me-2">匯出為excel</button>
                        <hr>
                        <form action="{{ route('back.distribution.index') }}" method="GET" id="page-numbers" role="search"
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

                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>姓名</th>
                                <th>出生年月日</th>
                                <th>Email</th>
                                <th>電話</th>
                                <th>聯絡地址</th>
                                <th>預定經銷方式</th>
                                <th>預定經銷國家</th>
                                <th>其他</th>
                                <th>寄件日期</th>
                                <th width="100">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->id}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->birthday}}</td>
                                    <td>{{$list->email}}</td>
                                    <td>{{$list->phone}}</td>
                                    <td>{{$list->address}}</td>
                                    <td>{{$list->channel}}</td>
                                    <td>{{$list->city}}</td>
                                    <td>{{$list->other}}</td>
                                    <td>{{$list->created_at}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('back.distribution.show',['id'=> $list->id]) }}">查看更多</a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteData('{{ $list->id }}')">刪除</button>
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

    <form id="clear-distribution-form" action="" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let excelBtn = document.querySelector('#excel-btn');
    excelBtn.addEventListener('click', function() {
        fetch('{{ route('back.distribution.excel') }}', {
            method: 'get',
        }).then((res) => {
            console.log(res);
            return res.json();
        }).then((data) => {
            const workbook = new ExcelJS.Workbook();
            workbook.creator = 'Ruyut';
            workbook.lastModifiedBy = 'Ruyut';
            workbook.created = new Date(2023, 4, 8);
            workbook.modified = new Date(2023, 4, 8);
            workbook.lastPrinted = new Date(2023, 4, 8);
            const worksheet = workbook.addWorksheet('活頁簿1');
            worksheet.getCell(1, 1).value = 'No';
            worksheet.getCell(1, 2).value = '姓名';
            worksheet.getCell(1, 3).value = '出生年月日';
            worksheet.getCell(1, 4).value = 'Email';
            worksheet.getCell(1, 5).value = '電話';
            worksheet.getCell(1, 6).value = '聯絡地址';
            worksheet.getCell(1, 7).value = '預定經銷方式';
            worksheet.getCell(1, 8).value = '預定經銷國家';
            worksheet.getCell(1, 9).value = '其他';
            worksheet.getCell(1, 10).value = '寄件日期';
            i = 1;
            data.forEach(function(item) {
                console.log(item);
                i++;
                // worksheet.getCell(y, x).value = item;
                worksheet.getCell(i, 1).value = item.id;
                worksheet.getCell(i, 2).value = item.name;
                worksheet.getCell(i, 3).value = item.birthday;
                worksheet.getCell(i, 4).value = item.email;
                worksheet.getCell(i, 5).value = item.phone;
                worksheet.getCell(i, 6).value = item.address;
                worksheet.getCell(i, 7).value = item.channel;
                worksheet.getCell(i, 8).value = item.city;
                worksheet.getCell(i, 9).value = item.other;
                worksheet.getCell(i, 10).value = item.updated_at;
            });

            workbook.xlsx.writeBuffer().then(function(buffer) {
                saveAs(
                    new Blob([buffer], {
                        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    }),
                    '老虎堂商品經銷來信.xlsx'
                );
            });
        });
    });

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
                fetch('{{ route('back.distribution.delete') }}', {
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
