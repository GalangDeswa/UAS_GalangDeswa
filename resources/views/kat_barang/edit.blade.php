@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <form action="/kat_toko/edit/{{$edit->id_kat_toko}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Kategori toko</label>
                <input type="text" name="kategori_toko" class="form-control" id="exampleInputEmail1"
                    placeholder="masukan kategori toko" value="{{ $edit->kategori_toko}}">
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection