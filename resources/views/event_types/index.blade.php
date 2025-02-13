<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Types</title>
</head>
<body>
    <h1>Event Types</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventTypes as $eventType)
                <tr>
                    <td>{{ $eventType->id }}</td>
                    <td>{{ $eventType->event_type_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
