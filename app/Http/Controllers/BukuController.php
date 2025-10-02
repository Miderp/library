<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $cari = $request->query('cari');

    $bukus = Buku::when($cari, function ($query, $cari) {
        $query->where('judul', 'like', "%$cari%")
              ->orWhere('pengarang', 'like', "%$cari%");
    })->get(); // <- Make sure you use get() or paginate()

    return view('buku.index', compact('bukus'));
}

    /**x
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'pengarang' => 'required|string',
            'tahun_terbit' => 'required|date',
            'jenis_buku' => 'required|string',
        ]);

        Buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Buku $bukus)
    {
        return view('buku.index',compact('bukus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $bukus)
    {
        return view('buku.edit',compact('bukus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
{
    $validated = $request->validate([
        'judul' => 'required|string',
        'pengarang' => 'required|string',
        'tahun_terbit' => 'required|date',
        'jenis_buku' => 'required|string',
    ]);

    $buku->update($validated);

    return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
        {
            $buku->delete();
            return redirect()->route('dashboard')->with('success', 'Buku berhasil dihapus.');
        }

}
