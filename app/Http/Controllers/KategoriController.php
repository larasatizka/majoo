<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $data = Kategori::get()->all();
        return view('kategori.index', compact('data'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $kt = new Kategori;
        $kt->nama_kategori = $request->nama;
        $kt->save();

        if ($kt->save()) {
            return redirect('kategori')->with('success', 'Tambah Kategori berhasil.!');
        } else{
            return redirect()->back()->with('error', 'Tambah Kategori gagal.!');
        }
        
    }

    public function show(Request $request)
    {
        $data = Kategori::where('id_kategori', $request->id_kategori)->first();
        return view('kategori.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = Kategori::where('id_kategori', $request->id_kategori)->first();
        $data->nama_kategori = $request->nama;
        $data->save();

        if ($data->save()) {
            return redirect('kategori')->with('success', 'Tambah Kategori berhasil.!');
        } else{
            return redirect()->back()->with('error', 'Tambah Kategori gagal.!');
        }
    }

    public function destroy($id_kategori)
    {
        $data = Kategori::where('id_kategori', $id_kategori)->delete();
        return redirect('kategori')->with('success', 'Hapus Kategori berhasil.!');
    }
}
