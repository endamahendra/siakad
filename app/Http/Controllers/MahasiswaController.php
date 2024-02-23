<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Validator;
use DataTables;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.list');
    }

    public function getDataTable()
    {
        $mahasiswas = Mahasiswa::all();

        return DataTables::of($mahasiswas)
            ->addColumn('action', function ($mahasiswa) {
                return '<button class="btn btn-sm btn-warning" onclick="editMahasiswa(' . $mahasiswa->ID_Mahasiswa . ')">Edit</button>' .
                    '<button class="btn btn-sm btn-danger" onclick="deleteMahasiswa(' . $mahasiswa->ID_Mahasiswa . ')">Delete</button>';
            })
            ->make(true);
    }

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'Nama' => 'required',
        'Alamat' => 'required',
        'Nomor_Telepon' => 'required|numeric', // Menambahkan aturan numeric
        'Email' => 'required|unique:mahasiswas',
        'Tanggal_Masuk' => 'required',
        'Program_Studi' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $mahasiswa = Mahasiswa::create([
        'Nama' => $request->input('Nama'),
        'Alamat' => $request->input('Alamat'),
        'Nomor_Telepon' => $request->input('Nomor_Telepon'),
        'Email' => $request->input('Email'),
        'Tanggal_Masuk' => $request->input('Tanggal_Masuk'),
        'Program_Studi' => $request->input('Program_Studi'),
    ]);

    return response()->json(['mahasiswa' => $mahasiswa]);
}

public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'Nama' => 'required',
        'Alamat' => 'required',
        'Nomor_Telepon' => 'required|numeric', // Menambahkan aturan numeric
        'Email' => 'required|unique:mahasiswas,Email,' . $id,
        'Tanggal_Masuk' => 'required',
        'Program_Studi' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $mahasiswa = Mahasiswa::find($id);
    if (!$mahasiswa) {
        return response()->json(['error' => 'Data not found'], 404);
    }

    $mahasiswa->update([
        'Nama' => $request->input('Nama'),
        'Alamat' => $request->input('Alamat'),
        'Nomor_Telepon' => $request->input('Nomor_Telepon'),
        'Email' => $request->input('Email'),
        'Tanggal_Masuk' => $request->input('Tanggal_Masuk'),
        'Program_Studi' => $request->input('Program_Studi'),
    ]);

    return response()->json(['mahasiswa' => $mahasiswa]);
}


    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return response()->json([], 204);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return view('errors.404');
        }

        return response()->json(['mahasiswa' => $mahasiswa]);
    }
}
