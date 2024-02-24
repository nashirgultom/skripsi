<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDataDosenController;
use App\Http\Controllers\Admin\AdminDataNilaiController;
use App\Http\Controllers\Admin\AdminMasterKelasController;
use App\Http\Controllers\Common\CetakController;
use App\Http\Controllers\Dosen\DosenBankSoalController;
use App\Http\Controllers\Dosen\DosenDashboardController;
use App\Http\Controllers\Dosen\DosenDataKelasController;
use App\Http\Controllers\Dosen\DosenDataModulController;
use App\Http\Controllers\Dosen\DosenDataNilaiController;
use App\Http\Controllers\Dosen\DosenEvaluasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentEvaluasiController;
use App\Http\Controllers\Student\StudentKelasController;
use App\Http\Controllers\Student\StudentNilaiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    // dd(Auth::check());
    // dd(Auth::user()->role == 2);
    if (Auth::check()) {
        if (Auth::user()->role = 1) {
            return redirect()->to(route('admin.dashboard.index'));
        } else if (Auth::user()->role == 2) {
            return redirect()->to(route('dosen.dashboard.index'));
        } else if (Auth::user()->role == 3) {
            return redirect()->to(route('student.dashboard.index'));
        } else {
            return redirect()->to('/');
        }
        # code...
    }
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// prefix admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:1'])->group(function () {
    Route::resource('/dashboard', AdminDashboardController::class);
    Route::resource('/kelas', AdminMasterKelasController::class);
    Route::resource('/dosen', AdminDataDosenController::class);
    Route::resource('/nilai', AdminDataNilaiController::class);
    Route::get('/cetak-nilai/{id}', [CetakController::class, 'cetakNilaiModul'])->name('cetak');
    Route::get('/nilai-mahasiswa/{id}', [AdminDataNilaiController::class, 'showNilai'])->name('nilai.show.nilai');
});

// profix dosen
Route::prefix('dosen')->name('dosen.')->middleware(['auth', 'role:2'])->group(function () {
    Route::resource('/dashboard', DosenDashboardController::class);
    Route::resource('/datakelas', DosenDataKelasController::class);
    Route::resource('/modul', DosenDataModulController::class);
    Route::resource('/evaluasi', DosenEvaluasiController::class);
    Route::resource('/nilai', DosenDataNilaiController::class);



    Route::get('/nilai/cetak', function () {
        return "FUCK";
    })->name('nilai.cetak');

    Route::get('/cetak-nilai/{id}', [CetakController::class, 'cetakNilaiModul'])->name('cetak');

    Route::get('/nilai-mahasiswa/{id}', [DosenDataNilaiController::class, 'showNilai'])->name('nilai.show.nilai');
    // ajax area evaluasi start
    Route::get('/evaluasi/publish/{id}', [DosenEvaluasiController::class, 'publish'])->name('evaluasi.publish');
    // Route::get('/evaluasi/draft/{id}', [DosenEvaluasiController::class, 'draft'])->name('evaluasi.draft');
    // ajax area evaluasi end
    Route::get('/evaluasi/modul-create/{id}', [DosenEvaluasiController::class, 'createModul'])->name('evaluasi.create-modul');
    Route::get('/evaluasi/modul-soal/{id}/edit', [DosenEvaluasiController::class, 'editModul'])->name('evaluasi.edit-modul');
    Route::post('/evaluasi/modul-soal/{id}/update', [DosenEvaluasiController::class, 'updateModul'])->name('evaluasi.update-modul');
    Route::delete('/evaluasi/modul-soal/{id}/delete', [DosenEvaluasiController::class, 'destroyModul'])->name('evaluasi.delete-modul');
    Route::post('/evaluasi/modul-create', [DosenEvaluasiController::class, 'storeModul'])->name('evaluasi.store-modul');
    Route::resource('/soal', DosenBankSoalController::class);
    Route::get('/modul/preview/{kode_mk}', [DosenDataModulController::class, 'preview'])->name('modul.preview');
    Route::post('/modul/upload', [DosenDataModulController::class, 'upload'])->name('modul.upload');
});


// prefix student
Route::prefix('student')->name('student.')->middleware(['auth', 'role:3'])->group(function () {
    Route::resource('/dashboard', StudentDashboardController::class);
    Route::resource('/kelas', StudentKelasController::class);
    Route::resource('/evaluasi', StudentEvaluasiController::class);
    Route::resource('/nilai', StudentNilaiController::class);
    Route::get('/evaluasi/index/{id}', [StudentEvaluasiController::class, 'index'])->name('evaluasi.index.get');
    // Route::get('/evaluasi/sambutan', function () {
    //     return view('student.evaluasi.sambutan');
    // })->name('evaluasi.sambutan');
    Route::get('/evaluasi/sambutan', [StudentEvaluasiController::class, 'sambutan'])->name('evaluasi.sambutan');
    Route::post('/evaluasi/koreksi', [StudentEvaluasiController::class, 'koreksiJawaban'])->name('evaluasi.koreksi');
});

Route::get('/cekcek', [StudentEvaluasiController::class, 'sambutan']);
// Route::get('/cekcek', function () {
//     return view('student.evaluasi.sambutan');
// });




// utility







require __DIR__ . '/auth.php';



// perbaiki foreign key yang benar 12/01/2024 DONE
// rencana ada status di evaluasi DONE
// delete kelas lupa
// buat relasi anttara mk dengan evaluasi dengan belongsto
// mengerjakan students . 
// update pagi tadi . semua udah beres sampe pengacakn soal . tapi untuk pengecekan nilai belum di uji


// update implementasi fisher yates done / insert nilai ke db, dan pemblokiran pengerjaan soal .

// besok :
// ada error di sini jadi cek aja
// $evaluasi = EvaluasiModel::find($id);
// $soal = $evaluasi->bankSoal;


// permasalahan di temukan karena id null ternyata , jadi sementara di disable aja menu evaluasi karna kayanya masih belum penting


// next admin 


// besok update controller cetak belum beres 




// baru sampai tahap print nilai dihalaman dosen 