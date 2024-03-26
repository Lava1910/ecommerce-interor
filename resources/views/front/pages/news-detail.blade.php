@extends('front.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <!-- banner chính -->
    <div class="main-slider grid lg:grid-cols-2 items-end">
        <div class="col-span-1">
            <img src="/images/news/{{ $news->news_image }}" alt="" srcset="">
        </div>
        <div class="col-span-1 lg:px-8 px-4 uppercase flex flex-col justify-center">
            <h1 class="text-bold lg:text-5xl text-3xl leading-tight mb-8">
                {{ $news->news_title }}
            </h1>
            <p class="text-sm mb-2 text-justify">
                {{ $news->news_short }}
            </p>
            <a href="#" class="btn-primary block text-center">Tìm hiểu thêm</a>
        </div>
    </div>
    <div class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto py-16" style="text-align: left;width: 50%;">
        {{ $news->news_description }}
    </div>
@endsection
