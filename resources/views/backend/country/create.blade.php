@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        全球據點管理-新增國家
                    </h4>

                    <div class="card-body">
                        <form method="POST" action="{{ route('back.country.store') }}" enctype="multipart/form-data">
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
                                            <option value="{{ $continent->id }}">
                                                {{ $continent->continent_tw }}({{ $continent->continent_en }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">國家名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="country_name" name="country_name" value="{{ old('country_name',$country_name ?? '') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_en_name" class="col-2 col-form-label">國家英文名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="country_en_name" name="country_en_name" value="{{ old('country_en_name',$country_en_name ?? '') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_photo" class="col-2 col-form-label">上傳代表圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control-file" id="country_photo" name="country_photo"
                                        accept="image/*" required>
                                </div>
                                <div class="col-12">
                                    <p class="text-danger">*注意：建議尺寸：525 * 200 (px)</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fb_link" class="col-2 col-form-label">FB連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="fb_link" name="fb_link" value="{{ old('fb_link',$fb_link ?? '') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ig_link" class="col-2 col-form-label">IG連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="ig_link" name="ig_link" value="{{ old('ig_link',$ig_link ?? '') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-2 col-form-label">官方網站連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="link" name="link" value="{{ old('link',$link ?? '') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="weibo_link" class="col-2 col-form-label">微博連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="weibo_link" name="weibo_link" value="{{ old('weibo_link',$weibo_link ?? '') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required
                                        value="{{ old('sort', $sort ?? '1') }}" min="0" max="999">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.country.index') }}">
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
