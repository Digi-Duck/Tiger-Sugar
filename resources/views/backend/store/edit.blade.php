@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        店舖管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/store/update/{{$list->id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="area_id" class="col-2 col-form-label">國家</label>
                                <div class="col-10">
                                    <select class="form-control" name="area_id" id="area_id" required>
                                        @foreach($countries as $country)
                                            <optgroup label="{{$country->country_name}}">
                                                @foreach($country->area as $area)
                                                    <option value="{{$area->id}}" @if($list->area_id == $area->id) selected @endif>{{$area->area_name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="store_name" class="col-2 col-form-label">店名</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="store_name" name="store_name" value="{{$list->name}}">
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
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$list->phone}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="{{$list->sort}}" min="0" max="999">
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