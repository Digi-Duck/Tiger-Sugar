@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        商品類型管理-新增
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form method="POST" action="{{ route('back.products_type.store') }}" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" min="1" value="{{ old('sort',$sort ?? '1') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tw_name" class="col-2 col-form-label">商品種類 (中)</label>
                                <div class="col-10">
                                    <input class="form-control" id="tw_name" name="tw_name" required value="{{ old('tw_name',$tw_name ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="en_name" class="col-2 col-form-label">商品種類 (英)</label>
                                <div class="col-10">
                                    <input class="form-control" id="en_name" name="en_name" required value="{{ old('en_name',$en_name ?? '') }}">
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.products_type.index') }}">
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
