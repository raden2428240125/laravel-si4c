<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // akses model fakultas
        $result = Periode::all(); // select * from periode
        
        // kirim data fakultas ke view
        //return view('fakultas.index')->with('fakultas', $result);
        //atau compact
        return view('periode.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data yang dikirim dari form
        $input = $request->validate([
            'nama_periode' => 'required|unique:periode',
            'tahun' => 'required|unique:periode',
        ]);

        // simpan data ke database
        Periode::create($input);

        // redirect ke halaman index dengan pesan sukses
        return redirect()->route('periode.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
