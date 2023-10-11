@extends('layouts.backend-template')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品類型管理-編輯
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('back.products_type.update',['id' => $list->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" value="{{$list->sort}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tw_name" class="col-2 col-form-label">商品種類 (中)</label>
                                <div class="col-10">
                                    <input class="form-control" id="tw_name" name="tw_name" value="{{$list->tw_name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="en_name" class="col-2 col-form-label">商品種類 (英)</label>
                                <div class="col-10">
                                    <input class="form-control" id="en_name" name="en_name"  value="{{$list->en_name}}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.products_type.index') }}">
                                    <button type="button" class="btn btn-primary d-block">返回</button>
                                </a>
                                <button type="submit" class="btn btn-primary d-block">更新</button>
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
