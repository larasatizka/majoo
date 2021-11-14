<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Transaksi;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home.index');
    }

    public function search(Request $request)
    {
		$data=Produk::where('nama_produk','LIKE','%'.$request->search.'%')->get()->all();
		$kategori = Kategori::get()->all();
		return view('produk.pembeli', compact('data', 'kategori'));
    }

}
