<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-blue">Products</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-products.add-product') }}" class="btn btn-primary btn-sm" type="button">
                            <i class="fa fa-plus"></i>
                            Add Product
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                        <tr>
                            <th>Product Thumbnail</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($products as $item)
                            <tr>
                                <td>
                                    <div class="avatar mr-2">
                                        <img src="/images/products/{{ $item->product_thumbnail }}" width="100" height="100" alt="{{ $item->product_name }}">
                                    </div>
                                </td>
                                <td>
                                    {{ $item->product_name }}
                                </td>
                                <td>
                                    {{ $item->product_qty }}
                                </td>
                                <td>
                                    {{ number_format($item->product_price, 0, ',', '.') }}
                                </td>
                                <td>
                                    {{ $item->category->category_name }}
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.manage-products.edit-product',['id'=>$item->id]) }}" class="text-primary">
                                            <i class="dw dw-edit-2"></i>
                                        </a>
                                        <a href="javascript:;" class="text-danger deleteProductBtn" data-id="{{ $item->id }}">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No product found!!!</span>
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

