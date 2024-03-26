@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Liên hệ')
@section('content')
    <!-- content chính -->
    <div class="page-contact lg:py-24 py-12 max-w-screen-lg mx-auto lg:px-8 px-4">
    <div class="page-desc lg:px-56">
      <h1 class="uppercase text-center text-3xl text-bold mb-8">Liên hệ</h1>
      <p class="text-justify">
        Nếu có thắc mắc, vui lòng sử dụng biểu mẫu bên dưới để liên hệ với cửa
        hàng gần nhất của bạn. Chúng tôi sẽ sớm liên hệ với bạn. Cửa hàng gần
        nhất là điểm dịch vụ của bạn và có thể hỗ trợ bạn về các yêu cầu bồi
        thường, thông tin sản phẩm, tình trạng còn hàng, giao hàng, giá cả,
        v.v. Nếu bạn đang thắc mắc về đơn hàng, vui lòng chọn cửa hàng nơi bạn
        đã mua hàng. Nếu bạn không chắc đó là cửa hàng nào hoặc cửa hàng đó đã
        đóng cửa hay chưa, vui lòng chọn cửa hàng gần nhất. Khi bạn mua sắm
        trực tuyến, bạn cũng đang mua sắm với cửa hàng gần nhất. Do đó, cửa
        hàng có thể hỗ trợ bạn đăt hàng trên web.
      </p>
    </div>
    <div class="page-content lg:mx-24 mx-0 mt-12 bg-white lg:px-24 px-4 py-8">
      <form action="{{ route('save-contact') }}" method="POST">
        @csrf
        <span class="block mb-2 text-xs text-medium">Họ và tên</span>
        <input type="text" name="name" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
        @error("name")
          <p class="text-danger"><i>{{$message}}</i></p>
        @enderror
        <span class="block mb-2 text-xs text-medium">Địa chỉ</span>
        <input type="text" name="address" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
        @error("address")
          <p class="text-danger"><i>{{$message}}</i></p>
        @enderror
        <span class="block mb-2 text-xs text-medium">Số điện thoại</span>
        <input type="text" name="phone_number" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
        @error("phone_number")
          <p class="text-danger"><i>{{$message}}</i></p>
        @enderror
        <span class="block mb-2 text-xs text-medium">Email</span>
        <input type="text" name="email" class="border border-black px-4 focus:outline-none w-full h-12 mb-4">
        @error("email")
          <p class="text-danger"><i>{{$message}}</i></p>
        @enderror
        <span class="block mb-2 text-xs text-medium">Yêu cầu khách hàng</span>
        <textarea type="text" name="message" rows="5" class="border border-black px-4 py-4 focus:outline-none w-full mb-4"></textarea>
        @error("message")
          <p class="text-danger"><i>{{$message}}</i></p>
        @enderror
        <div class="flex justify-center">
          <button type="submit" class="btn-primary mx-auto" style="background: black !important;">Gửi</button>
        </div>
      </form>
    </div>
  </div>
@endsection
