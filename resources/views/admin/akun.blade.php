<h1>Daftar Akun</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Telp</th>
    </tr>
    @foreach($akun as $a)
        <tr>
            <td>{{ $a->id_petugas }}</td>
            <td>{{ $a->nama_petugas }}</td>
            <td>{{ $a->username }}</td>
            <td>{{ $a->telp }}</td>
        </tr>
    @endforeach
</table>

<a href="{{ route('admin.akun.create') }}">+ Tambah Akun</a>
