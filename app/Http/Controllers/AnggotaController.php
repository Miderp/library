<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Anggota::query();

        if($request->has('cari')){
            $query->where('nama','like','%' .$request->cari . '%')
            ->orWhere('alamat','like','%' . $request->cari . '%');
        }

        $anggotas = Anggota::all();
        $anggotas = $query->get();
        return view('anggota.index',compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'nohp'=>'required',
            'tgl_lahir'=>'required|date'
        ]);
        $anggota = new Anggota();
        $anggota->nama = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->nohp = $request->nohp;
        $anggota->tgl_lahir = $request->tgl_lahir;
        // $anggota->user_id = auth()->id(); // hubungan ke user
        $anggota->save();


        
        return redirect()->route('anggota.index')->with('Success','Anggota Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggotas)
    {
        return view('anggota.show',compact('anggotas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggotas)
    {
        return view('anggota.edit',compact('anggotas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggotas)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'nop'=>'required',
            'tgl_lahir'=>'required|date'
        ]);

        $anggotas->update($request->all());

        return redirect()->route('anggota.index')->with('Success','Anggota Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggotas)
    {
        $anggotas->delete();
        return redirect()->route('anggota.index')->with('Success','Anggota Dihapus');
    }
}
