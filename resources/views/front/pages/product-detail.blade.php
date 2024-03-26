@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <!-- Hình ảnh sản phẩm -->
    <div class="product-slide swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
        <div class="swiper-wrapper" id="swiper-wrapper-d2b108aef37dbbb77" aria-live="polite">
            <!-- Slides -->
            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 3" style="width: 1519px;">
                <img src="/images/products/{{ $product->product_thumbnail }}" alt="">
            </div>
            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 3" style="width: 1519px;">
                <img src="/images/products/{{ $product->product_image1 }}" alt="">
            </div>
            <div class="swiper-slide" role="group" aria-label="3 / 3" style="width: 1519px;">
                <img src="/images/products/{{ $product->product_image2 }}" alt="">
            </div>
        </div>
        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-d2b108aef37dbbb77" aria-disabled="true"></div>
        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-d2b108aef37dbbb77" aria-disabled="false"></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
    <!-- Chi tiết sản phẩm -->
    <div class="product-detail max-w-screen-xl 2xl:max-w-screen-2xl mx-auto lg:px-8 px-4">
        <form action="{{url("/add-to-cart",["product"=>$product->id])}}" method="get">
            <div class="grid lg:grid-cols-2 lg:gap-24 gap-4 flex items-end">
                <div class="product-name">
                    <h1 class="text-xl text-bold mb-8">
                        {{ $product->product_name }}
                    </h1>
                    <div class="product-variant border border-gray-300">
                        <div class="flex items-center p-4 hover:bg-gray-100">
                            <h3 class="mr-3 text-gray-500">Chất liệu:</h3>
                            <span class="">{{ $product->product_material }}</span>
                        </div>
                        <div class="flex items-center p-4 hover:bg-gray-100">
                            <h3 class="mr-3 text-gray-500">Nhà thiết kế:</h3>
                            <span class="">{{ $product->product_author }}</span>
                        </div>
                    </div>
                </div>
                <div class="product-price-actions">
                    @if($product->product_price_after_discount !== null)
                        <div class="product-price text-right mb-8">
                            <span class="text-gray-500 line-through"> {{ number_format($product->product_price, 0, ',', '.') }} </span>
                            <div class="uppercase text-bold text-xl">{{ number_format($product->product_price_after_discount, 0, ',', '.') }}</div>
                        </div>
                    @else
                        <div class="product-price text-right mb-8">
                            <div class="uppercase text-bold text-xl">{{ number_format($product->product_price, 0, ',', '.') }} </div>
                        </div>
                    @endif
                    <div class="product-actions flex flex-col items-stretch">
                        <button type="submit" class="btn-primary block mb-4" style="background: black !important;">Thêm giỏ hàng</button>
                        <button class="btn-primary bg-white hover:bg-black text-black hover:text-white border border-black block">
                            Liên hệ
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Sản phẩm tương tự -->
    <div class="product-related lg:py-24 py-12">
        <h2 class="section-title pl-s">Sản phẩm tương tự</h2>
        <div class="swiper-product pl-s pl-4 swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-ed686e859e8328b2" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); transition-delay: 0ms;">
                @foreach($relateds as $item)
                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="{{ $loop->iteration }} / {{ count($relateds) }}" style="width: 355px;">
                        <a href="{{url("product",["product"=>$item->product_slug])}}" class="product-item block p-4 border border-gray-300">
                            <div class="product-img py-8">
                                <img src="/images/products/{{ $item->product_thumbnail }}" alt="">
                            </div>
                            <div class="product-name uppercase pb-4">{{ $item->product_name }}</div>
                            @if($item->product_price_after_discount !== null)
                                <div class="product-price">
                                    <span class="current-price text-medium mr-2">{{ number_format($item->product_price_after_discount, 0, ',', '.') }}đ</span>
                                    <span class="original-price text-xs line-through text-gray-400">{{ number_format($item->product_price, 0, ',', '.') }}đ</span>
                                </div>
                            @else
                                <div class="product-price">
                                    <span class="original-price text-medium mr-2">{{ number_format($item->product_price, 0, ',', '.') }}đ</span>
                                </div>
                            @endif

                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Nút chuyển slide -->
            <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-ed686e859e8328b2" aria-disabled="true"></div>
            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-ed686e859e8328b2" aria-disabled="false"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
@endsection
