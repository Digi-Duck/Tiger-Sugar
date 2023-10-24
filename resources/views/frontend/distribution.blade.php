@extends('layouts.frontend-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('./css/distribution.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/popwindow.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/footer.css') }}">
@endsection

@section('main')
    <main></main>
    <div class="window-overlay"></div>
    <!-- 內容頁 -->
    <section id="distribution">
        <div class="main">
            <div class="container">
                <!-- 產品經銷 - 全部選取按鈕 -->
                <div class="distribution-nav">
                    <div class="distribution-logo-group">
                        <div class="distribution-logo-img">
                            <img src="{{ asset('./frontend-img/distribution-img/distribution/distribution.png') }}"
                                alt="產品經銷logo" />
                        </div>
                        <div class="distribution-logo-text">
                            <div class="distribution-logo-text-cn">產品經銷</div>
                            <div class="distribution-logo-text-en">DISTRIBUTION</div>
                        </div>
                    </div>
                    <div class="select-all">
                        <button class="select-all-btn" type="button">全部選取</button>
                    </div>
                </div>
                <!-- 各品項與頁面數swiper -->
                <div class="swiper-and-page-group">
                    <!-- 品項swiper -->
                    <div class="content">
                        <div class="mySwiper swiper-container swiper-container-horizontal">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="" title="品項分類" class="page-link">全部｜All</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="" title="品項分類" class="page-link">零食｜Snack</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="" title="品項分類" class="page-link">冰品｜Ice</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="" title="品項分類" class="page-link">飲品｜Drink</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="" title="品項分類" class="page-link">食品｜Food</a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="" title="品項分類" class="page-link">甜點｜dessert</a>
                                </div>
                            </div>
                            <div class="swiper-button-next">
                                <img src="{{ asset('./frontend-img/distribution-img/distribution/commodity-next.svg') }}"
                                    alt="下一個按鈕" />
                            </div>
                            <div class="swiper-button-prev">
                                <img src="{{ asset('./frontend-img/distribution-img/distribution/commodity-prev.svg') }}"
                                    alt="上一個按鈕" />
                            </div>
                        </div>
                    </div>

                    <!-- 頁面數 -->
                    <div class="page-up-and-page-down-group">
                        <a href="" class="page-up" title="上一個頁面">
                            <img src="{{ asset('./frontend-img/distribution-img/distribution/previous.png') }}"
                                alt="上一頁小圖標" />上一頁</a>
                        <a href="" class="page-1" title="第一頁">1</a>
                        <a href="" class="page-2" title="第二頁">2</a>
                        <a href="" class="page-3" title="第三頁">3</a>
                        <a href="" class="page-4" title="第四頁">4</a>
                        <a href="" class="page-5" title="第五頁">5</a>
                        <a href="" class="page-down" title="下一個頁面">下一頁
                            <img src="{{ asset('./frontend-img/distribution-img/distribution/next.png') }}"
                                alt="下一頁小圖標" />
                        </a>
                    </div>
                </div>
                <!-- 產品方格 -->
                <div class="prduct-grid-columns">
                    @foreach ($products as $product)
                        <div class="product-group">
                            <div class="product-img-group">
                                <div class="product-background">
                                    <div class="product">
                                        <img src="{{ $product->img }}" alt="產品1" />
                                    </div>
                                    <div class="yellow-box">
                                        <img class="ask-icon" data-product="{{ $product->id }}"
                                            src="{{ asset('./frontend-img/index-img/distribution/add_for_ask.svg') }}"
                                            alt="黃色加入以詢問">
                                    </div>
                                    <div class="product-background-hover open-pop-window">
                                        <a href="" class="yellow-box-hover" title="更多商品"><img
                                                class="ask-icon-hover" data-product="{{ $product->id }}"
                                                src="{{ asset('./frontend-img/index-img/distribution/add_for_ask_hover.svg') }}"
                                                alt="黃色加入以詢問"></a>
                                        <input type="text" class="inputall" name="inputall{{ $product->id }}"
                                            value="{{ $product }}">
                                        <button class="product-background-hover-more">MORE</button>
                                    </div>
                                </div>
                            </div>

                            <div class="product-info">
                                <div class="product-title">{{ $product->title_zh }}</div>
                                <div class="product-title-en">
                                    {{ $product->title_en }}
                                </div>
                                <div class="product-id">
                                    {{ $product->ProductsType->tw_name }}|{{ $product->ProductsType->en_name }}</div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- 下方分隔線 -->
                <div class="div-line"></div>

                <!-- 頁面數 -->

                <div class="page-up-and-page-down-group-buttom">
                    <a href="" class="page-up" title="上一個頁面">
                        <img src="{{ asset('./frontend-img/distribution-img/distribution/previous.png') }}"
                            alt="上一頁小圖標" />上一頁</a>
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <a href="{{ $products->url($i) }}" class="page-{{ $i }}"
                            title="第{{ $i }}頁">{{ $i }}</a>
                    @endfor
                    <a href="" class="page-down" title="下一個頁面">下一頁
                        <img src="{{ asset('./frontend-img/distribution-img/distribution/next.png') }}" alt="下一頁小圖標" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 敏齊 -->
    <section id="franchisee">
        <div class="container">
            <div class="franchisee-title">
                <div class="franchisee-icon"></div>
                <div class="container-franchisee-title">
                    <h1>加盟專區</h1>
                    <h2>FRANCHISEE</h2>
                </div>
            </div>
            <div class="franchisee-container-big">
                <div class="franchisee-container-animation" data-aos="zoom-in">
                    <a href={{ route('front.franchisee_form') }} class="franchisee-link" title="前往加盟表單頁">
                        <button type="button" class="blade-button">
                            <div class="join-us-img">
                                <div class="join-us-info">
                                    <h2>
                                        <i class="bi bi-star-fill"></i>&nbspJoin Our Franchise!
                                        <i class="bi bi-star-fill"></i>
                                    </h2>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 彈跳視窗初代 -->
    @foreach ($products as $product)
        {{-- @dump($product) --}}
    @endforeach
    <div id="pop-window" class="im-pop-window">
        <div class="container">
            <div class="pop-window-content">
                <div class="pop-window-close">
                    <button class="" href="#"></button>
                </div>
                <div class="pop-window-header">
                    <div class="pop-window-title">
                        <div class="pop-window-title-icon"></div>
                        <div class="pop-window-title-text">
                            <div class="pop-window-title-text-chinese">產品介紹</div>
                            <div class="pop-window-title-text-english">PRODUCT</div>
                        </div>
                    </div>
                </div>
                <div class="product-information-content">

                    <!-- 彈跳視窗上半部swiper -->
                    <div class="product-information-swiper">
                        <div thumbsSlider="" class="swiper-pop-top swiper my-pop-swiper">
                            <div class="swiper-wrapper display-vertical poping-swiper">

                                <div class="swiper-pop-top-slide swiper-slide">
                                    <img src="{{ asset('./frontend-img/distribution-img/pop-window/sesamebun1.jpeg') }}"
                                        alt="產品圖片1" />
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <img src="{{ asset('./frontend-img/distribution-img/pop-window/sesamebun2.jpeg') }}"
                                        alt="產品圖片2" />
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <img src="{{ asset('./frontend-img/distribution-img/pop-window/sesamebun3.jpeg') }}"
                                        alt="產品圖片3" />
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <img src="{{ asset('./frontend-img/distribution-img/pop-window/sesamebun4.jpeg') }}"
                                        alt="產品圖片4" />
                                </div>
                            </div>
                        </div>

                        <div class="swiper swiper-pop-top my-pop-swiper-sub swiper-style">
                            <div class="swiper-wrapper poping-swiper-sub">
                                <div class="swiper-slide swiper-pop-top-slide ">
                                    <div class="pop-sub-border-img">
                                        <img class="sub-img"
                                            src="{{ asset('./frontend-img/distribution-img/pop-window/sesamebun1.jpeg') }}"
                                            alt="產品圖片1" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <div class="pop-sub-border-img">
                                        <img class="sub-img"
                                            src="{{ asset('./frontend-img/distribution-img/pop-window/sesamebun2.jpeg') }}"
                                            alt="產品圖片2" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <div class="pop-sub-border-img">
                                        <img class="sub-img"
                                            src="{{ asset('./frontend-img/distribution-img/pop-window/sesamebun3.jpeg') }}"
                                            alt="產品圖片3" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <div class="pop-sub-border-img">
                                        <img class="sub-img"
                                            src="{{ asset('./frontend-img/distribution-img/pop-window/sesamebun4.jpeg') }}"
                                            alt="產品圖片4" />
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next">
                                <img class="next-prev-img"
                                    src="{{ asset('./frontend-img/distribution-img/pop-window/commodity-next.svg') }}"
                                    alt="下一個圖片">
                            </div>
                            <div class="swiper-button-prev">
                                <img class="next-prev-img"
                                    src="{{ asset('./frontend-img/distribution-img/pop-window/commodity-prev.svg') }}"
                                    alt="上一個圖片">
                            </div>
                            <div class="swiper-pagination swiper-page-dec"></div>
                        </div>
                    </div>

                    <!-- 上半部右側產品介紹文字 -->
                    <div class="product-information-text">
                        <div class="content-text-title">經典黑糖麻糬包</div>
                        <div class="content-text-title-eng">Black Sugar Mochi Bun</div>
                        <div class="content-text-sort">分類：食品｜Food</div>
                        <div class="content-text-product-describe">
                            你有吃過牽絲的黑糖麻糬包嗎？
                            熱呼呼充滿奶香味的<br>包子中，噴發出濃郁黑糖香氣的麻糬，又香又Q，只吃<br>一顆完全不夠啦~
                        </div>
                        <div class="commodity-listed-date">
                            <div class="listed-date-title">上市日期</div>
                            <div class="listed-date">2022
                                <div class="unit">年</div>06
                                <div class="unit">月</div>24
                                <div class="unit">號</div>
                            </div>
                        </div>
                        <div class="commodity-weight">
                            <div class="commodity-weight-title">淨重</div>
                            <div class="net-weight">390</div>
                            <div class="unit">克</div>
                        </div>
                        <div class="commodity-expiration">
                            <div class="commodity-expiration-title">保存期限</div>
                            <div class="expiration-day">12</div>
                            <div class="unit">個月</div>
                        </div>
                        <div class="commodity-preservation-method">
                            <div class="method-title">保存方式</div>
                            <div class="method-text">1.請保存於冷凍-18℃以下，拆封後請儘早食用，以確保品質及風味。</div>
                        </div>
                        <button class="add-for-ask-button">加入詢問</button>
                    </div>
                </div>


                <!--tabNav 商品內容 注意事項 影片 -->
                <div class="pop-window-lower-part">
                    <div class="tab-nav">
                        <input type="radio" name="css-tabs" class="tab-switch drop-down-content" id="tab-1"
                            checked>
                        <label for="tab-1" class="tab-label">內容</label>
                        <input type="radio" name="css-tabs" class="tab-switch drop-down-warn" id="tab-2">
                        <label for="tab-2" class="tab-label">注意事項</label>
                        <input type="radio" name="css-tabs" class="tab-switch drop-down-video" id="tab-3">
                        <label for="tab-3" class="tab-label">影片</label>
                        <div class="tab-content">
                            <div class="content-left">
                                <p>100%使用「虎式黑糖」</p>
                                <p>調製特殊比例，讓黑糖融合麻糬的瞬間</p>
                                <p>散發濃厚黑糖的香氣，口感富有層次感，Q度彈牙適中~</p>
                                <p><br></p>
                                <p>撥開光滑外皮，裡面的是雙層內餡</p>
                                <p>黑糖麻糬包裹著白麻糬</p>
                                <p><br></p>
                                <p>翻熱後，黑糖與麻糬更融合</p>
                                <p>超級牽絲的黑糖麻糬包就誕生了，黑糖控絕對不能錯過~<br></p>
                            </div>
                            <div class="content-middle">
                                <p>●本產品含有牛奶、堅果、蛋、含麩質之穀物及其製品，不適合對其過敏體質者食用。</p>
                                <p>●本產品生產設備亦生產含甲殼類、芒果、花生、大豆、芝麻、魚類、亞硫酸鹽類、芹菜及其製品。<br></p>
                            </div>
                            <div class="content-right">
                            </div>
                        </div>
                    </div>


                    <!-- 彈跳視窗下半部swiper -->
                    <div class="bottom-pop-window-swiper">
                        <div class="recommend-title">推薦商品</div>
                        <div class="recommend-line"></div>
                        <!-- Swiper -->
                        <div class="card-container">
                            <div class="swiper swiper-pop-bottom pop-window-bottom-swiper">
                                <div class="swiper-wrapper">

                                    @foreach ($random_products as $product)
                                        <div class="swiper-pop-bottom-slide swiper-slide">
                                            <div class="direction-body">
                                                <div class="img-box-border-img">
                                                    <img class="product-img" src="{{ $product->img }}" alt="產品圖片">
                                                    <img class="ask-icon" data-product="{{ $product->id }}"
                                                        src="{{ asset('./frontend-img/index-img/distribution/add_for_ask.svg') }}"
                                                        alt="黃色加入以詢問">
                                                    <div class="product-img-hover">
                                                        <form action="" method="post">
                                                            <button type="button" class="cursor-p">
                                                                <img class="ask-icon-hover"
                                                                    data-product="{{ $product->id }}"
                                                                    src="{{ asset('./frontend-img/index-img/distribution/add_for_ask_hover.svg') }}"
                                                                    alt="黃色加入以詢問">
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('front.distribution') }}"
                                                            class="commodity-more-button btn" title="更多商品">
                                                            MORE
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="commodity-title">
                                                    {{ $product->title_zh }}
                                                </div>
                                                <div class="commodity-title-english">
                                                    {{ $product->title_en }}
                                                </div>
                                                <div class="commodity-sort">
                                                    {{ $product->productsType->tw_name }}|{{ $product->productsType->en_name }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-button-product">
                                <div class="swiper-button-next">
                                    <img class="next-prev-img"
                                        src="{{ asset('./frontend-img/distribution-img/pop-window/commodity-next.svg') }}"
                                        alt="下一張圖片">
                                </div>
                                <div class="swiper-button-prev">
                                    <img class="next-prev-img"
                                        src="{{ asset('./frontend-img/distribution-img/pop-window/commodity-prev.svg') }}"
                                        alt="上一張圖片">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                510: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                832: {
                    slidesPerView: 4,
                },
                1200: {
                    slidesPerView: 4,
                },
                1920: {
                    slidesPerView: 4,
                },
            },
        });
    </script>

    <script src="{{ asset('./js/popwindow.js') }}"></script>
    <script src="{{ asset('./js/distribution.js') }}"></script>
    <script src="{{ asset('./js/header.js') }}"></script>
@endsection
