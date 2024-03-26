@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Khuyến mãi')
@section('content')
    <div class="main-slider lg:grid lg:grid-cols-3 items-end">
        <div class="lg:col-span-2">
            <img src="/front/images/living_room_1.jpeg" alt="" srcset="">
        </div>
        <div class="lg:col-span-1 lg:px-8 lg:p-0 p-4 mt-4 uppercase flex flex-col items-stretch">
            <h1 class="text-bold lg:text-5xl text-3xl leading-tight lg:mb-8 mb-4">
                Sản Phẩm Giảm Giá
            </h1>
        </div>
    </div>
    <div class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto">
        <!-- sản phẩm -->
        <div id="section-product" class="grid lg:grid-cols-3 grid-cols-2 lg:py-24 py-12 lg:px-8 px-4">
            <!-- Slides -->
            <div class="lg:col-span-3 col-span-2">
                <div class="flex justify-end items-center mb-8">
                    <span class="uppercase text-medium">Phân loại theo:</span>
                    <form action="">
                        <select name="filter" id="product-filter" class="border border-gray-300 rounded-md ml-4 p-2">
                            <option value="price-desc" selected="">Giá từ cao đến thấp</option>
                            <option value="price-asc">Giá từ thấp đến cao</option>
                            <option value="a-z">Tên sản phẩm a-z</option>
                            <option value="z-a">Tên sản phẩm z-a</option>
                        </select>
                    </form>
                </div>
            </div>
            @foreach($products as $item)
                <a href="{{url("product",["product"=>$item->product_slug])}}" class="product-item block -my-px p-4 border border-gray-300">
                    <div class="product-img py-8 relative">
                        <img src="/images/products/{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}">
                    </div>
                    <div class="product-name uppercase pb-4">{{ $item->product_name }}</div>
                    <div class="product-price">
                        <span class="current-price text-medium mr-2">{{ number_format($item->product_price_after_discount, 0, ',', '.') }}đ</span>
                        <span class="original-price text-xs line-through text-gray-400">{{ number_format($item->product_price, 0, ',', '.') }}đ</span>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Liên hệ -->
        <div id="section-contact" class="py-12 lg:px-8 px-4">
            <div class="grid lg:grid-cols-2 flex items-end gap-8">
                <div class="contact-detail">
                    <h3 class="uppercase text-medium text-xl">
                        Hãy để chúng tôi giúp bạn
                    </h3>
                    <p class="mb-8">
                        Biến không gian của bạn thành một nơi đặc biệt với sự trợ giúp của
                        các nhà tạo mẫu nội thất của chúng tôi. Từ một bản cập nhật nhỏ
                        đến sự thay đổi lớn, nhóm của chúng tôi luôn sẵn sàng cung cấp lời
                        khuyên về kiểu dáng miễn phí. Đặt một cuộc trò chuyênj không bắt
                        buộc trực tuyến, tại nhà hoặc tại cửa hàng Cozy. Chúng tôi cũng sẽ
                        cung cáp các mẫu miễn phí - một cách tuyệt vời để xem màu sắc, lớp
                        hoàn thiện và kết cấu nào phù hợp với ngôi nhà của bạn; chọn từ
                        hơn 120 loại vải và vật liệu khác nhau.
                    </p>
                    <a href="/contact-us" class="block btn-primary text-center">Liên hệ</a>
                </div>
                <div class="contact-img">
                    <img src="/front/images/product_contact.webp" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
