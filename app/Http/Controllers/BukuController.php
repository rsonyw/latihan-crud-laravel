<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('buku');
    }

    public function data()
    {
        return DataTables::of(Buku::query())->addColumn('aksi', function ($model) {
            return '
                <a href="' . route('buku.show', $model->id) . '" class="btn btn-sm btn-info">Detail</a>
                <a href="' . route('buku.edit', $model->id) . '" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger delete" data-id="' . $model->id . '">Delete</button>';
        })->rawColumns(['aksi'])->make(true);
    }

    /**
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

        $rules = $request->validate([
            'kodebuku' => 'required|min:3|max:255',
            'namabuku' => 'required',
            'penulis' => 'required',
            'tahunterbit' => 'required',
            'penerbit' => 'required',
        ]);
        Buku::create($rules);
        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('buku.detail', ['buku' => Buku::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('buku.edit', [
            'buku' => Buku::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = $request->validate([
            'kodebuku' => 'required|min:3|max:255',
            'namabuku' => 'required',
            'penulis' => 'required',
            'tahunterbit' => 'required',
            'penerbit' => 'required',
        ]);
        Buku::where('id', $id)
            ->update($rules);
        return redirect('/buku')->with('success', 'Buku berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return response()->json(['success' => 'Buku berhasil dihapus']);
    }
}
