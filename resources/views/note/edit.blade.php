<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Note</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 text-gray-800 font-sans">
    <div class="max-w-3xl mx-auto px-6 py-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="font-bold text-gray-800 ">Edit Note</h1>
            <a href="/note" class="rounded bg-red-400 hover:bg-red-700 transition px-3 py-1 font-semibold shadow text-white">Kembali</a>
        </div>
        <div class="bg-white p-8 shadow-md rounded-xl">
            <form action="/note/{{ $note->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="" class="block text-sm font-semibold text-gray-700 mb-2">Title</label><br>
                <input class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition" type="text" name="title" value="{{ $note->title }}">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <div class="mb-6">
                <label for="" class="block text-sm font-semibold text-gray-700 mb-2">Note</label><br>
                <textarea class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition" name="note" rows="6" >{{ $note->note }}</textarea>
                @error('note')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 rounded font-semibold px-3 py-1 text-white hover:bg-blue-700 transition shadow">Update</button>
        </form>
        </div>
         
    </div>   
</body>
</html>