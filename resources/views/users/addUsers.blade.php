<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('users.addPostUsers') }}" method="post">
        @csrf
        Tên User:
        <input type="text" name="name"> <br>
        Email User:
        <input type="text" name="email"> <br>
        Phòng ban:
        <select name="phongban">
            @foreach($phongBan as $value)
            <option value="{{ $value->id }}">
                {{ $value->ten_donvi }}
            </option>
            @endforeach
        </select> <br>
        Tuổi:
        <input type="text" name="tuoi"> <br>
        <button type="submit">Thêm mới</button>
    </form>
</body>
</html>