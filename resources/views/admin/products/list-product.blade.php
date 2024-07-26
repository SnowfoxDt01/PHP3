@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách sản phẩm
@endsection

@push('styles')
    <style>
        .imgPr{
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>

@endpush

@section('content')
<div class="p-4" style="min-height: 800px;">
    @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
    <a href="{{ route('admin.products.addProduct') }}" class="btn btn-info">Thêm mới</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listProduct as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->price }}</td>
                    <td>
                        <img class="imgPr" src="{{ asset($value->image) }}" alt="">
                    </td>
                    <td>
                        <a href="{{ route('admin.products.detailProduct', $value->product_id) }}" class="btn btn-info">Chi tiết</a>
                        <a href="{{ route('admin.products.updateProduct', $value->product_id) }}" class="btn btn-warning">Sửa</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{ $value->product_id  }}">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listProduct->links('pagination::bootstrap-5') }}

</div> 
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Cảnh báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="formDelete">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <p class="text-danger">Bạn có chắc muốn xóa sản phẩm này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                </div>
            </form>
        </div>
    </div>
</div> 

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');
            
            console.log('Button ID:', id); // Kiểm tra ID có đúng không
            
            let formDelete = document.getElementById('formDelete');
            console.log('Form Action Before:', formDelete.getAttribute('action')); // Kiểm tra URL trước khi thay đổi
            
            formDelete.setAttribute('action', '{{ route("admin.products.deleteProduct") }}?idproduct=' + id);
            
            console.log('Form Action After:', formDelete.getAttribute('action')); // Kiểm tra URL sau khi thay đổi
        });
    });
</script>
@endpush
