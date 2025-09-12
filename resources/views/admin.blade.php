
@if(Auth::guard('petugas')->check())
    <h1>Selamat datang {{ Auth::guard('petugas')->user()->username }}</h1>
    <h2>role: {{ Auth::guard('petugas')->user()->level }}</h2>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>Beri Tanggapan</h1>

    
    @foreach ($pengaduan as $items)
    <p><strong>Tanggal Pengaduan:</strong> {{ $items->tgl_pengaduan }}</p>
    <p><strong>NIK:</strong> {{ $items->NIK }}</p>
    <p><strong>Isi Laporan:</strong> {{ $items->isi_laporan }}</p>
    <p><strong>Status:</strong>
        @if($items->status == '0')
            Belum diproses
        @elseif($items->status == 'proses')
            Diproses
        @elseif($items->status == 'selesai')
            Selesai
        @endif
    </p>
    @if($items->foto)
        <p><strong>Foto:</strong><br>
        <img src="{{ asset('storage/' . $items->foto) }}" width="200"></p>
    @endif

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if($items->status != 'selesai')
    <form method="POST" action="{{ route('admin.tanggapan.store', $items->id_pengaduan) }}">
        @csrf
        <label>Tanggapan:</label><br>
        <textarea name="tanggapan" rows="4" cols="50" required></textarea><br>
        <button type="submit">Kirim Tanggapan</button>
    </form>
    @else
        <p style="color: green;">Pengaduan sudah selesai ditanggapi.</p>
    @endif

    @if($items->status == 'proses')
    <form method="POST" action="{{ route('admin.pengaduan.selesai', $items->id_pengaduan) }}">
        @csrf
        <button type="submit" onclick="return confirm('Yakin ingin menyelesaikan pengaduan ini?')">Tandai Selesai</button>
    </form>
@endif

    <a href="{{ url()->previous() }}">Kembali</a>
    <p><strong>Isi Laporan:</strong> {{ $items->isi_laporan }}</p>

    @endforeach

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

@else
    <h1>Anda belum login.</h1>
    <a href="{{ route('login') }}">Login</a>
@endif
