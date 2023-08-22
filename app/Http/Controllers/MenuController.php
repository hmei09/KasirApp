<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class MenuController extends Controller
{
    function index() {
        $data = MenuModel::orderByDesc('id_menu')->get();
        return view('admin.menu.index', compact('data'));
    }    
    // function dota() {
    //     $dota = MenuModel::orderByDesc('id_menu')->get();
    //     return view('kasir.transaksi', compact('dota'));
    // }    
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'tipe' => 'required',
            'status_menu' => 'required',
            'harga' => 'required|numeric|integer',
            'foto' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move('galery', $fileName);

            MenuModel::create([
                'nama_menu' => $request->input('nama_menu'),
                'tipe' => $request->input('tipe'),
                'status_menu' => $request->input('status_menu'),
                'harga' => $request->input('harga'),
                'foto' => $fileName,
            ]);

            return redirect()->route('menu')->with('toast_success', 'Data Berhasil Ditambahkan');
        }

        return redirect()->back();
    }

    function edit($id_menu){
        $data = MenuModel::find($id_menu);
        return view('admin.menu.edit', compact('data'));
    }

    function destroy(Request $request, $id_menu) {
        $data = MenuModel::find($id_menu);
        $foto = $data->foto;
        if ($foto) {
            $folder = public_path('galery/'.$foto);
            if (file_exists($folder)) {
                unlink($folder);
            }
        }
        $data->delete();
        return redirect()->route('menu')->with('toast_success', 'Data Berhasil Di Hapus');
    }

    function update($id_menu, Request $request) {
        $menu = MenuModel::find($id_menu);
        $isChanged = false;

        if ($request->hasFile('foto')) {
            if ($menu->foto) {
                $fotoPath = public_path('galery/' . $menu->foto);
                if (File::exists($fotoPath)) {
                    File::delete($fotoPath);
                }
            }
            $foto = $request->file('foto');
            $fotoName = time() . '.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('galery/'), $fotoName);
            $menu->foto = $fotoName;
            $isChanged = true;
        }
        if ($menu->nama_menu != $request->input('nama_menu')) {
            $menu->nama_menu = $request->input('nama_menu');
            $isChanged = true;
        }
        if ($menu->tipe != $request->input('tipe')) {
            $menu->tipe = $request->input('tipe');
            $isChanged = true;
        }
        if ($menu->status_menu != $request->input('status_menu')) {
            $menu->status_menu = $request->input('status_menu');
            $isChanged = true;
        }
        if ($menu->harga != $request->input('harga')) {
            $menu->harga = $request->input('harga');
            $isChanged = true;
        }
        if (!$isChanged) {
            return redirect()->route('menu')->withToastInfo('Tidak Ada Data Yang Di Update');
        }
        $menu->save();
        return redirect()->route('menu')->withToastSuccess('Data Berhasil Di Update');
    }
}
