<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 font-sans">
    <div class="max-w-xl mx-auto py-25 px-10">
        <div class="items-center flex justify-center mb-5">
            <h1 class="font-semibold text-gray-800 text-xl">Login</h1>
        </div>
        <div class="rounded-2xl bg-white shadow-md py-6 px-10 hover:bg-gray-100">
            <form action="/auth/login" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="font-semibold text-gray-800 block">Email</label><br>
                    <input class="border border-gray-500 rounded py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition" type="email" name="email">
                    @error('email')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <div class="mb-5">
                    <label class="font-semibold text-gray-800 block">Password</label><br>
                    <input class="rounded border border-gray-500 w-full py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" type="password" name="password">
                    @error('password')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                
                <button class="rounded transition bg-green-500 hover:bg-green-700 font-semibold text-white py-1 px-3" type="submit">Login</button>
                <p class="mt-2">Belum punya akun?  <a href="/auth/register" class="text-blue-500 hover:text-blue-800">buat akun disini</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>