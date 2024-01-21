<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Utusan;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.peserta.index', [
            'pesertas' => Peserta::orderBy('kode', 'asc')->get(),
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
            'utusan' => 'required',
            'nama' => 'required'
        ]);

        $last_utusan = Peserta::where('utusan_id', $request->utusan)->count();
        $kode = Utusan::find($request->utusan)->kode . ($last_utusan + 1);

        Peserta::create([
            'utusan_id' => $request->utusan,
            'kode' => $kode,
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
        if($pesertum->kode !== $request->kode) {
            $request->validate([
                'kode' => 'required|unique:pesertas,kode',
            ]);
        }

        $request->validate([
            'utusan' => 'required',
            'nama' => 'required',
            'status' => 'required'
        ]);

        $utusan = Utusan::where('keterangan', $request->utusan)->first();

        $pesertum->update([
            'kode' => $request->kode,
            'utusan_id' => $utusan['id'],
            'nama' => $request->nama,
            'status' => $request->status
        ]);

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
            if($peserta->status != 'Hadir') {
                $peserta->update([
                    'status' => 'Hadir',
                    'info' => 'Masuk',
                ]);
                return view('dashboard.absensi.info', [
                    'peserta' => $peserta
                ]);
            } else {
                return dd('Sudah Absensi');
            }
        } else {
            return 'kosong';
        }
    }
}
