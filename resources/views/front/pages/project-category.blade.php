@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Công trình')
@section('content')
    <!-- banner chính -->
    <div class="main-slider grid lg:grid-cols-2 items-stretch bg-[#d6cec7]">
        <div class="col-span-1">
            <img src="/images/project-categories/{{ $project_category->project_category_thumbnail }}" alt="" srcset="">
        </div>
        <div class="col-span-1 lg:px-8 px-4 pb-4 lg:pb-0 uppercase flex flex-col justify-center">
            <h1 class="text-bold lg:text-5xl text-3xl leading-tight mb-8">
                {{ $project_category->project_category_name }}
            </h1>
            <p class="text-sm mb-2 text-justify">
                {{ $project_category->project_category_description }}
            </p>
        </div>
    </div>
    <div class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto lg:py-16 py-12 lg:px-8 px-4">
        <div class="text-center uppercase text-bold text-lg mb-8">
            Những công trình đầy cảm hứng
        </div>
        <div class="grid lg:grid-cols-2 grid-cols-2 gap-2 mb-8">
            @foreach($projects as $item)
            <a href="{{url("project",["project"=>$item->project_slug])}}" class="block project-item border-gray-300">
                <div class="project-img relative">
                    <img src="/images/projects/{{ $item->project_image }}" width="100%" alt="">
                </div>
                <p class="py-4 uppercase text-medium">{{ $item->project_name }}</p>
            </a>
            @endforeach
        </div>
        <!-- Liên hệ -->
        <div id="section-contact" class="py-12 border-t border-gray-300">
            <div class="grid lg:grid-cols-2 flex items-end lg:gap-8 gap-4">
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
