<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex w-[100%]">
        <nav class="bg-[#0C1219] flex flex-col h-[100vh]">
            <a href="{{ route('front.index') }}">
                <button type="button">
                    <img src="{{ asset('./frontend-img/header-img/LOGO.png') }}" alt=""
                        class="h-[50px] mx-[10px] mt-[13px]">
                </button>
            </a>
            <div class="flex flex-col justify-around text-center h-[100%]">
                <a href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group">
                    <button>
                        <h2 class="text-[white] group-hover:text-[#f7dc83]">廣告橫幅</h2>
                    </button>
                </a>
                <a href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group">
                    <button>
                        <h2 class="text-[white] group-hover:text-[#f7dc83]">媒體報導</h2>
                    </button>
                </a>
                <div href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group relative">
                    <h2 class="text-[white] group-hover:text-[#f7dc83]">全球據點管理</h2>
                    <div class="w-[100%] h-[100%] bg-[#0C1219] absolute top-[0] left-[101%] z-[2] hidden group-hover:block">
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">國家管理</div>
                            </button>
                        </a>
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">城市管理</div>
                            </button>
                        </a>
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">店鋪管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <div href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group relative">
                    <h2 class="text-[white] group-hover:text-[#f7dc83]">菜單管理(中)</h2>
                    <div class="w-[100%] h-[100%] bg-[#0C1219] absolute top-[0] left-[101%] z-[2] hidden group-hover:block">
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">飲品類型管理</div>
                            </button>
                        </a>
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">飲品管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <div href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group relative">
                    <h2 class="text-[white] group-hover:text-[#f7dc83]">菜單管理(英)</h2>
                    <div class="w-[100%] h-[100%] bg-[#0C1219] absolute top-[0] left-[101%] z-[2] hidden group-hover:block">
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">飲品類型管理</div>
                            </button>
                        </a>
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">飲品管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <a href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group">
                    <button>
                        <h2 class="text-[white] group-hover:text-[#f7dc83]">常見問題管理</h2>
                    </button>
                </a>
                <a href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group">
                    <button>
                        <h2 class="text-[white] group-hover:text-[#f7dc83]">媒體露出</h2>
                    </button>
                </a>
                <a href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group">
                    <button>
                        <h2 class="text-[white] group-hover:text-[#f7dc83]">最新消息</h2>
                    </button>
                </a>
                <div href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group relative">
                    <h2 class="text-[white] group-hover:text-[#f7dc83]">商品管理</h2>
                    <div class="w-[100%] h-[100%] bg-[#0C1219] absolute top-[0] left-[101%] z-[2] hidden group-hover:block">
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">商品類型管理</div>
                            </button>
                        </a>
                        <a href="">
                            <button class="w-[100%] border border-transparent hover:border-[white]">
                                <div class="w-[100%] bg-[#0C1219] py-4 text-[white]">商品管理</div>
                            </button>
                        </a>
                    </div>
                </div>
                <a href="" class="border border-transparent py-4 mx-3 hover:border-[#f7dc83] group">
                    <button>
                        <h2 class="text-[white] group-hover:text-[#f7dc83]">社群回饋</h2>
                    </button>
                </a>
            </div>
        </nav>
        <div class="flex flex-col flex-1 relative">
            <div class="relative z-[1] w-[100%] h-[100vh]">
                @yield('main')
            </div>
            <img src="{{ asset('./frontend-img/index-img/about/about_bg.png') }}" alt=""
                class="w-[100%] h-[100vh] absolute z-0">
        </div>
    </div>
</body>

</html>
