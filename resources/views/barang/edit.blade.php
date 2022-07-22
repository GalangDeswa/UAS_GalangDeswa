@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <form action="/barang/edit/{{$edit->id_barang}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama barang</label>
                <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan nama barang" value="{{$edit->nama_barang}}">
            </div>

            <div class="form-group">
                <h6>Kategori barang</h6>
                <div class="form-control">
                    <select name="id_kategori_barang" id="" @error('id_kat_barang') is-invalid" @enderror
                        value="{{old('id_kat_barang')}}">
                        <option value="">Pilih Kategori barang</option>
                        @foreach ($kat as $item)
                        <option value={{$item->id_kat_barang}}>{{$item->kategori_barang}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">desc</label>
                <input type="text" name="desc_barang" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan desc barang" value="{{$edit->desc_barang}}">
            </div>

            <div class="form-group">
                <h6>kondisi</h6>
                <div class="form-control">
                    <select name="kondisi" id="" @error('id_kat_barang') is-invalid" @enderror
                        value="{{old('id_kat_barang')}}">
                        <option value="">Pilih Kondisi barang</option>
                        <option value="baru">Baru</option>
                        <option value="bekas">Bekas</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">id toko barang</label>
                <input type="text" name="id_toko_barang" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan id toko" value="{{$edit->id_toko_barang}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">harga</label>
                <input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="masukan harga"
                    value="{{$edit->harga}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">harga diskon</label>
                <input type="text" name="harga_diskon" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan harga diskon" value="{{$edit->harga_diskon}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">stock</label>
                <input type="text" name="qty_barang" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan harga diskon" value="{{$edit->qty_barang}}">
            </div>



            <div class="form-group">
                <label for="exampleFormControlInput1">Foto</label>
                <input type="file" name="id_foto[]" class="form-control" id="exampleFormControlInput1"
                    placeholder="foto barang" value="{{ $edit->id_foto}}" @error('id_foto') is-invalid" @enderror>
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection