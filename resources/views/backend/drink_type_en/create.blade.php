@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        飲品類型管理(英)-新增
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form method="POST" action="{{ route('back.drink_type_en.store') }}" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <div class="form-group row">
                                <label for="type_name" class="col-2 col-form-label">類型名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="type_name" name="type_name" required value="{{ old('type_name', $type_name ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_info" class="col-2 col-form-label">副標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="type_info" name="type_info" value="{{ old('type_info', $type_info ?? '') }}">
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
                                <a href="{{ route('back.drink_type_en.index') }}">
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
