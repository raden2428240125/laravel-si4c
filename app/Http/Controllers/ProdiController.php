<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::with('fakultas')->get();
    return view('prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all(); //untuk list dropdown fakultas
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $input = $request->validate([
            'nama_prodi' => 'required|unique:prodis',
            'singkatan' => 'required|max:2',
            'kaprodi' => 'required',
            'fakultas_id' => 'required'
        ]);

        // simpan data ke tabel fakultas
        Prodi::create($input);

        // redirect ke halaman index fakultas
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($prodi)
    {
        //dd($prodi);
         $prodi = Prodi::find($prodi); // select * from prodis where id = $prodi
        $prodi = Prodi::find($prodi);
        $fakultas = Fakultas::all(); //untuk list dropdown fakultas
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //dd($prodi);
         // validasi data
         $input = $request->validate([
            'nama_prodi' => 'required|unique:prodis,nama_prodi,' . $prodi->id,
            'singkatan' => 'required|max:2',
            'kaprodi' => 'required',
            'fakultas_id' => 'required'
        ]);

        // update data ke tabel prodi
        $prodi->update($input);
        return redirect()->route('prodi.index') ->with('success', 'Data berhasil diupdate'); // redirect ke halaman index prodi dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //$prodi = Prodi::find($prodi);
        //dd($prodi);
        $prodi->delete(); // delete from prodis where id = $prodi
        return redirect()->route('prodi.index')
        ->with('success', 'Data berhasil dihapus'); // redirect ke halaman index prodi
    }
}
