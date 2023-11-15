@extends('layouts.frontend-en-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('./css/franchisee-form_en.css') }}">
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
            <form class="form main" action="{{ route('front.franchisee_form_en.store') }}" method="POST">
                @csrf
                @foreach ($errors->all() as $error)
                    <div class="alert" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
                <div class="form main">
                    <div class="form-name">
                        <label for="user_name">Name <span>*</span> </label>
                        <input id="user_name" type="text" class="form-name-input" placeholder="Enter your name" required
                            name="user_name" value="{{ old('user_name', $user_name ?? '') }}">
                    </div>
                    <div class="form-date">
                        <label for="birth_day">Date of birth <span>*</span> </label>
                        <input id="birth_day" type="date" class="form-date-input" required name="birth_day"  value="{{ old('birth_day', $birth_day ?? '') }}">
                    </div>
                    <div class="form-email">
                        <label for="email">Email <span>*</span> </label>
                        <input id="email" type="text" class="form-email-input" placeholder="Enter your Enail"
                            required name="email" value="{{ old('email', $email ?? '') }}">
                    </div>
                    <div class="form-phone">
                        <label for="phone">Phone <span>*</span> </label>
                        <input id="phone" type="text" class="form-phone-input" placeholder="Enter your Phone"
                            required name="phone" value="{{ old('phone', $phone ?? '') }}">
                    </div>
                    <div class="form-address">
                        <label for="address">Address <span>*</span> </label>
                        <input id="address" type="text" class="form-address-input" placeholder="Enter your Adress"
                            required name="address" value="{{ old('address', $address ?? '') }}">
                    </div>
                    <div class="form-franchisee-type">
                        <label for="franchisee_type">franchisee type <span>*</span> </label>
                        <select id="franchisee_type" type="text" class="form-franchisee-type-input" required
                            name="franchisee_type" value="{{ old('franchisee_type', $franchisee_type ?? '') }}">
                            <option value disable selected>-- Please select --</option>
                            <option value="總代理">General Agent</option>
                            <option value="加盟">Franchise Store</option>
                        </select>
                    </div>
                    <div class="form-country">
                        <label for="country">Store Address <span>*</span> </label>
                        <div class="country-selector">
                            <select data-region-id="where" class="form-country-input crs-country" placeholder="" required
                                name="country" data-region-id="country-region" data-default-value="Taiwan" value="{{ old('country', $country ?? '') }}">>
                            </select>
                            <select id="where" class="form-country-input" placeholder="" required name="capital"
                                data-region-id="capital" value="{{ old('capital', $capital ?? '') }}">
                            </select>
                        </div>
                    </div>
                    <div class="form-country-city">
                        <input id="store_address" type="text" class="form-country-city-input"
                            placeholder="Enter your Adress" placeholder="" required name="store_address" value="{{ old('store_address', $store_address ?? '') }}">
                    </div>
                    <div class="form-other">
                        <label for="other">other</label>
                        <input id="other" type="text" class="form-other-input"name="other"  value="{{ old('other', $other ?? '') }}">
                    </div>
                    <div class="form-robot">
                        <h2>機器人驗證</h2>
                    </div>
                    <div class="just-line"></div>
                    <div class="send-data">
                        <button type="submit" class="form-btn">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('./js/crs.min.js') }}"></script>
    <script src="{{ asset('./js/header.js') }}"></script>
@endsection
