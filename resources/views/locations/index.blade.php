<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations</title>
</head>
<body>
    <h1>Locations</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
                <tr>
                    <td>{{ $location->id }}</td>
                    <td>{{ $location->location_name }}</td>
                    <td>{{ $location->address }}</td>
                    <td>{{ $location->city }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
