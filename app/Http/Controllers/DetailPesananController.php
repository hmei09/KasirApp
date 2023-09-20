<?php

namespace App\Http\Controllers;
use App\Models\DetailPesananModel;
use App\Models\MejaModel;
use App\Models\MenuModel;
// use App\Models\MenuModel;
use Illuminate\Http\Request;
use PDF;


class DetailPesananController extends Controller
{
    public function index()
{
    $detail = DetailPesananModel::with('menu')->get();    
    // dd($detail);
    // $detail = DetailPesananModel::all();

    $menu = MenuModel::orderBy('created_at', 'desc')->get();
    $meja = MejaModel::all();
    
    return view('kasir.transaksi', compact('detail', 'meja', 'menu'));
}


public function store(Request $request)
{
    // Validate the incoming request data as needed
    $validatedData = $request->validate([
        // 'id_pesanan' => 'required|integer',
        'id_menu' => 'required|integer',
        'qty' => 'required|integer',
        'sub_total' => 'required|numeric',
        // Add other validation rules as needed
    ]);

    // Create a new record in the detail_pesanan table
    $detailPesanan = new DetailPesananModel();
    // $detailPesanan->id_pesanan = $validatedData['id_pesanan'];
    $detailPesanan->id_menu = $validatedData['id_menu'];
    $detailPesanan->qty = $validatedData['qty'];
    $detailPesanan->sub_total = $validatedData['sub_total'];
    // Add other fields as needed
    $detailPesanan->save();

    return redirect()->route('transaksi');
    // Return a response indicating success or any other data you may need on the front-end
    // return response()->json([
    //     'message' => 'Data inserted successfully.',
    //     'data' => $detailPesanan,
    // ]);
}

function destroy(Request $request) {
    // Hapus seluruh data pada tabel UserModel
    DetailPesananModel::truncate();

    return redirect()->route('transaksi');
}
function delete($id_detail, Request $request)
{
    // Hapus data pada tabel DetailPesananModel berdasarkan id_detail
    $hapus = DetailPesananModel::find($id_detail);
    if (!$hapus) {
        return response()->json(['message' => 'Item not found.'], 404);
    }

    $hapus->delete();

    // Return a success response (you can customize this message as needed)
    return response()->json(['message' => 'Item deleted successfully.'], 200);
}

// function printPdf() {
//     $detail = DetailPesananModel::with('menu')->get();
//     $menu = MenuModel::all();
//     $meja = MejaModel::all();
    
//     $pdf = PDF::loadView('kasir.struk', compact('detail', 'meja', 'menu'));

//     return $pdf->download('struk.pdf');
// }

}
