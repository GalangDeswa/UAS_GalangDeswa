<?php

namespace App\Http\Controllers;

use App\Models\kat_barang as ModelsKat_barang;
use Illuminate\Http\Request;

class kat_barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
     $this->middleware('auth');
     }


    public function index()
    {
         $nomor= 0;
         $kat = ModelsKat_barang::all();
         return view('kat_barang.index',compact('kat','nomor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kat_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tambah = new ModelsKat_barang();

         $request->validate(
         [
         'kategori_barang' => 'required',
         ]
         );

         $tambah->kategori_barang = $request->kategori_barang;

         $tambah->save();

         return redirect('/kat_barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $edit = ModelsKat_barang::find($id);
         return view('kat_barang.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $edit = ModelsKat_barang::find($id);
         $edit->kategori_barang = $request->kategori_barang;

         $edit->save();
         return redirect('/kat_barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = ModelsKat_barang::find($id);
        $hapus->delete();

        return redirect('/kat_barang');
    }
}
