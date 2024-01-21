<x-layout.dashboard title="Utusan">
    <table id="DataTable" class="cell-border compact">
        <thead>
            <tr>
                <th>Kode Utusan</th>
                <th>Utusan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($utusans as $utusan)
            <tr>
                <td align="center">{{ $utusan->kode }}</td>
                <td>{{ $utusan->keterangan }}</td>
                <td class="action">
                    <a href="{{ route('utusan.edit', compact('utusan')) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('utusan.destroy', compact('utusan')) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Yakin ingin hapus?')"><i class="fa-solid fa-ban"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form class="form" action="{{ route('utusan.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td colspan="3" class="title">Tambahkan Utusan</td>
            </tr>
            <x-input 
                type='text'
                label='Kode Utusan'
                name='kode'
                placeholder='Masukkan kode utusan' />
            <x-input
                type='text'
                label='Nama Utusan'
                name='keterangan'
                placeholder='Masukkan nama utusan' />
            <x-input
                type='button'
                label='Tambahkan'
                />
        </table>
    </form>
</x-layout.dashboard>
