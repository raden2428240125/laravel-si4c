<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index()
  {
     $prodiData = collect(DB::select('
            SELECT nama_prodi, COUNT(*) as TotalMahasiswa 
            FROM mahasiswas
            LEFT JOIN prodis ON prodi_id = prodis.id
            GROUP BY nama_prodi
        '));
         $angkatanData = collect(DB::select('
            SELECT LEFT(npm, 2) as angkatan, COUNT(*) as total
            FROM mahasiswas
            GROUP BY LEFT(npm, 2)
        '));
        return view('dashboard', compact('prodiData', 'angkatanData'));
  }
}