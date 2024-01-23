<?php

namespace App\Livewire;

use App\Models\Utusan;
use App\Models\Peserta;
use Livewire\Component;

class AbsensiChart extends Component
{
    public $utusans;
    public $pesertas;
    public $majelis;
    public $peserta_biasa;
    public $peserta_luarbiasa;
    
    public function mount()
    {      
        $this->utusans = Utusan::all();
        $this->pesertas = Peserta::orderBy('waktu_absen', 'asc')->get();
        $this->majelis = Peserta::where('utusan_id', 1)->get();
        $this->peserta_luarbiasa = Peserta::where('utusan_id', 2)->get();
        $this->peserta_biasa = Peserta::where('utusan_id', '>', 2)->get();
    }
    
    public function render()
    {
        return view('livewire.absensi-chart');
    }
}
