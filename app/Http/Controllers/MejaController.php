<?php

namespace App\Http\Controllers;

use App\Models\MejaModel;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    function index() {
        $meja = MejaModel::all();
        return view('admin.meja.index', compact('meja'));
    }

    function store(Request $request){
        MejaModel::create($request->except('_token'));
        return redirect()->route('meja')->with('toast_success', 'Data Berhasil Di Tambahkan');
    }

    public function updateStatusMeja(Request $request)
    {
        $request->validate([
            'no_meja' => 'required',
            'status_meja' => 'required|in:kosong,penuh', // pastikan value hanya kosong atau penuh
        ]);

        $noMeja = $request->input('no_meja');
        $statusMeja = $request->input('status_meja');

        // Update status meja di database berdasarkan no_meja
        Mejamodel::where('no_meja', $noMeja)->update(['status_meja' => $statusMeja]);

        return response()->json(['message' => 'Status meja berhasil diubah.']);
    }

    function destroy($no_meja, request $request) {
        $dell = MejaModel::find('no_meja');
        $dell->delete();
        return redirect()->route('meja')->with('toast_success', 'Meja Berhasil Di Hapus');
    }
}
    


