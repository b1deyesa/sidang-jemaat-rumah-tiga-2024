<nav class="navbar">
    <img class="banner" src="{{ asset('img/logo-gpm.png') }}" alt="Logo GPM">
    <div class="title">
        <h1>Sidang Jemaat GPM Rumahtiga XLIV</h1>
        <small>Aku Menanam, Apolos Menyiram, Tetapi Allah Yang Memberi Pertumbuhan (1 Korintus 3:6)</small>
    </div>
    <ul class="menu">
        <li><a href="{{ route('home') }}">Home</a></li>
        {{-- <li><a href="">Badan Pengurus</a></li> --}}
        <li><a href="{{ route('peserta') }}">Peserta</a></li>
        <li><a href="{{ route('absensi') }}">Absensi</a></li>
        <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    </ul>
</nav>