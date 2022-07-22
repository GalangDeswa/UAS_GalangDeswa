@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <form action="/toko/edit/{{$edit->id_toko}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama toko</label>
                <input type="text" name="nama_toko" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan kategori toko" value="{{ $edit->nama_toko}}">
            </div>

            <div class="form-group">
                <h6>Kategori barang</h6>
                <div class="form-control">
                    <select name="id_kategori_toko" id="" @error('id_kat_barang') is-invalid" @enderror
                        value="{{old('id_kat_barang')}}">
                        <option value="">Pilih Kategori barang</option>
                        @foreach ($kat as $item)
                        <option value={{$item->id_kat_toko}}>{{$item->kategori_toko}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">desc</label>
                <input type="text" name="desc_toko" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan kategori toko" value="{{ $edit->desc_toko}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">pemilik</label>
                <input type="text" name="pemilik" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan kategori toko" value="{{ $edit->nama_toko}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">alamat</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan kategori toko" value="{{ $edit->alamat}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">password</label>
                <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan kategori toko">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Foto</label>
                <input type="file" name="foto" class="form-control" id="exampleFormControlInput1"
                    placeholder="nama barang" value="{{old('foto')}}" @error('foto') is-invalid" @enderror>
            </div>


        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

</div>
<!-- /.card-body -->


</form>
</div>
@endsection