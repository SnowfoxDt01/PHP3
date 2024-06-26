<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Tuổi</th>
            <th>Chuyên Ngành</th>
        </thead>
        <tbody>
            @foreach($tensv as $value)
            <tr>
                <td>{{$value['id']}}</td>
                <td>{{$value['name']}}</td>
                <td>{{$value['age']}}</td>
                <td>{{$value['nganh']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>