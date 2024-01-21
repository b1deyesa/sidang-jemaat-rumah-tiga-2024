<x-layout.dashboard title="Absensi">
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
    </table>
</x-layout.dashboard>