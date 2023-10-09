<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('./css/backend-template.css') }}">
    @yield('css')
</head>

<body>
    <div id="backend">
        <div class="backend-top-area">
            <a href="{{ route('back.index') }}" title="前往後台首頁">
                <button type="button" class="backend-btn">
                    <img src="{{ asset('./frontend-img/header-img/LOGO.png') }}" alt="老虎堂logo" class="backend-logo">
                </button>
            </a>
            <div class="backend-top-right-area">
                <a href="{{ route('front.index') }}" title="回老虎堂前台">
                    <button type="button" class="backend-btn frontend-btn">
                        <h2 class="backend-h2">回老虎堂前台</h2>
                    </button>
                </a>
                <div class="backend-user-container">
                    <input type="checkbox" id="checkbox" hidden>
                    <label for="checkbox" class="user-btn">
                        <h2 class="backend-h2">您好，{{ Auth::user()->name }} <i class="bi bi-caret-down"></i></h2>
                    </label>
                    <a href="{{ route('back.reset') }}" title="修改密碼" class="backend-password">
                        <button type="button" class="backend-btn change-password-btn">
                            <h2 class="backend-h2">修改密碼</h2>
                        </button>
                    </a>
                    <form method="post" action="{{ route('logout') }}" class="backend-logout">
                        @csrf
                        <button type="submit" class="backend-btn logout-btn">
                            <h2 class="backend-h2">登出</h2>
                        </button>
                    </form>
                </div>
            </div>
        </div>




        <div class="backend-down-area">
            <div class="backend-down-left-area">
                <a href="{{ route('back.news.index') }}" id="news" class="single-btn" title="前往最新消息設定頁">
                    <button type="button" class="backend-btn">
                        <h2 class="backend-h2">最新消息</h2>
                    </button>
                </a>
                <a href="{{ route('back.banner.index') }}" id="banner" class="single-btn" title="前往廣告橫幅設定頁">
                    <button type="button" class="backend-btn">
                        <h2 class="backend-h2">廣告橫幅</h2>
                    </button>
                </a>
                <a href="{{ route('back.social.index') }}" id="social" class="single-btn" title="前往廣告橫幅設定頁">
                    <button type="button" class="backend-btn">
                        <h2 class="backend-h2">社群回饋</h2>
                    </button>
                </a>
                <div id="place" class="group-btns">
                    <h2 class="backend-h2 group-btn-text">全球據點管理</h2>
                    <div class="btn-list">
                        <a href="" id="country" title="前往全國據點設定頁">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">國家管理</div>
                            </button>
                        </a>
                        <a href="" id="city" title="前往城市據點設定頁">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">城市管理</div>
                            </button>
                        </a>
                        <a href="" id="shop" title="前往商店據點設定頁">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">店鋪管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <div id="menu-ch" class="group-btns">
                    <h2 class="backend-h2 group-btn-text">菜單管理(中)</h2>
                    <div class="btn-list">
                        <a href="{{ route('back.drink_type.index') }}" id="drink-type" title="前往飲品類型設定頁">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">飲品類型管理</div>
                            </button>
                        </a>
                        <a href="{{ route('back.drink.index') }}" id="drink" title="前往飲品設定頁">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">飲品管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <div id="menu-en" class="group-btns">
                    <h2 class="backend-h2 group-btn-text">菜單管理(英)</h2>
                    <div class="btn-list">
                        <a href="{{ route('back.drink_type_en.index') }}" id="drink-type-en" title="前往飲品類型設定頁英文版">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">飲品類型管理</div>
                            </button>
                        </a>
                        <a href="{{ route('back.drink_en.index') }}" id="drink-en" title="前往飲品設定頁英文版">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">飲品管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <a href="{{ route('back.media.index') }}" id="media" class="single-btn" title="前往媒體露出設定頁">
                    <button type="button" class="backend-btn">
                        <h2 class="backend-h2">媒體露出</h2>
                    </button>
                </a>
                <a href="{{ route('back.contact.index') }}" id="contact" class="single-btn" title="前往加盟來信輸出頁">
                    <button type="button" class="backend-btn">
                        <h2 class="backend-h2">加盟來信</h2>
                    </button>
                </a>
                <a href="{{ route('back.distribution.index') }}" id="distribution" class="single-btn"
                    title="前往經銷來信輸出頁">
                    <button type="button" class="backend-btn">
                        <h2 class="backend-h2">經銷來信</h2>
                    </button>
                </a>
                <a href="{{ route('back.blog_news.index') }}" id="blog-news" class="single-btn" title="前往媒體報導設定頁">
                    <button type="button" class="backend-btn">
                        <h2 class="backend-h2">媒體報導</h2>
                    </button>
                </a>
                <div id="product-manage" class="group-btns">
                    <h2 class="backend-h2 group-btn-text">商品管理</h2>
                    <div class="btn-list">
                        <a href="{{ route('back.products_type.index') }}" id="product-type" title="前往商品類型管理設定頁">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">商品類型管理</div>
                            </button>
                        </a>
                        <a href="{{ route('back.products.index') }}" id="product" title="前往商品管理設定頁">
                            <button type="button" class="backend-btn">
                                <div class="sub-text">商品管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <a href="{{ route('back.franchise_explain.index') }}" class="single-btn" id="franchise-explain" title="前往常見問題管理設定頁">
                    <button type="button" class="backend-btn">
                        <h2 class="backend-h2">常見問題管理</h2>
                    </button>
                </a>
            </div>
            <div class="backend-down-right-area">
                <div class="backend-container">
                    @yield('main')
                </div>
                <img src="{{ asset('/frontend-img/index-img/about/about_bg.png') }}" alt="" class="backend-bg">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js')
</body>

</html>
