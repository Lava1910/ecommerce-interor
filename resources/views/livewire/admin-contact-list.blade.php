<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-blue">Contact</h4>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($contacts as $item)
                            <tr>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->phone_number }}
                                </td>
                                <td>
                                    {{ $item->address }}
                                </td>
                                <td>
                                    {{ $item->message }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No Contact found!!!</span>
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
