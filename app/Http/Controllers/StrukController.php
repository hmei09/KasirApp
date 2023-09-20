<?php

namespace App\Http\Controllers;

use App\Models\DetailPesananModel;
use App\Models\MejaModel;
use App\Models\MenuModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;

class StrukController extends Controller
{
    public function index()
{
    $detail = DetailPesananModel::with('menu')->get();    
    
    $menu = MenuModel::orderBy('created_at', 'desc')->get();
    $meja = MejaModel::all();
    $pesanan = PesananModel::latest()->first();
    
    return view('kasir.struk', compact('detail', 'menu', 'meja', 'pesanan'));
}
}
