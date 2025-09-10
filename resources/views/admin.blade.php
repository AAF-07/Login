
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
