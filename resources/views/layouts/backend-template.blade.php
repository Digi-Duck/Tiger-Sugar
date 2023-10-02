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
    <div class="flex">
        <nav class="bg-[#0C1219] flex flex-col">
            <a href="{{route('front.index')}}">
                <button type="button">
                    <img src="{{ asset('./frontend-img/header-img/LOGO.png') }}" alt="" class="h-[50px] mx-[10px] mt-[13px]">
                </button>
            </a>
            <a href="">
                <button>
                    <h2 class="text-[white]">早安</h2>
                </button>
            </a>
        </nav>
        <div>

        </div>
    </div>
</body>

</html>
