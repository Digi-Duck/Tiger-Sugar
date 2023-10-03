@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        媒體露出 - 編輯
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/media/update/{{$id}}" enctype="multipart/form-data">
                            @csrf

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">影片</a>
                                </li>
                            </ul>
                            <hr>

                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label" style="text-align: center">影片名字</label>

                                <div class="col-10">
                                    <input type="text" class="form-control" id="pc_video_url" name="name" value="{{$info->name}}">
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
                            <button type="submit" class="btn btn-primary d-block mx-auto">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
            if($(e.target).attr('id') == 'pills-home-tab'){
                document.querySelector("#media_name").setAttribute('value','影片');
            }
        })
    </script>
@endsection