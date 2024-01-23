<x-layout.dashboard title="">
    <div class="info-absensi">

        @if (!$peserta)
            <div class="status" style="color: red">Maaf, anda tidak terdaftar [{{ $message }}]</div>
        @else
            <div class="status" style="color: {{ $status ? 'green' : 'orange' }}">{{ $message }}</div>
            <table>
                <tr>
                    <td>Kode Peserta</td>
                    <td>:</td>
                    <td>{{ $peserta->kode }}</td>
                </tr>
                <tr>
                    <td>Nama Peserta</td>
                    <td>:</td>
                    <td>{{ $peserta->nama }}</td>
                </tr>
                <tr>
                    <td>Utusan</td>
                    <td>:</td>
                    <td>{{ $peserta->utusan->keterangan }}</td>
                </tr>
                <tr>
                    <td>Waktu Absensi</td>
                    <td>:</td>
                    <td>{{ $peserta->waktu_absen }}</td>
                </tr>
            </table>
            <a class="button" href="{{ route('dashboard.absensi') }}">Kembali</a>
        @endif
    </div>
</x-layout.dashboard>