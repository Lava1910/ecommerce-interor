@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Check out')
@section('content')
    <!-- giỏ hàng -->
    <div class="checkout-wrapper max-w-screen-xl 2xl:max-w-screen-2xl mx-auto lg:py-16 py-12 lg:px-8 px-4">
        <div class="lg:grid lg:grid-cols-2 flex flex-col-reverse lg:gap-16">
          <div class="lg:col-span-1 lg:mt-0 mt-8 lg:pt-0 pt-8 lg:border-t-0 border-t border-gray-300">
            <div class="checkout-content bg-white lg:pr-16 lg:border-r border-gray-300">
              <h2 class="uppercase mb-2 lg:hidden text-bold text-xl">
                Thông tin sản phẩm
              </h2>
              <div class="checkout-items">
                @foreach ($cart as $item)
                <div class="cart-item py-7 border-b border-gray-300">
                    <div class="text-center">
                      <img src="/images/products/{{ $item->product_thumbnail }}" class="mx-auto" width="70%" alt="">
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
                      <div class="cart-item-actions text-right text-gray-400">
                        <p>Số lượng: {{$item->buy_qty}}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
                
  
                <!-- có nhiều hơn 2 sản phẩm thì có phần này -->
                {{-- <div class="view-more-content">
                  <div class="cart-item py-7 border-b border-gray-300">
                    <div class="text-center">
                      <img src="../images/product_1.jpeg" class="mx-auto" width="70%" alt="">
                    </div>
                    <div class="flex items-end justify-between">
                      <div class="cart-item-info">
                        <div class="product-name uppercase text-medium pb-4">
                          Bolzano 2.5-seater
                        </div>
                        <div class="product-price">
                          <span class="original-price text-xs line-through text-gray-400">70,000,000đ</span>
                          <p class="current-price mr-2">60,000,000đ</p>
                        </div>
                      </div>
                      <div class="cart-item-actions text-right text-gray-400">
                        <p>Số lượng: 1</p>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <!-- nút xem thêm / ẩn bớt sản phẩm  -->
                <button class="ml-auto view-more-btn flex items-center justify-center w-full py-4" onclick="openCollapse(event)">
                  <p class="view-more-text">Xem thêm</p>
                  <i class="view-more-icon transition fas fa-chevron-down ml-2"></i>
                </button>
              </div>
              <div class="checkout-total py-7">
                <div class="flex justify-between mb-8">
                  <p class="text-gray-700">Thành tiền:</p>
                  <span class="">{{ number_format($subtotal, 0, ',', '.') }}đ</span>
                </div>
                <div class="flex justify-between mb-1">
                  <p class="text-gray-700">Tổng số tiền:</p>
                  <span class="text-bold">{{ number_format($total, 0, ',', '.') }}đ</span>
                </div>
                <div class="flex justify-between mb-4">
                  <p class="text-gray-400 text-xs">VAT</p>
                  <span class="text-gray-400 text-xs">{{ number_format(($total-$subtotal), 0, ',', '.') }}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="lg:col-span-1">
            <h1 class="lg:text-3xl text-xl text-bold uppercase mb-4">
              Thông tin đặt hàng
            </h1>
            <!-- Chỉ hiển thị khi chưa đăng nhập -->
            @auth('client')
            @else
            <p>
              Bạn đã có tài khoản? Đăng nhập
              <a href="/client/login" class="menu-item text-blue-400 cursor-pointer">
                tại đây!</a>
            </p>
            @endauth
            <!-- form thông tin  -->
            <form action="{{url("checkout")}}" method="post" class="mt-8">
                @csrf
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <span class="block mb-2 text-sm text-gray-700">Họ và tên</span>
                        <input type="text" name="full_name" class="border border-gray-300 px-4 focus:outline-none w-full h-12 mb-4"
                            value="{{ old("full_name")}} ">
                        @error("full_name")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-gray-700">Số điện thoại</span>
                        <input type="tel" name="tel" class="border border-gray-300 px-4 focus:outline-none w-full h-12 mb-4"
                        value="{{ old("tel")}} ">
                        @error("tel")
                            <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                </div>
                <span class="block mb-2 text-sm text-gray-700">Địa chỉ nhận hàng</span>
                <input type="text" name="address" class="border border-gray-300 px-4 focus:outline-none w-full h-12 mb-4"
                    value="{{old("address")}}">
                    @error("address")
                        <p class="text-danger"><i>{{$message}}</i></p>
                    @enderror
                <span class="block mb-2 text-sm text-gray-700">Email</span>
                <input type="email" name="email" class="border border-gray-300 px-4 focus:outline-none w-full h-12 mb-4"
                    value="{{old("email")}}">
                    @error("email")
                        <p class="text-danger"><i>{{$message}}</i></p>
                    @enderror
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <span class="block mb-2 text-sm text-gray-700">Phương thức vận chuyển</span>
                            <label for="acc">
                                Express
                                <input name="shipping_method" @if(old("shipping_method")== "Express") checked @endif value="Express" type="radio" id="acc">
                                <span class="checkmark"></span>
                            </label>
                            <br/>
                            <label for="free">
                                Free Shipping
                                <input name="shipping_method" @if(old("shipping_method")== "Free_Shipping") checked @endif value="Free_Shipping" type="radio" id="free">
                                <span class="checkmark"></span>
                            </label>
                            @error("shipping_method")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div>
                            <span class="block mb-2 text-sm text-gray-700">Thanh toán</span>
                            <label for="payment">
                                COD
                                <input name="payment_method"  @if(old("payment_method")== "COD") checked @endif value="COD" type="radio" id="payment">
                                <span class="checkmark"></span>
                            </label>
                            <label for="paypal">
                                Paypal
                                <input name="payment_method"  @if(old("payment_method")== "Paypal") checked @endif  value="Paypal" type="radio" id="paypal">
                                <span class="checkmark"></span>
                            </label>
                            @error("payment_method")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn-primary w-full mt-8 block ml-auto">
                        Đặt hàng
                      </button>
            </form>           
          </div>
        </div>
      </div>
@endsection
