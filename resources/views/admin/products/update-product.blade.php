@extends('admin.layouts.default')

@section('title')
    @parent
    Chỉnh sửa sản phẩm
@endsection

@push('styles')
    <style> 
        .img-product{
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
<div class="p-4" style="min-height: 800px;">
    <form action="{{ route('admin.products.updatePatchProduct', $product->product_id) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="mb-3">
            <label for="nameSP">Tên sản phẩm</label>
            <input type="text" name="nameSP" id="nameSP" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label for="descriptionSP">Miêu tả sản phẩm</label>
            <input type="text" name="descriptionSP" id="descriptionSP" class="form-control" value="{{ $product->description }}">
        </div>
        <div class="mb-3">
            <label for="priceSP">Giá sản phẩm</label>
            <input type="text" name="priceSP" id="priceSP" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label for="imageSP">Ảnh sản phẩm</label><br>
            <img src="{{ asset($product->image) }}" alt="" class="img-product">
            <input type="file" name="imageSP" id="imageSP" class="form-control">
        </div>
        <button class="btn btn-success">Chỉnh sửa</button>
        <a href="{{ route('admin.products.listProduct') }}" class="btn btn-info">Quay lại</a>
    </form>
</div>
@endsection

@push('scripts')

@endpush