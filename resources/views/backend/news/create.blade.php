@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        最新消息管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/news/store" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="info" class="col-2 col-form-label">內容</label>
                                <div class="col-10">
                                    <textarea class="summernote" name="info" id="description" cols="30" rows="10"></textarea>
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
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            })
        });
    </script>
@endsection