<h1>selamat datang {{Auth::user()->nama}}</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<hr>
<h2>Buat Pengaduan Baru</h2>
@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
    @csrf
    <label>Tanggal Pengaduan:</label>
    <input type="date" name="tgl_pengaduan" required><br>
    <label>Isi Laporan:</label><br>
    <textarea name="isi_laporan" rows="4" cols="40" required></textarea><br>
    <label>Foto (opsional):</label>
    <input type="file" name="foto" accept="image/*"><br>
    <button type="submit">Kirim Pengaduan</button>
</form>
