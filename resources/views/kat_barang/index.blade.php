@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table kategori barang</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="20px" class="text-center">No</th>
                                <th width="280px" class="text-center">kategori barang</th>
                                <th width="280px" class="text-center"><a class="btn btn-primary btn-sm"
                                        href="/kat_barang/form">tambah</a></th>


                            </tr>
                        </thead>
                        @foreach ($kat as $data)
                        <tbody>

                            <tr>
                                <td class="text-center">{{ ++$nomor }}</td>
                                <td class="text-center">{{ $data->kategori_barang}}</td>
                                <td class="text-center">



                                    <a class="btn btn-primary btn-sm"
                                        href="/kat_barang/formedit/{{$data->id_kat_barang}}"><i
                                            class="fa fa-edit"></i></a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#b{{$data->id_kat_barang}}">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </td>


                                <div class="modal fade" id="b{{$data->id_kat_barang}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ingin menghapus {{$data->kategori_barang}}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>


                                                <form action="/kat_barang/delete/{{$data->id_kat_barang}}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </tr>




                        </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection