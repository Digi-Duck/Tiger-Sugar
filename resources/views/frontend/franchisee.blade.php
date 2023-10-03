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
                            <input type="checkbox" id="qa1" hidden>
                            <label for="qa1" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">如何申請成為老虎堂合作夥伴?</div>
                                    </div>
                                    <div class="down-area">
                                        非常感謝您對老虎堂品牌的支持與愛護，我們期盼與各地夥伴攜手合作 將老虎堂品牌拓展至全球廣大市場。
                                        為了對您有更多的認識，煩請至合作專區-我要開店，線上填寫「申請者資料」，將有專人予以回覆。
                                    </div>
                                </div>
                            </label>

                            <!-- 授權方式與期間 QA2 -->
                            <input type="checkbox" id="qa2" hidden>
                            <label for="qa2" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">區域獨家代理授權的方式與期間？</div>
                                    </div>
                                    <div class="down-area">
                                        「總代理區域主授權」是以一個城市/區域為單位，擁有獨家經營權，代理商須有自身經營團隊，於區域內發展一定店鋪數量。授權經營期間一次基本以「五年」計。
                                    </div>
                                </div>
                            </label>

                            <!-- 開店申請表格 QA3 -->
                            <input type="checkbox" id="qa3" hidden>
                            <label for="qa3" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">送出開店申請表格後，多久會有人跟我聯繫？</div>
                                    </div>
                                    <div class="down-area">
                                        提交完整的申請計畫書後，初審時間約3-5個工作天，將有專人與您聯繫。
                                    </div>
                                </div>
                            </label>

                            <!-- 原料 QA4 -->
                            <input type="checkbox" id="qa4" hidden>
                            <label for="qa4" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">原物料提供與採購</div>
                                    </div>
                                    <div class="down-area">
                                        除了新鮮的奶製品，可以開放在當地採購以外，為了維持穩定品質與確保各店產品一致性，所有合作夥伴需向總部訂購關鍵技術原物料。
                                    </div>
                                </div>
                            </label>

                            <!-- 經營區域 QA5 -->
                            <input type="checkbox" id="qa5" hidden>
                            <label for="qa5" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">我希望經營的區域無法點選？</div>
                                    </div>
                                    <div class="down-area">
                                        如您希望經營的城市或地區無法點選，即表示此區域已有獨家代理商，暫不開放代理 / 加盟業務洽談。
                                    </div>
                                </div>
                            </label>

                            <!-- 代理商資格 QA6 -->
                            <input type="checkbox" id="qa6" hidden>
                            <label for="qa6" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">代理商資格</div>
                                    </div>
                                    <div class="down-area">
                                        1.對餐飲業具備高度熱誠，有餐飲開店經驗佳 2.認同老虎堂的經營理念 3.具經營管理能力 4.有自身經營團隊(行銷、營運、財務...等)
                                        5.對經營區域了解，熟悉市場上競爭品牌
                                    </div>
                                </div>
                            </label>

                            <!-- 代理金額 QA7 -->
                            <input type="checkbox" id="qa7" hidden>
                            <label for="qa7" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">區域代理金多少錢？</div>
                                    </div>
                                    <div class="down-area">
                                        老虎堂總部依照各地經濟發展程度、人均消費水平等數據，評估後製訂出一套各區域代理金標準。需請您先完整填寫「申請者基本資料」，並通過代理商資格初審後，我司方進行報價流程。
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- 右邊aka電腦版 -->
                        <div class="right-container">

                            <!-- 授權方式與期間 QA2 -->
                            <input type="checkbox" id="qar2" hidden>
                            <label for="qar2" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">區域獨家代理授權的方式與期間？</div>
                                    </div>
                                    <div class="down-area">
                                        「總代理區域主授權」是以一個城市/區域為單位，擁有獨家經營權，代理商須有自身經營團隊，於區域內發展一定店鋪數量。授權經營期間一次基本以「五年」計。
                                    </div>
                                </div>
                            </label>

                            <!-- 原料 QA4 -->
                            <input type="checkbox" id="qar4" hidden>
                            <label for="qar4" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">原物料提供與採購</div>
                                    </div>
                                    <div class="down-area">
                                        除了新鮮的奶製品，可以開放在當地採購以外，為了維持穩定品質與確保各店產品一致性，所有合作夥伴需向總部訂購關鍵技術原物料。
                                    </div>
                                </div>
                            </label>

                            <!-- 代理商資格 QA6 -->
                            <input type="checkbox" id="qar6" hidden>
                            <label for="qar6" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">代理商資格</div>
                                    </div>
                                    <div class="down-area">
                                        1.對餐飲業具備高度熱誠，有餐飲開店經驗佳 2.認同老虎堂的經營理念 3.具經營管理能力 4.有自身經營團隊(行銷、營運、財務...等)
                                        5.對經營區域了解，熟悉市場上競爭品牌
                                    </div>
                                </div>
                            </label>

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