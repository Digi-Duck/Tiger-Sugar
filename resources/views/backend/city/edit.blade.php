@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        全球據點管理-城市編輯
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/city/update/{{$list->id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="country_id" class="col-2 col-form-label">國家</label>
                                <div class="col-10">
                                    <select class="form-control" name="country_id" id="country_id" required>
                                        @foreach($types as $type)
                                            <option @if($list->country_id == $type->id) selected @endif value="{{$type->id}}">{{$type->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city_name" class="col-2 col-form-label">城市名稱(中)</label>
                                <div class="col-10">
                                    <input class="form-control" id="city_name" name="city_name" value="{{$list->city_name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city_name_en" class="col-2 col-form-label">城市名稱(英)</label>
                                <div class="col-10">
                                    <input class="form-control" id="city_name_en" name="city_name_en" value="{{$list->city_name_en}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">當前代表圖片</label>
                                <div class="col-10">
                                    <img src="{{$list->city_photo}}" alt="" width="250">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city_photo" class="col-2 col-form-label">更新當前代表圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control-file" id="city_photo" name="city_photo">
                                </div>
                                <div class="col-12">
                                    <p class="text-danger">
                                        *注意：1.上傳後，將覆蓋掉原有照片！
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.建議尺寸：525 * 200 (px)
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.若無上傳圖片，則使用國家代表圖片。
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fb_link" class="col-2 col-form-label">FB連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="fb_link" name="fb_link" value="{{$list->fb_link}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ig_link" class="col-2 col-form-label">IG連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="ig_link" name="ig_link" value="{{$list->ig_link}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-2 col-form-label">官方網站連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="link" name="link" value="{{$list->link}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="weibo_link" class="col-2 col-form-label">微博連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="weibo_link" name="weibo_link" value="{{$list->weibo_link}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort"  required value="{{$list->sort}}" min="0" max="999">
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
