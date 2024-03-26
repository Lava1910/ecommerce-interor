@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Trang chủ')
@section('content')
    <div class="main-slider grid lg:grid-cols-3 items-end">
        <div class="lg:col-span-2">
            <video
                poster=""
                playsinline=""
                autoplay="autoplay"
                play=""
                muted=""
                loop=""
                width="100%"
                height="100%"
                class="full_width_video lazyloaded"
                style="object-fit: cover"
            >
                <source
                    src="https://p3.aprimocdn.net/boconcept/c863f8d6-370f-43ab-9f70-b0af00c61692/Flash%20Sale%20-%20Website%20Homepage_MP4%20High%20%281080px%20heigh%29.MP4"
                    type="video/mp4"
                />
                <source
                    media="all and (min-width:767px) and (max-width:1310px)"
                    src="https://p3.aprimocdn.net/boconcept/c863f8d6-370f-43ab-9f70-b0af00c61692/Flash%20Sale%20-%20Website%20Homepage_MP4%20Medium%20%28720px%20heigh%29.MP4"
                    type="video/mp4"
                />
                <source
                    media="all and (max-width:767px)"
                    src="https://p3.aprimocdn.net/boconcept/c863f8d6-370f-43ab-9f70-b0af00c61692/Flash%20Sale%20-%20Website%20Homepage_MP4%20Low%20%28420px%20heigh%29.MP4"
                    type="video/mp4"
                />

                Your browser does not appear to support our video.
            </video>
        </div>
        <div
            class="lg:col-span-1 lg:px-8 lg:my-0 my-4 px-4 uppercase flex flex-col items-stretch"
        >
            <p class="xl:text-sm text-xs my-3 text-gray-700">
                The hero of the living room, your sofa is one of the most important
                pieces of furniture in your home.
            </p>
            <h1 class="text-bold xl:text-5xl text-3xl leading-tight lg:mb-8 mb-4">
                Sản phẩm giảm giá hiện đã bán
            </h1>
            <a href="/product-discount" class="btn-primary" style="text-align: center">Tới trang hàng khuyến mãi</a>
        </div>
    </div>
    <!-- sản phẩm -->
    <div id="section-product" class="lg:py-16 py-8 my-8">
        <h2
            class="section-title max-w-screen-xl 2xl:max-w-screen-2xl mx-auto lg:px-8 px-4"
        >
            Sản phẩm
        </h2>
        <div class="swiper-product-home swiper pl-s">
            <div class="swiper-wrapper">
                @foreach($categories as $item)
                    <div class="swiper-slide">
                        <a href="#" class="collection-item block">
                            <div class="collection-img mb-4">
                                <a href="{{url("category",["category"=>$item->category_slug])}}"><img src="/images/categories/{{ $item->category_image }}" alt="{{ $item->category_name }}" /></a>
                            </div>
                            <div class="collection-name">{{ $item->category_name }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Nút chuyển slide -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <!-- video -->
    <video
        poster=""
        playsinline=""
        autoplay="autoplay"
        play=""
        muted=""
        loop=""
        style="object-fit: cover; width: 100%; aspect-ratio: 7 / 1"
    >
        Your browser does not appear to support our video.
        <source
            src="https://p3.aprimocdn.net/boconcept/46a2a59c-77b2-4f93-9079-afc100938925/website%20animation_7-1%20_MP4%20High%20%281080px%20heigh%29.MP4"
            type="video/mp4"
        />
    </video>
    <!-- Xu hướng -->
    <div id="section-trending" class="lg:pt-16 mt-8">
        <div class="grid lg:grid-cols-2 flex items-end gap-8">
            <div class="contact-detail pl-s lg:mx-0 mx-4 lg:pr-12">
                <h3 class="uppercase text-bold text-3xl mb-4">
                    Xu hướng thiết kế nội thất năm 2024
                </h3>
                <p class="mb-8 text-justify">
                    2024, xu hướng nội thất đã trở nên sáng tạo và đa dạng hơn bao giờ
                    hết. Những không gian sống không chỉ đẹp mắt mà còn tích hợp công
                    nghệ thông minh và chất liệu thân thiện với môi trường...
                </p>
                <a href="/news" class="block btn-primary text-center"
                >Tìm hiểu ngay</a
                >
            </div>
            <div class="contact-img">
                <img src="./front/images/trending.webp" alt="" />
            </div>
        </div>
    </div>
    <!-- sản phẩm bán chạy -->
    <div id="section-product-bestseller" class="lg:pt-16 pt-8">
        <h2
            class="section-title max-w-screen-xl 2xl:max-w-screen-2xl mx-auto lg:px-8 px-4"
        >
            Sản phẩm bán chạy
        </h2>
        <div class="swiper-product-bestseller swiper pl-s">
            <div class="swiper-wrapper">
                @foreach($products as $item)
                    <div class="swiper-slide">
                        <a
                            href="{{url("category",["category"=>$item->product_slug])}}"
                            class="product-item block p-4 border border-gray-300"
                        >
                            <div class="product-img py-8">
                                <img src="/images/products/{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" />
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
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <!-- Công trình -->
    <div
        id="section-project"
        class="lg:py-16 py-8 max-w-screen-xl 2xl:max-w-screen-2xl mx-auto lg:px-8 px-4"
    >
        <h2 class="section-title px-0">Công trình</h2>
        <div class="section-content">
            <div class="grid lg:grid-cols-4 grid-cols-2 gap-2">
            @foreach($project_categories as $item)
                <div class="project-item border-gray-300">
                    <a href="{{url("project-category",["project_category"=>$item->slug])}}" class="project-img relative">
                        <img src="/images/project-categories/{{ $item->project_category_image }}" alt="" srcset="" />
                    </a>
                    <p class="py-4 uppercase text-medium">{{ $item->project_category_name }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Tin tức -->
    <div id="section-news" class="lg:py-16 py-8">
        <div
            class="section-content max-w-screen-xl 2xl:max-w-screen-2xl mx-auto lg:px-8 px-4"
        >
            <div class="grid lg:grid-cols-5 lg:gap-16">
                <div class="lg:col-span-2">
                    <div class="featured-news text-left">
                        <h2 class="section-title p-0">Cozy</h2>
                        <div class="news-desc">
                            <p class="mb-2 text-base text-gray-700 text-justify">
                                Cozy, một điểm đến đáng tin cậy cho các đam mê nội thất từ năm
                                2000, đã điều chỉnh và nâng cấp không gian sống của hàng ngàn
                                gia đình với sự chuyên nghiệp và đa dạng sản phẩm
                            </p>
                            <p class="mb-2 text-base text-gray-700 text-justify">
                                Với hơn 2 thập kỷ hoạt động, Cozy không chỉ là một cửa hàng
                                bán đồ nội thất mà còn là nguồn cảm hứng cho những ai muốn
                                biến nhà mình thành một không gian đầy ấm cúng và tiện nghi.
                                Chúng tôi tự hào mang đến khách hàng những sản phẩm chất
                                lượng, từ những mẫu sofa êm ái đến bàn ăn tinh tế, từ những
                                chiếc đèn trang trí đến các vật dụng thông minh, đều được lựa
                                chọn cẩn thận để đáp ứng cả yếu tố thẩm mỹ và sự tiện ích
                                trong mọi không gian sống
                            </p>
                            <p class="mb-2 text-base text-gray-700 text-justify">
                                Không chỉ là nhà cung cấp nội thất, chúng tôi còn là đối tác
                                tin cậy đồng hành cùng bạn trong việc tạo ra không gian sống
                                mà bạn mơ ước. Sứ mệnh của chúng tôi không chỉ dừng lại ở việc
                                bán hàng, mà còn là cung cấp trải nghiệm mua sắm độc đáo và
                                dịch vụ hỗ trợ chuyên nghiệm từ những chuyên gia giàu kinh
                                nghiệm.
                            </p>
                            <p class="mb-2 text-base text-gray-700 text-justify">
                                Từ việc chăm sóc khách hàng tận tình đến việc cập nhật xu
                                hướng mới nhất, Cozy cam kết mang đến cho bạn sự hài lòng về
                                niềm vui khi biến những ý tưởng trở thành hiện thực. Hãy đồng
                                hành cùng chúng tôi để tạo nên không gian sống ấm áp và độc
                                đáo theo phong cách của riêng bạn!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-3 lg:mt-0 mt-4">
                    @foreach($news as $item)
                    <div class="news-item grid grid-cols-5 lg:gap-8 gap-4 mb-8">
                        <div class="news-img lg:col-span-1 col-span-2">
                            <img src="/images/news/{{ $item->news_thumbnail }}" alt="" />
                        </div>
                        <div class="news-info lg:col-span-4 col-span-3">
                            <a
                                href="{{url("news",["news"=>$item->news_slug])}}"
                                class="block uppercase lg:text-lg text-base text-bold lg:mb-4 mb-2"
                            >
                                {{ $item->news_title }}
                            </a>
                            <p
                                class="new-desc lg:text-base text-sm text-gray-700 text-justify"
                            >
                                {{ $item->news_short }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
