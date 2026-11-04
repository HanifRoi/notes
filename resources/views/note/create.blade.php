<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Note</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 font-sans text-gray-800">
    <div class="py-6 px-10 max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="font-semibold text-gray-800 ">Create Note</h1>
            <a href="/note" class="rounded transition text-white bg-red-500 hover:bg-red-700 px-3 py-1 font-semibold">Kembali</a>
        </div>
        
        <div class="rounded-2xl shadow-md bg-white py-6 px-10">
            {{-- @if ($errors->any())
                {{-- <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}
            <form action="/note" method="POST">
                @csrf
                <div>
                    <label for="" class=" block font-semibold text-gray-800 text-xl mb-2">Title</label><br>
                    <input class="w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg py-2 border border-gray-500" type="text" name="title" value="{{ old('title') }}">
            </div>
            <br>
            <div>
                    <label for="" class="block text-gray-800 text-xl font-semibold mb-2">Note</label><br>
                    <textarea rows="6" class="w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg border border-gray-500" name="note"></textarea>
            </div>
            <br>
            
            <button type="submit" class="rounded font-semibold bg-green-500 hover:bg-green-700 transition shadow-md text-white py-1 px-3">Save</button>
            </form>
        </div>
    </div>
    
</body>
</html>