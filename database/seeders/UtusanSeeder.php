<?php

namespace Database\Seeders;

use App\Models\Utusan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UtusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Utusan::create([
            'kode' => 'MAJ',
            'keterangan' => 'Majelis Jemaat'
        ]);
        
        Utusan::create([
            'kode' => 'PLB',
            'keterangan' => 'Peserta Luar Biasa'
        ]);
        
        Utusan::create([
            'kode' => 'PIS',
            'keterangan' => 'Sektor Pisga'
        ]);
        
        Utusan::create([
            'kode' => 'GAL',
            'keterangan' => 'Sektor Galilea'
        ]);
        
        Utusan::create([
            'kode' => 'HOR',
            'keterangan' => 'Sektor Horeb'
        ]);
        
        Utusan::create([
            'kode' => 'KAL',
            'keterangan' => 'Sektor Kalvari'
        ]);
        
        Utusan::create([
            'kode' => 'LAT',
            'keterangan' => 'Sektor Latta'
        ]);
        
        Utusan::create([
            'kode' => 'YAB',
            'keterangan' => 'Sektor Yabok'
        ]);
        
        Utusan::create([
            'kode' => 'PAS',
            'keterangan' => 'Sektor Passo'
        ]);
        
        Utusan::create([
            'kode' => 'KOT',
            'keterangan' => 'Sektor Kota'
        ]);
        
        Utusan::create([
            'kode' => 'TEB',
            'keterangan' => 'Sektor Teberau'
        ]);
        
        Utusan::create([
            'kode' => 'YAR',
            'keterangan' => 'Sektor Yarden'
        ]);
        
        Utusan::create([
            'kode' => 'ZAI',
            'keterangan' => 'Sektor Zaitun'
        ]);
    }
}
