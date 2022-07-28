@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <form action="/kat_barang/edit/{{$edit->id_kat_barang}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Kategori barang</label>
                <input type="text" name="kategori_barang" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan kategori barang" value="{{ $edit->kategori_barang}}">
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection