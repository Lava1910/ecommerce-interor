@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Đăng nhập')
@section('content')
    <!-- form đăng nhập chính -->
    <div class="bg-[#f1f1f1]">
        <div class="page-contact 2xl:max-w-screen-2xl max-w-screen-xl lg:px-8 px-4 mx-auto lg:py-12 py-8">
            <div class="page-desc">
                <h1 class="uppercase text-center text-3xl text-bold mb-8">
                    Tài khoản của tôi
                </h1>
            </div>
            <div class="page-content mt-12 bg-white lg:py-8 py-4">
                <div class="grid lg:grid-cols-2 flex items-stretch">
                    <form action="{{route('client.login_handler')}}" method="POST" id="registerForm" class="lg:px-24 px-4">
                        @csrf
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::get('success'))
                            <div class="alert alert-danger">
                                {{ Session::get('success') }}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <span class="block mb-2 text-sm mt-2 text-medium">Email</span>
                        <input type="text" class="border border-black px-4 focus:outline-none w-full h-12 mb-4" name="login_id" value="{{ old('login_id') }}">
                        @error('login_id')
                        <div class="d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <span class="block mb-2 text-sm mt-2 text-medium">Mật khẩu</span>
                        <input type="password" class="border border-black px-4 focus:outline-none w-full h-12 mb-4" name="password">
                        @error('password')
                        <div class="d-block text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <button class="btn-primary mx-auto mt-12" id="btn-register" type="submit" style="background: black !important;">
                            Đăng nhập
                        </button>
                    </form>
                    <div class="lg:px-24 px-0 flex flex-col justify-between lg:border-l lg:border-t-0 border-t pt-8 lg:pt-0 mt-8 lg:mt-0 border-gray-300">
                        <div>
                            <h2 class="uppercase mb-4 text-xl">Tạo tài khoản</h2>
                            <a href="#" class="uppercase mb-2 block link-style text-xs">Lợi ích việc tạo tài khoản</a>
                            <a href="#" class="uppercase mb-2 block link-style text-xs">Tin tức ưu đãi</a>
                            <a href="#" class="uppercase mb-2 block link-style text-xs">Lịch sử đơn hàng</a>
                            <a href="#" class="uppercase mb-2 block link-style text-xs">Thanh toán hoá đơn</a>
                        </div>
                        <a href="{{ route('client.register') }}" class="inline-block text-center btn-primary bg-white text-black border-black hover:bg-black mt-8 hover:text-white">Tạo tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
