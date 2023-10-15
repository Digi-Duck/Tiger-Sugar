@extends('layouts.backend-template')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        媒體露出 - 編輯
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('back.media.update', ['id' => $id]) }}" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label" style="text-align: center">影片名字</label>

                                <div class="col-10">
                                    <input type="text" class="form-control" id="pc_video_url" name="name" value="{{$info->name}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-2" style="margin-top:30px;text-align: center">原先影片</p>
                                <div class="col-10" style="max-width: 300px;margin-top:30px">
                                    <video controls width="300">
                                        <source src="{{$info->link}}" type="video/mp4">
                                    </video>
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-2" style="margin-top:30px;text-align: center">重新上傳影片</p>
                                <div class="col-10" style="max-width: 300px;margin-top:30px">
                                    <input type="file" id="customFile" name="video_file" accept="video/mp4,video/x-m4v,video/*">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label" style="text-align: center">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="{{$info->sort}}" min="0" max="999">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.media.index') }}">
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
