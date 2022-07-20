@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table kat toko</h3>

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
                                <th width="280px" class="text-center">kategori</th>
                                <th width="280px" class="text-center"><a class="btn btn-primary btn-sm"
                                        href="/kat_toko/form">tambah</a></th>


                            </tr>
                        </thead>
                        @foreach ($kat as $data)
                        <tbody>

                            <tr>
                                <td class="text-center">{{ ++$nomor }}</td>
                                <td class="text-center">{{ $data->kategori_toko}}</td>

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