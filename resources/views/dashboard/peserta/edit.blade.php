<x-layout.dashboard title="Edit Peserta">
    <form action="{{ route('peserta.update', ['pesertum' => $peserta]) }}" method="post">
        @method('PUT')
        @csrf
        <table>
            <x-input
                type='text'
                label='Kode Peserta'
                name='kode'
                placeholder='Masukkan kode peserta' 
                :value="$peserta->kode" 
                :disable="true" />
            <x-input
                type='text'
                label='Nama Peserta'
                name='nama'
                placeholder='Masukkan nama peserta' 
                :value="$peserta->nama" />
            <x-input 
                type='select'
                label='Kehadiran'
                name='status'
                :value="$peserta->status">
                <option value="Hadir">Hadir</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
            </x-input>
            <x-input
                type='button'
                label='Ubah'
                />
        </table>
    </form>
</x-layout.dashboard>