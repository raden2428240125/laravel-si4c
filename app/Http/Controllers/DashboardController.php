<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB
        $jumlahMahasiswa = DB::select('SELECT p.nama_prodi, count(*) as jumlah
        FROM laravelsi4c.mahasiswas m 
        join laravelsi4c.prodis p
        on m.prodi_id = p.id
        GROUP BY p.nama_prodi');
        return view('dashboard.index', compact('jumlahMahasiswa'));
    }
}
