<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('products.addPostProduct') }}" method="post">
        @csrf
        Tên sản phẩm:
        <input type="text" name="name"> <br>
        Loại:
        <select name="category">
            @foreach($category as $value)
            <option value="{{ $value->id }}">
                {{ $value->name_ct }}
            </option>
            @endforeach
        </select> <br>
        Giá:
        <input type="text" name="price"> <br>
        Lượt xem:
        <input type="text" name="view"> <br>
        <button type="submit">Thêm mới</button>
    </form>
</body>
</html>