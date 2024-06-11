<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'siswas' => Siswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'nama' => 'required|min:3|max:255',
            'kelas' => 'required',
            'nis' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'hobi' => 'nullable',
        ]);
        Siswa::create($rules);
        return redirect('/crud');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('crud.detail', [
            'siswa' => Siswa::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('crud.edit', [
            'siswa' => Siswa::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = $request->validate([
            'nama' => 'required|min:3|max:255',
            'kelas' => 'required',
            'nis' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'hobi' => 'nullable',
        ]);
        Siswa::where('id', $id)
            ->update($rules);
        return redirect('/crud');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::destroy($id);
        return redirect('/crud');
    }
}
