<?php

use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//client-side datatables
Route::resource('/crud', SiswaController::class);
Route::resource('/', SiswaController::class);

//native server-side datatables
Route::resource('/mapel', MapelController::class);
Route::post('/mapel/data', [MapelController::class, 'data'])->name('mapel.data');

//library server-side (yajradatatables)
Route::get('/buku/data', [BukuController::class, 'data'])->name('buku.data');
Route::resource('/buku', BukuController::class);
// Route::get('/buku/data', function () {
//     return DataTables::of(Buku::query())->addColumn('aksi', function ($model) {
//         return '<a href="' . route('buku.detail', $model->id) . '" class="btn btn-sm btn-info">Detail</a> <a href="' . route('buku.edit', $model->id) . '" class="btn btn-sm btn-warning">Edit</a> <button class="btn btn-sm btn-danger delete" data-id="' . $model->id . '">Delete</button>';
//     })->rawColumns(['aksi'])->make(true);
// })->name('buku.data');


// Route::get('/buku/{id}/detail', function ($id) {
//     return view('buku.detail', [
//         'buku' => Buku::find($id),
//     ]);
// })->name('buku.detail');

// Route::get('/buku/{id}/edit', function ($id) {
//     return view('buku.edit', [
//         'buku' => Buku::find($id),
//     ]);
// })->name('buku.edit');

// Route::delete('/buku/{id}/delete', function ($id) {
//     $buku = Buku::findOrFail($id);
//     $buku->delete();
//     return response()->json(['success' => 'Buku berhasil dihapus']);
// })->name('buku.delete');
