
@if(Auth::guard('petugas')->check())
    <h1>Selamat datang {{ Auth::guard('petugas')->user()->username }}</h1>
    <h2>role: {{ Auth::guard('petugas')->user()->level }}</h2>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <h1>Anda belum login.</h1>
    <a href="{{ route('login') }}">Login</a>
@endif
<h1>Tambah Akun Baru</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('admin.akun.store') }}">
    @csrf
    <input type="text" name="nama_petugas" placeholder="Nama" value="{{ old('nama') }}" required><br>
    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required><br>
    <input type="text" name="telp" placeholder="Telp" value="{{ old('telp') }}" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br>
    <button type="submit">Tambah Akun</button>
</form>

@if($errors->any())
    <ul style="color: red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
