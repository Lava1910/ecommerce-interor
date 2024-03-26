<!-- mega menu các sản phẩm -->
<div
    id="mega-prod"
    class="absolute lg:top-full top-0 lg:h-auto h-screen bg-white lg:pt-0 pt-12 left-0 right-0 megamenu overflow-y-scroll"
>
    <div class="lg:hidden absolute top-0 right-0">
        <i
            class="fas fa-times btn-close-megamenu flex items-center justify-center w-10 h-10"
        ></i>
    </div>
    <div class="lg:grid lg:grid-cols-4 lg:p-8 p-4 bg-white">
        <div class="lg:col-span-1 lg:border-r border-gray-300 overflow-x-scroll lg:block flex lg:w-auto w-screen pr-4 lg:pr-0 mb-8">
            @foreach ($categoriesMegaMenu as $category)
            <a
                href="#"
                class="lg:flex inline-block lg:border-0 border-r border-gray-300 items-center justify-between lg:px-8 px-4 lg:py-4 mega-item transition"
                onclick="openTabs(event, 'tab{{ $category->id }}')"
                id="defaultOpenTab"
            >
                <span>{{ $category->category_name }}</span>
                <i
                    class="fas fa-chevron-right text-xs hidden lg:inline-block"
                ></i>
            </a>
            @endforeach
        </div>
        <div class="lg:col-span-3 megamenu-main lg:px-8">
            @foreach ($categoriesMegaMenu as $category)
            <div id="tab{{ $category->id }}" class="tab-content">
                <div class="view-all mb-8">
                    <a
                        href="{{url("category",["category"=>$category->category_slug])}}"
                        class="uppercase text-bold lg:text-xl text-base item-link"
                    >Xem tất cả sản phẩm {{ $category->category_name }}
                        <i class="fas fa-chevron-right text-xs ml-2"></i
                        ></a>
                </div>
                <h3 class="uppercase mb-2">Sản phẩm bán chạy</h3>
                <div class="grid lg:grid-cols-3 grid-cols-2 lg:gap-8 gap-4">
                    @foreach ($category->products as $item)
                    <a
                        href="{{url("product",["product"=>$item->product_slug])}}"
                        class="product-item block p-4 border border-gray-300"
                    >
                        <div class="product-img py-8">
                            <img src="/images/products/{{ $item->product_thumbnail }}" alt="" />
                        </div>
                        <div class="product-name uppercase pb-4">
                            {{ $item->product_name }}
                        </div>
                        <div class="product-price">
                            @if($item->product_price_after_discount !== null)
                            <span class="current-price text-medium mr-2">{{ number_format($item->product_price_after_discount, 0, ',', '.') }}đ</span>
                            <span class="original-price text-xs line-through text-gray-400">{{ number_format($item->product_price, 0, ',', '.') }}đ</span>
                            @else
                            <span class="current-price text-medium mr-2">{{ number_format($item->product_price, 0, ',', '.') }}đ</span>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- mega menu công trình -->
<div
    id="mega-project"
    class="absolute lg:top-full top-0 lg:h-auto h-screen bg-white lg:pt-0 pt-12 left-0 right-0 megamenu overflow-y-scroll"
>
    <div class="lg:hidden absolute top-0 right-0">
        <i
            class="fas fa-times btn-close-megamenu flex items-center justify-center w-10 h-10"
        ></i>
    </div>
    <div class="grid lg:grid-cols-4 grid-cols-2 gap-2 lg:p-16 p-4 bg-white">
        @foreach ($projectCategoriesMegaMenu as $item)
        <div class="project-item border-gray-300">
            <a href="{{url("project-category",["project_category"=>$item->slug])}}" class="project-img relative">
                <img src="/images/project-categories/{{ $item->project_category_image }}" alt="" srcset="" />
            </a>
            <p class="py-4 uppercase text-medium">{{ $item->project_category_name }}</p>
        </div>
        @endforeach
    </div>
</div>
