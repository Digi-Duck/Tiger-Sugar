@extends('layouts.backend-template')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品經銷來信管理-查看更多
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form>
                            @csrf
                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">寄件日期</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$contact_info->created_at}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">姓名</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$contact_info->name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">出生年月日</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$contact_info->birthday}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">Email</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$contact_info->email}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">聯絡電話</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$contact_info->phone}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">聯絡地址</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$contact_info->address}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">預定加盟城市</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$country}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">預定經銷方式：</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$contact_info->channel}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">預定經銷產品：</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="@foreach($products as $product){{$product}}  @endforeach">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="now_image_mb" class="col-2 col-form-label">其他</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" readonly value="{{$contact_info->other}}">
                                </div>
                            </div>

                            <hr>
                        </form>

                        <a href="/admin/distribution" class="btn btn-primary d-block col-2 mx-auto">回到上一頁</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
