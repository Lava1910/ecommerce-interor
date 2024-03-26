@extends('back.layout.pages-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    @livewire('admin-orders-list')
@endsection

@push('scripts')
    <script>
        $(document).on('click','.blockUserBtn',function (e){
            e.preventDefault();
            var product_id = $(this).data('id');
            Swal.fire({
                title:'Are you sure?',
                html:'You want to block this user',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false
            }).then(function (result){
                if(result.value){
                    alert('Yes');
                }
            });
        });
    </script>
@endpush
