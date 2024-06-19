<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mapel', [
            'mapels' => Mapel::all(),
        ]);
    }
    public function data(Request $request)
    {
        $columns = ['id', 'kodemapel', 'namamapel', 'namaguru', 'jk', 'nip'];

        $totalData = Mapel::count();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column', 0)];
        $dir = $request->input('order.0.dir');

        if (!in_array($dir, ['asc', 'desc',])) {
            $dir = 'asc';
        }

        if ($request->input('order.0.column') === 0 && $dir === 'asc') {
            $order = 'created_at';
        }

        $searchValue = $request->input('search.value');

        // Query awal
        $query = Mapel::query();

        // Jika ada nilai pencarian, tambahkan kondisi pencarian
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('kodemapel', 'like', "%{$searchValue}%")
                    ->orWhere('namamapel', 'like', "%{$searchValue}%")
                    ->orWhere('namaguru', 'like', "%{$searchValue}%")
                    ->orWhere('jk', 'like', "%{$searchValue}%")
                    ->orWhere('nip', 'like', "%{$searchValue}%");
            });
        }

        $totalFiltered = $query->count();
        $mapels = $query->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

        $data = [];
        if (!empty($mapels)) {
            foreach ($mapels as $mapel) {
                $nestedData['id'] = $mapel->id;
                $nestedData['kodemapel'] = $mapel->kodemapel;
                $nestedData['namamapel'] = $mapel->namamapel;
                $nestedData['namaguru'] = $mapel->namaguru;
                $nestedData['jk'] = $mapel->jk;
                $nestedData['nip'] = $mapel->nip;
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];

        return response()->json($json_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'kodemapel' => 'required|min:3|max:255',
            'namamapel' => 'required',
            'namaguru' => 'required',
            'jk' => 'required',
            'nip' => 'required',
        ]);
        Mapel::create($rules);
        return redirect('/mapel');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('mapel.detail', [
            'mapel' => Mapel::find($id),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('mapel.edit', [
            'mapel' => Mapel::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = $request->validate([
            'kodemapel' => 'required|min:3|max:255',
            'namamapel' => 'required',
            'namaguru' => 'required',
            'jk' => 'required',
            'nip' => 'required',
        ]);
        Mapel::where('id', $id)
            ->update($rules);
        return redirect('/mapel')->with('success', 'Mapel berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mapel::destroy($id);
        return redirect('/mapel')->with('success', 'Mapel berhasil dihapus');
    }
}
