<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-blue">Orders</h4>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Shipping Method</th>
                            <th>Payment Method</th>
                            <th>Grand Total</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($orders as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->full_name }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->address }}
                                </td>
                                <td>
                                    {{ $item->shipping_method }}
                                </td>
                                <td>
                                    {{ $item->payment_method }}
                                </td>
                                <td>
                                    {{ number_format($item->grand_total, 0, ',', '.') }}đ
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="#" class="text-primary">
                                            <i class="dw dw-magnifying-glass"></i>
                                        </a>
                                        <a href="javascript:;" class="text-danger blockUserBtn" data-id="{{ $item->id }}">
                                            <i class="dw dw-lock"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No order found!!!</span>
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

