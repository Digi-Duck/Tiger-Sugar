@extends('layouts.backend-template')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ asset('css/franchiseeExplain.css') }}">
@endsection


@section('main')
    <div class="container" style="padding:0px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        常見問題管理
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('back.franchise_explain.store') }}"
                            enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">標題</label>
                                <div class="col-10">
                                    <textarea class="form-control" id="title" rows="3" name="title" required value="{{ old('title', $title ?? '') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-2 col-form-label">內文</label>
                                <div class="col-10">
                                    <textarea class="form-control" id="content" rows="3" name="content" required value="{{ old('content', $content ?? '') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="english_title" class="col-2 col-form-label">標題 (英)</label>
                                <div class="col-10">
                                    <textarea class="form-control" id="english_title" rows="3" name="english_title" required value="{{ old('english_title', $english_title ?? '') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="english_content" class="col-2 col-form-label">內文 (英)</label>
                                <div class="col-10">
                                    <textarea class="form-control" rows="3" id="english_content" name="english_content" type="text" required value="{{ old('english_content', $english_content ?? '') }}"></textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.franchise_explain.index') }}">
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
