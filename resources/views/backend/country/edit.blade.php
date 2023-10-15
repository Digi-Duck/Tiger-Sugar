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
                        全球據點管理-編輯國家
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form method="POST" action="{{ route('back.country.update', ['id' => $info->id]) }}"
                            enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <div class="form-group row">
                                <label for="continent_id" class="col-2 col-form-label">洲</label>
                                <div class="col-10">
                                    <select class="form-control" name="continent_id" id="continent_id" required>
                                        @foreach ($continents as $continent)
                                            <option @if ($continent->id == $info->country_id) selected @endif
                                                value="{{ $continent->id }}">
                                                {{ $continent->continent_tw }}({{ $continent->continent_en }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">國家名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="country_name" name="country_name"
                                        value="{{ $info->country_name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_en_name" class="col-2 col-form-label">國家英文名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="country_en_name" name="country_en_name"
                                        value="{{ $info->country_en_name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">當前代表圖片</label>
                                <div class="col-10">
                                    <img src="{{ $info->country_photo }}" alt="" width="250">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_photo" class="col-2 col-form-label">更新當前代表圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control-file" id="country_photo" name="country_photo"
                                        accept="image/*" @if ($info->country_photo == null) required @endif>
                                </div>
                                <div class="col-12">
                                    <p class="text-danger">
                                        *注意：1.上傳後，將覆蓋掉原有照片！
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.建議尺寸：525
                                        * 200 (px)
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fb_link" class="col-2 col-form-label">FB連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="fb_link" name="fb_link" value="{{ $info->fb_link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ig_link" class="col-2 col-form-label">IG連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="ig_link" name="ig_link" value="{{ $info->ig_link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-2 col-form-label">官方網站連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="link" name="link" value="{{ $info->link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="weibo_link" class="col-2 col-form-label">微博連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="weibo_link" name="weibo_link"
                                        value="{{ $info->weibo_link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required
                                        value="{{ $info->sort }}" min="0" max="999">
                                </div>
                            </div>
                            <hr>

                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.country.index') }}">
                                    <button type="button" class="btn btn-primary d-block">返回</button>
                                </a>
                                <button type="submit" class="btn btn-primary d-block">送出修改</button>
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
