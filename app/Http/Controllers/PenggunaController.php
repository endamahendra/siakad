<?php

// app/Http/Controllers/PenggunaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Validator;
use DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.list');
    }
 
public function getDataTable()
{
    return DataTables::of(Pengguna::query())
        ->addColumn('action', function ($pengguna) {
            return '<i class="fa-solid fa-pen-to-square" onclick="editPengguna(' . $pengguna->id . ')"></i>' .
                   '<i class="fa-solid fa-trash" onclick="deletePengguna(' . $pengguna->id . ')"></i>';
        })
        ->rawColumns(['action'])
        ->make(true);
}


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:penggunas',
            'password' => 'required|min:6',
            'bagian' => 'required|in:Akademik,Pengajar,Mahasiswa',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $pengguna = Pengguna::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'bagian' => $request->input('bagian'),
        ]);

        return response()->json(['pengguna' => $pengguna]);
    }

   // app/Http/Controllers/PenggunaController.php

public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'email' => 'required|email|unique:penggunas,email,' . $id,
        'password' => 'nullable|min:6', // Mengizinkan password kosong
        'bagian' => 'required|in:Akademik,Pengajar,Mahasiswa',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $pengguna = Pengguna::find($id);
    $pengguna->nama = $request->input('nama');
    $pengguna->email = $request->input('email');

    // Periksa apakah password diisi atau tidak
    if ($request->filled('password')) {
        // Jika password diisi, update password
        $pengguna->password = bcrypt($request->input('password'));
    }

    $pengguna->bagian = $request->input('bagian');
    $pengguna->save();

    return response()->json(['pengguna' => $pengguna]);
}


    public function destroy($id)
    {
        Pengguna::destroy($id);

        return response()->json([], 204);
    }


    // app/Http/Controllers/PenggunaController.php

public function show($id)
{
    $pengguna = Pengguna::find($id);

    if (!$pengguna) {
        return view ('errors.404');
    }

    return response()->json(['pengguna' => $pengguna]);
}

}
