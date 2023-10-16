@extends('layouts.backend-template')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        媒體露出 - 新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('back.media.store') }}" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label" style="text-align: center">影片名字</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="pc_video_url" name="name" required value="{{ old('name', $name ?? '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <p class="col-2" style="margin-top:35px;text-align: center">上傳影片</p>
                                        <div class="col-10" style="max-width: 300px;margin-top:30px">
                                            <input type="file" id="customFile" name="video_file" accept="video/mp4,video/x-m4v,video/*" required>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label for="sort" class="col-2 col-form-label" style="text-align: center">權重</label>
                                        <div class="col-10">
                                            <input type="number" class="form-control" id="sort" name="sort" required value="{{ old('sort',$sort ?? '1') }}" min="0" max="999">
                                        </div>
                                    </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.media.index') }}">
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
