@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Đăng ký')
@section('content')
    <!-- form đăng ký -->
    <div class="page-contact lg:py-24 py-12 max-w-screen-lg mx-auto">
        <div class="page-desc lg:px-56 px-4">
            <h1 class="uppercase text-center text-3xl text-bold mb-8">
                Tạo tài khoản
            </h1>
        </div>
        <div class="page-content lg:mx-24 mx-4 mt-12 bg-white lg:px-24 px-4 lg:py-8 py-4">
            <form action="{{route('client.register_handler')}}" method="POST" id="registerForm" >
                @csrf
                <span class="block mb-2 text-sm mt-2 text-medium">Họ và tên</span>
                <input type="text" name="name" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
                @error('name')
                <div class="d-block text-danger">
                    {{ $message }}
                </div>
                @enderror
                <span class="block mb-2 text-sm mt-2 text-medium">User Name</span>
                <input type="text" name="username" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
                @error('username')
                <div class="d-block text-danger">
                    {{ $message }}
                </div>
                @enderror
                <span class="block mb-2 text-sm mt-2 text-medium">Địa chỉ</span>
                <input type="text" name="address" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
                @error('address')
                <div class="d-block text-danger">
                    {{ $message }}
                </div>
                @enderror
                <span class="block mb-2 text-sm mt-2 text-medium">Số điện thoại</span>
                <input type="text" name="phone" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
                @error('phone')
                <div class="d-block text-danger">
                    {{ $message }}
                </div>
                @enderror
                <span class="block mb-2 text-sm mt-2 text-medium">Email</span>
                <input type="text" name="email" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
                @error('email')
                <div class="d-block text-danger">
                    {{ $message }}
                </div>
                @enderror
                <span class="block mb-2 text-sm mt-2 text-medium">Mật khẩu</span>
                <input type="password" name="password" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
                @error('password')
                <div class="d-block text-danger">
                    {{ $message }}
                </div>
                @enderror
                <span class="block mb-2 text-sm mt-2 text-medium">Xác nhận mật khẩu</span>
                <input type="password" name="confirmPassword" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
                @error('confirmPassword')
                <div class="d-block text-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="flex justify-center">
                    <button class="btn-primary mx-auto" id="btn-register" type="submit" style="background: black !important;">Gửi</button>
                </div>
            </form>
        </div>
    </div>
@endsection
