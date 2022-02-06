@extends('adminlte::page')

@section('title', 'Data Pesanan')

@section('content_header')

Data Pesanan

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">DATA PEMESANAN</h1>
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
                    DATA PESANAN
                    <a href="{{route('pesanan.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Pesanan Baru</a>
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
                                <th>Pemesanan</th>
                                <th>Alamat</th>
                                <th>No Telephone</th>
                                <th>Jumlah</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Tanggal Pesan</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($pesanan as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->pemesan}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->no_telephone}}</td>
                                    <td>{{$data->jumlah}}</td>
                                    <td>{{$data->barang->nama_barang}}</td>
                                    <td>{{$data->harga}}</td>
                                    <td>{{$data->tanggal_pesan}}</td>

                                    <td>
                                        <a href="{{route('pesanan.edit', $data->id)}}" class="mb-2 btn btn-outline-info">Edit</a>
                                        <form action="{{route('pesanan.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('pesanan.show', $data->id)}}" class="btn btn-info">Show</a><br>
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
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
