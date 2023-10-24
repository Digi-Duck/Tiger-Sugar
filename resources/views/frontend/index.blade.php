@extends('layouts.frontend-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('./css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/footer.css') }}">
@endsection

@section('main')
    <main>
        <!-- 夫 banner -->
        <section id="banner">
            <div class="swiper mySwiper banner-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="move-bg bg"></div>
                            <div class="move-bg bg-cover"></div>
                            <div class="move-bg bg-left-tiger"></div>
                            <div class="move-bg bg-left-milk-shadow"></div>
                            <div class="move-bg bg-left-milk"></div>
                            <div class="move-bg bg-left-drinks"></div>
                            <div class="move-bg bg-right-drinks"></div>
                            <div class="move-bg bg-right-milk"></div>
                            <div class="move-bg bg-center"></div>
                            <h2 class="banner-text">Brave As A Tiger</h2>
                            <div class="trans-cover"></div>
                        </div>
                    </div>
                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            @if ($banner->type == '圖片')
                                @if ($banner->link_url != '')
                                    <a href="{{ $banner->link_url }}">
                                        <img class="banner-pc-img" src="{{ $banner->pc_image_url }}"
                                            alt="{{ $banner->image_alt }}">
                                        <img class="banner-mb-img" src="{{ $banner->mb_image_url }}"
                                            alt="{{ $banner->image_alt }}">
                                    </a>
                                @else
                                    <div>
                                        <img class="banner-pc-img" src="{{ $banner->pc_image_url }}"
                                            alt="{{ $banner->image_alt }}">
                                        <img class="banner-mb-img" src="{{ $banner->mb_image_url }}"
                                            alt="{{ $banner->image_alt }}">
                                    </div>
                                @endif
                            @elseif ($banner->type == '影片')
                                <iframe class="banner-pc-vedio"
                                    src="https://youtube.com/embed/{{ $banner->pc_video_url }}?autoplay=1&controls=0&showinfo=0&autohide=1">
                                    alt="{{ $banner->pc_video_url }}" frameborder="0"></iframe>
                                <iframe class="banner-mb-vedio"
                                    src="https://youtube.com/embed/{{ $banner->mb_video_url }}?autoplay=1&controls=0&showinfo=0&autohide=1">
                                    alt="{{ $banner->mb_video_url }}" frameborder="0"></iframe>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </section>

        <!-- 齊 關於我們 -->
        <section id="about">
            <div id="link-about"></div>
            <div class="about-header">
                <div class="black-sugar" data-aos="fade-down" data-aos-duration="2000" data-aos-once="true"
                    data-aos-delay="1000" data-aos-offset="600">
                </div>
            </div>
            <div class="container">
                <div class="container-about-us-title">
                    <div class="about-us-icon"></div>
                    <div class="about-us-tilte">
                        <h1>關於我們</h1>
                        <h2>ABOUT</h2>
                    </div>
                </div>
                <div class="container-about-us-header">
                </div>
                <div class="about-card-group-container">
                    <div class="about-card-group-text-animation-top" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom" data-aos-duration="800">
                        <div class="about-card-group-img">
                            <img src="{{ asset('./frontend-img/index-img/about/icon4.png') }}" alt="關於我們心logo">
                        </div>
                        <div class="about-card-group-text">
                            <h2>老虎堂 ｜ 虎堂初心 Original Intention</h2>
                            <p>
                                老虎堂是一個發源於台灣的國際連鎖甜品品牌。<br>
                                我們的企圖心，是要讓全世界同時經由味覺和視覺品嚐到最頂級風味的台灣波霸珍珠奶茶。<br>
                                十多年的潛心研發，老虎堂認為，甜品是最具休閒與療癒、放鬆感的食物，老虎堂並非一般的手搖茶飲，<br>
                                我們獨創全球，是第一個「喝」的甜品。<br>
                                老虎堂想傳遞給世人的是，台灣濃濃的人情味與源源不絕的休閒甜品創意美學。
                            </p>
                        </div>
                    </div>
                    <div class="about-card-group-text-animation-bottom" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom" data-aos-duration="800">
                        <div class="about-card-group-img">
                            <img src="{{ asset('./frontend-img/index-img/about/icon5.png') }}" alt="關於我們杯子logo">
                        </div>
                        <div class="about-card-group-text">
                            <h2>老虎堂 ｜ 虎糖特色 Feature Of Product</h2>
                            <p>
                                世界首創「喝」的甜品，台灣波霸珍珠奶茶視覺系飲品「糖」是甜品核心要素，<br>
                                隨著全球健康生活的趨勢，美味卻「更營養、更健康、無負擔」，已經成為全球的飲食潮流，<br>
                                黑糖不但是台灣懷念的古早味，更有著豐富的礦物質與維生素等多種營養，<br>
                                加上一股獨特的香氣，是一種吃過就難以忘懷的臺灣味。<br>
                                除了口味獨特，兼顧美感與療癒系視覺的交融虎紋，更能讓人一邊喝一邊放鬆心情，<br>
                                彷彿有一股魔力，吸引人一而再、再而三品嚐。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <picture class="cloud-left" data-aos="fade-left" data-aos-once="true" data-aos-duration="3000"
                data-aos-delay="500" data-aos-offset="600">
                <img src="{{ asset('./frontend-img/index-img/about/left_cloud_bg.webp') }}" alt="雲彩背景左">
            </picture>
            <picture class="cloud-right" data-aos="fade-right" data-aos-once="true" data-aos-duration="3000"
                data-aos-delay="500" data-aos-offset="600">
                <img src="{{ asset('./frontend-img/index-img/about/right_cloud_bg.webp') }}" alt="雲彩背景右">
            </picture>
            <picture class="about-us-scroll-img">
                <img src="{{ asset('./frontend-img/index-img/about/logo_black.webp') }}" alt="老虎堂背景">
            </picture>
        </section>

        <!-- 佑 社群回饋 -->
        <section id="social">
            <div class="header">
                <div class="container">
                    <div class="title">
                        <img class="ig-icon" src="{{ asset('./frontend-img/index-img/social/ig.png') }}" alt="ig-icon">
                        <div class="title-text">
                            <div class="title-text-1">社群回饋</div>
                            <div class="title-text-2">SOCIAL</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Swiper -->
                <div class="swiper mySwiper-social">
                    <div class="swiper-wrapper">
                        @foreach ($social as $single_social)
                            @if ($single_social->type == 'embed')
                                <div class="swiper-slide"><iframe class="card-body"
                                        src="{{ $single_social->embed_link }}" allowtransparency="true"
                                        allowfullscreen="true" frameborder="0"
                                        data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"></iframe></div>
                            @else
                                <div class="swiper-slide">
                                    <div class="iframe-card">
                                        <div class="iframe-header">
                                            <div class="iframe-left-user-info">
                                                <img class="iframe-user-icon" src="{{ $single_social->user_photo }}"
                                                    alt="">
                                                <div class="iframe-user-names">
                                                    <div class="iframe-user-name-top">{{ $single_social->user_name }}
                                                    </div>
                                                    <div class="iframe-user-name-down">{{ $single_social->user_account }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="iframe-social-icon">{{ $single_social->social_icon }}</div>
                                        </div>
                                        <img class="iframe-main-photo" src="{{ $single_social->main_photo }}">
                                        <div class="iframe-down-content">
                                            <div class="iframe-link-name">
                                                <a href=""
                                                    class="iframe-link-detail">{{ $single_social->link_title }}</a>
                                            </div>
                                            <div class="iframe-content">{{ $single_social->social_info }}</div>
                                            <div class="iframe-update">{{ $single_social->post_date }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="swiper-button-social">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        <!-- 佑 產品經銷 -->
        <section id="distribution">
            <div id="link-distribution"></div>
            <div id="distribution-area">
                <div class="title">
                    <img class="distribution-icon"
                        src="{{ asset('./frontend-img/index-img/distribution/distribution.svg') }}" alt="ig-icon">
                    <div class="title-text">
                        <div class="title-text-1">產品經銷</div>
                        <div class="title-text-2">DISTRIBUTION</div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="card-container">
                    <div class="swiper mySwiper-product">
                        <div class="swiper-wrapper">
                            @foreach ($products as $product)
                                <div class="swiper-slide">
                                    <div class="direction-body">
                                        <div class="img-w-h-border-img">
                                            <img class="product-img" src="{{ $product->img }}" alt="產品圖片">
                                            <img class="ask-icon"
                                                src="{{ asset('./frontend-img/index-img/distribution/add_for_ask.svg') }}"
                                                alt="黃色加入以詢問">
                                            <div class="product-img-hover">
                                                <form action="{{ route('front.add') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="add" value="{{ $product->id }}">
                                                    <button type="submit" class="cursor-p">
                                                        <img class="ask-icon-hover"
                                                            src="{{ asset('./frontend-img/index-img/distribution/add_for_ask_hover.svg') }}"
                                                            alt="黃色加入以詢問">
                                                    </button>
                                                </form>
                                                <a href={{ route('front.distribution') }}
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
                                src="{{ asset('./frontend-img/index-img/distribution/commodity-next.svg') }}"
                                alt="swiper下一個按鈕">
                        </div>
                        <div class="swiper-button-prev">
                            <img class="next-prev-img"
                                src="{{ asset('./frontend-img/index-img/distribution/commodity-prev.svg') }}"
                                alt="swiper上一個按鈕">
                        </div>
                    </div>
                    <a href={{ route('front.distribution') }} class="distribution-area-button" title="更多商品">
                        更多商品
                        <button type="button" class="blade-button">
                        </button>
                    </a>
                </div>
            </div>
            </div>
        </section>

        <!-- 翔 熱門經典 -->
        <section id="classic">
            <div id="link-classic"></div>
            <div class="section_contentintro-logo">
                <div class="menu">
                    <div class="container">
                        <div class="title">
                            <div class="title-icon">
                                <img src="{{ asset('./frontend-img/index-img/classic/icon1-3.png') }}" alt="產品圖片">
                            </div>
                            <div class="title-name">
                                <h2 class="menu-text">熱門經典</h2>
                                <p class="text12 color-white">CLASSICAL</p>
                            </div>
                        </div>
                    </div>
                    <div class="menu-logo-group">
                        <img data-aos="fade-up" class="menu-logo"
                            src="{{ asset('./frontend-img/index-img/classic/menu-logo.png') }}" alt="menu-logo">
                        <div class="menu-logo-group">
                            <img data-aos="fade-up" class="menu-drink"
                                src="{{ asset('./frontend-img/index-img/classic/menu-drink.png') }}" alt="熱門經典-飲品">
                            <div data-aos="fade-up" class="drink-shape">
                                <div class="drink-circle"></div>
                            </div>
                            <div class="drink-shadow"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div data-aos="fade-up" class="cold-hot-info">
                            <div class="cold-drink-info" data-aos="fade-up"><span class="cold-drink-span"></span>冷飲
                            </div>
                            <div class="hot-drink-info" data-aos="fade-up"><span class="hot-drink-span"></span>熱飲
                            </div>
                        </div>
                        <div class="menu-up">
                            @foreach ($drink_types as $drink_type)
                                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 300 }}">
                                    <div class="menu-type">
                                        <div class="up">
                                            <h4 class="color-white">{{ $drink_type->type_name }}</h4>
                                            @if ($drink_type->type_info != '')
                                                <span class="menu-type-text">{{ $drink_type->type_info }}</span>
                                            @endif
                                        </div>
                                        <div class="ul-group">
                                            <ul class="gold-border">
                                                @foreach ($drink_type->drink as $drink)
                                                    <li>
                                                        <div class="menu-type-title">
                                                            <div class="menu-text">{{ $drink->drink_name }}</div>
                                                            <div class="small-dot">
                                                                @if ($drink->cold == '1')
                                                                    <div class="cold"></div>
                                                                @endif
                                                                @if ($drink->hot == '1')
                                                                    <div class="hot"></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="menu-mid">

                            <div data-aos="fade-up" class="intro">
                                <div class="icon-section">
                                    <img class="intro-logo"
                                        src="{{ asset('./frontend-img/index-img/classic/icon.png') }}" alt="menu_icon">
                                </div>
                                <div class="menu-info">
                                    <div class="menu-info-title">鮮奶取代奶精</div>
                                    <div class="menu-info-text">我們以鮮奶取代奶精，提供香醇濃厚的口感，讓你享受飲品的同時營養低負擔
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="intro">
                                <div class="icon-section">
                                    <img class="intro-logo"
                                        src="{{ asset('./frontend-img/index-img/classic/icon.png') }}" alt="menu_icon">
                                </div>
                                <div class="menu-info">
                                    <div class="menu-info-title">現煮波霸超Q彈</div>
                                    <div class="menu-info-text">
                                        現煮波霸熱的時候口感偏軟，飲用前建議均勻搖，這樣口感才會Q彈，但如果太久沒喝完，因受冷過久，<br>
                                        就會變得較硬喔!這些都是天然現象，請安心飲用</div>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="intro">
                                <div class="icon-section">
                                    <img class="intro-logo"
                                        src="{{ asset('./frontend-img/index-img/classic/icon.png') }}" alt="menu_icon">
                                </div>
                                <div class="menu-info">
                                    <div class="menu-info-title">黑糖波霸多層次</div>
                                    <div class="menu-info-text">使用獨家虎式黑糖，經由完美比例組合，口感分明層次，香氣十足</div>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="intro">
                                <div class="icon-section">
                                    <img class="intro-logo"
                                        src="{{ asset('./frontend-img/index-img/classic/icon.png') }}" alt="menu_icon">
                                </div>
                                <div class="menu-info">
                                    <div class="menu-info-title">虎式黑糖超濃郁</div>
                                    <div class="menu-info-text">
                                        每日經由獨家虎式黑糖小火悶熬，口感富有層次感，Q度彈牙適中；入口散發濃郁黑糖香氣</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="container">
                        <div class="content">
                            <div data-aos="fade-up" class="menu-bottom">
                                <div class="step-1">
                                    <p class="how-title">波霸怎麼喝才好喝</p>
                                    <p class="text14-4 pd color-white">Step1 | 先拍張美美的照片上傳!</p>
                                </div>
                            </div>
                            <div class="parallax">
                                <div class="parallax-img-1"></div>
                            </div>
                        </div>
                        <div class="content">
                            <div data-aos="fade-up" class="menu-bottom row mt-5 justify-content-center">
                                <div class="step-2">
                                    <p class="color-white text14-4">Step2 | 上下均勻搖晃15下(不多不少15下，這步驟很重要喔!)</p>
                                </div>
                            </div>

                            <div class="parallax">
                                <div class="parallax">
                                    <div class="parallax-img-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 夫 媒體露出 -->
        <section id="media">
            <div id="link-media"></div>
            <div class="container">
                <div class="title-flex">
                    <div class="title-img"></div>
                    <div class="title-text">
                        <div class="title-text-top">媒體露出</div>
                        <div class="title-text-bottom">MEDIA</div>
                    </div>
                </div>
            </div>
            <div class="swiper mySwiper media-swiper">
                <div class="swiper-wrapper">
                    @foreach ($medias as $media)
                        <div class="swiper-slide">
                            <video class="video swiper-slide" autoplay loop muted id="video-real-case">
                                <source src="{{ $media->link }}" type="video/mp4">
                            </video>
                            <i class="fa-solid fa-volume-xmark volumn"></i>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next media-button-next"></div>
                <div class="swiper-button-prev media-button-prev"></div>
            </div>
        </section>

        <!-- 佑 媒體報導 -->
        <section id="news">
            <div class="header">
                <div class="container">
                    <div class="title">
                        <img class="share-icon" src="{{ asset('./frontend-img/index-img/news/icon1-2.png') }}"
                            alt="ig-icon">
                        <div class="title-text">
                            <div class="title-text-1">媒體報導</div>
                            <div class="title-text-2">News & Blogger</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Swiper -->
            <div class="content">
                <div class="swiper mySwiper-news">
                    <div class="swiper-wrapper">
                        @foreach ($blognews as $blognew)
                            <div class="swiper-slide">
                                <a target="_blank" href="{{ $blognew->link }}" title="波波黛莉夏季新推連結">
                                    <div class="outer-card">
                                        <div class="card">
                                            <img class="news-img" src="{{ $blognew->main_photo }}" alt="">
                                            <div class="card-body">
                                                <div class="blog-name">{{ $blognew->author }}</div>
                                                <div class="card-title">{{ $blognew->title }}</div>
                                                <div class="card-content">{{ $blognew->info }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="swiper-button-news">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        <!-- 齊 加盟專區 -->
        <section id="franchisee">
            <div id="link-franchisee"></div>
            <div class="container">
                <div class="franchisee-title">
                    <div class="franchisee-icon"></div>
                    <div class="container-franchisee-title">
                        <h2>加盟專區</h2>
                        <h3>FRANCHISEE</h3>
                    </div>
                </div>
                <div class="franchisee-container-big">
                    <div class="franchisee-container-animation" data-aos="zoom-in">
                        <a href={{ route('front.franchisee') }} class="franchisee-link" title="加盟專區連結">
                            <button type="button" class="blade-button">
                                <div class="join-us-img">
                                    <div class="join-us-info">
                                        <h2> <i class="bi bi-star-fill"></i>&nbspJoin Our Franchise! <i
                                                class="bi bi-star-fill"></i>
                                        </h2>
                                    </div>
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script src="{{ asset('./js/index.js') }}"></script>
    <script src="{{ asset('./js/header.js') }}"></script>
@endsection
