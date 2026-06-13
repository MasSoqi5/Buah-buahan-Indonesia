<?php

namespace App\Http\Controllers;
 
use App\Models\Buah;
use Illuminate\Http\Request;
 
class BuahController extends Controller
{
    public function index(Request $request)
    {
        $query = Buah::latest();
 
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('asal_daerah', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }
 
        if ($request->filled('daerah')) {
            $query->where('asal_daerah', $request->daerah);
        }
 
        $buahs       = $query->paginate(9);
        $totalBuah   = Buah::count();
        $buahPopuler = Buah::latest()->take(5)->get();
        $daerahList  = Buah::whereNotNull('asal_daerah')
                           ->groupBy('asal_daerah')
                           ->selectRaw('asal_daerah, count(*) as total')
                           ->orderByDesc('total')
                           ->pluck('total', 'asal_daerah');
 
        return view('buah.index', compact('buahs', 'totalBuah', 'buahPopuler', 'daerahList'));
    }
 
    public function show(string $slug)
    {
        $buah        = Buah::where('slug', $slug)->firstOrFail();
        $buahLainnya = Buah::where('id', '!=', $buah->id)->latest()->take(5)->get();
 
        return view('buah.show', compact('buah', 'buahLainnya'));
    }
}