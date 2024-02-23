<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Jenjang;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\View;
// use Yajra\Datatables\Datatables;


class ProdiController extends Controller
{
    public function index()
    {
        $jenjang_id = Jenjang::all();
        return view('prodi.list', compact('jenjang_id'));
    }
public function getDataTable(Request $request)
{
    
    // Ambil data dari model Prodi dan join dengan model Jenjang
    $query = Prodi::join('jenjangs', 'prodis.jenjang_id', '=', 'jenjangs.id')
        ->select('prodis.*', 'jenjangs.jenjang as jenjang');
 

   $index = 1; // Inisialisasi variabel indeks
return DataTables::of($query)
    ->addColumn('DT_RowIndex', function ($prodi) use (&$index) {
        return $index++;
    })
    ->addColumn('combined_column', function ($prodi) {
        return $prodi->jenjang . ' ' . $prodi->nama_prodi;
    })
    ->addColumn('action', function ($prodi) {
        return '<button class="btn btn-sm btn-warning edit-btn" onclick="editProdi(' . $prodi->id . ')">Edit</button> ' .
               '<button class="btn btn-sm btn-danger delete-btn" onclick="deleteProdi(' . $prodi->id . ')">Delete</button>';
    })
    ->rawColumns(['action'])
    ->toJson();
}

public function edit($id)
{
    $prodi = Prodi::find($id);
    $jenjangs = Jenjang::all();

    if (!$prodi) {
        return response()->json(['error' => 'Prodi not found.'], 404);
    }

    return response()->json(['prodi' => $prodi, 'jenjangs' => $jenjangs]);
}


public function store(Request $request)
{
    $data = $request->all(); 

    // Validasi unik untuk kombinasi nama_prodi dan jenjang_id
    $validator = Validator::make($data, [
        'nama_prodi' => 'required|unique:prodis,nama_prodi,NULL,id,jenjang_id,' . $data['jenjang_id'],
        'jenjang_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    Prodi::create([
        'nama_prodi' => $data['nama_prodi'],
        'jenjang_id' => $data['jenjang_id'],
    ]);

    return response()->json(['success' => 'Prodi berhasil ditambahkan.']);
}

public function update(Request $request, $id)
{
    $data = $request->all();

    // Validasi unik untuk kombinasi nama_prodi dan jenjang_id
    $validator = Validator::make($data, [
        'nama_prodi' => 'required|unique:prodis,nama_prodi,' . $id . ',id,jenjang_id,' . $data['jenjang_id'],
        'jenjang_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $prodi = Prodi::find($id);

    if (!$prodi) {
        return response()->json(['error' => 'Prodi not found.'], 404);
    }

    $prodi->update([
        'nama_prodi' => $data['nama_prodi'],
        'jenjang_id' => $data['jenjang_id'],
    ]);

    return response()->json(['success' => 'Prodi berhasil diperbarui.']);
}

public function destroy($id)
{
    $prodi = Prodi::find($id);

    if (!$prodi) {
        return response()->json(['error' => 'Prodi not found.'], 404);
    }

    $prodi->delete();

    return response()->json(['success' => 'Prodi berhasil dihapus.']);
}



public function destroyAll()
{
    $prodis = Prodi::all();

    if ($prodis->isEmpty()) {
        return response()->json(['error' => 'Tidak ada data Prodi untuk dihapus.'], 404);
    }

    Prodi::truncate();

    return response()->json(['success' => 'Semua data Prodi berhasil dihapus.']);
}

}
