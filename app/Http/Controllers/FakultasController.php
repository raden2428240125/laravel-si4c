<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // akses model fakultas
        $result = Fakultas::all(); // select * from fakultas
        // kirim data fakultas ke view
        //return view('fakultas.index')->with('fakultas', $result);
        //atau compact
        return view('fakultas.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data yang dikirim dari form
        $input = $request->validate([
            'nama_fakultas' => 'required|unique:fakultas',
            'singkatan' => 'required|unique:fakultas',
            'dekan' => 'required',
        ]);

        // simpan data ke database
        Fakultas::create($input);

        // redirect ke halaman index dengan pesan sukses
        return redirect()->route('fakultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        //
    }
}
