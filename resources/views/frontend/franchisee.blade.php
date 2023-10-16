@extends('layouts.frontend-template')

@section('css')
    <!-- 各分頁css -->
    <link rel="stylesheet" href="{{ asset('./css/franchisee.css') }}">
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
                        <span>授</span>
                        <span>權</span>
                        <span>流</span>
                        <span>程</span>
                    </div>
                    <div class="steps-group">
                        <div class="steps">
                            <div class="step1">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>1</span>
                            </div>
                            <div class="steps-text">線上填寫申請資料</div>
                        </div>
                        <div class="steps">
                            <div class="step2">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>2</span>
                            </div>
                            <div class="steps-text">合作夥伴資格初審</div>
                        </div>
                        <div class="steps">
                            <div class="step3">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>3</span>
                            </div>
                            <div class="steps-text">合作方案洽談與達成共識[安排雙方首次會面]</div>
                        </div>
                        <div class="steps">
                            <div class="step4">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>4</span>
                            </div>
                            <div class="steps-text">合作夥伴資格複審與合約討論[安排雙方二次會面]</div>
                        </div>
                        <div class="steps">
                            <div class="step5">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>5</span>
                            </div>
                            <div class="steps-text">簽訂正式合約</div>
                        </div>
                        <div class="steps">
                            <div class="step6">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>6</span>
                            </div>
                            <div class="steps-text">品牌授權金匯款完成</div>
                        </div>
                        <div class="steps">
                            <div class="step7">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>7</span>
                            </div>
                            <div class="steps-text">Know-how技術轉移、立地條件評估與建議</div>
                        </div>
                        <div class="steps">
                            <div class="step8">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>8</span>
                            </div>
                            <div class="steps-text">整體規劃、施工建議、訓練考核</div>
                        </div>
                        <div class="steps">
                            <div class="step9">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>9</span>
                            </div>
                            <div class="steps-text">試營運</div>
                        </div>
                        <div class="steps">
                            <div class="step10">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>10</span>
                            </div>
                            <div class="steps-text">正式開幕</div>
                        </div>
                        <div class="steps">
                            <div class="step11">
                                <img src="{{ asset('./frontend-img/franchisee-img/circle.png') }}" alt="步驟外框">
                                <span>11</span>
                            </div>
                            <div class="steps-text">永續經營</div>
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
                    <div class="open-store">申請開店前言說明</div>
                    <div class="preface">
                        <span>1.</span>
                        <div class="white-word">認知與接受條款</div>
                    </div>
                    <div class="preface">
                        <span>2.</span>
                        <div class="white-word">
                            我已詳細閱讀「品牌授權流程」與「FAQ」等資料,並將填寫開店申請表格。</div>
                    </div>
                    <div class="preface">
                        <span>3.</span>
                        <div class="white-word specific">
                            此份問卷並非合約,並不具有任何雙方權益之效力,所填寫的內容,視為公司內部客戶機密資訊,將會妥善保存管理。</div>
                    </div>
                    <div class="preface">
                        <span>4.</span>
                        <div class="white-word">
                            為加速您的開店流程,請務必仔細填寫以下每項表格我們將有專人儘速為您處理。</div>
                    </div>
                </div>
            </div>
            <a href={{ route('front.franchisee_form') }} title="前往加盟表單頁">
                <button type="button" class="blade-button">
                    <div class="button">開始申請</div>
                </button>
            </a>
        </div>
    </footer>
@endsection

@section('js')
    <script src="{{ asset('./js/header.js') }}"></script>
@endsection
