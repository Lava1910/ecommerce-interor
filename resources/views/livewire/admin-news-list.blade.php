<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-blue">News</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-news.add-news') }}" class="btn btn-primary btn-sm" type="button">
                            <i class="fa fa-plus"></i>
                            Add News
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                        <tr>
                            <th>Title</th>
                            <th>Short</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($news as $item)
                            <tr>
                                <td>
                                    {{ $item->news_title }}
                                </td>
                                <td>
                                    {{ $item->news_short }}
                                </td>
                                <td>
                                    <input type="checkbox" {{ $item->published ? 'checked' : '' }} disabled>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.manage-news.edit-news',['id'=>$item->id]) }}" class="text-primary">
                                            <i class="dw dw-edit-2"></i>
                                        </a>
                                        <a href="javascript:;" class="text-danger deleteNewsBtn" data-id="{{ $item->id }}">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No News found!!!</span>
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

