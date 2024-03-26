<nav
    class="items-center header-desktop justify-between px-8 py-4 hidden lg:flex"
>
    <div class="flex items-center">
        <a href="/" class="text-bold text-3xl">Cozy</a>
        <div class="main-menu pl-8 flex items-center">
            <a
                class="mx-5 uppercase megamenu-parent cursor-pointer lg:text-xs xl:text-base menu-item"
                href="#"
               link="#mega-prod"
            >Các sản phẩm</a
            >
           <a
               class="mx-5 uppercase megamenu-parent cursor-pointer lg:text-xs xl:text-base menu-item"
               href="#"
               link="#mega-project"
           >Công trình</a
           >
            <a
                class="mx-5 uppercase cursor-pointer lg:text-xs xl:text-base menu-item"
                href="/news"
            >Tin tức</a
            >
            <a
                class="mx-5 uppercase cursor-pointer lg:text-xs xl:text-base menu-item"
                href="/contact-us"
            >Liên hệ</a
            >
        </div>
    </div>
    <div class="main-action flex items-center">
        <div class="search-form flex items-center border-b px-5">
            <form action="{{ route('searching') }}" method="GET">
                <i class="fa fa-search"></i>
                <input
                type="text"
                class="border-0 focus:outline-none px-2"
                name="q"
                id=""
                />
                <button type="submit" class="uppercase cursor-pointer lg:text-xs xl:text-base">
                    Tìm kiếm
                </button>
            </form>
        </div>
        @auth('client')
            <!-- Nếu đã đăng nhập -->
            <div class="relative">
        <span class="mx-5 uppercase cursor-pointer lg:text-xs xl:text-base menu-item" id="userDropdownBtn">
            {{ auth('client')->user()->name }}
        </span>
                <div class="hidden absolute z-10 top-full left-0 bg-white border rounded shadow-md mt-2" id="userDropdown">
                    <!-- Thêm các mục menu dropdown ở đây -->
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                    <form method="POST" action="{{ route('client.logout_handler') }}">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</button>
                    </form>
                </div>
            </div>
            <a class="mx-5 uppercase header-cart cursor-pointer lg:text-xs xl:text-base menu-item" href="#">Giỏ hàng</a>
            <span class="mini-cart-quantity">{{session()->has("cart")?count(session("cart")):0}}</span>
        @else
            <!-- Nếu chưa đăng nhập -->
            <a class="mx-5 uppercase cursor-pointer lg:text-xs xl:text-base menu-item" href="/client/login">Đăng ký / Đăng nhập</a>
            {{-- <a class="mx-5 uppercase header-cart cursor-pointer lg:text-xs xl:text-base menu-item" href="#">Giỏ hàng</a> --}}
            {{-- <span class="mini-cart-quantity">{{session()->has("cart")?count(session("cart")):0}}</span> --}}
        @endauth
    </div>
</nav>

<div
    class="mega-overlay absolute bg-gray-700 left-0 top-full right-0 bg-opacity-20 h-screen hidden"
></div>

<div class="mini-cart">
    <div class="grid lg:grid-cols-3">
        <div class="lg:col-span-2"></div>
        <div class="lg:col-span-1">
            <div class="mini-cart-content bg-white">
                <p class="h-14 flex items-center px-7 uppercase text-medium border-b border-gray-300">
                    Giỏ hàng
                </p>
                <div class="mini-cart-remove absolute right-0 top-0 w-14 h-14 flex items-center justify-center text-center cursor-pointer">
                    <i class="fas fa-times mini-cart-remove"></i>
                </div>
                <div class="mini-cart-items">
                    @foreach($cart as $item)
                    <div class="cart-item p-7 border-b border-gray-300">
                        <div class="text-center">
                            <img
                                src="/images/products/{{ $item->product_thumbnail }}"
                                class="mx-auto"
                                width="70%"
                                alt=""
                            />
                        </div>
                        <div class="flex items-end justify-between">
                            <div class="cart-item-info">
                                <div class="product-name uppercase text-medium pb-4">
                                    {{ $item->product_name }}
                                </div>
                                <div class="product-price">
                                    @if($item->product_price_after_discount !== null)
                                    <span class="original-price text-xs line-through text-gray-400">{{ number_format($item->product_price, 0, ',', '.') }}đ</span>
                                    <p class="current-price mr-2">{{ number_format($item->product_price_after_discount, 0, ',', '.') }}đ</p>
                                    @else
                                    <p class="current-price mr-2">{{ number_format($item->product_price, 0, ',', '.') }}đ</p>
                                    @endif
                                </div>
                            </div>
                            <div class="cart-item-actions flex items-center">
                                <button class="text-xl w-10 h-10 flex items-center justify-center decrease-qty">
                                    -
                                </button>
                                <input
                                    type="number"
                                    name="cartQuantity"
                                    id="cartQuantity"
                                    value="{{$item->buy_qty}}"
                                    class="focus:outline-none w-12 text-center"
                                />
                                <button class="text-xl w-10 h-10 flex items-center justify-center increase-qty">
                                    +
                                </button>
                                <form method="POST" action="{{url("/remove-to-cart",["productId"=>$item->id])}}">
                                    @csrf
                                    <button class="text-xl w-10 h-10 flex items-center justify-center remove-item" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mini-cart-total p-7">
                    <div class="flex justify-between mb-4">
                        <p class="text-gray-700">Tổng số tiền:</p>
                        <span class="text-bold">{{ number_format($total, 0, ',', '.') }}đ</span>
                    </div>

                    <a href="{{url("checkout")}}" class="btn-primary text-center block w-full @if(!$can_checkout)disabled @endif">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var userDropdownBtn = document.getElementById('userDropdownBtn');
        var userDropdown = document.getElementById('userDropdown');

        if (userDropdownBtn) {
            userDropdownBtn.addEventListener('click', function () {
                // Toggle hiển thị của menu dropdown
                userDropdown.classList.toggle('hidden');
            });
        }

        // Đóng menu dropdown khi người dùng click bất kỳ nơi nào khác trên trang
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.relative')) {
                userDropdown.classList.add('hidden');
            }
        });
    });   

</script>
