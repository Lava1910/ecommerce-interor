<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-blue">Project Categories</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-project-categories.add-project-category') }}" class="btn btn-primary btn-sm" type="button">
                            <i class="fa fa-plus"></i>
                            Add Project Category
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($projectCategories as $item)
                            <tr>
                                <td>
                                    {{ $item->project_category_name }}
                                </td>
                                <td>
                                    <div class="avatar mr-2">
                                        <img src="/images/project-categories/{{ $item->project_category_image }}" width="100" height="100" alt="{{ $item->project_category_name }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.manage-project-categories.edit-project-category',['id'=>$item->id]) }}" class="text-primary">
                                            <i class="dw dw-edit-2"></i>
                                        </a>
                                        <a href="javascript:;" class="text-danger deleteProjectCategoryBtn" data-id="{{ $item->id }}">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No Project category found!!!</span>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
