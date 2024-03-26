@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Tin tức')
@section('content')
    <!-- banner chính -->
    <div class="main-slider grid lg:grid-cols-2 items-end">
        <div class="col-span-1">
            <img src="/front/images/news.jpeg" alt="" srcset="">
        </div>
        <div class="col-span-1 lg:px-8 px-4 uppercase flex flex-col justify-center">
            <h1 class="text-bold lg:text-5xl text-3xl leading-tight mb-8">
                Xu hướng thiết kế nội thất năm 2024
            </h1>
            <p class="text-sm mb-2 text-justify">
                The living room is one of the most important rooms in your home. Not
                only is it a space to socialise, but it is also a place for rest and
                relaxation. Allow our interior stylists to inspire you to create a
                functional living space you’ll never want to leave with these modern
                living room designs and ideas.
            </p>
            <a href="#" class="btn-primary block text-center">Tìm hiểu thêm</a>
        </div>
    </div>
    <div class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto py-16">
        <!-- Tin tức -->
        <div id="section-news" class="lg:py-16 py-8">
            <div class="section-content lg:px-8 px-4">
                <div class="grid lg:grid-cols-5 lg:gap-16">
                    <div class="lg:col-span-2">
                        <div class="featured-news text-left">
                            <h2 class="section-title text-bold p-0">Cozy</h2>
                            <div class="news-desc">
                                <p class="mb-2 text-base text-gray-700 text-justify">
                                    Cozy, một điểm đến đáng tin cậy cho các đam mê nội thất từ
                                    năm 2000, đã điều chỉnh và nâng cấp không gian sống của hàng
                                    ngàn gia đình với sự chuyên nghiệp và đa dạng sản phẩm
                                </p>
                                <p class="mb-2 text-base text-gray-700 text-justify">
                                    Với hơn 2 thập kỷ hoạt động, Cozy không chỉ là một cửa hàng
                                    bán đồ nội thất mà còn là nguồn cảm hứng cho những ai muốn
                                    biến nhà mình thành một không gian đầy ấm cúng và tiện nghi.
                                    Chúng tôi tự hào mang đến khách hàng những sản phẩm chất
                                    lượng, từ những mẫu sofa êm ái đến bàn ăn tinh tế, từ những
                                    chiếc đèn trang trí đến các vật dụng thông minh, đều được
                                    lựa chọn cẩn thận để đáp ứng cả yếu tố thẩm mỹ và sự tiện
                                    ích trong mọi không gian sống
                                </p>
                                <p class="mb-2 text-base text-gray-700 text-justify">
                                    Không chỉ là nhà cung cấp nội thất, chúng tôi còn là đối tác
                                    tin cậy đồng hành cùng bạn trong việc tạo ra không gian sống
                                    mà bạn mơ ước. Sứ mệnh của chúng tôi không chỉ dừng lại ở
                                    việc bán hàng, mà còn là cung cấp trải nghiệm mua sắm độc
                                    đáo và dịch vụ hỗ trợ chuyên nghiệm từ những chuyên gia giàu
                                    kinh nghiệm.
                                </p>
                                <p class="mb-2 text-base text-gray-700 text-justify">
                                    Từ việc chăm sóc khách hàng tận tình đến việc cập nhật xu
                                    hướng mới nhất, Cozy cam kết mang đến cho bạn sự hài lòng về
                                    niềm vui khi biến những ý tưởng trở thành hiện thực. Hãy
                                    đồng hành cùng chúng tôi để tạo nên không gian sống ấm áp và
                                    độc đáo theo phong cách của riêng bạn!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-3 lg:mt-0 mt-4">
                        @foreach($news as $item)
                            <div class="news-item grid grid-cols-5 lg:gap-8 gap-4 mb-8">
                                <div class="news-img lg:col-span-1 col-span-2">
                                    <img src="/images/news/{{ $item->news_thumbnail }}" alt="">
                                </div>
                                <div class="news-info lg:col-span-4 col-span-3">
                                    <a href="{{url("news",["news"=>$item->news_slug])}}" class="block uppercase lg:text-lg text-base text-bold lg:mb-4 mb-2">
                                        {{ $item->news_title }}
                                    </a>
                                    <p class="new-desc lg:text-base text-sm text-gray-700 text-justify">
                                        {{ $item->news_short }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
