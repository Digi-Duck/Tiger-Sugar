@extends('layouts.backend-template')

@section('css')
    <style>
        .cursor-p {
            cursor: pointer;
        }
    </style>
@endsection
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        廣告橫幅管理-新增
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form method="POST" action="{{ route('back.banner.store') }}" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            @csrf
                            <input hidden class="form-control" name="type" id="banner_type" value="圖片" required>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active cursor-p" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" role="tab" aria-controls="pills-home"
                                        aria-selected="true">圖片</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link cursor-p" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">影片</a>
                                </li>
                            </ul>

                            <hr>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="form-group row">
                                        <label for="pc_image_url" class="col-2 col-form-label">上傳圖片 <span class="text-danger fs-4" >*</span> </label>
                                        <div class="col-10 d-flex flex-row">
                                            <input type="file" class="form-control-file" id="pc_image_url" placeholder="請上傳圖檔"
                                                name="pc_image_url" accept="image/*" required>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-danger">*注意：建議尺寸：1920 * 907 (px)</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mb_image_url" class="col-2 col-form-label">上傳圖片(手機版) <span class="text-danger fs-4" >*</span> </label>
                                        <div class="col-10 d-flex flex-row">
                                            <input type="file" class="form-control-file" id="mb_image_url" placeholder="請上傳圖檔"
                                                name="mb_image_url" accept="image/*" required>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-danger">*注意：建議尺寸：420 * 640 (px)</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image_alt" class="col-2 col-form-label">圖片替代文字(alt) <span class="text-danger fs-4" >*</span> </label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="image_alt" name="image_alt"
                                                required placeholder="當圖片失效時，用文字來描述圖片內容" value="{{ old('image_alt',$image_alt ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link_url" class="col-2 col-form-label">圖片連結 </label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="link_url" placeholder="點擊圖片後會導向的網頁連結" name="link_url" value="{{ old('link_url',$link_url ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link_url" class="col-2 col-form-label">另開視窗 </label>
                                        <div class="col-10" style="padding-left: 35px">
                                            <input class="form-check-input" type="checkbox" value="link_target"
                                                name="link_target" id="link_target" value="{{ old('link_target',$link_target ?? '') }}">
                                            <label class="form-check-label" for="link_target">
                                                另開新視窗
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="form-group row">
                                        <label for="pc_video_url"
                                            class="col-2 col-form-label">設定影片連結<br>(Youtube連結) <span class="text-danger fs-4" >*</span> </label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="pc_video_url"
                                                name="pc_video_url" placeholder="請上傳youtube影片連結"
                                                value="{{ old('pc_video_url', $pc_video_url ?? '') }}">
                                        </div>
                                        <div class="col-12">
                                            <p class="text-danger">*注意：建議尺寸：1920 * 907 (px)</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mb_video_url"
                                            class="col-2 col-form-label">設定影片連結<br>(Youtube連結) <span class="text-danger fs-4" >*</span> </label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="mb_video_url"
                                                name="mb_video_url" placeholder="請上傳youtube影片連結（使用於手機版畫面）"
                                                value="{{ old('mb_video_url', $mb_video_url ?? '') }}">
                                        </div>
                                        <div class="col-12">
                                            <p class="text-danger">*注意：建議尺寸：420 * 640 (px)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重 <span class="text-danger fs-4" >*</span> </label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" placeholder="僅能輸入數字，前台顯示會依權重顯示" required
                                        value="{{ old('sort', $sort ?? '') }}" min="0" max="999">
                                </div>
                            </div>
                            <hr>

                            {{-- 複製這邊  返回鍵的設定 --}}
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.banner.index') }}">
                                    <button type="button" class="btn btn-primary d-block">返回</button>
                                </a>
                                <button type="submit" class="btn btn-primary d-block">新增</button>
                            </div>
                            {{-- 複製到這就好 路由記得改 --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let img = document.querySelector('#pills-home-tab');
        let mov = document.querySelector('#pills-profile-tab');
        let type = document.querySelector('#banner_type');
        let pcImage = document.querySelector('#pc_image_url');
        let mbImage = document.querySelector('#mb_image_url');
        let imageAlt = document.querySelector('#image_alt')
        let pcVideo = document.querySelector('#pc_video_url');
        let mbVideo = document.querySelector('#mb_video_url');
        img.addEventListener('click', function() {
            if (type.value === '影片') {
                type.value = '圖片';
                imageAlt.setAttribute('required', 'required');
                pcImage.setAttribute('required', 'required');
                mbImage.setAttribute('required', 'required');
                pcVideo.removeAttribute('required');
                mbVideo.removeAttribute('required');
            }
        })
        mov.addEventListener('click', function() {
            if (type.value === '圖片') {
                type.value = '影片';
                imageAlt.removeAttribute('required');
                pcImage.removeAttribute('required');
                mbImage.removeAttribute('required');
                pcVideo.setAttribute('required', 'required');
                mbVideo.setAttribute('required', 'required');
            }
        })
    </script>
    @if (session('type') === 'video')
        <script>
            mov.click();
        </script>
    @endif
@endsection
