<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pinjam;
Use Carbon\Carbon;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $pinjams = Pinjam::with(['anggotas','bukus'])->get();
         $query = Pinjam::with(['anggotas','bukus']);

        if(auth()->user()->role !='1'){
            $anggotasId = auth()->user()->anggotas->id ?? null;
            $query->where('anggotas_id',$anggotasId);
        }

        if($request->has('cari')){
            $search = $request->cari;
            $query->whereHas('anggotas',function ($q) use ($search){
                $q->where('nama','like','%' . $search . '%');
            })->orWhereHas('bukus',function($q) use ($search){
                $q->where('judul','like','%' . $search . '%');
            });
        }

        // $pinjams = $query->orderBy('created_at','desc')->paginate(10);
        return view('pinjam.index',compact('pinjams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('pinjam.create',compact('anggotas','bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'anggotas_id' => 'required|exists:anggotas,id',
            'bukus_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        try {
            Pinjam::create([
                'anggotas_id' => $request->anggotas_id,
                'bukus_id' => $request->bukus_id,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_jatuh_tempo' => Carbon::parse($request->tanggal_pinjam)->addDays(14), // 2 weeks from borrow date
                'tanggal_kembali' => null, // Initially null until book is returned
                'status' => 'borrowed' // Initial status
            ]);

            return redirect()->route('pinjam.index')->with('success', 'Peminjaman berhasil dicatat. Jatuh tempo: ' .
                Carbon::parse($request->tanggal_pinjam)->addDays(14)->format('d M Y'));

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }
     /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjams)
    {
        return view('pinjam.show',compact('pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjam $pinjam)
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('pinjam.edit',compact('pinjam','anggotas','bukus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        $request->validate([
            'anggotas_id'=>'required|exists:anggotas,id',
            'bukus_id'=>'required|exists:bukus,id',
            'tanggal_pinjam'=>'required|date',
            'tanggal_kembali'=>'nullable|date'
        ]);

        $pinjam->update($request->all());

        return redirect()->route('pinjam.index')->with('Success','Data Peminjaman Diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();
        return redirect()->route('pinjam.index')->with('Success','Data Peminjaman Dihapus');
    }


    public function overdue()
    {
        $today = Carbon::today();
        $overdue = Pinjam::with('buku', 'anggota')
            ->whereNull('tanggal_kembali')
            ->whereDate('tanggal_pinjam', '<', $today->subDays(7))
            ->get();

        return view('pinjam.overdue', compact('overdue'));
    }
}
