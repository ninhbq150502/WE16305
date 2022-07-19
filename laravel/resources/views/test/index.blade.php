<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Ho va ten</td>
            <td>Email</td>
        </tr>
        @foreach($test as $test)
        <tr>
            <td>{{$test->id}}</td>
            <td>{{$test->name}}</td>
            <td>{{$test->email}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>