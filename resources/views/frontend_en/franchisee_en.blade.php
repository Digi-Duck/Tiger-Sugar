@extends('layouts.frontend-en-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('css/franchisee_en.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/header.css') }}">
@endsection

@section('main')
    <main>
        <!-- 翔 授權流程 -->
        <section id="authorization">
            <!-- 主要背景 -->
            <div class="background">
                <div class="background-wave">
                    <div class="background-tiger-logo">
                        <img src="{{ asset('./frontend-img/franchisee-img/logo_black.webp') }}" alt="老虎堂logo">
                    </div>
                </div>
                <!-- 主要區域 -->
                <div class="container">
                    <!-- 加盟專區中英文logo -->
                    <div class="franchisee-logo">
                        <div class="franchisee-logo-img">
                            <img src="{{ asset('./frontend-img/franchisee-img/franchisee.png') }}" alt="加盟專區Logo">
                        </div>
                        <div class="franchisee-logo-cn-en">
                            <h1 class="franchisee-logo-cn">加盟專區</h1>
                            <div class="franchisee-logo-en">FRANCHISEE</div>
                        </div>
                    </div>
                    <!-- 老虎堂logo -->
                    <div class="tiger-main-logo">
                        <img src="{{ asset('./frontend-img/franchisee-img/logo-Join Our Franchise!.svg') }}"
                            alt="老虎堂加入我們Logo">
                    </div>
                    <div class="steps-title">
                        <span>Brand</span>
                        <span>Licensing</span>
                        <span>Procedure</span>
                    </div>
                    <div class="steps-group">
                        <div class="steps">
                            <div class="step1">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>1</span>
                            </div>
                            <div class="steps-text">Please fill out the "Applicant information form" online</div>
                        </div>
                        <div class="steps">
                            <div class="step2">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>2</span>
                            </div>
                            <div class="steps-text">Preliminary assessment of cooperative partner qualification</div>
                        </div>
                        <div class="steps">
                            <div class="step3">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>3</span>
                            </div>
                            <div class="steps-text">Cooperative proposal negotiation( Arrange for the first meeting between
                                the two parties)</div>
                        </div>
                        <div class="steps">
                            <div class="step4">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>4</span>
                            </div>
                            <div class="steps-text">Final assessment of cooperative partner qualification and contract
                                negotiation (Arrange for a second meeting between the two parties)</div>
                        </div>
                        <div class="steps">
                            <div class="step5">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>5</span>
                            </div>
                            <div class="steps-text">Official contract signing</div>
                        </div>
                        <div class="steps">
                            <div class="step6">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>6</span>
                            </div>
                            <div class="steps-text">Remittance of brand licensing fee completed</div>
                        </div>
                        <div class="steps">
                            <div class="step7">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>7</span>
                            </div>
                            <div class="steps-text">Know-how transfer, site condition assessment and recommendation</div>
                        </div>
                        <div class="steps">
                            <div class="step8">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>8</span>
                            </div>
                            <div class="steps-text">Overall planning, construction recommendation, training, and evaluation
                            </div>
                        </div>
                        <div class="steps">
                            <div class="step9">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>9</span>
                            </div>
                            <div class="steps-text">Soft-opening</div>
                        </div>
                        <div class="steps">
                            <div class="step10">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>10</span>
                            </div>
                            <div class="steps-text">Official opening</div>
                        </div>
                        <div class="steps">
                            <div class="step11">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>11</span>
                            </div>
                            <div class="steps-text">Sustainable management</div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </section>

        <!-- 夫 常見問題 -->
        <section id="common-question">
            <div class="background">
                <div class="container">
                    <div class="text-fqa">常見問題 | FQA</div>
                    <div class="inside-container">

                        <!-- 左邊aka手機版 -->
                        <div class="left-container">
                            <!-- 老虎堂合作夥伴 QA1 -->
                            @foreach ($franchise_explains as $list)
                                @if ($list->sequence % 2 == 1)
                                    <input type="checkbox" id="qa{{ $list->sequence }}" hidden>
                                    <label for="qa{{ $list->sequence }}" class="qa-area">
                                        <div class="question-area">
                                            <div class="top-area">
                                                <div class="mark"></div>
                                                <div class="title-text">{{ $list->title }}?</div>
                                            </div>
                                            <div class="down-area">
                                                {{ $list->content }}
                                            </div>
                                        </div>
                                    </label>
                                @else
                                    <input type="checkbox" id="qa2" hidden>
                                    <label for="qa{{ $list->sequence }}" class="qa-area">
                                        <div class="question-area">
                                            <div class="top-area">
                                                <div class="mark"></div>
                                                <div class="title-text">{{ $list->title }}</div>
                                            </div>
                                            <div class="down-area">
                                                {{ $list->content }}
                                            </div>
                                        </div>
                                    </label>
                                @endif
                            @endforeach
                        </div>

                        <!-- 右邊aka電腦版 -->
                        <div class="right-container">
                            <!-- 授權方式與期間 QA2 -->
                            @foreach ($evenItems as $list)
                                <input type="checkbox" id="qar{{ $list->sequence }}" hidden>
                                <label for="qar{{ $list->sequence }}" class="qa-area">
                                    <div class="question-area">
                                        <div class="top-area">
                                            <div class="mark"></div>
                                            <div class="title-text">{{ $list->title }}</div>
                                        </div>
                                        <div class="down-area">
                                            {{ $list->content }}
                                        </div>
                                    </div>
                                </label>
                            @endforeach

                        </div>

                    </div>
                </div>
                <img src="{{ asset('./frontend-img/franchisee-img/logo_black.webp') }}" alt="老虎堂背景圖片" class="img-bg">
            </div>

        </section>
    </main>

    <!-- 秋 前言說明 -->
    <footer>
        <img class="footer-logo" src="{{ asset('./frontend-img/franchisee-img/join-us-logo.png') }}" alt="join-us-logo">
        <div class="footer-container">

            <div class="store-explain">
                <div class="explain-container">
                    <div class="open-store">Introduction to the Store Application</div>
                    <div class="preface">
                        <span>1.</span>
                        <div class="white-word">Awareness and Acceptance of Terms and Conditions.</div>
                    </div>
                    <div class="preface">
                        <span>2.</span>
                        <div class="white-word">
                            I have thoroughly read the "Brand Authorization Process" and "FAQ" materials,and will fill out the store application form.</div>
                    </div>
                    <div class="preface">
                        <span>3.</span>
                        <div class="white-word specific">
                            This questionnaire is not a contract and does not have any effect on regulating the rights and interests of both parties. The content filled in is considered as confidential information within the company and will be properly preserved and managed.</div>
                    </div>
                    <div class="preface">
                        <span>4.</span>
                        <div class="white-word">
                            To speed up your store application process, please be sure to carefully fill out each form below. We will have a specialist process it for you as soon as possible.</div>
                    </div>
                </div>
            </div>
            <a href={{ route('front.franchisee_form.en') }} title="前往加盟表單頁">
                <button type="button" class="blade-button">
                    <div class="button">Start Application</div>
                </button>
            </a>
        </div>
    </footer>
@endsection

@section('js')
    <script src="{{ asset('./js/header.js') }}"></script>
@endsection
