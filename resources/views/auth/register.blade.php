<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun</title>
</head>
<body>
    <form action="/auth/register" method="POST">
    @csrf
        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label>Password</label><br>
            <input type="password" name="password" >
            @error('password')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label>Password Confirmation</label><br>
            <input type="password" name="password_confirmation">
        </div>
        <br>
        <div>
            <label>Name</label><br>
            <input type="text" name="name">
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="/auth/login">Login disini</a></p>
</body>
</html>