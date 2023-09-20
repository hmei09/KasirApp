<?php

namespace App\Http\Controllers;

use App\Models\MejaModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;

class PesananController extends Controller
{
        public function index()
        {
            $view = PesananModel::with('meja','user')->orderByDesc('created_at')->get();
            return view('kasir.riwayat', compact('view'));
            
        }

        public function filter(Request $request) {
            $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Lakukan validasi data input sesuai kebutuhan Anda

        $filteredData = PesananModel::whereBetween('tgl_pesanan', [$start_date, $end_date])->get();
            return view('kasir.riwayat-filter', ['filteredData' => $filteredData]);
        }

    public function report()
    {
        $report = PesananModel::all();
        return view('admin.laporan.laporan', compact('report'));
    }   
    public function reportBulanan()
    {
        $report = PesananModel::all();
        return view('admin.laporan.laporanBulanan', compact('report'));
    }
    public function reportTahunan()
    {
        $report = PesananModel::all();
        return view('admin.laporan.laporanTahunan', compact('report'));
    }
    public function view()
    {
        $meja = MejaModel::all();
        return view('kasir.transaksi', compact('meja'));
    }

    function store(Request $request) {
        $request->validate([
            'tgl_pesanan' => 'required',
            'id' => 'required|integer',
            'no_meja' => 'required|integer',
            'total_harga' => 'required|numeric|integer',
            'bayar' => 'required|numeric|integer',
            'kembali' => 'required|numeric|integer'
        ]);

        $data = new PesananModel;
        $data->tgl_pesanan = $request->input("tgl_pesanan");
        $data->id = $request->input("id");
        $data->no_meja = $request->input("no_meja");
        $data->total_harga = $request->input("total_harga");
        $data->bayar = $request->input("bayar");
        $data->kembali = $request->input("kembali");

        $data->save();

        return redirect()->route('transaksi')->with('success', 'Terima Kasih Telah Berbelanja');
        }     
        
        function destroy($id_pesanan, Request $request) {
            $hapus = PesananModel::find($id_pesanan);
            $hapus->delete();
            return redirect()->route('riwayat')->with('toast_success', '1 Data Riwayat Berhasil Di Hapus');
        }
    }
