<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tiger Sugar 老虎堂｜虎虎生風｜黑糖專売</title>
    <link rel="bookmark" href="./frontend-img/website-title-img/favicon.ico">

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- bootstrap-icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('./css/franchisee-form.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/footer.css') }}">
</head>

<body>
    <!-- 秋 header -->
    <header>
        <nav>
            <section class="nav-logo">
                <a href={{ route('front.index') }} title="前往首頁">
                    <img class="nav-logo-btn" src="./frontend-img/header-img/LOGO.png" alt="tiger-logo">
                </a>
            </section>

            <section class="nav-main">
                <section class="main-menu">
                    <!----------------------------- 關於我們 ------------------------------------>
                    <a href={{ route('front.index.about') }} class="about-link" title="前往首頁的關於我們">
                        <button type="button" class="blade-button">
                            <div class="about">
                                <div class="about-img">
                                    <div class="main-menu-img">
                                        <img class="main-menu-about" src="./frontend-img/header-img/about.png"
                                            alt="about-icon">
                                        <img class="main-menu-about-gold" src="./frontend-img/header-img/about-gold.png"
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
                    <a href={{ route('front.distribution') }} class="distribution-link" title="前往產品經銷頁">
                        <button type="button" class="blade-button">
                            <div class="distribution">
                                <div class="main-menu-img">
                                    <img class="main-menu-distribution" src="./frontend-img/header-img/distribution.png"
                                        alt="distribution-icon">
                                    <img class="main-menu-distribution-gold"
                                        src="./frontend-img/header-img/distribution-gold.png"
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
                    <a href={{ route('front.index.classic') }} class="classic-link" title="前往首頁的熱門經典">
                        <button type="button" class="blade-button">
                            <div class="classic">
                                <div class="main-menu-img">
                                    <img class="main-menu-classic" src="./frontend-img/header-img/classic.png"
                                        alt="classic-icon">
                                    <img class="main-menu-classic-gold" src="./frontend-img/header-img/classic-gold.png"
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
                    <a href={{ route('front.index.media') }} class="media-link" title="前往首頁的媒體露出">
                        <button type="button" class="blade-button">
                            <div class="media">
                                <div class="main-menu-img">
                                    <img class="main-menu-media" src="./frontend-img/header-img/media.png"
                                        alt="media-icon">
                                    <img class="main-menu-media-gold" src="./frontend-img/header-img/media-gold.png"
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
                    <a href={{ route('front.franchisee') }} class="franchisee-link" title="前往加盟專區頁">
                        <button type="button" class="blade-button">
                            <div class="franchisee">
                                <div class="main-menu-img">
                                    <img class="main-menu-franchisee" src="./frontend-img/header-img/franchisee.png"
                                        alt="franchisee-icon">
                                    <img class="main-menu-franchisee-gold"
                                        src="./frontend-img/header-img/franchisee-gold.png"
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
                                <img class="social-menu-icon-fb" src="./frontend-img/header-img/fb.png"
                                    alt="icon-fb">
                            </a>
                        </div>

                        <div class="social-menu-icon">
                            <a href="https://www.instagram.com/twtigersugar/" title="instagram連結">
                                <img class="social-menu-icon-ig" src="./frontend-img/header-img/ig.png"
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
                                <div class="dropdown-content-ch">
                                    <a href="https://tigersugar.com/" title="選擇中文">繁體中文</a>
                                </div>
                                <div class="dropdown-content-en">
                                    <a href="https://en.tigersugar.com/" title="select on English">English</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </section>
            <!-- 測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕 -->
            <section class="jing-section btn">
                <img class="jing-section-btn" src="./frontend-img/header-img/nav_menu_list.png" alt="navm-enu-list">
            </section>



            <!-- 漢堡條 測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕測試toggle按鈕 -->
            <div class="container menu">
                <div class="nav-ham">
                    <div class="mine-menu">
                        <div class="flex-mine-menu">
                            <div class="top-mine-menu">
                                <!----------------------------- 關於我們 ------------------------------------>
                                <a href={{ route('front.index.about') }} id="drop-about" title="前往首頁的關於我們">
                                    <button type="button" class="drop-blade-button">
                                        <div class="menu-about">
                                            <div class="about-img">
                                                <img class="main-menu-about" src="./frontend-img/header-img/about.png"
                                                    alt="about-icon">
                                                <img class="main-menu-about-gold"
                                                    src="./frontend-img/header-img/about-gold.png" alt="about-icon">
                                            </div>
                                            <div class="main-menu-text">
                                                <div class="main-menu-text-ch">關於我們</div>
                                                <div class="main-menu-text-en">ABOUT</div>
                                            </div>
                                        </div>
                                    </button>
                                </a>
                                <!----------------------------- 產品經銷 ------------------------------------>
                                <a href={{ route('front.distribution') }} id="drop-distribution" title="前往產品經銷頁">
                                    <button type="button" class="drop-blade-button">
                                        <div class="menu-distribution">
                                            <div class="distribution-img">
                                                <img class="main-menu-distribution"
                                                    src="./frontend-img/header-img/distribution.png"
                                                    alt="distribution-icon">
                                                <img class="main-menu-distribution-gold"
                                                    src="./frontend-img/header-img/distribution-gold.png"
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
                                <a href={{ route('front.index.classic') }} id="drop-classic" title="前往首頁的熱門經典">
                                    <button type="button" class="drop-blade-button">
                                        <div class="menu-classic">
                                            <div class="classic-img">
                                                <img class="main-menu-classic"
                                                    src="./frontend-img/header-img/classic.png" alt="classic-icon">
                                                <img class="main-menu-classic-gold"
                                                    src="./frontend-img/header-img/classic-gold.png"
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
                                <a href={{ route('front.index.media') }} id="drop-media" title="前往首頁的媒體露出">
                                    <button type="button" class="drop-blade-button">
                                        <div class="menu-media">
                                            <div class="media-img">
                                                <img class="main-menu-media" src="./frontend-img/header-img/media.png"
                                                    alt="media-icon">
                                                <img class="main-menu-media-gold"
                                                    src="./frontend-img/header-img/media-gold.png"
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
                                <a href={{ route('front.franchisee') }} id="drop-franchisee" title="前往加盟專區頁">
                                    <button type="button" class="drop-blade-button">
                                        <div class="menu-franchisee">
                                            <div class="franchisee-img">
                                                <img class="main-menu-franchisee"
                                                    src="./frontend-img/header-img/franchisee.png"
                                                    alt="franchisee-icon">
                                                <img class="main-menu-franchisee-gold"
                                                    src="./frontend-img/header-img/franchisee-gold.png"
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
                                                <a href="" title="繁體中文" title="選擇中文">
                                                    <div class="header-slide-ch">
                                                        繁體中文
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="" title="english" title="select on English">
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
                                        <img class="social-menu-icon-fb" src="./frontend-img/header-img/fb.png"
                                            alt="icon-fb">
                                    </a>
                                    <a href="https://www.instagram.com/twtigersugar/" title="老虎堂IG">
                                        <img class="social-menu-icon-ig" src="./frontend-img/header-img/ig.png"
                                            alt="social-menu-icon-ig">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
        </nav>
        <!-- 秋 選單紀錄 按鈕 -->
        <a href={{ route('front.distribution_confirm') }} class="shop-cart-container" title="前往購物車">
            <button type="button" class="blade-button">
                <img class="shop-cart" src="./frontend-img/header-img/shop_cart_button.svg" alt="前往購物車">
                <div class="shop-cart-amount-area">
                    <img class="shop-cart-amount" src="./frontend-img/header-img/amount.svg" alt="前往購物車">
                    <div class="shop-cart-number">0</div>
                </div>
            </button>
        </a>

        <!-- 秋 top 按鈕 -->
        <div class="go-to-top-container topbtn">
            <!-- "#"回到最上方 -->
            <a href="#" title="回到最上方"><img class="go-to-top" src="./frontend-img/header-img/go_to_top.svg"
                    alt="go_to_top"></a>
        </div>
    </header>

    <!-- 內容頁 -->
    <section id="franchisee-form">
        <div class="form-container">
            <div class="form-top-container">
                <div class="form-logo"></div>
                <h1 class="form-title">加盟主資料填寫</h1>
                <div class="form-link">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeDtvkV21syrYQjA_i8sY6DXGPsv2jMaMrzEXa2McmbmcVchg/viewform"
                        title="台灣加盟主專用">★
                        台灣加盟請點此 Taiwan Franchise Store ★</a>
                </div>
            </div>
            <div class="form main">
                <div class="form-name">
                    <label for="user_name">姓名｜Name</label>
                    <input id="user_name" type="text" class="form-name-input" name="user_name">
                </div>
                <div class="form-date">
                    <label for="birth_day">出生年月日｜Date of birth</label>
                    <input id="birth_day" type="date" class="form-date-input" name="birth_day">
                </div>
                <div class="form-email">
                    <label for="email">電子信箱｜Email</label>
                    <input id="email" type="text" class="form-email-input" name="email">
                </div>
                <div class="form-phone">
                    <label for="phone">聯絡電話｜Phone</label>
                    <input id="phone" type="text" class="form-phone-input" name="phone">
                </div>
                <div class="form-address">
                    <label for="address">通訊地址｜Address</label>
                    <input id="address" type="text" class="form-address-input" name="address">
                </div>
                <div class="form-franchisee-type">
                    <label for="franchisee_type">加盟方式｜franchisee type</label>
                    <select id="franchisee_type" type="text" class="form-franchisee-type-input"
                        name="franchisee_type">
                        <option value disable selected>--請選擇--</option>
                        <option value="總代理">總代理 - General Agent</option>
                        <option value="加盟">加盟 - Franchise Store</option>
                    </select>
                </div>
                <div class="form-country">
                    <label for="country">預定加盟城市|Store Address</label>
                    <div class="country-selector">
                        <select data-region-id="where" class="form-country-input crs-country" name="country"
                            data-region-id="country-region" data-default-value="Taiwan">
                        </select>
                        <select id="where" class="form-country-input" name="capital" data-region-id="capital">
                        </select>
                    </div>
                </div>
                <div class="form-country-city">
                    <input id="store_address" type="text" class="form-country-city-input" placeholder="Address"
                        name="store_address">
                </div>
                <div class="form-other">
                    <label for="other">其他｜other</label>
                    <input id="other" type="text" class="form-other-input" name="other">
                </div>
                <div class="form-robot">
                    <h2>窩是機器人</h2>
                </div>
                <div class="just-line"></div>
                <div class="send-data">
                    <button type="button" class="form-btn">送出資料</button>
                </div>
            </div>
        </div>
    </section>

    <!-- 秋 footer -->
    <footer>
        <p class="footer-text">Copyright © 201811 Tigersugar International Enterprise Co., Ltd.</p>
    </footer>

    <!-- swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script src="{{ asset('./js/crs.min.js') }}"></script>
    <script src="{{ asset('./js/header.js') }}"></script>
</body>

</html>
