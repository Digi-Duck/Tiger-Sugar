@extends('layouts.frontend-en-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('css/index_en.css') }}">
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
                                        <img class="banner-pc-img" src="{{ $banner->pc_image_url }}" alt="{{ $banner->image_alt }}">
                                        <img class="banner-mb-img" src="{{ $banner->mb_image_url }}" alt="{{ $banner->image_alt }}">
                                    </a>
                                @else
                                    <div>
                                        <img class="banner-pc-img" src="{{ $banner->pc_image_url }}" alt="{{ $banner->image_alt }}">
                                        <img class="banner-mb-img" src="{{ $banner->mb_image_url }}" alt="{{ $banner->image_alt }}">
                                    </div>
                                @endif
                            @elseif ($banner->type == '影片')
                            <iframe class="banner-pc-vedio" src="https://youtube.com/embed/{{ $banner->pc_video_url }}?autoplay=1&controls=0&showinfo=0&autohide=1"> alt="{{ $banner->pc_video_url }}" frameborder="0"></iframe>
                            <iframe class="banner-mb-vedio" src="https://youtube.com/embed/{{ $banner->mb_video_url }}?autoplay=1&controls=0&showinfo=0&autohide=1"> alt="{{ $banner->mb_video_url }}" frameborder="0"></iframe>
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
                            <h2>Original Intention</h2>
                            <p>
                                Tigersugar is an international dessert chain brand originated in Taiwan.<br>
                                Our intention is to let the world taste the best flavor of Taiwan boba pearl milk tea through taste and vision.<br>
                                After more than ten years of painstaking research and development,<br>
                                Tigersugar believes that desserts are the most relaxing, healing and relaxing food.<br>
                                We are unique in the world, is the first "drink" dessert.<br>
                                What Tigersugar wants to convey to the world is Taiwan's strong human touch and endless creative aesthetics of leisure desserts.
                            </p>
                        </div>
                    </div>
                    <div class="about-card-group-text-animation-bottom" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom" data-aos-duration="800">
                        <div class="about-card-group-img">
                            <img src="{{ asset('./frontend-img/index-img/about/icon5.png') }}" alt="關於我們杯子logo">
                        </div>
                        <div class="about-card-group-text">
                            <h2>Feature Of Product</h2>
                            <p>
                                The world's first "drink" dessert, Taiwan boba pearl milk tea visual drink "sugar" is the core element of dessert,<br>
                                With the global trend of healthy living, delicious food is "more nutritious, healthier and less burdensome".<br>
                                Black Sugar is not only the flavor of ancient Taiwan miss, but also rich in minerals and vitamins and other nutrients,<br>
                                With a unique aroma, it is an unforgettable taste of Taiwan.<br>
                                In addition to the unique taste, the combination of aesthetic feeling and healing vision tiger pattern can make people relax while drinking.<br>
                                As if there is a magic, attract people again and again, again and again to taste.
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
                                            <img class="ask-icon" data-product="{{ $product->id }}"
                                                src="{{ asset('./frontend-img/index-img/distribution/add_for_ask.svg') }}"
                                                alt="黃色加入以詢問">
                                            <div class="product-img-hover">
                                                <a href="" class="cursor-p">
                                                    <img class="ask-icon-hover" data-product="{{ $product->id }}"
                                                        src="{{ asset('./frontend-img/index-img/distribution/add_for_ask_hover.svg') }}"
                                                        alt="黃色加入以詢問">
                                                </a>
                                                <a href={{ route('front.distribution.en') }}
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
                    <a href={{ route('front.distribution.en') }} class="distribution-area-button" title="更多商品">
                        More
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
                            <div class="cold-drink-info" data-aos="fade-up"><span class="cold-drink-span"></span>Cold
                            </div>
                            <div class="hot-drink-info" data-aos="fade-up"><span class="hot-drink-span"></span>Hot
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
                                                @foreach ($drink_type->drinkEn as $drink)
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
                                    <div class="menu-info-title">Fresh Milk Replaces Creamer</div>
                                    <div class="menu-info-text">We replace the creamer with fresh milk, providing a rich and savory taste, Let you enjoy a drink and having a nutritional without burden!
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="intro">
                                <div class="icon-section">
                                    <img class="intro-logo"
                                        src="{{ asset('./frontend-img/index-img/classic/icon.png') }}" alt="menu_icon">
                                </div>
                                <div class="menu-info">
                                    <div class="menu-info-title">TIGER SUGAR Black Sugar Boba</div>
                                    <div class="menu-info-text">
                                        Through the exclusive "TIGER SUGAR Black Sugar", smouldering, the taste is layered, with chewing, and a rich Black Sugar aroma at the entrance. It’s recommended to shake 15 times before drinking!</div>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="intro">
                                <div class="icon-section">
                                    <img class="intro-logo"
                                        src="{{ asset('./frontend-img/index-img/classic/icon.png') }}" alt="menu_icon">
                                </div>
                                <div class="menu-info">
                                    <div class="menu-info-title">Tiger Black Sugar</div>
                                    <div class="menu-info-text">"Tiger Black Sugar", it is composed of perfect proportions, with a distinctly layered and fragrant taste.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="content">
                            <div data-aos="fade-up" class="menu-bottom">
                                <div class="step-1">
                                    <p class="how-title">Best way to drink Black Sugar Boba milk?</p>
                                    <p class="text14-4 pd color-white">Step1. Take a creative picture and upload to Facebook and Instagram</p>
                                </div>
                            </div>
                            <div class="parallax">
                                <div class="parallax-img-1"></div>
                            </div>
                        </div>
                        <div class="content">
                            <div data-aos="fade-up" class="menu-bottom row mt-5 justify-content-center">
                                <div class="step-2">
                                    <p class="color-white text14-4">Step2.Shake up and down for 15 times( Most important steps)</p>
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
                        <a href={{ route('front.franchisee.en') }} class="franchisee-link" title="加盟專區連結">
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
