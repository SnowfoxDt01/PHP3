@extends('admin.layouts.default')

@section('title')
    @parent
    Chi tiết sản phẩm
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
        <p>
            Tên sản phẩm:
            <span class="font-weight-bold">{{ $product->name }}</span>
        </p>
        <p>
            Mô tả sản phẩm:
            <span class="font-weight-bold">{{ $product->description }}</span>
        </p>
        <p>
            Giá sản phẩm:
            <span class="font-weight-bold">{{ $product->price }}</span>
        </p>
        <p>
            Ảnh sản phẩm:
            <img src="{{ asset($product->image) }}" alt="" class="img-product">
        </p>
        <a href="{{ route('admin.products.listProduct') }}" class="btn btn-info mt-3">Quay lại</a>
    </div>
@endsection

@push('scripts')
@endpush