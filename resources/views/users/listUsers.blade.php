<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <H3>Danh sách user</H3>
    <a href="{{ route('users.addUsers') }}">Thêm mới</a>
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phòng Ban</td>
                <td>Tuổi</td>
                <td>Hành Động</td>
            </tr>
        </thead>
        <tbody>
            @foreach($listUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->ten_donvi }}</td>
                    <td>{{ $user->tuoi }}</td>
                    <td>
                        <a href="{{ route('users.updateUser', $user->id) }}">Sửa</a>
                        <a href="{{ route('users.deleteUser', $user->id) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>