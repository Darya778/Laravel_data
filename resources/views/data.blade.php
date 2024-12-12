<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<body>
    <h1>Submitted Data</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($data as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
