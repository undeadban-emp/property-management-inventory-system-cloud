<!DOCTYPE html>
<html>
<head>
    <title>API Data</title>
</head>
<body>
    <h1>API Data</h1>

    <ul>
        @foreach ($data as $item)
            <li>{{ $item['property_name'] }}</li>
        @endforeach
    </ul>
</body>
</html>