@extends('layouts.backend-template')

@section('css')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        最新消息管理-新增
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form method="POST" action="{{ route('back.news.store') }}" enctype="multipart/form-data">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" value="{{ old('title',$title ?? '') }}" required>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="info" class="col-2 col-form-label">內容</label>
                                <div class="col-10">
                                    <textarea class="summernote" name="info" id="description" cols="30" rows="10" value="{{ old('info',$info ?? '') }}" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" value="{{ old('sort',$sort ?? '1') }}" required min="0" max="999">
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.news.index') }}">
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
