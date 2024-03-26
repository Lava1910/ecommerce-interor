
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>@yield('pageTitle')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="/front/styles/general.css" />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.0.6/css/all.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<body>
<!-- header -->
<header class="relative bg-white">
    <!-- header desktop -->
    <!-- Menu này chỉ hiển thị khi ở desktop  màn 1024px trở lên-->
    @include('front.layout.inc.header')
    <!-- Menu này hiển thị từ tablet trở xuống màn 1023px trở xuống -->
    @include('front.layout.inc.mobile-menu')

    <!-- Mega menu -->
    @include('front.layout.inc.mega-menu')
    <!-- giỏ hàng -->
</header>
<!-- banner chính -->
@yield('content')
<!-- Chân trang -->
@include('front.layout.inc.footer')
<div class="back-to-top" id="toTop">
    <a href="#" class="uppercase text-sm font-light"
    >Về đầu trang
        <i class="fas fa-arrow-up text-xs ml-1"></i>
    </a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="/front/script/main.js"></script>
@livewireScripts()
@stack('script')
</body>
</html>
