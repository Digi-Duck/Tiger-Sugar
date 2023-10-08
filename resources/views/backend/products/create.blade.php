@extends('layouts.backend-template')

@section('css')
    <style>
        .max-height-for-container {
            max-height: 440px;
        }
    </style>
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品管理-新增
                    </h4>
                    <div class="card-body">
                        @if ($errors->all())
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first() }}</strong>
                            </span>
                        @endif
                        <form method="POST" action="{{ route('back.products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="container overflow-y-auto max-height-for-container">
                                <div class="form-group row">
                                    <label for="sort" class="col-2 col-form-label">權重</label>
                                    <div class="col-10">
                                        <input type="number" class="form-control" id="sort" name="sort" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title_zh" class="col-2 col-form-label">商品名稱(中)</label>
                                    <div class="col-10">
                                        <input class="form-control" id="title_zh" name="title_zh" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title_en" class="col-2 col-form-label">商品名稱(英)</label>
                                    <div class="col-10">
                                        <input class="form-control" id="title_en" name="title_en" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type_id" class="col-2 col-form-label">分類</label>
                                    <div class="col-10">
                                        <select class="form-control" name="type_id" id="type_id" required>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->tw_name }} |
                                                    {{ $type->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="info" class="col-2 col-form-label">商品簡介</label>
                                    <div class="col-10">
                                        <textarea name="info" id="info" rows="10" style="width: 100%"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="launch_date" class="col-2 col-form-label">上市日期</label>
                                    <div class="col-10">
                                        <input type="date" class="form-control" id="launch_date" name="launch_date"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="weight" class="col-2 col-form-label">淨重(克)</label>
                                    <div class="col-10">
                                        <input type="number" class="form-control" id="weight" name="weight" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shelf_life" class="col-2 col-form-label">保存期限(月)</label>
                                    <div class="col-10">
                                        <input type="number" class="form-control" id="shelf_life" name="shelf_life"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="preserve" class="col-2 col-form-label">保存方式</label>
                                    <div class="col-10">
                                        <textarea name="preserve" id="preserve" rows="10" style="width: 100%"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-2 col-form-label">內容</label>
                                    <div class="col-10">
                                        <textarea class="summernote" name="content" id="content" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="notes" class="col-2 col-form-label">注意事項</label>
                                    <div class="col-10">
                                        <textarea class="summernote" name="notes" id="notes" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="video" class="col-2 col-form-label">影片連結</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" id="video" name="video">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="img" class="col-2 col-form-label">主要圖片</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" id="img" name="img" accept="image/*"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-danger">*注意：建議尺寸：400 * 435 (px)</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="imgs" class="col-2 col-form-label">其他圖片(多張)</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" id="imgs" name="imgs[]"
                                            multiple accept="image/*">
                                    </div>
                                    <div class="col-12">
                                        <p class="text-danger">*注意：建議尺寸：400 * 435 (px)</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">新增</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            })
        });
    </script>
@endsection
