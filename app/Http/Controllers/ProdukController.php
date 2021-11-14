<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Varian;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Storage;
use File;


class ProdukController extends Controller
{
    //
    public function index(){
    	$data = Produk::join('kategori as kt', 'produk.id_kategori', '=', 'kt.id_kategori')->get()->all();
    	return view('produk.index', compact('data'));	
    }

    public function create()
    {
        $data = Kategori::get()->all();
        return view('produk.create', compact('data'));
    }

    public function store(Request $request)
    {
        
        $cek = Produk::where('nama_produk', '=', $request->nama_produk)->first();

    	$validate= $this->validate($request, [
            'foto_produk' => 'required|file|max:7000', // max 7MB
        ]);

        if (empty($cek)) {
            if ($validate) {
                if ($request->hasFile('foto_produk')) {
                    $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto_produk')->getClientOriginalName());
                    $request->file('foto_produk')->move(public_path('asset'), $filename);
                    $pr = new Produk;
                    $pr->nama_produk = $request->nama_produk;
                    $pr->id_kategori = $request->id_kategori;
                    $pr->foto_produk = $filename;
                    $pr->deskripsi = $request->deskripsi;
                    $pr->harga = $request->harga;
                    $pr->save();
                }   
            } else {
                return redirect()->back()->with('error', 'Ukuran File Gambar Terlalu Besar');
            }
        } else if (!empty($cek)){
            return redirect()->back()->with('error', 'Nama produk duplicate');
        }
        
        
        if ($pr->save()) {
            return redirect('produk')->with('success', 'Tambah Produk berhasil.!');
        } else{
            return redirect()->back()->with('error', 'Tambah Produk gagal.!');
        }
        
    }

    public function show(Request $request, $id_produk)
    {
        $data       = Produk::where('id_produk', $id_produk)->first();
        $kategori   = Kategori::get()->all();
        
        return view('produk.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id_produk)
    {

        $pr = Produk::where('id_produk', $id_produk)->first();
        $cek = Produk::where('nama_produk', '=', $request->nama_produk)->first();

        if ($request->nama_produk == $request->conf_nama) {
            if($request->hasFile('foto_produk')) {
                $path = public_path().'/asset/'.$pr->foto_produk;
                unlink($path);

                $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto_produk')->getClientOriginalName());
                $request->file('foto_produk')->move(public_path('asset'), $filename);

                $pr->nama_produk = $request->nama_produk;
                $pr->id_kategori = $request->id_kategori;
                $pr->foto_produk = $filename;
                $pr->deskripsi = $request->deskripsi;
                $pr->harga = $request->harga;

                $pr->save();

            } 
            else if ($request->file('foto_produk') == '') {

                $pr->nama_produk = $request->nama_produk;
                $pr->id_kategori = $request->id_kategori;
                $pr->deskripsi = $request->deskripsi;
                $pr->harga = $request->harga;

                $pr->save();

            }
        } else if($request->nama_produk != $request->conf_nama){
            if (empty($cek)) {
                if($request->hasFile('foto_produk')) {
                    $path = public_path().'/asset/'.$pr->foto_produk;
                    unlink($path);

                    $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto_produk')->getClientOriginalName());
                    $request->file('foto_produk')->move(public_path('asset'), $filename);

                    $pr->nama_produk = $request->nama_produk;
                    $pr->id_kategori = $request->id_kategori;
                    $pr->foto_produk = $filename;
                    $pr->deskripsi = $request->deskripsi;
                    $pr->harga = $request->harga;

                    $pr->save();

                } 
                else if ($request->file('foto_produk') == '') {

                    $pr->nama_produk = $request->nama_produk;
                    $pr->id_kategori = $request->id_kategori;
                    $pr->deskripsi = $request->deskripsi;
                    $pr->harga = $request->harga;

                    $pr->save();

                }
            } else if (!empty($cek)){
                return redirect()->back()->with('error', 'Nama produk duplicate');
            }
        }

        if ($pr->save()) {
           return redirect()->back()->with('success', 'Update Produk berhasil.!');
        } else {
            return redirect()->back()->with('error', 'Update Produk gagal.!');
        }
        
    }
    
    public function destroy($id_produk)
    {
       
		$gambar = Produk::find($id_produk);
        $path = public_path().'/asset/'.$gambar->foto_produk;
        unlink($path);
	 
        $data = Produk::where('id_produk', $id_produk)->delete();
        return redirect('produk')->with('success', 'Hapus Produk berhasil.!');
    }

    public function katalog(){
        $kategori = Kategori::get()->all();
        $data = Produk::get()->all();
        return view('produk.pembeli', compact('data', 'kategori')); 
    }

    public function kategori($nama_kategori){
        $data = Produk::join('kategori as kt', 'produk.id_kategori', '=', 'kt.id_kategori')
                ->where('nama_kategori', '=', $nama_kategori)
                ->get()->all();
        $kategori = Kategori::get()->all();
        return view('produk.pembeli', compact('data', 'kategori')); 
    }

}
