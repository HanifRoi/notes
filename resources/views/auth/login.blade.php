<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User</title>
</head>
<body>
    <form action="/auth/login" method="POST">
        @csrf
        <div>
            <label>Email</label><br>
            <input type="email" name="email">
            @error('email')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label>Password</label><br>
            <input type="password" name="password">
            @error('password')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <br>
        
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun?  <a href="/auth/register">buat akun disini</a></p>
</body>
</html>