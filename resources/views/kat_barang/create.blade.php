@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <form action="/kat_barang/tambah" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Kategori barang</label>
                <input type="text" name="kategori_barang" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan kategori barang">
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection