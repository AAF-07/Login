    <h1>selamat datang {{Auth::user()->nama}}</h1>
    <h2>role: {{Auth::user()->role}}</h2>

    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
