@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品管理-編輯
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form method="POST" action="{{ route('back.products.update', ['id' => $list->id]) }}"
                            enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort"
                                        value="{{ $list->sort }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_zh" class="col-2 col-form-label">商品名稱(中)</label>
                                <div class="col-10">
                                    <input class="form-control" id="title_zh" name="title_zh" value="{{ $list->title_zh }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_en" class="col-2 col-form-label">商品名稱(英)</label>
                                <div class="col-10">
                                    <input class="form-control" id="title_en" name="title_en" value="{{ $list->title_en }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_id" class="col-2 col-form-label">分類</label>
                                <div class="col-10">
                                    <select class="form-control" name="type_id" id="type_id" value="{{ $list->type_id }}"
                                        required>
                                        @foreach ($types as $type)
                                            @if ($list->type_id == $type->id)
                                                <option value="{{ $type->id }}" selected>{{ $type->tw_name }} |
                                                    {{ $type->en_name }}</option>
                                            @else
                                                <option value="{{ $type->id }}">{{ $type->tw_name }} |
                                                    {{ $type->en_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="info" class="col-2 col-form-label">商品簡介</label>
                                <div class="col-10">
                                    <textarea name="info" id="info" rows="10" style="width: 100%">{{ $list->info }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="launch_date" class="col-2 col-form-label">上市日期</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="launch_date" name="launch_date"
                                        value="{{ $list->launch_date }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="weight" class="col-2 col-form-label">淨重(克)</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="weight" name="weight"
                                        value="{{ $list->weight }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shelf_life" class="col-2 col-form-label">保存期限(月)</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="shelf_life" name="shelf_life"
                                        value="{{ $list->shelf_life }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="preserve" class="col-2 col-form-label">保存方式</label>
                                <div class="col-10">
                                    <textarea name="preserve" id="preserve" rows="10" style="width: 100%">{{ $list->preserve }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-2 col-form-label">內容</label>
                                <div class="col-10">
                                    <textarea class="summernote" name="content" id="content" cols="30" rows="10">{{ $list->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notes" class="col-2 col-form-label">注意事項</label>
                                <div class="col-10">
                                    <textarea class="summernote" name="notes" id="notes" cols="30" rows="10">{{ $list->notes }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="video" class="col-2 col-form-label">影片連結</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="video" name="video"
                                        value="{{ $list->video }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">主要圖片(目前圖片)</label>
                                <div class="col-10">
                                    <img src="{{ $list->img }}" alt="" width="400">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">主要圖片(重新上傳)</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" id="img" name="img"
                                        accept="image/*" vlaue>
                                </div>
                                <div class="col-12">
                                    <p class="text-danger">*注意：建議尺寸：400 * 435 (px)</p>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">其他圖片(目前圖片)</label>
                                <div class="col-10 row">
                                    @foreach ($list->productsImgs as $img)
                                        <div class="imgs_area mx-2 mb-2">
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteData('{{ $img->id }}')">刪除</button>
                                            <img src="{{ $img->img_url }}" alt="" width="200">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="imgs" class="col-2 col-form-label">其他圖片(新增圖片)</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" id="imgs"
                                        name="imgs[]"accept="image/*" multiple>
                                </div>
                                <div class="col-12">
                                    <p class="text-danger">*注意：建議尺寸：400 * 435 (px)</p>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.products.index') }}">
                                    <button type="button" class="btn btn-primary d-block">返回</button>
                                </a>
                                <button type="submit" class="btn btn-primary d-block">修改</button>
                            </div>
                        </form>
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
            console.log(id);

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'delete');
            formData.append('id', id);

            Swal.fire({
                title: `確認要刪除這張圖片嗎?`,
                showDenyButton: true,
                confirmButtonText: '取消',
                denyButtonText: '刪除',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    fetch('{{ route('back.products_img.delete') }}', {
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
