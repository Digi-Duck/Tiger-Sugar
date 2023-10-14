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
                            <input type="checkbox" id="qa1" hidden>
                            <label for="qa1" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">How do I become a partner of Tiger Sugar?
                                        </div>
                                    </div>
                                    <div class="down-area">
                                        Thank you very much for your support and
                                        interest in Tiger Sugar
                                        We are looking forward to collaborating with
                                        partners worldwide and promoting Tiger Sugar
                                        all over the world.
                                        In order to provide you with further
                                        information, please fill out the "Applicant
                                        information form" online and our staff will
                                        contact you.
                                    </div>
                                </div>
                            </label>

                            <!-- 授權方式與期間 QA2 -->
                            <input type="checkbox" id="qa2" hidden>
                            <label for="qa2" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">What if I cannot click on the region where I wish to open a
                                            store</div>
                                    </div>
                                    <div class="down-area">
                                        If you are unable to select the city or region you wish to open your store, meaning
                                        that the region already has an exclusive distributor and there is no distributor and
                                        franchise vacancy available.
                                    </div>
                                </div>
                            </label>

                            <!-- 開店申請表格 QA3 -->
                            <input type="checkbox" id="qa3" hidden>
                            <label for="qa3" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">What is the method and duration of the Region's Master
                                            franchise?</div>
                                    </div>
                                    <div class="down-area">
                                        “Region’s Master franchise” is based on the unit of city/region, the exclusive
                                        distributor has an exclusive right of management and must have its own management
                                        team and open a certain number of stores in the region. The authorized operation
                                        licensing period is "five years"
                                    </div>
                                </div>
                            </label>

                            <!-- 原料 QA4 -->
                            <input type="checkbox" id="qa4" hidden>
                            <label for="qa4" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">Qualification of the distributor?</div>
                                    </div>
                                    <div class="down-area">
                                        1.Possess a high level of enthusiasm towards the catering industry, with previous
                                        restaurant experience preferred.
                                        2.Be aligned with the management philosophy of Tiger Sugar.
                                        3.Ability to operate and manage
                                        4.Possess an in-house management team (marketing, operation, finance, etc.)
                                        Knowledge of managing the region and familiar with competitive brands.
                                    </div>
                                </div>
                            </label>

                            <!-- 經營區域 QA5 -->
                            <input type="checkbox" id="qa5" hidden>
                            <label for="qa5" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">After I submit my store opening application form, how long
                                            does it take for someone to contact me?</div>
                                    </div>
                                    <div class="down-area">
                                        After submitting the complete Applicant information form, the preliminary assessment
                                        takes about 3~5 working days, after which the operator will contact and assist you.
                                    </div>
                                </div>
                            </label>

                            <!-- 代理商資格 QA6 -->
                            <input type="checkbox" id="qa6" hidden>
                            <label for="qa6" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">How much is it to be the exclusive distributor in the
                                            region?</div>
                                    </div>
                                    <div class="down-area">
                                        We will conduct an assessment based on the economic development level and average
                                        per capita consumption of the region, thereby stipulating a set agency fee for each
                                        region.
                                        Please fill out the "Applicant basic information". After the preliminary distributor
                                        qualification assessment, we will start the quotation process.
                                    </div>
                                </div>
                            </label>

                            <!-- 代理金額 QA7 -->
                            <input type="checkbox" id="qa7" hidden>
                            <label for="qa7" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">Raw material supply and procurement?</div>
                                    </div>
                                    <div class="down-area">
                                        In addition to fresh dairy products, which can be purchased locally, in order to
                                        maintain stable quality and ensure the consistency of products in each store, all
                                        partners need to order key technical raw materials from Tiger sugar headquarters.
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
                                        <div class="title-text">What if I cannot click on the region where I wish to open a
                                            store</div>
                                    </div>
                                    <div class="down-area">
                                        If you are unable to select the city or region you wish to open your store, meaning
                                        that the region already has an exclusive distributor and there is no distributor and
                                        franchise vacancy available.
                                    </div>
                                </div>
                            </label>

                            <!-- 原料 QA4 -->
                            <input type="checkbox" id="qar4" hidden>
                            <label for="qar4" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">Qualification of the distributor?</div>
                                    </div>
                                    <div class="down-area">
                                        1.Possess a high level of enthusiasm towards the catering industry, with previous
                                        restaurant experience preferred.
                                        2.Be aligned with the management philosophy of Tiger Sugar.
                                        3.Ability to operate and manage
                                        4.Possess an in-house management team (marketing, operation, finance, etc.)
                                        Knowledge of managing the region and familiar with competitive brands.
                                    </div>
                                </div>
                            </label>

                            <!-- 代理商資格 QA6 -->
                            <input type="checkbox" id="qar6" hidden>
                            <label for="qar6" class="qa-area">
                                <div class="question-area">
                                    <div class="top-area">
                                        <div class="mark"></div>
                                        <div class="title-text">How much is it to be the exclusive distributor in the
                                            region?</div>
                                    </div>
                                    <div class="down-area">
                                        We will conduct an assessment based on the economic development level and average
                                        per capita consumption of the region, thereby stipulating a set agency fee for each
                                        region.
                                        Please fill out the "Applicant basic information". After the preliminary distributor
                                        qualification assessment, we will start the quotation process.
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
            <a href={{ route('front.franchisee_form') }} title="前往加盟表單頁">
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
