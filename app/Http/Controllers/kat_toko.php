<?php

namespace App\Http\Controllers;

use App\Models\kat_toko as ModelsKat_toko;
use Illuminate\Http\Request;

class kat_toko extends Controller
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
        $kat = ModelsKat_toko::all();
        return view('kat_toko.index',compact('kat','nomor'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('kat_toko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new ModelsKat_toko();

        $request->validate(
        [
        'kategori_toko' => 'required',
        ]
        );

        $tambah->kategori_toko = $request->kategori_toko;

        $tambah->save();

        return redirect('/kat_toko');
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
         
         $edit = ModelsKat_toko::find($id);
         return view('kat_toko.edit',compact('edit'));
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
         $edit = ModelsKat_toko::find($id);
         $edit->kategori_toko = $request->kategori_toko;

         $edit->save();
         return redirect('/kat_toko');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $hapus = ModelsKat_toko::find($id);
         $hapus->delete();

         return redirect('/kat_toko');
    }
}
