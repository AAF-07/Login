<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="NIK" placeholder="Nik" required>
    <input type="text" name="telp" placeholder="Telp" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
    <button type="submit">Daftar</button>
</form>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>       
@endif
