<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kat_toko;
use App\Models\toko as ModelsToko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class toko extends Controller
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
        $toko = ModelsToko::all();
        $barang = barang::all();
        return view('toko.index',compact('toko','nomor','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $kat = kat_toko::all();
        return view('toko.create',compact('kat'));
      
    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tambah = new ModelsToko();

          $request->validate(
          [
          'nama_toko' => 'required',
          'desc_toko' => 'required',
          'alamat' => 'required',
          'password' => 'required',
          'foto' => 'required',
          'id_kategori_toko' => 'required',
          'pemilik' => 'required',
          ]
          );

          $tambah->id_kategori_toko = $request->id_kategori_toko;
          $tambah->pemilik = $request->pemilik;
          $tambah->nama_toko = $request->nama_toko;
          $tambah->desc_toko = $request->desc_toko;
          $tambah->alamat = $request->alamat;
          $tambah->password = $request->password;
          if($request->hasFile('foto')){
          $nama = $request->foto->getClientOriginalName();
          $tambah->foto=$request->foto->move('tokov2',$nama);
          }

           $tambah->save();
           return redirect('/toko');
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
         $kat= kat_toko::all();
         $edit = ModelsToko::find($id);
         return view('toko.edit',compact('edit','kat'));
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
        $edit = ModelsToko::find($id);
        $edit->id_kategori_toko = $request->id_kategori_toko;
        $edit->pemilik = $request->pemilik;
        $edit->nama_toko = $request->nama_toko;
        $edit->desc_toko = $request->desc_toko;
        $edit->alamat = $request->alamat;
        $edit->password = $request->password;
        if($request->hasFile('foto')){
        $nama = $request->foto->getClientOriginalName();
        $edit->foto=$request->foto->move('tokov2',$nama);
        }

        $edit->save();
        return redirect('/toko');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = ModelsToko::find($id);
        $hapus->delete();

        return redirect('/toko');
    }
}
