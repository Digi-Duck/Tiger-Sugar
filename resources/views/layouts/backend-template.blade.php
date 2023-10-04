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
        <nav>
            <a href="{{ route('back.index') }}" title="前往後台首頁">
                <button type="button">
                    <img src="{{ asset('./frontend-img/header-img/LOGO.png') }}" alt="老虎堂logo" class="logo">
                </button>
            </a>
            <div class="buttons">
                <a href="" id="news" class="single-button" title="前往最新消息設定頁">
                    <button>
                        <h2>最新消息</h2>
                    </button>
                </a>
                <a href="" id="banner" class="single-button" title="前往廣告橫幅設定頁">
                    <button>
                        <h2>廣告橫幅</h2>
                    </button>
                </a>
                <a href="" id="social" class="single-button" title="前往廣告橫幅設定頁">
                    <button>
                        <h2>社群回饋</h2>
                    </button>
                </a>
                <div id="place" class="group-left-buttons">
                    <h2>全球據點管理</h2>
                    <div class="group-right-buttons-area">
                        <a href="" id="country" title="前往全國據點設定頁">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">國家管理</div>
                            </button>
                        </a>
                        <a href="" id="city" title="前往城市據點設定頁">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">城市管理</div>
                            </button>
                        </a>
                        <a href="" id="shop" title="前往商店據點設定頁">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">店鋪管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <div id="menu-ch" class="group-left-buttons">
                    <h2>菜單管理(中)</h2>
                    <div class="group-right-buttons-area">
                        <a href="" id="drink-type" title="前往飲品類型設定頁">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">飲品類型管理</div>
                            </button>
                        </a>
                        <a href="" id="drink" title="前往飲品設定頁">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">飲品管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <div id="menu-en" class="group-left-buttons">
                    <h2>菜單管理(英)</h2>
                    <div class="group-right-buttons-area">
                        <a href="" id="drink-type-en" title="前往飲品類型設定頁英文版">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">飲品類型管理</div>
                            </button>
                        </a>
                        <a href="" id="drink-en" title="前往飲品設定頁英文版">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">飲品管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <a href="" id="media" class="single-button" title="前往媒體露出設定頁">
                    <button>
                        <h2>媒體露出</h2>
                    </button>
                </a>
                <a href="" id="contact" class="single-button" title="前往加盟來信輸出頁">
                    <button>
                        <h2>加盟來信</h2>
                    </button>
                </a>
                <a href="" id="distribution" class="single-button" title="前往經銷來信輸出頁">
                    <button>
                        <h2>經銷來信</h2>
                    </button>
                </a>
                <a href="" id="blog-news" class="single-button" title="前往媒體報導設定頁">
                    <button>
                        <h2>媒體報導</h2>
                    </button>
                </a>
                <div id="product-manage" class="group-left-buttons">
                    <h2>商品管理</h2>
                    <div class="group-right-buttons-area">
                        <a href="" id="product-type" title="前往商品類型管理設定頁">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">商品類型管理</div>
                            </button>
                        </a>
                        <a href="" id="product" title="前往商品管理設定頁">
                            <button class="group-right-buttons">
                                <div class="group-right-buttons-text">商品管理</div>
                            </button>
                        </a>
                    </div>
                </div>

                <a href="" id="franchise-explain" class="single-button" title="前往常見問題管理設定頁">
                    <button>
                        <h2>常見問題管理</h2>
                    </button>
                </a>
            </div>
        </nav>

        <div class="right-container">
            <div class="right-top-area">
                <a href="" title="回老虎堂前台" class="back-to-front">
                    <button>
                        <h2>回老虎堂前台</h2>
                    </button>
                </a>
                <div class="user-area">
                    <input type="checkbox" id="checkbox" hidden>
                    <label for="checkbox" class="user-info">
                        <h2>您好，使用者 <i class="bi bi-caret-down"></i></h2>
                    </label>
                    <a href="" title="修改密碼" class="change-password">
                        <button>
                            <h2>修改密碼</h2>
                        </button>
                    </a>
                    <a href="" title="登出" class="logout">
                        <button>
                            <h2>登出</h2>
                        </button>
                    </a>
                </div>
            </div>
            <div class="right-down-area">
                @yield('main')
                    <img src="{{ asset('frontend-img/index-img/about/about_bg.png') }}" alt="背景圖片"
                        class="right-down-bg">
                </div>
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            @yield('js')
        </script>
    </body>

    </html>
