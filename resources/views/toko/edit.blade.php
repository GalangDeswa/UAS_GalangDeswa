@extends('master')
@section('title','barang')
@section('barang','active')
@section('content')



<form action="/kategori/edit/{{$edit->id}}" method="POST">
    @csrf
    @method('PUT')


    <div class="form-group">
        <label for="exampleFormControlInput1">Nama kategori</label>
        <input type="Text" name="kategori" value="{{ $edit->kategori}}"
            class=" form-control @error('kategori') is-invalid" id="exampleFormControlInput1" placeholder="" @enderror>
    </div>
    @error('kategori')
    <div class="text-danger">{{$message}}</div>
    @enderror



    <br>
    <div class="row">

        <!-- /.col -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-info w-p100 mt-15">edit</button>
        </div>
        <!-- /.col -->
    </div>

</form>


@endsection