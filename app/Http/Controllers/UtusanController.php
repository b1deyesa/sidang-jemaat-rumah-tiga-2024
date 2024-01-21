<?php

namespace App\Http\Controllers;

use App\Models\Utusan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UtusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.utusan.index', [
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
            'keterangan' => 'required'
        ]);

        Utusan::create([
            'kode' => Str::upper($request->kode),
            'keterangan' => $request->keterangan
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Utusan $utusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utusan $utusan)
    {
        return view('dashboard.utusan.edit', [
            'utusan' => $utusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utusan $utusan)
    {
        $request->validate([
            'kode' => 'required',
            'keterangan' => 'required'
        ]);

        $utusan->update([
            'kode' => $request->kode,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('utusan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utusan $utusan)
    {
        $utusan->delete();

        return redirect()->back();
    }
}
