<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data mahassiswa beserta relasi prodi
        $mahasiswa = Mahasiswa::with('Prodi')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil data prodi untuk dropdown
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input
        $input = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // upload file foto jika ada
        if ($request->hasFile('foto')) {
            // rename file dengan npm untuk menghindari duplikasi nama
            $filename = $input['npm'] . '.' . $request->file('foto')->getClientOriginalExtension();
            // simpan foto di storage/app/public/fotos
            $input['foto'] = $request->file('foto')->storeAs('fotos', $filename, 'public');
        } else {
            $input['foto'] = null; // set foto ke null jika tidak ada file yang diupload
        }

        // simpan data mahasiswa
        Mahasiswa::create($input);

        // redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil disimpan!');
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
    public function edit(Mahasiswa $mahasiswa)
    {
        //ambil data prodi untuk dropdown
        $prodis = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //validasi input
        $input = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // upload file foto jika ada
        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            // rename file dengan npm untuk menghindari duplikasi nama
            $filename = $input['npm'] . '.' . $request->file('foto')->getClientOriginalExtension();
            // simpan foto di storage/app/public/fotos
            $input['foto'] = $request->file('foto')->storeAs('fotos', $filename, 'public');
        } else {
            $input['foto'] = $mahasiswa->foto; // tetap gunakan foto lama jika tidak ada file yang diupload
        }

        // update data mahasiswa
        $mahasiswa->update($input);

        // redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto && Storage::disk('public')->exists($mahasiswa->foto)) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
