@extends('layouts.master')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Main menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$toko}}</h3>

                            <p>Total toko</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/toko" class="small-box-footer">Table toko <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$barang}}</h3>

                            <p>Total barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/barang" class="small-box-footer">Table barang <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$kat_toko}}</h3>

                            <p>Total kategori toko</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/kat_toko" class="small-box-footer">Table kategori toko <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Sales
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th width="20px" class="text-center">No</th>
                                                <th width="280px" class="text-center">Nama barang</th>
                                                <th width="280px" class="text-center">kondisi</th>
                                                <th width="280px" class="text-center">kategori barang</th>
                                                <th width="280px" class="text-center">toko</th>
                                                <th width="280px" class="text-center">Desc barang</th>

                                                <th width="280px" class="text-center">harga</th>
                                                <th width="280px" class="text-center">harga diskon</th>
                                                <th width="280px" class="text-center">QTY</th>





                                            </tr>
                                        </thead>
                                        @foreach ($barang_display as $data)
                                        <tbody>

                                            <tr>
                                                <td class="text-center">{{ ++$nomor }}</td>
                                                <td class="text-center">{{ $data->nama_barang}}</td>
                                                <td class="text-center">{{ $data->kondisi}}</td>

                                                <td class="text-center">{{ $data->kat_barang->kategori_barang}}</td>
                                                <td class="text-center">{{ $data->nama_toko->nama_toko}}</td>
                                                {{-- <td class="text-center">{{ $data->nama_toko->nama_toko}}</td> --}}
                                                <td class="text-center">{{ $data->desc_barang}}</td>
                                                {{-- <td class="text-center">{{ $data->r_user->name}}</td> --}}

                                                <td class="text-center">{{ $data->harga}}</td>
                                                <td class="text-center">{{ $data->harga_diskon}}</td>
                                                <td class="text-center">{{ $data->qty_barang}}</td>





                                                <div class="modal fade" id="a{{$data->id_barang}}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                @foreach ($data->foto_barang as $item)
                                                                <img src="{{url($item->foto)}}" height="300"
                                                                    alt="Image" />

                                                                @endforeach
                                                                {{-- <img src="{{url($data->foto_barang->foto)}}"
                                                                    height="300" alt="Image" /> --}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="modal fade" id="b{{$data->id_barang}}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">hapus
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ingin menghapus {{$data->nama_barang}}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>


                                                                <form action="/barang/delete/{{$data->id_barang}}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-primary">hapus</button>
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


                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- DIRECT CHAT -->

                    <!--/.direct-chat -->

                    <!-- TO DO List -->

                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>









{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection