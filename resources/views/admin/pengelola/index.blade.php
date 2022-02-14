@extends('adminlte::page')

@section('title', 'Data Barang')

@section('js')
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/delete.js')}}"></script>
@endsection

@section('content_header')

Data Barang

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">DATA PRODUK</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    BERANDA PRODUK
                    <a href="{{route('pengelola.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Produk Baru</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Stock</th>
                                <th>Tanggal Masuk</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($barang as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->kode_barang}}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>{{$data->stock}}</td>
                                    <td>{{$data->tanggal_masuk}}</td>
                                    <td>{{$data->harga}}</td>
                                    <td>{{$data->kategori}}</td>
                                    <td>{{$data->deskripsi}}</td>
                                    <td><img src="{{$data->image()}}" alt="" style="width:150px; height:150px;" alt="gambar"></td>

                                    <td>
                                        <form action="{{route('pengelola.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('pengelola.edit', $data->id)}}" class="mb-2 btn btn-warning">Edit</a>
                                            <a href="{{route('pengelola.show', $data->id)}}" class="btn btn-info">Show</a>
                                            <button type="submit" class="btn btn-danger delete-confirm">Delete</button><br>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
