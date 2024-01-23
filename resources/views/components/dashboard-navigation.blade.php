<ul>
    {{-- <li><a href="{{ route('utusan.index') }}" class="{{ Request::segment(2) == 'utusan' ? 'active' : '' }}">Utusan</a></li> --}}
    <li><a href="{{ route('peserta.index') }}" class="{{ Request::segment(2) == 'peserta' ? 'active' : '' }}">Peserta</a></li>
    <li><a href="{{ route('peserta.absensi') }}" class="{{ Request::segment(2) == 'absensi' ? 'active' : '' }}">Absensi</a></li>
</ul>