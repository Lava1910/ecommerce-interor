<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-blue">Categories</h4>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                        <tr>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($categories as $item)
                        <tr>
                            <td>
                                {{ $item->category_name }}
                            </td>
                            <td>
                                <div class="avatar mr-2">
                                    <img src="/images/categories/{{ $item->category_image }}" width="100" height="100" alt="{{ $item->category_name }}">
{{--                                    <img src="/images/categories/{{ $item->category_image_detail }}" width="200" height="200" alt="{{ $item->category_name }}">--}}
                                </div>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('admin.manage-categories.edit-category',['id'=>$item->id]) }}" class="text-primary">
                                        <i class="dw dw-edit-2"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <span class="text-danger">No category found!!!</span>
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
