<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Note</title>
</head>
<body>
    <form action="/note/{{ $note->id }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Title</label><br>
            <input type="text" name="title" value="{{ $note->title }}">
        </div>
        <br>
        <div>
            <label for="">Note</label><br>
            <textarea name="note" >{{ $note->note }}</textarea>
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>