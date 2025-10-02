<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pinjam;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function (Request $request) {
    $totalBuku = Buku::count();
    $totalAnggota = Anggota::count();
    $totalPinjam = Pinjam::count();

     $query = Buku::query();

    if ($request->has('cari')) {
        $query->where('judul', 'like', '%' . $request->cari . '%')
              ->orWhere('pengarang', 'like', '%' . $request->cari . '%');
    }

    $bukus = Buku::All();
    $bukus = $query->get();
    $bukus = $query->paginate(10); // 10 per halaman

    $query = Anggota::query();

    if($request->has('cari')){
        $query->where('nama','like','%' .$request->cari . '%')
        ->orWhere('alamat','like','%' . $request->cari . '%');
    }

    $anggotas = Anggota::all();
    $anggotas = $query->get();

    $query = Pinjam::with(['anggotas','bukus']);

    if(auth()->user()->role ='1'){
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
    $pinjams= $query->orderBy('created_at','desc')->paginate(10);
    $pinjams = Pinjam::with('anggotas','bukus')->get();
    return view('dashboard', compact('totalBuku', 'bukus', 'totalAnggota', 'totalPinjam', 'anggotas', 'pinjams'));
    })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/books', function (Request $request) {
    $totalBuku = Buku::count();
    $totalAnggota = Anggota::count();
    $totalPinjam = Pinjam::count();

     $query = Buku::query();

    if ($request->has('cari')) {
        $query->where('judul', 'like', '%' . $request->cari . '%')
              ->orWhere('pengarang', 'like', '%' . $request->cari . '%');
    }

    $bukus = Buku::All();
    $bukus = $query->get();
    $bukus = $query->paginate(10); // 10 per halaman

    $query = Anggota::query();

    if($request->has('cari')){
        $query->where('nama','like','%' .$request->cari . '%')
        ->orWhere('alamat','like','%' . $request->cari . '%');
    }

    $anggotas = Anggota::all();
    $anggotas = $query->get();

    $query = Pinjam::with(['anggotas','bukus']);

    if(auth()->user()->role ='1'){
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
    $pinjams= $query->orderBy('created_at','desc')->paginate(10);
    $pinjams = Pinjam::with('anggotas','bukus')->get();
    return view('books', compact('totalBuku', 'bukus', 'totalAnggota', 'totalPinjam', 'anggotas', 'pinjams'));
    })->middleware(['auth', 'verified'])->name('books');

Route::get('/buku/export', [ExportController::class, 'export'])->name('buku.export');
Route::post('/buku/import', [ImportController::class, 'import'])->name('buku.import');
Route::get('/pinjam/overdue',[PinjamController::class,'overdue'])->name('pinjam.overdue');

Route::get('logout',[LogController::class, 'destroy'])->name('logout');
Route::get('/pinjam/edit',function(){
    return view('pinjam.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('buku', BukuController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('pinjam', PinjamController::class);

    // Destroy (Delete)
    Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
    Route::delete('/pinjam/{pinjam}', [PinjamController::class, 'destroy'])->name('pinjam.destroy');

});
require __DIR__.'/auth.php';
