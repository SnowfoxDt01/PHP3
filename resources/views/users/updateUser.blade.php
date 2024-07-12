<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('users.updatePostUser') }}" method="post">
        @csrf
        <input type="hidden" name="userId" value="{{ $user->id }}">
        Tên User:
        <input type="text" name="name" value="{{ $user->name }}"> <br>
        Email User:
        <input type="text" name="email" value="{{ $user->email }}"> <br>
        Phòng ban:
        <select name="phongban">
            @foreach($phongBan as $value)
            <option value="{{ $value->id }}"
                @if($user->phongban_id == $value->id)
                    selected
                @endif
            >

                {{ $value->ten_donvi }}
            </option>
            @endforeach
        </select> <br>
        Tuổi:
        <input type="text" name="tuoi" value="{{ $user->tuoi }}"> <br>
        Số ngày nghỉ:
        <input type="text" name="ngaynghi" value="{{ $user->songaynghi }}"> <br>
        <button type="submit">Chỉnh Sửa</button>
    </form>
</body>
</html>