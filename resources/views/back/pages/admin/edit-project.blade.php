@extends('back.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-dark">Edit project</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-projects.projects-list') }}" class="btn btn-primary btn-sm">
                            <i class="ion-arrow-left-a"></i> Back to projects list
                        </a>
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.manage-projects.update-project') }}" method="POST"
                      enctype="multipart/form-data" class="mt-3">
                    <input type="hidden" name="project_id" value="{{ Request('id') }}">
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
                                    <label for="">Project Name</label>
                                    <input type="text" class="form-control" name="project_name" placeholder="Enter Project name"
                                           value="{{ $project->project_name }}">
                                    @error('project_name')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Project Description</label>
                                    <textarea type="text" class="form-control" name="project_description"
                                              placeholder="Enter Project description">{{ $project->project_description }}</textarea>
                                    @error('project_description')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Project banner </label>
                                    <input type="file" class="form-control" name="project_banner" id="project_banner">
                                    @error('project_banner')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="/images/projects/{{ $project->project_banner }}" alt="" width="200" height="200" id="project_banner_preview">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">project Image</label>
                                    <input type="file" class="form-control" name="project_image" id="project_image">
                                    @error('project_image')
                                    <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="avatar mb-3">
                                    <img src="/images/projects/{{ $project->project_image }}" alt="" width="200" height="200" id="project_image_preview">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="">Project Category</label>
                                    <select class="form-control" name="project_category_id">
                                        <option value="{{$project->project_category_id}}">Select a Project category</option>
                                        @foreach($project_categories as $project_category)
                                            <option value="{{ $project_category->id }}" {{ old('project_category_id') == $project_category->id ? 'selected' : '' }}>
                                                {{ $project_category->project_category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">SAVE</button>
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
                    $('#project_thumbnail_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#project_thumbnail").change(function(){
            readURL(this);
        });
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#project_image1_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#project_image1").change(function(){
            readURL1(this);
        });
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#project_image2_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#project_image2").change(function(){
            readURL2(this);
        });
    </script>
@endpush
