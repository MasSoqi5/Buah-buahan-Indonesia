<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Buah;
 
class DashboardController extends Controller
{
    public function index()
    {
        $totalBuah    = Buah::count();
        $totalDaerah  = Buah::whereNotNull('asal_daerah')->distinct('asal_daerah')->count();
        $totalPenulis = Buah::whereNotNull('author')->distinct('author')->count();
        $buahBulanIni = Buah::whereMonth('created_at', now()->month)->count();
        $buahTerbaru  = Buah::latest()->take(10)->get();
 
        return view('admin.dashboard', compact(
            'totalBuah', 'totalDaerah', 'totalPenulis', 'buahBulanIni', 'buahTerbaru'
        ));
    }
}