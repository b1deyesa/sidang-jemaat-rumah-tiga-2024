<x-layout.app>
    <div class="peserta">
        <h2 class="title">Daftar Peserta</h2>
        <table>
            <tr>
                <th>No.</th>
                <th>Nama Peserta</th>
                <th>Utusan</th>
            </tr>
            @foreach ($pesertas as $key => $peserta)
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $peserta->nama }}</td>
                <td>{{ $peserta->utusan->keterangan }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</x-layout.app>