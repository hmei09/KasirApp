<?php

namespace App\Http\Controllers;

use App\Models\PesananModel;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    function index() {
    $totalUsers = User::count();

    // Hitung total pesanan berdasarkan tanggal sesuai zona waktu komputer
    $today = Carbon::now()->format('Y-m-d');
    $totalPesanan = PesananModel::whereDate('tgl_pesanan', $today)->count();
    $totalHarga = PesananModel::whereDate('tgl_pesanan', $today)->sum('total_harga');

    // Mingguan
    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();
    $totalHargaMingguan = PesananModel::whereBetween('tgl_pesanan', [$startOfWeek, $endOfWeek])->sum('total_harga');
    return view('admin.dashboard.index', [
        'totalUsers' => $totalUsers,
        'totalPesanan' => $totalPesanan,
        'totalHarga' => $totalHarga,
        'totalHargaMingguan' => $totalHargaMingguan,
    ]);
    }    
}
