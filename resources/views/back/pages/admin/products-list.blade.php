@extends('back.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    @livewire('admin-products-list')
@endsection

@push('scripts')
    <script>
        $(document).on('click','.deleteProductBtn',function (e){
            e.preventDefault();
            var product_id = $(this).data('id');
            Swal.fire({
                title:'Are you sure?',
                html:'You want to delete this product',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false
            }).then(function (result){
                if(result.value){
                    window.livewire.emit('productDelete', product_id);
                }
            });
        });
    </script>
@endpush
