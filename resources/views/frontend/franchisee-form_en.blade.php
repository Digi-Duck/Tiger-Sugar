@extends('layouts.frontend-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('css/franchisee-form_en.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/footer.css') }}">
@endsection

@section('main')
    <!-- 內容頁 -->
    <section id="franchisee-form">
        <div class="form-container">
            <div class="form-top-container">
                <div class="form-logo"></div>
                <h1 class="form-title">Fill in the franchisee information</h1>
            </div>
            <div class="form main">
                <div class="form-name">
                    <label for="user_name">Name</label>
                    <input id="user_name" type="text" class="form-name-input" name="user_name">
                </div>
                <div class="form-date">
                    <label for="birth_day">Date of birth</label>
                    <input id="birth_day" type="date" class="form-date-input" name="birth_day">
                </div>
                <div class="form-email">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-email-input" name="email">
                </div>
                <div class="form-phone">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-phone-input" name="phone">
                </div>
                <div class="form-address">
                    <label for="address">Address</label>
                    <input id="address" type="text" class="form-address-input" name="address">
                </div>
                <div class="form-franchisee-type">
                    <label for="franchisee_type">franchisee type</label>
                    <select id="franchisee_type" type="text" class="form-franchisee-type-input" name="franchisee_type">
                        <option value disable selected>-- Please select --</option>
                        <option value="總代理">General Agent</option>
                        <option value="加盟">Franchise Store</option>
                    </select>
                </div>
                <div class="form-country">
                    <label for="country">Store Address</label>
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
                    <label for="other">other</label>
                    <input id="other" type="text" class="form-other-input" name="other">
                </div>
                <div class="form-robot">
                    <h2>窩是機器人</h2>
                </div>
                <div class="just-line"></div>
                <div class="send-data">
                    <button type="button" class="form-btn">Send</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('./js/crs.min.js') }}"></script>
    <script src="{{ asset('./js/header.js') }}"></script>
@endsection
