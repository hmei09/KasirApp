<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index() {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($request->input('password')); // Hash the password

        User::create($data);

        return redirect()->route('user')->with('toast_success', 'Data Berhasil Di Tambahkan');
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        $data = $request->except(['_token', '_method']);
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->input('password')); // Hash the password
        }

        $user->update($data);

        return redirect()->route('user')->with('toast_success', 'User Berhasil Di Update');
    }

    function destroy($id, Request $request) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user')->with('toast_success', 'User Berhasil Di Hapus');
    }

    function edit($id){
        $data = User::find($id);
        return view('admin.user.edit', compact('data'));
    }

    // public function Yes()
    // {
    //     $user = Auth::user(); // Get the authenticated user
        
    //     return view('layouts.sidebar', compact('user'));
    // }
    // public function show($id)
    // {
    //     $show = User::findOrFail($id);
    
    //     return view('users.show', compact('show'));
    // }
}


