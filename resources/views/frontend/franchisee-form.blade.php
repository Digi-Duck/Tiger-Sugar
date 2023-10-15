@extends('layouts.frontend-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('./css/franchisee-form.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/footer.css') }}">
@endsection

@section('main')
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
            <form class="form main" action="{{route('front.franchisee_form.store')}}" method="POST">
                @csrf
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
                    <select id="franchisee_type" type="text" class="form-franchisee-type-input" name="franchisee_type">
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
                    <button type="submit" class="form-btn">送出資料</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('./js/crs.min.js') }}"></script>
    <script src="{{ asset('./js/header.js') }}"></script>
@endsection
