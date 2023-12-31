@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        店舖管理-新增
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form method="POST" action="{{route('back.shop.update',['id'=>$list->id])}}" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <div class="form-group row">
                                <label for="city_id" class="col-2 col-form-label">國家</label>
                                <div class="col-10">
                                    <select class="form-control" name="city_id" id="city_id" required>
                                        @foreach($countries as $country)
                                            <optgroup label="{{$country->country_name}}">
                                                @foreach($country->city as $city)
                                                    <option value="{{$city->id}}" @if($list->city_id == $city->id) selected @endif>{{$city->city_name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shop_name" class="col-2 col-form-label">店名</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="shop_name" name="shop_name" value="{{$list->name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-2 col-form-label">地址</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="address" name="address" value="{{$list->address}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-2 col-form-label">電話</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$list->phone}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="{{$list->sort}}" min="0" max="999">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.shop.index') }}">
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
