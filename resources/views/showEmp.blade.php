<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Employee</title>
</head>
<body>
    <h1>Employee Details</h1>

    <ul>
        @foreach($name as $item)
        <li>Name: {{ $item['name'] }}</li>
        @endforeach
    </ul>
</body>
</html>
