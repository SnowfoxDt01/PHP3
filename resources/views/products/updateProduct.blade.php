<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('products.updatePostProduct') }}" method="post">
        @csrf
        <input type="hidden" name="productID" value="{{ $product->id }}">
        Tên sản phẩm:
        <input type="text" name="name" value="{{ $product->name }}"> <br>
        Loại:
        <select name="category">
            @foreach($category as $value)
            <option value="{{ $value->id }}"
            @if($product->category_id == $value->id)
                selected
            @endif
            >
                {{ $value->name_ct }}
            </option>
            @endforeach
        </select> <br>
        Giá:
        <input type="text" name="price" value="{{ $product->price }}"> <br>
        Lượt xem:
        <input type="text" name="view" value="{{ $product->view }}"> <br>
        <button type="submit">Chỉnh sửa</button>
    </form>
</body>
</html>