<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenjang;
use Validator;
use DataTables;

class JenjangController extends Controller
{
    public function index()
    {
        return view('jenjang.list');
    }

    public function getDataTable()
    {
        $jenjangs = Jenjang::all();

        return DataTables::of($jenjangs)
            ->addColumn('action', function ($jenjang) {
                return '<button class="btn btn-sm btn-warning" onclick="editJenjang(' . $jenjang->id . ')">Edit</button>' .
                    '<button class="btn btn-sm btn-danger" onclick="deleteJenjang(' . $jenjang->id . ')">Delete</button>';
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenjang' => 'required|unique:jenjangs',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $jenjang = Jenjang::create([
            'jenjang' => $request->input('jenjang'),
        ]);

        return response()->json(['jenjang' => $jenjang]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jenjang' => 'required|unique:jenjangs,jenjang,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $jenjang = Jenjang::find($id);
        if (!$jenjang) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $jenjang->jenjang = $request->input('jenjang');
        $jenjang->save();

        return response()->json(['jenjang' => $jenjang]);
    }

    public function destroy($id)
    {
        Jenjang::destroy($id);
        return response()->json([], 204);
    }

    public function show($id)
    {
        $jenjang = Jenjang::find($id);

        if (!$jenjang) {
            return view('errors.404');
        }

        return response()->json(['jenjang' => $jenjang]);
    }
}
