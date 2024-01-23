<x-layout.dashboard title="Peserta">
    <div class="add_data">
        <span class="action">
            <form class="form" action="{{ route('peserta.store') }}" method="post">
                @csrf
                <table>
                    <tr>
                        <td colspan="3" class="title">Tambahkan Peserta</td>
                    </tr>
                    <x-input
                        type='text'
                        label='Kode Peserta'
                        name='kode'
                        placeholder='Masukkan kode peserta' />
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
            <form class="form" action="{{ route('peserta.import') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <table>
                    <tr>
                        <td class="title">Import Data</td>
                    </tr>
                    <tr>
                        <td><input type="file" name="file"></td>
                    </tr>
                    <tr>
                        <td><button>Import</button></td>
                    </tr>
                </table>
            </form>
            <form class="form" action="{{ route('peserta.reset') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <td class="title">Reset Data</td>
                    </tr>
                    <tr>
                        <td><button onclick="return confirm('Yakin?')">Hapus Semua Peserta</button></td>
                    </tr>
                </table>
            </form>
        </span>
        <span class="add">
            <form class="form" action="{{ route('peserta.store') }}" method="post">
                @csrf
                <table>
                    <tr>
                        <td colspan="3" class="title">Utusan</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table class="keterangan">
                                <tr>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                </tr>
                                @foreach ($utusans as $utusan)
                                    <tr>
                                        <td>{{ $utusan->kode }}</td>
                                        <td>{{ $utusan->keterangan }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </span>
    </div>
    <table id="DataTable" class="cell-border compact">
        <thead>
            <tr>
                <th>Kode Peserta</th>
                <th>Nama Peserta</th>
                <th>Utusan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesertas as $peserta)
            <tr style="color:  {{ $peserta->status == 'Hadir' ? '#31a431' : '' }}">
                <td align="center">{{ $peserta->kode }}</td>
                <td>{{ $peserta->nama }}</td>
                <td>{{ $peserta->utusan->keterangan }}</td>
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
</x-layout.dashboard>
