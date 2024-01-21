<x-layout.dashboard title="Peserta">
    <table id="DataTable" class="cell-border compact">
        <thead>
            <tr>
                <th>Kode Peserta</th>
                <th>Nama Peserta</th>
                <th>Utusan</th>
                <th>Kehadiran</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesertas as $peserta)
            <tr>
                <td align="center">{{ $peserta->kode }}</td>
                <td>{{ $peserta->nama }}</td>
                <td>{{ $peserta->utusan->keterangan }}</td>
                <td>{{ $peserta->status }}</td>
                <td class="action">
                    <a href="{{ route('peserta.edit', ['pesertum' => $peserta]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('peserta.destroy', ['pesertum' => $peserta]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Yakin ingin hapus?')"><i class="fa-solid fa-ban"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form class="form" action="{{ route('peserta.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td colspan="3" class="title">Tambahkan Utusan</td>
            </tr>
            <x-input 
                type='select'
                label='Utusan'
                name='utusan'
                placeholder='Pilih utusan' >
                @foreach ($utusans as $utusan)
                    <option value="{{ $utusan->id }}">{{ $utusan->keterangan }}</option>
                @endforeach
            </x-input>
            <x-input
                type='text'
                label='Nama Peserta'
                name='nama'
                placeholder='Masukkan nama peserta' />
            <x-input
                type='button'
                label='Tambahkan'
                />
        </table>
    </form>
</x-layout.dashboard>
