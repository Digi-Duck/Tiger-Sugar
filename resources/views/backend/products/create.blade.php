@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品管理-新增
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        @if ($errors->all())
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first() }}</strong>
                            </span>
                        @endif
                        <form method="POST" action="{{ route('back.products.store') }}" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" value="{{ old('sort', $sort ?? '1') }}" class="form-control"
                                        id="sort" name="sort" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_zh" class="col-2 col-form-label">商品名稱(中)</label>
                                <div class="col-10">
                                    <input class="form-control" id="title_zh" name="title_zh" required
                                        value="{{ old('title_zh', $title_zh ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_en" class="col-2 col-form-label">商品名稱(英)</label>
                                <div class="col-10">
                                    <input class="form-control" id="title_en" name="title_en" required
                                        value="{{ old('title_en', $title_en ?? '') }}">
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
                                    <textarea name="info" id="info" rows="10" style="width: 100%" value="{{ old('info', $info ?? '') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="launch_date" class="col-2 col-form-label">上市日期</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="launch_date" name="launch_date" required
                                        value="{{ old('launch_date', $launch_date ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="weight" class="col-2 col-form-label">淨重(克)</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="weight" name="weight" required
                                        value="{{ old('weight', $weight ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shelf_life" class="col-2 col-form-label">保存期限(月)</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="shelf_life" name="shelf_life" required
                                        value="{{ old('shelf_life', $shelf_life ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="preserve" class="col-2 col-form-label">保存方式</label>
                                <div class="col-10">
                                    <textarea name="preserve" id="preserve" rows="10" style="width: 100%"
                                        value="{{ old('preserve', $preserve ?? '') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-2 col-form-label">內容</label>
                                <div class="col-10">
                                    <textarea class="summernote" name="content" id="content" cols="30" rows="10"
                                        value="{{ old('content', $content ?? '') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notes" class="col-2 col-form-label">注意事項</label>
                                <div class="col-10">
                                    <textarea class="summernote" name="notes" id="notes" cols="30" rows="10"
                                        value="{{ old('notes', $notes ?? '') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="video" class="col-2 col-form-label">影片連結</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="video" name="video"
                                        value="{{ old('video', $video ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">主要圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" id="img" name="img"
                                        accept="image/*" required>
                                </div>
                                <div class="col-12">
                                    <p class="text-danger">*注意：建議尺寸：400 * 435 (px)</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="imgs" class="col-2 col-form-label">其他圖片(多張)</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" id="imgs" name="imgs[]" multiple
                                        accept="image/*">
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
                                <button type="submit" class="btn btn-primary d-block">新增</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
