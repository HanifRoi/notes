<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Note</title>
</head>
<body>
    @if ($errors->any())
        <ul style="color: red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/note" method="POST">
        @csrf
        <div>
            <label for="">Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
       </div>
       <br>
       <div>
            <label for="">Note</label><br>
            <textarea name="note"></textarea>
       </div>
       <br>
    
       <button type="submit">Save</button>
    </form>
</body>
</html>