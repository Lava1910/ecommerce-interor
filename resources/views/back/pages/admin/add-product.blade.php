@extends('back.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-dark">Add Product</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-products.products-list') }}" class="btn btn-primary btn-sm">
                            <i class="ion-arrow-left-a"></i> Back to products list
                        </a>
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.manage-products.store-product') }}" method="POST"
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
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter product name"
                                           value="{{ old('product_name') }}">
                                    @error('product_name')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Thumbnail</label>
                                    <input type="file" class="form-control" name="product_thumbnail" id="product_thumbnail">
                                    @error('product_thumbnail')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="" alt="" width="200" height="200" id="product_thumbnail_preview">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Image 1</label>
                                    <input type="file" class="form-control" name="product_image1" id="product_image1">
                                    @error('product_image1')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="" alt="" width="200" height="200" id="product_image1_preview">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Image 2</label>
                                    <input type="file" class="form-control" name="product_image2" id="product_image2">
                                    @error('product_image2')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="" alt="" width="200" height="200" id="product_image2_preview">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">Product Material</label>
                                    <input type="text" class="form-control" name="product_material" placeholder="Enter material"
                                           value="{{ old('product_material') }}">
                                    @error('product_material')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">Product Author</label>
                                    <input type="text" class="form-control" name="product_author" placeholder="Enter author"
                                           value="{{ old('product_author') }}">
                                    @error('product_author')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="number" class="form-control" name="product_price" placeholder="Enter price"
                                           value="{{ old('product_price') }}">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">Product Price Discount</label>
                                    <input type="number" class="form-control" name="product_price_after_discount" placeholder="Enter price discount"
                                           value="{{ old('product_price_after_discount') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">Product Quantity</label>
                                    <input type="number" class="form-control" name="product_qty" placeholder="Enter quantity"
                                           value="{{ old('product_qty') }}">
                                    @error('product_qty')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
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
                    $('#product_thumbnail_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#product_thumbnail").change(function(){
            readURL(this);
        });
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#product_image1_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#product_image1").change(function(){
            readURL1(this);
        });
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#product_image2_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#product_image2").change(function(){
            readURL2(this);
        });
    </script>
@endpush
