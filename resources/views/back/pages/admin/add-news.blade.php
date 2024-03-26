@extends('back.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-dark">Add News</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-news.news-list') }}" class="btn btn-primary btn-sm">
                            <i class="ion-arrow-left-a"></i> Back to news list
                        </a>
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.manage-news.store-news') }}" method="POST"
                      enctype="multipart/form-data" class="mt-3">
                    @csrf
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            <strong><i class="dw dw-check"></i></strong>
                            {!! Session::get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            <strong><i class="dw dw-check"></i></strong>
                            {!! Session::get('fail') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">News Title</label>
                                    <input type="text" class="form-control" name="news_title" placeholder="Enter news title"
                                           value="{{ old('news_title') }}">
                                    @error('news_title')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">News Short</label>
                                    <input type="text" class="form-control" name="news_short" placeholder="Enter news short"
                                           value="{{ old('news_short') }}">
                                    @error('news_short')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">News Description</label>
                                <textarea class="form-control" name="news_description" placeholder="Enter description"
                                       value="{{ old('news_description') }}"></textarea>
                                @error('news_description')
                                <span class="text-danger ml-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">News Thumbnail</label>
                                    <input type="file" class="form-control" name="news_thumbnail" id="news_thumbnail">
                                    @error('news_thumbnail')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="" alt="" width="200" height="200" id="news_thumbnail_preview">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">News Image</label>
                                    <input type="file" class="form-control" name="news_image" id="news_image">
                                    @error('news_image')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="" alt="" width="200" height="200" id="news_image_preview">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">CREATE</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#news_thumbnail_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#news_thumbnail").change(function(){
            readURL(this);
        });
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#news_image_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#news_image").change(function(){
            readURL1(this);
        });
    </script>
@endpush
