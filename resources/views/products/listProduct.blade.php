<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <a href="{{ route('products.addProduct') }}">Thêm mới</a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Tên</th>
            <th>Loại</th>
            <th>Giá</th>
            <th>Lượt xem</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach($listProduct as $pr)
            <tr>
                <td>{{ $pr->id }}</td>
                <td>{{ $pr->name }}</td>
                <td>{{ $pr->name_ct }}</td>
                <td>{{ $pr->price }}</td>
                <td>{{ $pr->view }}</td>
                <td>
                    <a href="{{ route('products.updateProduct', $pr->id) }}">Sửa</a>
                    <a href="{{ route('products.deleteProduct', $pr->id) }}">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
