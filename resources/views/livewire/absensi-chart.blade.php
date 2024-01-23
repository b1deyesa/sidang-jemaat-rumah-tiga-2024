<div wire:poll.keep-alive>

    <h2 class="big-title">Daftar Hadir</h2>
    <div class="daftar">
        <span class="table">
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Utusan</th>
                </tr>
                @foreach ($pesertas->where('status', 'Hadir') as $peserta)
                    <tr>
                        <td>{{ $peserta->nama }}</td>
                        <td>{{ $peserta->utusan->keterangan }}</td>
                    </tr>
                @endforeach
            </table>
        </span>
        <span class="card">
            <h4>Total Peserta</h4>
            <p>{{ $pesertas->count() }}</p>
        </span>
    </div>

    <div class="parameter-kehadiran">

        <table class="kehadiran">
            <tr>
                <td colspan="2"><h3 class="title">Majelis</h3></td>
            </tr>
            <tr>
                <td>Hadir</td>
                <td>{{ $majelis->where('status', 'Hadir')->count() }}</td>
            </tr>
            <tr>
                <td>Tidak Hadir</td>
                <td>{{ $majelis->where('status', 'Tidak Hadir')->count() }}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>{{ $majelis->count() }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ $majelis->count() ? number_format(($majelis->where('status', 'Hadir')->count() / $majelis->count() * 100), 2, ',', '') : 0 }} %</td>
            </tr>
        </table>
        <table class="kehadiran">
            <tr>
                <td colspan="2"><h3 class="title">Peserta Luar Biasa</h3></td>
            </tr>
            <tr>
                <td>Hadir</td>
                <td>{{ $peserta_luarbiasa->where('status', 'Hadir')->count() }}</td>
            </tr>
            <tr>
                <td>Tidak Hadir</td>
                <td>{{ $peserta_luarbiasa->where('status', 'Tidak Hadir')->count() }}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>{{ $peserta_luarbiasa->count() }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ $peserta_luarbiasa->count() ? number_format(($peserta_luarbiasa->where('status', 'Hadir')->count() / $peserta_luarbiasa->count() * 100), 2, ',', '') : 0 }} %</td>
            </tr>
        <table class="kehadiran">
            <tr>
                <td colspan="2"><h3 class="title">Peserta Sektor</h3></td>
            </tr>
            <tr>
                <td>Hadir</td>
                <td>{{ $peserta_biasa->where('status', 'Hadir')->count() }}</td>
            </tr>
            <tr>
                <td>Tidak Hadir</td>
                <td>{{ $peserta_biasa->where('status', 'Tidak Hadir')->count() }}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>{{ $peserta_biasa->count() }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ $peserta_biasa->count() ? number_format(($peserta_biasa->where('status', 'Hadir')->count() / $peserta_biasa->count() * 100), 2, ',', '') : 0 }} %</td>
            </tr>
        </table>
    </div>
    
    <div class="parameter-sektor">
        <table>
            <tr>
                <td></td>
                @foreach ($utusans->where('id', '>', 2) as $utusan)
                    <td>{{ $utusan->keterangan }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Hadir</td>
                @foreach ($utusans->where('id', '>', 2) as $utusan)
                    <td>{{ $utusan->pesertas->where('status', 'Hadir')->count() }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Tidak Hadir</td>
                @foreach ($utusans->where('id', '>', 2) as $utusan)
                    <td>{{ $utusan->pesertas->where('status', 'Tidak Hadir')->count() }}</td>
                @endforeach
            </tr>
            <tr>
                <td></td>
                @foreach ($utusans->where('id', '>', 2) as $utusan)
                    <td>{{ $utusan->pesertas->count() }}</td>
                @endforeach
            </tr>
        </table>
       
    </div>
</div>
