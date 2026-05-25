<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data mahassiswa beserta relasi prodi
         $request = Mahasiswa::with('prodi')->get(); // select * from mahasiswa
        //dd($request);
        return view('mahasiswa.index', compact('mahasiswa'));

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'id' => 'required',
            'npm' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'prodi_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // simpan data ke tabel mahasiswa
        Mahasiswa::create($request->all());

        // redirect ke halaman index mahasiswa
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $mahasiswa)
    {
        //dd($mahasiswa);
        $mahasiswa = Mahasiswa::find($mahasiswa); // select * from mahasiswa where
        //dd($mahasiswa);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
         // validasi data
         $input = $request->validate([
            'id' => 'required',
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'nama' => 'required',
            'prodi_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // update data ke tabel mahasiswa
        $mahasiswa->update($input); // update mahasiswa set npm = $input['npm], nama = $input['nama'], prodi_id = $input['prodi_id'], foto = $input['foto'] where id = $mahasiswa->id
        return redirect()->route('mahasiswa.index') ->with('success', 'Data berhasil diupdate'); // redirect ke halaman index mahasiswa dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //$mahasiswa = Mahasiswa::find($mahasiswa);
        //dd($mahasiswa);
        $mahasiswa->delete(); // delete from mahasiswa where id = $mahasiswa
        return redirect()->route('mahasiswa.index') ->with('success', 'Data berhasil dihapus'); // redirect ke halaman index mahasiswa dengan pesan sukses
    }
}
