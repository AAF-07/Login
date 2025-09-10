<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('login')}}">
        @csrf
        <input type="text" name="nik" placeholder="NIK" >
        <input type="text" name="id_petugas" placeholder="ID Petugas">
        <input type="password" name="password" placeholder="password" required>
        <button type="submit">login</button>
        <a href="/regis">register</a>
    </form>
</body>
</html>
