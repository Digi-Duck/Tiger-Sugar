@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        社群回饋管理-編輯
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/social/update/{{$id}}" enctype="multipart/form-data">
                            @csrf
                            <input hidden class="form-control" name="type" id="social_type" value="{{$info->type}}" required>

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link @if($info->type =='embed') active @endif" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">嵌入方式上稿</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($info->type =='custom') active @endif" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">客製化方式上稿</a>
                                </li>
                            </ul>

                            <hr>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade @if($info->type =='embed') active show @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    {{--嵌入碼上稿方式--}}
                                    <div class="form-group row">
                                        <label for="embed_name" class="col-2 col-form-label">社群回饋代稱</label>
                                        <div class="col-10">
                                            <input class="form-control" id="embed_name" name="embed_name" value="{{$info->embed_name}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="embed_link" class="col-2 col-form-label">嵌入碼</label>
                                        <div class="col-10">
                                            <textarea class="form-control" rows="3" id="embed_link" name="embed_link">{{$info->embed_link}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade @if($info->type =='custom') active show @endif" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    {{--客製化上稿方式--}}
                                    <div class="form-group row">
                                        <label for="now_image" class="col-2 col-form-label">當前圖片(使用者Icon)</label>
                                        <div class="col-10">
                                            <img src="{{$info->user_photo}}" alt="" width="30">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_photo" class="col-2 col-form-label">上傳新的照片(使用者Icon)</label>
                                        <div class="col-10">
                                            <input type="file" class="form-control-file" id="user_photo" name="user_photo">
                                        </div>
                                        <div class="col-12">
                                            <p class="text-danger">
                                                *注意：1.上傳時將會替換掉舊的圖片
                                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.建議尺寸：30 * 30 (px)
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="now_image_mb" class="col-2 col-form-label">當前圖片(主要圖片)</label>
                                        <div class="col-10">
                                            <img src="{{$info->main_photo}}" alt="" width="350">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="main_photo" class="col-2 col-form-label">上傳新的照片(主要圖片)</label>
                                        <div class="col-10">
                                            <input type="file" class="form-control-file" id="main_photo" name="main_photo">
                                        </div>
                                        <div class="col-12">
                                            <p class="text-danger">
                                                *注意：1.上傳時將會替換掉舊的圖片
                                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.建議尺寸：350 * 350 (px)
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="user_name" class="col-2 col-form-label">使用者名稱</label>
                                        <div class="col-10">
                                            <input class="form-control" id="user_name" name="user_name" value="{{$info->user_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_account" class="col-2 col-form-label">使用者帳號</label>
                                        <div class="col-10">
                                            <input class="form-control" id="user_account" name="user_account" value="{{$info->user_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_icon" class="col-2 col-form-label">社群Icon <a target="_blank" href="https://fontawesome.com/icons?d=gallery&m=free"><i class="fas fa-info-circle"></i></a></label>
                                        <div class="col-10">
                                            <input class="form-control" id="social_icon" name="social_icon" placeholder='<i class="fab fa-weibo"></i>' value="{{$info->social_icon}}">
                                            <small class="text-danger">* 社群icon 部分是使用font awesome 所提供之 icon,可點擊右方資訊按鈕進入font awesome網站，並挑選icon後，複製上方html代碼貼入此欄位。</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_icon_color" class="col-2 col-form-label">社群Icon顏色</label>
                                        <div class="col-10">
                                            <input type="color" class="form-control" id="social_icon_color" name="social_icon_color" value="{{$info->social_icon_color}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link_title" class="col-2 col-form-label">連結標題</label>
                                        <div class="col-10">
                                            <input class="form-control" id="link_title" name="link_title" value="{{$info->link_title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link_href" class="col-2 col-form-label">超連結網址</label>
                                        <div class="col-10">
                                            <input class="form-control" id="link_href" name="link_href" value="{{$info->link_href}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link_url" class="col-2 col-form-label">是否要另開視窗</label>
                                        <div class="col-10" style="padding-left: 35px">
                                            <input class="form-check-input" type="checkbox" value="link_target" name="link_target" id="link_target" @if($info->link_target == 'link_target') checked @endif>
                                            <label class="form-check-label" for="link_target">
                                                另開視窗
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_info" class="col-2 col-form-label">內容</label>
                                        <div class="col-10">
                                            <input class="form-control" id="social_info" name="social_info" value="{{$info->social_info}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="post_date" class="col-2 col-form-label">發布日期</label>
                                        <div class="col-10">
                                            <input type="date" class="form-control" id="post_date" name="post_date" value="{{$info->post_date}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="{{$info->sort}}" min="0" max="999">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">更新並上傳圖片</button>
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
            console.log($(e.target).attr('id'));

            if($(e.target).attr('id') == 'pills-profile-tab'){
                document.querySelector("#social_type").setAttribute('value','custom');
            }else{
                document.querySelector("#social_type").setAttribute('value','embed');
            }
        })
    </script>
@endsection