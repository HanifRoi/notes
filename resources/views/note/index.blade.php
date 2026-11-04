<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="max-w-5xl mx-auto px-4 py-10">
       <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Daftar Note</h1>
         <a href="/note/create" class="bg-green-500 hover:bg-green-800 font-semibold py-0.5 px-2 rounded shadow transition text-white">+ Add Note</a>
       </div>
       <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b border-gray-400">
                <tr>
                    <th class="py-2 px-6 text-sm font-semibold text-gray-600 w-16">No</th>
                    <th class="py-2 px-6 text-sm font-semibold text-gray-600">Title</th>
                    <th class="py-2 px-6 text-sm font-semibold text-gray-600">Note</th>
                    <th class="py-2 px-6 text-sm font-semibold text-gray-600 text-center">Action</th>
                </tr>
            </thead>
            
            <tbody class="divide-y divide-gray-400">
                @foreach ($data as $d)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $d->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $d->note }}</td>
                        <td class="px-6 py-4 flex text-sm justify-center gap-3">
                            <a href="/note/{{ $d->id }}/edit" class="bg-blue-500 rounded px-3 py-2 hover:bg-blue-700 text-white shadow-sm text-xs font-medium transition">Edit</a>
                            <form action="/note/{{ $d->id }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah anda yakin?')"  class="bg-red-500 rounded px-3 py-2 hover:bg-red-700 text-white shadow-sm text-xs font-medium transition">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </div>
       <form action="/auth/logout" method="POST" style="margin-top: 50px">
        @csrf
        <button type="submit" class="bg-red-500 rounded text-white hover:bg-red-700 transition text-xl py-1 px-3" onclick=" confirm('Yakin ingin keluar?') ">Logout</button>
        </form>
    </div> 
    
</body>
</html>