<?php

namespace App\Http\Controllers;

use App\Models\barang as ModelsBarang;
use App\Models\foto_barang;
use App\Models\kat_barang;
use App\Models\toko;
use Carbon\Carbon;
use Illuminate\Http\Request;

class barang extends Controller
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
        $barang = ModelsBarang::all();
       // $id_barang = $barang->id_toko_barang;
       // $toko = toko::where('id_toko',$id_barang)->first();
        
        return view('barang.index',compact('nomor','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $this->authorize('create',barang::class);
        $kat=kat_barang::all();

         return view('barang.create',compact('kat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {

        $this->authorize('create',barang::class);
        $tambah = new ModelsBarang();
        

       /*  $request->validate(
        [
        'nama_barang' => 'required',
        'desc_barang' => 'required',
        'qty_barang' => 'required',
        'harga' => 'required',
        'harga_diskon' => 'required',
        'id_kategori_barang' => 'required',
        'id_foto' => 'required',
        ]
        ); */

        $tambah->id_kategori_barang = $request->id_kategori_barang;
        $tambah->nama_barang = $request->nama_barang;
        $tambah->qty_barang = $request->qty_barang;
        $tambah->desc_barang = $request->desc_barang;
        $tambah->harga = $request->harga;
        $tambah->harga_diskon = $request->harga_diskon;
        $tambah->id_toko_barang = $request->id_toko_barang;
        $tambah->kondisi = $request->kondisi;
        $tambah->waktu = Carbon::now();
        $tambah->save();
        $id_barang = $tambah->id_barang;

        // if($image= $request->file('foto')){

        foreach($request->foto as $file){
            $foto = new foto_barang();
            
            $foto -> id_barang = $id_barang;
            $name = $file->getClientOriginalName();
            $foto->foto= $file->move('foto barangv3',$name);
            $foto -> save();

        }


        // }

        
        return redirect('/barang');
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
        $kat= kat_barang::all();
        $edit = ModelsBarang::find($id);
        return view('barang.edit',compact('edit','kat'));
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
        $edit = ModelsBarang::find($id);
        $edit->id_kategori_barang = $request->id_kategori_barang;
        $edit->nama_barang = $request->nama_barang;
        $edit->qty_barang = $request->qty_barang;
        $edit->desc_barang = $request->desc_barang;
        $edit->harga = $request->harga;
        $edit->harga_diskon = $request->harga_diskon;
        $edit->id_toko_barang = $request->id_toko_barang;
        $edit->kondisi = $request->kondisi;
        $edit->waktu = Carbon::now();
        

        $edit->save();
        $edit->id;

          if ($request->hasfile('foto')) {
          $images = $request->file('foto');

          foreach($images as $image) {
           $nama = $request->foto->getClientOriginalName();
          $image -> move('fotobarangv2',$nama);

                foto_barang::create([
                'id_barang' => 1,
                'foto' => $image
                ]);
          }
          }
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = ModelsBarang::find($id);
        $hapus->delete();

        return redirect('/barang');
    }
}
