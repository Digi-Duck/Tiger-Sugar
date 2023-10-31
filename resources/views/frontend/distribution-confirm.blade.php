@extends('layouts.frontend-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('./css/distribution-confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/popwindow.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/footer.css') }}">
@endsection

@section('main')
    <div class="window-overlay"></div>
    <main>
        <div id="distribution-container">
            <!-- 佑 產品經銷項目確認 -->
            <section id="distribution-confirm">
                <div class="title-container">
                    <div class="title">
                        <div class="title-img"></div>
                        <div class="title-text">
                            <div class="title-text-top">經銷商品確認</div>
                            <div class="title-text-bottom">DISTRIBUTION</div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="title-area">
                        <div class="tiger-sugar-img-area">
                            <img class="tiger-sugar-img"
                                src="{{ asset('./frontend-img/distribution-confirm-img/join_us.png') }}" alt="老虎堂logo">
                        </div>
                        <div class="distribution-check">商品經銷項目確認</div>
                        <div class="title-bottom">
                            <div #swiperRef="" class="swiper mySwiper-distribution-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide title-class title-checked">全部 | All</div>
                                    @foreach ($productsType as $list)
                                        <div class="swiper-slide title-class">{{ $list->tw_name }} | {{ $list->en_name }}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-distribution-container">
                                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                        aria-controls="swiper-wrapper-53fd5a51ba467ec1" aria-disabled="false">
                                        <img class="next-prev-img"
                                            src="{{ asset('./frontend-img/distribution-confirm-img/commodity-next.svg') }}"
                                            alt="下一區品項按鈕">
                                    </div>
                                    <div class="swiper-button-prev" tabindex="0" role="button"
                                        aria-label="Previous slide" aria-controls="swiper-wrapper-53fd5a51ba467ec1"
                                        aria-disabled="false">
                                        <img class="next-prev-img"
                                            src="{{ asset('./frontend-img/distribution-confirm-img/commodity-prev.svg') }}"
                                            alt="上一區品項按鈕">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="delete-all btn" onclick="Allremove()">全部刪除</button>

                            <ul class="pagination-top">
                                <li class="page-item-prev">
                                    <a class="page-link" href="" title="前往上一頁購物車列表">
                                        <img src="{{ asset('./frontend-img/distribution-confirm-img/previous.png') }}"
                                            alt="上一頁按鈕">
                                        上一頁
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="" title="前往第1頁購物車列表">1</a>
                                </li>
                                <li class="page-item-next">
                                    <a class="page-link" href="" title="前往下一頁購物車列表">
                                        下一頁
                                        <img src="{{ asset('./frontend-img/distribution-confirm-img/next.png') }}"
                                            alt="下一頁按鈕">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr class="distribution-line">
                    <div class="content-area">
                        <div class="card-container">
                            @foreach ($products as $product)
                                <div class="direction-body">
                                    <div class="img-hover">
                                        <img class="product-img" src="{{ $product->img }}" alt="商品圖片">
                                        <img class="ask-icon"
                                            src="{{ asset('./frontend-img/distribution-confirm-img/delete.svg') }}"
                                            alt="移除已加商品">
                                        <div class="product-img-hover">
                                            <button type="button" id="add-button" class="add-button"
                                                onclick="remove({{ $product->id }})">
                                                <img class="ask-icon-hover"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/delete_hover.svg') }}"
                                                    alt="移除已加商品">
                                            </button>
                                            <a href="" class="commodity-more-button btn-more" title="獲取獲取商品規格資訊">
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
                            @endforeach

                        </div>
                    </div>
                    <hr class="distribution-line-down">
                    <ul class="pagination-down">
                        <li class="page-item-prev">
                            <a class="page-link" href="" title="前往上一頁購物車列表">
                                <img src="{{ asset('./frontend-img/distribution-confirm-img/previous.png') }}"
                                    alt="上一頁按鈕">
                                上一頁
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="" title="前往第1頁購物車列表">1</a>
                        </li>
                        <li class="page-item-next">
                            <a class="page-link" href="" title="前往下一頁購物車列表">
                                下一頁
                                <img src="{{ asset('./frontend-img/distribution-confirm-img/next.png') }}"
                                    alt="下一頁按鈕">
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- 夫 資料填寫 -->
            <section id="fillout-area">
                <div class="title-container">
                    <div class="title">
                        <div class="title-img"></div>
                        <div class="title-text">
                            <div class="title-text-top">資料填寫</div>
                            <div class="title-text-bottom">DISTRIBUTION</div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <form action="{{ route('front.distribution_confirm.store') }}" method="POST">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <div class="alert" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                        <div class="basic-fillout">
                            <div class="fill-title">經銷商基本資料填寫</div>
                            <div class="basic-inside-fillout">
                                <div class="fill-input">
                                    <div class="fill-name-birthday">
                                        <div class="fill-name">
                                            <div class="fill-name-text">姓名｜Name<span>*</span></div>
                                            <input type="text" placeholder="姓名" class="fill-name-input"
                                                name="name" required>
                                        </div>
                                        <div class="fill-birthday">
                                            <div class="fill-birthday-text">出生年月日｜Birthday<span>*</span></div>
                                            <input type="date" class="fill-birthday-input" name="birthday" required>
                                        </div>
                                    </div>

                                    <div class="fill-email">
                                        <div class="fill-email-text">電子信箱｜Email<span>*</span></div>
                                        <input type="email" placeholder="電子信箱" class="fill-email-input" name="email"
                                            required>
                                    </div>

                                    <div class="fill-phone">
                                        <div class="fill-phone-text">聯絡電話｜Phone<span>*</span></div>
                                        <input type="number" placeholder="聯絡電話" class="fill-phone-input" name="phone"
                                            required>
                                    </div>

                                    <div class="fill-address">
                                        <div class="fill-address-text">聯絡地址｜Address<span>*</span></div>
                                        <input type="text" placeholder="聯絡地址" class="fill-address-input"
                                            name="address" required>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="sales-fillout">
                            <div class="fill-title">經銷商販售方式填寫</div>
                            <div class="sales-inside-fillout">
                                <div class="sales-white-line">

                                    <div class="fill-channel">
                                        <label for="channel" class="fill-channel-text">經銷通路｜Sales
                                            Channel<span>*</span></label>
                                        <select id="channel" class="fill-channel-input" name="channel" required>
                                            <option disabled selected>----請選擇</option>
                                            <option value="commerce">網路電商 E-Commerce</option>
                                            <option value="convenience">便利商店 Concenience Store</option>
                                            <option value="supermarket">超市 Supermarket</option>
                                            <option value="hypermarket">大賣店 Hypermarket</option>
                                        </select>
                                    </div>
                                    <div class="fill-country">
                                        <label for="country" class="fill-country-text">預定經銷國家｜Distirbution
                                            Area<span>*</span></label>
                                        <select id="country" class="fill-country-input crs-country" name="country"
                                            required value="{{ old('country', $country ?? '') }}"
                                            data-default-value="Taiwan">
                                        </select>
                                    </div>

                                    <div class="fill-other">
                                        <div class="fill-other-text">其他｜Other</div>
                                        <input type="text" placeholder="其他" class="fill-other-input">
                                    </div>

                                </div>
                                <button type="submit" class="send-info">送出資料</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>

    <!-- 齊 加盟專區 -->
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
                    <a href={{ route('front.franchisee_form') }} class="franchisee-link" title="前往加盟頁">
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

    <!-- 彈跳視窗 -->
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
                            <div class="swiper-wrapper display-vertical">
                                <div class="swiper-pop-top-slide swiper-slide">
                                    <img src="{{ asset('./frontend-img/distribution-confirm-img/sesamebun1.jpeg') }}"
                                        alt="產品圖片1" />
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <img src="{{ asset('./frontend-img/distribution-confirm-img/sesamebun2.jpeg') }}"
                                        alt="產品圖片2" />
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <img src="{{ asset('./frontend-img/distribution-confirm-img/sesamebun3.jpeg') }}"
                                        alt="產品圖片3" />
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <img src="{{ asset('./frontend-img/distribution-confirm-img/sesamebun4.jpeg') }}"
                                        alt="產品圖片4" />
                                </div>
                            </div>
                        </div>
                        <div class="swiper swiper-pop-top my-pop-swiper-sub swiper-style">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide swiper-pop-top-slide">
                                    <div class="pop-sub-border-img">
                                        <img class="sub-img"
                                            src="{{ asset('./frontend-img/distribution-confirm-img/sesamebun1.jpeg') }}"
                                            alt="產品圖片1" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <div class="pop-sub-border-img">
                                        <img class="sub-img"
                                            src="{{ asset('./frontend-img/distribution-confirm-img/sesamebun2.jpeg') }}"
                                            alt="產品圖片2" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <div class="pop-sub-border-img">
                                        <img class="sub-img"
                                            src="{{ asset('./frontend-img/distribution-confirm-img/sesamebun3.jpeg') }}"
                                            alt="產品圖片3" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-pop-top-slide">
                                    <div class="pop-sub-border-img">
                                        <img class="sub-img"
                                            src="{{ asset('./frontend-img/distribution-confirm-img/sesamebun4.jpeg') }}"
                                            alt="產品圖片4" />
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next">
                                <img class="next-prev-img"
                                    src="{{ asset('./frontend-img/distribution-confirm-img/commodity-next.svg') }}"
                                    alt="下一張圖片">
                            </div>
                            <div class="swiper-button-prev">
                                <img class="next-prev-img"
                                    src="{{ asset('./frontend-img/distribution-confirm-img/commodity-prev.svg') }}"
                                    alt="上一張圖片">
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
                                    <div class="swiper-pop-bottom-slide swiper-slide">
                                        <div class="direction-body">
                                            <div class="img-box-border-img">
                                                <img class="product-img"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/1668998205a2557a7b2e94197ff767970b67041697.jpg') }}"
                                                    alt="商品圖片">
                                                <img class="ask-icon"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask.svg') }}"
                                                    alt="加入購物車">
                                                <div class="product-img-hover">
                                                    <img class="ask-icon-hover"
                                                        src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask_hover.svg') }}"
                                                        alt="加入購物車">
                                                    <a href="" class="commodity-more-button btn" title="更多商品">
                                                        MORE
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="commodity-title">
                                                老虎堂地瓜條
                                            </div>
                                            <div class="commodity-title-english">
                                                Tiger Sugar Sweet Potato Fries
                                            </div>
                                            <div class="commodity-sort">
                                                零食｜Snack
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-pop-bottom-slide">
                                        <div class="direction-body">
                                            <div class="img-box-border-img">
                                                <img class="product-img"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/165899031442a0e188f5033bc65bf8d78622277c4e.jpg') }}"
                                                    alt="商品圖片">
                                                <img class="ask-icon"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask.svg') }}"
                                                    alt="加入購物車">
                                                <div class="product-img-hover">
                                                    <img class="ask-icon-hover"
                                                        src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask_hover.svg') }}"
                                                        alt="加入購物車">
                                                    <a href="" class="commodity-more-button btn" title="更多商品">
                                                        MORE
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="commodity-title">
                                                經典黑糖麻糬包
                                            </div>
                                            <div class="commodity-title-english">
                                                Black Sugar Mochi Bun
                                            </div>
                                            <div class="commodity-sort">
                                                食品｜Food
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-pop-bottom-slide">
                                        <div class="direction-body">
                                            <div class="img-box-border-img">
                                                <img class="product-img"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/165899100742a0e188f5033bc65bf8d78622277c4e.jpg') }}"
                                                    alt="商品圖片">
                                                <img class="ask-icon"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask.svg') }}"
                                                    alt="加入購物車">
                                                <div class="product-img-hover">
                                                    <img class="ask-icon-hover"
                                                        src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask_hover.svg') }}"
                                                        alt="加入購物車">
                                                    <a href="" class="commodity-more-button btn" title="更多商品">
                                                        MORE
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="commodity-title">
                                                爆漿起司流心包
                                            </div>
                                            <div class="commodity-title-english">
                                                Bursting Cheese Filling Bun
                                            </div>
                                            <div class="commodity-sort">
                                                食品｜Food
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-pop-bottom-slide">
                                        <div class="direction-body">
                                            <div class="img-box-border-img">
                                                <img class="product-img"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/1658908734cfecdb276f634854f3ef915e2e980c31.jpg') }}"
                                                    alt="商品圖片">
                                                <img class="ask-icon"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask.svg') }}"
                                                    alt="加入購物車">
                                                <div class="product-img-hover">
                                                    <img class="ask-icon-hover"
                                                        src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask_hover.svg') }}"
                                                        alt="加入購物車">
                                                    <a href="" class="commodity-more-button btn" title="更多商品">
                                                        MORE
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="commodity-title">
                                                黑糖奶霜樹幹年輪
                                            </div>
                                            <div class="commodity-title-english">
                                                Black Suga Cream Trunk Baumkuchen
                                            </div>
                                            <div class="commodity-sort">
                                                甜點｜dessert
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-pop-bottom-slide">
                                        <div class="direction-body">
                                            <div class="img-box-border-img">
                                                <img class="product-img"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/16589912415878a7ab84fb43402106c575658472fa.jpg') }}"
                                                    alt="商品圖片">
                                                <img class="ask-icon"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask.svg') }}"
                                                    alt="加入購物車">
                                                <div class="product-img-hover">
                                                    <img class="ask-icon-hover"
                                                        src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask_hover.svg') }}"
                                                        alt="加入購物車">
                                                    <a href="" class="commodity-more-button btn" title="更多商品">
                                                        MORE
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="commodity-title">
                                                特濃黑糖厚奶蓋蛋糕
                                            </div>
                                            <div class="commodity-title-english">
                                                Black Sugar Cheese Foam Cake
                                            </div>
                                            <div class="commodity-sort">
                                                甜點｜dessert
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-pop-bottom-slide">
                                        <div class="direction-body">
                                            <div class="img-box-border-img">
                                                <img class="product-img"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/16508571967e7757b1e12abcb736ab9a754ffb617a.jpg') }}"
                                                    alt="商品圖片">
                                                <img class="ask-icon"
                                                    src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask.svg') }}"
                                                    alt="加入購物車">
                                                <div class="product-img-hover">
                                                    <img class="ask-icon-hover"
                                                        src="{{ asset('./frontend-img/distribution-confirm-img/add_for_ask_hover.svg') }}"
                                                        alt="加入購物車">
                                                    <a href="" class="commodity-more-button btn" title="更多商品">
                                                        MORE
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="commodity-title">
                                                老虎芝士流心雪糕
                                            </div>
                                            <div class="commodity-title-english">
                                                Tiger Cheese Filling Black Sugar Ice Cream Bar
                                            </div>
                                            <div class="commodity-sort">
                                                冰品｜Ice
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-product">
                                <div class="swiper-button-next">
                                    <img class="next-prev-img"
                                        src="{{ asset('./frontend-img/distribution-confirm-img/commodity-next.svg') }}"
                                        alt="下一張圖片">
                                </div>
                                <div class="swiper-button-prev">
                                    <img class="next-prev-img"
                                        src="{{ asset('./frontend-img/distribution-confirm-img/commodity-prev.svg') }}"
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
    <script src="{{ asset('./js/crs.min.js') }}"></script>
    <script src="{{ asset('./js/distribution-confirm.js') }}"></script>
    <script src="{{ asset('./js/popwindow.js') }}"></script>
    <script src="{{ asset('./js/header.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function remove(id) {
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'post');
            formData.append('id', id);
            fetch('{{ route('front.remove_to_cart') }}', {
                method: 'POST',
                body: formData,
            }).then((res) => {
                return res.text();
            }).then((data) => {
                console.log(data);
                if (data == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: '刪除成功',
                    }).then((res) => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '刪除失敗',
                    });
                }
            });
        }

        function Allremove() {
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'post');
            fetch('{{ route('front.all_remove_to_cart') }}', {
                method: 'POST',
                body: formData,
            }).then((res) => {
                return res.text();
            }).then((data) => {
                if (data == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: '刪除成功',
                    }).then((res) => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '刪除失敗',
                    });
                }
            });
        }
    </script>
@endsection
