@extends('layouts.backend-template')

@section('css')
    <style>
        .max-height-for-container {
            max-height: 700px
        }

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
                        社群回饋管理-新增
                    </h4>
                    <div class="card-body container overflow-y-auto max-height-for-container">
                        <form method="POST" action="{{ route('back.social.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input hidden class="form-control" name="type" id="social_type" value="embed" required>

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active cursor-p" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" role="tab" aria-controls="pills-home"
                                        aria-selected="true">嵌入方式上稿</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link cursor-p" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">客製化方式上稿</a>
                                </li>
                            </ul>

                            <hr>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    {{-- 嵌入碼上稿方式 --}}
                                    <div class="form-group row">
                                        <label for="embed_name" class="col-2 col-form-label">社群回饋代稱</label>
                                        <div class="col-10">
                                            <input class="form-control" id="embed_name" name="embed_name" required>
                                            @foreach ($errors->get('embed_name') as $error)
                                                <div class="alert alert-danger w-100 text-center" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="embed_link" class="col-2 col-form-label">嵌入碼</label>
                                        <div class="col-10">
                                            <textarea class="form-control" rows="3" id="embed_link" name="embed_link" required></textarea>
                                            @foreach ($errors->get('embed_link') as $error)
                                                <div class="alert alert-danger w-100 text-center" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    {{-- 客製化上稿方式 --}}
                                    <div class="form-group row">
                                        <label for="user_photo" class="col-2 col-form-label">使用者Icon</label>
                                        <div class="col-10">
                                            <input type="file" class="form-control-file" id="user_photo"
                                                name="user_photo">
                                            @foreach ($errors->get('user_photo') as $error)
                                                <div class="alert alert-danger w-50 text-center" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            <p class="text-danger">*建議尺寸：30 * 30 (px)</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="main_photo" class="col-2 col-form-label">主要圖片</label>
                                        <div class="col-10">
                                            <input type="file" class="form-control-file" id="main_photo"
                                                name="main_photo">
                                            @foreach ($errors->get('main_photo') as $error)
                                                <div class="alert alert-danger w-50 text-center" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            <p class="text-danger">*建議尺寸：350 * 350 (px)</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="user_name" class="col-2 col-form-label">使用者名稱</label>
                                        <div class="col-10">
                                            <input class="form-control" id="user_name" name="user_name">
                                            @foreach ($errors->get('user_name') as $error)
                                                <div class="alert alert-danger w-100 text-center" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_account" class="col-2 col-form-label">使用者帳號</label>
                                        <div class="col-10">
                                            <input class="form-control" id="user_account" name="user_account">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_icon" class="col-2 col-form-label">社群Icon <a target="_blank"
                                                href="https://fontawesome.com/icons?d=gallery&m=free"><i
                                                    class="fas fa-info-circle"></i></a></label>
                                        <div class="col-10">
                                            <input class="form-control" id="social_icon" name="social_icon"
                                                placeholder='<i class="fab fa-weibo"></i>'>
                                            <small class="text-danger">* We are using font awesome icon in this
                                                field,please click left info button goto font awesome website, and copy
                                                icons html code.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_icon_color" class="col-2 col-form-label">社群Icon顏色</label>
                                        <div class="col-10">
                                            <input type="color" class="form-control" id="social_icon_color"
                                                name="social_icon_color">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link_title" class="col-2 col-form-label">連結名稱</label>
                                        <div class="col-10">
                                            <input class="form-control" id="link_title" name="link_title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link_href" class="col-2 col-form-label">超連結網址</label>
                                        <div class="col-10">
                                            <input class="form-control" id="link_href" name="link_href">
                                            @foreach ($errors->get('link_href') as $error)
                                                <div class="alert alert-danger w-100 text-center" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link_url" class="col-2 col-form-label">是否新開視窗</label>
                                        <div class="col-10" style="padding-left: 35px">
                                            <input class="form-check-input" type="checkbox" value="link_target"
                                                name="link_target" id="link_target">
                                            <label class="form-check-label" for="link_target">
                                                Pop-out window
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_info" class="col-2 col-form-label">內容</label>
                                        <div class="col-10">
                                            <input class="form-control" id="social_info" name="social_info">
                                            @foreach ($errors->get('social_info') as $error)
                                                <div class="alert alert-danger w-100 text-center" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="post_date" class="col-2 col-form-label">發布日期</label>
                                        <div class="col-10">
                                            <input type="date" class="form-control" id="post_date" name="post_date">
                                            @foreach ($errors->get('post_date') as $error)
                                                <div class="alert alert-danger w-100 text-center" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required
                                        value="{{ old('sort', $sort ?? '1') }}" min="0" max="999">
                                    @foreach ($errors->get('sort') as $error)
                                        <div class="alert alert-danger w-100 text-center" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('back.social.index') }}">
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
    <script>
        let embed = document.querySelector('#pills-home-tab');
        let custom = document.querySelector('#pills-profile-tab');
        let type = document.querySelector('#social_type');
        let embedName = document.querySelector('#embed_name');
        let embedLink = document.querySelector('#embed_link');
        let userPhoto = document.querySelector('#user_photo');
        let mainPhoto = document.querySelector('#main_photo');
        let userName = document.querySelector('#user_name');
        let userAccount = document.querySelector('#user_account');
        let socialInfo = document.querySelector('#social_info');
        let postDate = document.querySelector('#post_date');
        embed.addEventListener('click', function() {
            if (type.value === 'custom') {
                type.value = 'embed'
                embedName.setAttribute('required', 'true');
                embedLink.setAttribute('required', 'true');
                userPhoto.removeAttribute('required');
                mainPhoto.removeAttribute('required');
                userName.removeAttribute('required');
                userAccount.removeAttribute('required');
                socialInfo.removeAttribute('required');
                postDate.removeAttribute('required');
            }
        })
        custom.addEventListener('click', function() {
            if (type.value === 'embed') {
                type.value = 'custom'
                embedName.removeAttribute('required');
                embedLink.removeAttribute('required');
                userPhoto.setAttribute('required', 'true');
                mainPhoto.setAttribute('required', 'true');
                userName.setAttribute('required', 'true');
                userAccount.setAttribute('required', 'true');
                socialInfo.setAttribute('required', 'true');
                postDate.setAttribute('required', 'true');
            }
        })
    </script>
    @if (session('type') === 'custom_create')
        <script>
            custom.click();
        </script>
    @endif
@endsection
