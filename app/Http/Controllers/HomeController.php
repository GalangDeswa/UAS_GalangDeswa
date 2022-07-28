<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kat_barang;
use App\Models\kat_toko;
use App\Models\toko;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nomor = 0;
        $toko = toko::all()->count();
        $barang = barang::all()->count();
        $barang_display = barang::all();
        $kat_toko = kat_toko::all()->count();
        $kat_barang = kat_barang::all()->count();
        return view('home',compact('toko','barang','barang_display','kat_toko','kat_barang','nomor'));
    }


    public function jumlah_toko(){
        
        return view('/',compact('toko'));
    }
}
