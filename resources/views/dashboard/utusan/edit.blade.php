<x-layout.dashboard title="Edit Utusan">
    <form action="{{ route('utusan.update', ['utusan' => $utusan]) }}" method="post">
        @method('PUT')
        @csrf
        <table>
            <x-input
                type='text'
                label='Kode Utusan'
                name='kode'
                placeholder='Masukkan kode utusan' 
                :value="$utusan->kode" />
            <x-input
                type='text'
                label='Utusan'
                name='keterangan'
                placeholder='Utusan' 
                :value="$utusan->keterangan" />
            <x-input
                type='button'
                label='Ubah'
                />
        </table>
    </form>
</x-layout.dashboard>