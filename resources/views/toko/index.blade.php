@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table toko</h3>

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
                                <th width="280px" class="text-center">Nama toko</th>
                                <th width="280px" class="text-center">pemilik</th>
                                <th width="280px" class="text-center">kategori toko</th>
                                <th width="280px" class="text-center">Desc toko</th>
                                {{-- <th width="280px" class="text-center">pemilik</th> --}}
                                <th width="280px" class="text-center">alamat</th>
                                <th width="280px" class="text-center">List barang</th>



                                @can('create',App\toko::class)
                                <th width="280px" class="text-center"><a class="btn btn-primary btn-sm"
                                        href="/toko/form">tambah</a></th>
                                @endcan



                            </tr>
                        </thead>
                        @foreach ($toko as $data)
                        <tbody>

                            <tr>
                                <td class="text-center">{{ ++$nomor }}</td>
                                <td class="text-center">{{ $data->nama_toko}}</td>
                                <td class="text-center">{{ $data->pemilik}}</td>
                                <td class="text-center">{{ $data->r_kat_toko->kategori_toko}}</td>
                                <td class="text-center">{{ $data->desc_toko}}</td>
                                {{-- <td class="text-center">{{ $data->r_user->name}}</td> --}}
                                <td class="text-center">{{ $data->alamat}}</td>
                                <td class="text-center"><button type="button" class="btn btn-info btn-sm"
                                        data-toggle="modal" data-target="#c{{$data->id_toko}}">
                                        <i class="fa fa-list"></i>
                                    </button></td>

                                <td class="text-center">


                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#a{{$data->id_toko}}">
                                        <i class="fa fa-image"></i>
                                    </button>
                                    @can('create',App\toko::class)
                                    <a class="btn btn-primary btn-sm" href="/toko/formedit/{{$data->id_toko}}"><i
                                            class="fa fa-edit"></i></a>
                                    @endcan

                                    <!-- Button trigger modal -->
                                    @can('create',App\toko::class)
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#b{{$data->id_toko}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @endcan

                                </td>


                                <div class="modal fade" id="a{{$data->id_toko}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{url($data->foto)}}" height="300" alt="Image" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>



                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="b{{$data->id_toko}}" tabindex="-1" role="dialog"
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
                                                ingin menghapus {{$data->nama_toko}}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>


                                                <form action="/toko/delete/{{$data->id_toko}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal fade" id="c{{$data->id_toko}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                @foreach ($data->r_barang as $item)
                                                <h5>{{$item->nama_barang}}</h5>
                                                {{-- <table>
                                                    <tr>
                                                        <th class="text-center">nama barang</th>
                                                        <th class="text-center">harga</th>
                                                        <th class="text-center">qty</th>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">{{$item->nama_barang}}</td>
                                                        <td class="text-center">{{$item->harga}}</td>
                                                        <td class="text-center">{{$item->qty_barang}}</td>

                                                    </tr>
                                                </table> --}}

                                                @endforeach

                                                {{-- <h5>{{$data->r_barang->nama_barang}}</h5> --}}


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>



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