<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
</head>
<body>
    <a href="/note/create"><button type="button">Add Note</button></a>
    <table border="1" align="center">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Note</th>
            <th>Action</th>
        </tr>

        <tr>
        @foreach ($data as $d)
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->title }}</td>
            <td>{{ $d->note }}</td>
            <td>
                <a href="/note/{{ $d->id }}/edit">Edit</a>
            </td>
        @endforeach
        </tr>
    </table>
</body>
</html>