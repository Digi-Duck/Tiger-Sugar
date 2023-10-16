@extends('layouts.backend-template')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        媒體報導管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('back.blog_news.store') }}" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <div class="form-group row">
                                <label for="author" class="col-2 col-form-label">來源出處</label>
                                <div class="col-10">
                                    <input class="form-control" id="author" name="author" required value="{{ old('author',$author ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-2 col-form-label">文章連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="link" name="link" required value="{{ old('link',$link ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">文章標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" required value="{{ old('title',$title ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="info" class="col-2 col-form-label">文章簡述</label>
                                <div class="col-10">
                                    <textarea  class="form-control" id="info" name="info" required value="{{ old('info',$info ?? '') }}"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="main_photo" class="col-2 col-form-label">上傳代表圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control-file" id="main_photo" name="main_photo" accept="image/*" required>
                                </div>
                                <div class="col-12">
                                    {{--<p class="text-danger">*注意：建議尺寸：525 * 200 (px)</p>--}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="{{ old('sort',$sort ?? '1') }}" min="0" max="999">
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.blog_news.index') }}">
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
