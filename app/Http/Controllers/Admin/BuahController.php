<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
 
class BuahController extends Controller
{
    public function index(Request $request)
    {
        $buahs = Buah::when($request->search, fn($q, $s) =>
                    $q->where('nama', 'like', "%$s%")
                      ->orWhere('asal_daerah', 'like', "%$s%")
                 )->latest()->paginate(15);
 
        return view('admin.buah.index', compact('buahs'));
    }
 
    public function create()
    {
        return view('admin.buah.form');
    }
 
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'        => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:buahs,slug',
            'nama_latin'  => 'nullable|string|max:255',
            'asal_daerah' => 'nullable|string|max:255',
            'musim_panen' => 'nullable|string|max:255',
            'deskripsi'   => 'required|string',
            'manfaat'     => 'nullable|string',
            'author'      => 'required|string|max:255',
            'gambar'      => 'nullable|image|max:2048',
        ]);
 
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['nama']);
        }
 
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('buah', 'public');
        }
 
        Buah::create($data);
 
        return redirect()->route('admin.buah.index')
                         ->with('success', "Buah «{$data['nama']}» berhasil ditambahkan! 🌿");
    }
 
    public function edit(Buah $buah)
    {
        return view('admin.buah.form', compact('buah'));
    }
 
    public function update(Request $request, Buah $buah)
    {
        $data = $request->validate([
            'nama'        => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:buahs,slug,' . $buah->id,
            'nama_latin'  => 'nullable|string|max:255',
            'asal_daerah' => 'nullable|string|max:255',
            'musim_panen' => 'nullable|string|max:255',
            'deskripsi'   => 'required|string',
            'manfaat'     => 'nullable|string',
            'author'      => 'required|string|max:255',
            'gambar'      => 'nullable|image|max:2048',
        ]);
 
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['nama']);
        }
 
        if ($request->hasFile('gambar')) {
            if ($buah->gambar) Storage::disk('public')->delete($buah->gambar);
            $data['gambar'] = $request->file('gambar')->store('buah', 'public');
        }
 
        $buah->update($data);
 
        return redirect()->route('admin.buah.index')
                         ->with('success', "Buah «{$buah->nama}» berhasil diperbarui! ✅");
    }
 
    public function destroy(Buah $buah)
    {
        if ($buah->gambar) Storage::disk('public')->delete($buah->gambar);
        $nama = $buah->nama;
        $buah->delete();
 
        return redirect()->route('admin.buah.index')
                         ->with('success', "Buah «nama» berhasil dihapus.");
    }
}