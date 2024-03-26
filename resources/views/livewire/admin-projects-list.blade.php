<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-blue">Projects</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-projects.add-project') }}" class="btn btn-primary btn-sm" type="button">
                            <i class="fa fa-plus"></i>
                            Add Projects
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                        <tr>
                            <th>Project Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($projects as $item)
                            <tr>
                                <td>
                                    {{ $item->project_name }}
                                </td>
                                <td>
                                    {{ Str::limit($item->project_description, 50, '...') }}
                                </td>
                                <td>
                                    <div class="avatar mr-2">
                                        <img src="/images/projects/{{ $item->project_image }}" width="200" height="200" alt="{{ $item->project_name }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.manage-projects.edit-project',['id'=>$item->id]) }}" class="text-primary">
                                            <i class="dw dw-edit-2"></i>
                                        </a>
                                        <a href="javascript:;" class="text-danger deleteProjectBtn" data-id="{{ $item->id }}">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No project found!!!</span>
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


