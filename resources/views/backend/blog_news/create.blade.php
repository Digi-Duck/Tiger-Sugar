@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        媒體報導管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/blog_news/store" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="author" class="col-2 col-form-label">來源出處</label>
                                <div class="col-10">
                                    <input class="form-control" id="author" name="author" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-2 col-form-label">文章連結</label>
                                <div class="col-10">
                                    <input class="form-control" id="link" name="link" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">文章標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="info" class="col-2 col-form-label">文章簡述</label>
                                <div class="col-10">
                                    <textarea  class="form-control" id="info" name="info"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="main_photo" class="col-2 col-form-label">上傳代表圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control-file" id="main_photo" name="main_photo" required>
                                </div>
                                <div class="col-12">
                                    {{--<p class="text-danger">*注意：建議尺寸：525 * 200 (px)</p>--}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="0" min="0" max="999">
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">新增</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection