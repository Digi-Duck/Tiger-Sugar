<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tiger Sugar 老虎堂｜虎虎生風｜黑糖專売</title>
    <link rel="bookmark" href="{{ asset('./frontend-img/website-title-img/favicon.ico') }}">

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- bootstrap-icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    @yield('css')
</head>

<body>
    <!-- 秋 header -->
    <header>
        <nav style="height: 76px">
            <section class="nav-logo">
                <a href="{{ route('front.index.en') }}" title="前往首頁">
                    <img class="nav-logo-btn" src="{{ asset('./frontend-img/header-img/LOGO.png') }}" alt="tiger-logo">
                </a>
            </section>

            <section class="nav-main">
                <section class="main-menu">
                    <!----------------------------- 關於我們 ------------------------------------>
                    <a href={{ route('front.index.about.en') }} class="about-link" title="前往首頁的關於我們">
                        <button type="button" class="blade-button">
                            <div class="about">
                                <div class="about-img">
                                    <div class="main-menu-img">
                                        <img class="main-menu-about"
                                            src="{{ asset('./frontend-img/header-img/about.png') }}" alt="about-icon">
                                        <img class="main-menu-about-gold"
                                            src="{{ asset('./frontend-img/header-img/about-gold.png') }}"
                                            alt="about-icon">
                                    </div>
                                </div>
                                <div class="main-menu-text">
                                    <div class="text-ch">關於我們</div>
                                    <div class="text-en">ABOUT</div>
                                </div>
                            </div>
                        </button>
                    </a>
                    <!----------------------------- 產品經銷 ------------------------------------>
                    @if (Route::is('front.index.en'))
                        <a href={{ route('front.index.distribution.en') }} class="distribution-link" title="前往首頁的產品經銷">
                        @else
                            <a href={{ route('front.distribution.en') }} class="distribution-link" title="前往產品經銷頁">
                    @endif
                    <button type="button" class="blade-button">
                        <div class="distribution">
                            <div class="main-menu-img">
                                <img class="main-menu-distribution"
                                    src="{{ asset('./frontend-img/header-img/distribution.png') }}"
                                    alt="distribution-icon">
                                <img class="main-menu-distribution-gold"
                                    src="{{ asset('./frontend-img/header-img/distribution-gold.png') }}"
                                    alt="distribution-gold-icon">
                            </div>
                            <div class="main-menu-text">
                                <span class="text-ch">產品經銷</span>
                                <span class="text-en">DISTRIBUTION</span>
                            </div>
                        </div>
                    </button>
                    </a>
                    <!----------------------------- 熱門經典 ------------------------------------>
                    <a href={{ route('front.index.classic.en') }} class="classic-link" title="前往首頁的熱門經典">
                        <button type="button" class="blade-button">
                            <div class="classic">
                                <div class="main-menu-img">
                                    <img class="main-menu-classic"
                                        src="{{ asset('./frontend-img/header-img/classic.png') }}" alt="classic-icon">
                                    <img class="main-menu-classic-gold"
                                        src="{{ asset('./frontend-img/header-img/classic-gold.png') }}"
                                        alt="classic-gold-icon">
                                </div>
                                <div class="main-menu-text">
                                    <span class="text-ch">熱門經典</span>
                                    <span class="text-en">CLASSIC</span>
                                </div>
                            </div>
                        </button>
                    </a>
                    <!----------------------------- 媒體露出 ------------------------------------>
                    <a href={{ route('front.index.media.en') }} class="media-link" title="前往首頁的媒體露出">
                        <button type="button" class="blade-button">
                            <div class="media">
                                <div class="main-menu-img">
                                    <img class="main-menu-media" src="{{ asset('./frontend-img/header-img/media.png') }}"
                                        alt="media-icon">
                                    <img class="main-menu-media-gold"
                                        src="{{ asset('./frontend-img/header-img/media-gold.png') }}"
                                        alt="media-icon-icon">
                                </div>
                                <div class="main-menu-text">
                                    <span class="text-ch">媒體露出</span>
                                    <span class="text-en">MEDIA</span>
                                </div>
                            </div>
                        </button>
                    </a>
                    <!----------------------------- 加盟專區 ------------------------------------>
                    @if (Route::is('front.index.en'))
                        <a href={{ route('front.index.franchisee.en') }} class="franchisee-link" title="前往首頁的加盟專區">
                        @else
                            <a href={{ route('front.franchisee.en') }} class="franchisee-link" title="前往加盟專區頁">
                    @endif
                    <button type="button" class="blade-button">
                        <div class="franchisee">
                            <div class="main-menu-img">
                                <img class="main-menu-franchisee"
                                    src="{{ asset('./frontend-img/header-img/franchisee.png') }}" alt="franchisee-icon">
                                <img class="main-menu-franchisee-gold"
                                    src="{{ asset('./frontend-img/header-img/franchisee-gold.png') }}"
                                    alt="franchisee-gold-icon">
                            </div>
                            <div class="main-menu-text">
                                <span class="text-ch">加盟專區</span>
                                <span class="text-en">FRANCHISEE</span>
                            </div>
                        </div>
                    </button>
                    </a>

                </section>
                <!----------------------------- 社群連結 ------------------------------------>
                <section class="social-menu">
                    <div class="social-menu-main">
                        <div class="social-menu-icon">
                            <a href="https://www.facebook.com/twtigersugar/" title="facebook連結">
                                <img class="social-menu-icon-fb" src="{{ asset('./frontend-img/header-img/fb.png') }}"
                                    alt="icon-fb">
                            </a>
                        </div>

                        <div class="social-menu-icon">
                            <a href="https://www.instagram.com/twtigersugar/" title="instagram連結">
                                <img class="social-menu-icon-ig" src="{{ asset('./frontend-img/header-img/ig.png') }}"
                                    alt="social-menu-icon-ig">
                            </a>
                        </div>
                    </div>
                    <!----------------------------- 語言選擇 ------------------------------------>
                    <section class="language-menu ">
                        <div class="language-position">
                            <div class="drop-down-menu">
                                <a href="#" title="語言切換">LANGUAGE &dtrif;</a>
                            </div>
                            <div class="drop-down-menu-sub">
                                <a class="dropdown-content-ch" href="{{ route('front.index') }}" >
                                    <div title="選擇中文">繁體中文</div>
                                </a>
                                <a class="dropdown-content-en" href="{{ route('front.index.en') }}">
                                    <div  title="select on English">English</div>
                                </a>
                            </div>
                        </div>
                    </section>
                </section>
            </section>
            <!-- 測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕 -->
            <section class="jing-section btn">
                <img class="jing-section-btn" src="{{ asset('./frontend-img/header-img/nav_menu_list.png') }}"
                    alt="navm-enu-list">
            </section>



            <!-- 漢堡條 測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕 -->
            <div class="container menu">
                <div class="nav-ham">
                    <div class="mine-menu">
                        <div class="flex-mine-menu">
                            <div class="top-mine-menu">
                                <!----------------------------- 關於我們 ------------------------------------>
                                <a href="{{ route('front.index.about.en') }}" id="drop-about" title="前往首頁的關於我們">
                                    <button type="button" class="drop-blade-button">
                                        <div class="menu-about">
                                            <div class="about-img">
                                                <img class="main-menu-about"
                                                    src="{{ asset('./frontend-img/header-img/about.png') }}"
                                                    alt="about-icon">
                                                <img class="main-menu-about-gold"
                                                    src="{{ asset('./frontend-img/header-img/about-gold.png') }}"
                                                    alt="about-icon">
                                            </div>
                                            <div class="main-menu-text">
                                                <div class="main-menu-text-ch">關於我們</div>
                                                <div class="main-menu-text-en">ABOUT</div>
                                            </div>
                                        </div>
                                    </button>
                                </a>
                                <!----------------------------- 產品經銷 ------------------------------------>
                                @if (Route::is('front.index.en'))
                                    <a href={{ route('front.index.distribution.en') }} title="前往首頁的產品經銷">
                                    @else
                                        <a href={{ route('front.distribution.en') }} title="前往產品經銷頁">
                                @endif
                                <button type="button" class="drop-blade-button">
                                    <div class="menu-distribution">
                                        <div class="distribution-img">
                                            <img class="main-menu-distribution"
                                                src="{{ asset('./frontend-img/header-img/distribution.png') }}"
                                                alt="distribution-icon">
                                            <img class="main-menu-distribution-gold"
                                                src="{{ asset('./frontend-img/header-img/distribution-gold.png') }}"
                                                alt="distribution-gold-icon">
                                        </div>
                                        <div class="main-menu-text">
                                            <span class="main-menu-text-ch">產品經銷</span>
                                            <span class="main-menu-text-en">DISTRIBUTION</span>
                                        </div>
                                    </div>
                                </button>
                                </a>
                                <!----------------------------- 熱門經典 ------------------------------------>
                                <a href={{ route('front.index.classic.en') }} id="drop-classic" title="前往首頁的熱門經典">
                                    <button type="button" class="drop-blade-button">
                                        <div class="menu-classic">
                                            <div class="classic-img">
                                                <img class="main-menu-classic"
                                                    src="{{ asset('./frontend-img/header-img/classic.png') }}"
                                                    alt="classic-icon">
                                                <img class="main-menu-classic-gold"
                                                    src="{{ asset('./frontend-img/header-img/classic-gold.png') }}"
                                                    alt="classic-gold-icon">
                                            </div>
                                            <div class="main-menu-text">
                                                <span class="main-menu-text-ch">熱門經典</span>
                                                <span class="main-menu-text-en">CLASSIC</span>
                                            </div>
                                        </div>
                                    </button>
                                </a>
                                <!----------------------------- 媒體露出 ------------------------------------>
                                <a href={{ route('front.index.media.en') }} id="drop-media" title="前往首頁的媒體露出">
                                    <button type="button" class="drop-blade-button">
                                        <div class="menu-media">
                                            <div class="media-img">
                                                <img class="main-menu-media"
                                                    src="{{ asset('./frontend-img/header-img/media.png') }}"
                                                    alt="media-icon">
                                                <img class="main-menu-media-gold"
                                                    src="{{ asset('./frontend-img/header-img/media-gold.png') }}"
                                                    alt="media-icon-icon">
                                            </div>
                                            <div class="main-menu-text">
                                                <span class="main-menu-text-ch">媒體露出</span>
                                                <span class="main-menu-text-en">MEDIA</span>
                                            </div>
                                        </div>
                                    </button>
                                </a>
                                <!----------------------------- 加盟專區 ------------------------------------>
                                @if (Route::is('front.index.en'))
                                    <a href={{ route('front.index.franchisee.en') }} title="前往首頁的加盟專區">
                                    @else
                                        <a href={{ route('front.franchisee.en') }} title="前往加盟專區頁">
                                @endif
                                <button type="button" class="drop-blade-button">
                                    <div class="menu-franchisee">
                                        <div class="franchisee-img">
                                            <img class="main-menu-franchisee"
                                                src="{{ asset('./frontend-img/header-img/franchisee.png') }}"
                                                alt="franchisee-icon">
                                            <img class="main-menu-franchisee-gold"
                                                src="{{ asset('./frontend-img/header-img/franchisee-gold.png') }}"
                                                alt="franchisee-gold-icon">
                                        </div>
                                        <div class="main-menu-text">
                                            <span class="main-menu-text-ch">加盟專區</span>
                                            <span class="main-menu-text-en">FRANCHISEE</span>
                                        </div>
                                    </div>
                                </button>
                                </a>
                            </div>


                            <div class="mine-menu-btn">
                                <!----------------------------- 語言選擇 ------------------------------------>
                                <div class="swiper-language">
                                    <div class="swiper mySwiper header-swiper-container">
                                        <div class="swiper-wrapper header-swiper-language">
                                            <div class="swiper-slide">
                                                <a href="{{ route('front.index') }}" title="繁體中文" title="選擇中文">
                                                    <div class="header-slide-ch">
                                                        繁體中文
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="{{ route('front.index.en') }}" title="english" title="select on English">
                                                    <div class="header-slide-en">
                                                        ENGLISH
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-next header-button-next"></div>
                                        <div class="swiper-button-prev header-button-prev"></div>
                                    </div>
                                </div>
                                <!----------------------------- 社群連結 ------------------------------------>
                                <div class="social-menu-icon">
                                    <a href="https://www.facebook.com/twtigersugar/" title="老虎堂FB">
                                        <img class="social-menu-icon-fb"
                                            src="{{ asset('./frontend-img/header-img/fb.png') }}" alt="icon-fb">
                                    </a>
                                    <a href="https://www.instagram.com/twtigersugar/" title="老虎堂IG">
                                        <img class="social-menu-icon-ig"
                                            src="{{ asset('./frontend-img/header-img/ig.png') }}"
                                            alt="social-menu-icon-ig">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
        </nav>
        <!-- 秋 選單紀錄 按鈕 -->
        <a href={{ route('front.distribution_confirm.en') }} class="shop-cart-container" title="前往購物車">
            <button type="button" class="blade-button">
                <img class="shop-cart" src="{{ asset('./frontend-img/header-img/shop_cart_button.svg') }}"
                    alt="前往購物車">
                <div class="shop-cart-amount-area">
                    <img class="shop-cart-amount" src="{{ asset('./frontend-img/header-img/amount.svg') }}"
                        alt="前往購物車">
                    <div class="shop-cart-number">0</div>
                </div>
            </button>
        </a>

        <!-- 秋 top 按鈕 -->
        <div class="go-to-top-container topbtn">
            <!-- "#"回到最上方 -->
            <a href="#" title="回到最上方"><img class="go-to-top"
                    src="{{ asset('./frontend-img/header-img/go_to_top.svg') }}" alt="go_to_top"></a>
        </div>
    </header>

    @yield('main')

    <!-- 秋 footer -->
    <footer>
        <p class="footer-text">Copyright © 201811 Tigersugar International Enterprise Co., Ltd.</p>
    </footer>

    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>

    @yield('js')
</body>

</html>
