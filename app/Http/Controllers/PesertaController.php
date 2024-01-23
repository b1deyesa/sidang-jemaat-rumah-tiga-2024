<?php

namespace App\Http\Controllers;

use App\Imports\PesertaImport;
use App\Models\Peserta;
use App\Models\Utusan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.peserta.index', [
            'pesertas' => Peserta::orderByRaw('LENGTH(kode) asc')->orderBy('kode')->get(),
            'utusans' => Utusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        $check = Peserta::where('kode','LIKE', $request->kode)->first();
        
        if($check) {
            return redirect()->back();
        } 
        
        $remove_number = preg_replace('/[0-9]+/', '', $request->kode);
        $utusan = Utusan::where('kode','LIKE', '%'.$remove_number.'%')->first();

        if(!$utusan) {
            return redirect()->back();
        }

        Peserta::create([
            'utusan_id' => $utusan->id,
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peserta $pesertum)
    {
        return view('dashboard.peserta.edit', [
            'peserta' => $pesertum,
            'utusans' => Utusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $pesertum)
    {
        // if($pesertum->kode !== $request->kode) {
        //     $request->validate([
        //         'kode' => 'required|unique:pesertas,kode',
        //     ]);
        // }

        $request->validate([
            'nama' => 'required',
            'status' => 'required'
        ]);


        $pesertum->update([
            // 'kode' => $request->kode,
            'nama' => $request->nama,
            'status' => $request->status
        ]);

        if($request->status !== 'Hadir') {
            $pesertum->update([
                'waktu_absen' => null
            ]);
        }

        return redirect()->route('peserta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete();

        return redirect()->back();
    }

    public function absensi(Request $request)
    {
        $peserta = Peserta::where('kode', $request->peserta)->first();
        
        if($peserta) {
            if($peserta->status !== 'Hadir') {
                $peserta->update([
                    'status' => 'Hadir',
                    'info' => 'Masuk',
                    'waktu_absen' => now()->toDateTimeString(),
                ]);

                return view('dashboard.absensi.info', [
                    'peserta' => $peserta,
                    'status' => true,
                    'message' => 'Berhasil Absen'
                ]);
            } else {
                return view('dashboard.absensi.info', [
                    'peserta' => $peserta,
                    'status' => false,
                    'message' => 'Sudah Absen'
                ]);
            }
        } else {
            return view('dashboard.absensi.info', [
                'peserta' => false,
                'message' => $request->peserta
            ]);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        Excel::import(new PesertaImport,$request->file('file'));

        return redirect()->back();
    }

    public function reset()
    {
        Peserta::truncate();  
        
        return redirect()->back();
    }
}
