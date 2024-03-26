@extends('back.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-dark">Add Category</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-categories.cats-list') }}" class="btn btn-primary btn-sm">
                            <i class="ion-arrow-left-a"></i> Back to categories list
                        </a>
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.manage-categories.store-category') }}" method="POST"
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Enter category name"
                                        value="{{ old('category_name') }}">
                                    @error('category_name')
                                        <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Main Description</label>
                                    <textarea type="text" class="form-control" name="description_main" placeholder="Enter description"></textarea>
                                    @error('description_main')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category Image</label>
                                    <input type="file" class="form-control" name="category_image" id="category_image">
                                    @error('category_image')
                                        <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="" alt="" width="200" height="200" id="category_image_preview">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category Image in Detail Page</label>
                                    <input type="file" class="form-control" name="category_image_detail" id="category_image_detail">
                                    @error('category_image_detail')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="" alt="" width="200" height="200" id="category_image_detail_preview">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Topic 1</label>
                                    <input type="text" class="form-control" name="topic1" placeholder="Enter topic">
                                    @error('topic1')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control" name="description_topic1" placeholder="Enter description"></textarea>
                                    @error('description_topic1')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Topic 2</label>
                                    <input type="text" class="form-control" name="topic2" placeholder="Enter topic">
                                    @error('topic2')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control" name="description_topic2" placeholder="Enter description"></textarea>
                                    @error('description_topic1')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Project Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">Select a Project category</option>
                                @foreach($projectCategories as $category)
                                    <option value="{{ $category->id }}" {{ old('project_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->project_category_name }}
                                    </option>
                                @endforeach
                            </select>
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
                    $('#category_image_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#category_image").change(function(){
            readURL(this);
        });
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#category_image_detail_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#category_image_detail   ").change(function(){
            readURL1(this);
        });
    </script>
@endpush
