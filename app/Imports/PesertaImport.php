<?php

namespace App\Imports;

use App\Models\Peserta;
use App\Models\Utusan;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        $check = Peserta::where('kode', $row[0])->first();
        
        if($check) {
            $check->update([
                'nama' => $row[1]
            ]);

            return null;
        } 
        
        $remove_number = preg_replace('/[0-9]+/', '', $row[0]);
        $utusan = Utusan::where('kode','LIKE', '%'.$remove_number.'%')->first();

        if(!$utusan) {
            return null;
        }
 
        return new Peserta([
            'utusan_id' => $utusan->id,
            'kode' => $row[0],
            'nama' => $row[1]
        ]);
    }
}
