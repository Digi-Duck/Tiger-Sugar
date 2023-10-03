@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        區域-編輯
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/area/update/{{$list->id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="franchise_id" class="col-2 col-form-label">國家</label>
                                <div class="col-10">
                                    <select class="form-control" name="franchise_id" id="franchise_id" required>
                                        @foreach($types as $type)
                                            <option @if($list->franchise_id == $type->id) selected @endif value="{{$type->id}}">{{$type->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="area_name" class="col-2 col-form-label">區域名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="area_name" name="area_name" value="{{$list->area_name}}" required>
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