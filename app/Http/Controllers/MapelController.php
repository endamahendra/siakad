<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Mapel;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Validator;

class MapelController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        return view('mapel.list', compact('prodis'));
    }

// Controller MapelController
public function getDataTable(Request $request)
{
    // Ambil data dari model Mapel dan join dengan model Prodi
    $query = Mapel::join('prodis', 'mapels.prodi_id', '=', 'prodis.id')
        ->select('mapels.*', 'prodis.nama_prodi');

    // ...

    return DataTables::of($query)
        ->addColumn('DT_RowIndex', function ($mapel) use (&$index) {
            return $index++;
        })
        ->addColumn('action', function ($mapel) {
            return '<button class="btn btn-sm btn-warning edit-btn" onclick="editMapel(' . $mapel->id . ')">Edit</button> ' .
                '<button class="btn btn-sm btn-danger delete-btn" onclick="deleteMapel(' . $mapel->id . ')">Delete</button>';
        }) 
        ->rawColumns(['action'])
        ->toJson();
}




    public function edit($id)
    {
        $mapel = Mapel::find($id);
        $prodis = Prodi::all();

        if (!$mapel) {
            return response()->json(['error' => 'Mapel not found.'], 404);
        }

        return response()->json(['mapel' => $mapel, 'prodis' => $prodis]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Validasi unik untuk kombinasi kode dan nama
        $validator = Validator::make($data, [
            'kode' => 'required|unique:mapels,kode,NULL,id,nama,' . $data['nama'],
            'nama' => 'required',
            'prodis' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Simpan mapel
        $mapel = Mapel::create([
            'kode' => $data['kode'],
            'nama' => $data['nama'],
        ]);

        // Synchronize relasi many-to-many dengan Prodi
        $mapel->prodis()->sync($data['prodis']);

        return response()->json(['success' => 'Mapel berhasil ditambahkan.']);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        // Validasi unik untuk kombinasi kode dan nama
        $validator = Validator::make($data, [
            'kode' => 'required|unique:mapels,kode,' . $id . ',id,nama,' . $data['nama'],
            'nama' => 'required',
            'prodis' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $mapel = Mapel::find($id);

        if (!$mapel) {
            return response()->json(['error' => 'Mapel not found.'], 404);
        }

        // Perbarui mapel
        $mapel->update([
            'kode' => $data['kode'],
            'nama' => $data['nama'],
        ]);

        // Synchronize relasi many-to-many dengan Prodi
        $mapel->prodis()->sync($data['prodis']);

        return response()->json(['success' => 'Mapel berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        $mapel = Mapel::find($id);

        if (!$mapel) {
            return response()->json(['error' => 'Mapel not found.'], 404);
        }

        $mapel->delete();

        return response()->json(['success' => 'Mapel berhasil dihapus.']);
    }

    public function destroyAll()
    {
        $mapels = Mapel::all();

        if ($mapels->isEmpty()) {
            return response()->json(['error' => 'Tidak ada data Mapel untuk dihapus.'], 404);
        }

        Mapel::truncate();

        return response()->json(['success' => 'Semua data Mapel berhasil dihapus.']);
    }

    // Endpoint untuk mendapatkan data Prodi dalam format yang diharapkan oleh Select2
    public function getProdis()
    {
        $prodis = Prodi::all();

        $formattedProdis = $prodis->map(function ($prodi) {
            return [
                'id' => $prodi->id,
                'text' => $prodi->jenjang->jenjang . ' - ' . $prodi->nama_prodi,
            ];
        });

        return response()->json($formattedProdis);
    }
}
