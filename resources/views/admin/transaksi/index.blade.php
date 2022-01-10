@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">TRANSAKSI PEMBAYARAN</h1>
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
                    DATA TRANSAKSI PEMBAYARAN
                    <a href="{{route('transaksi.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Transaksi Baru</a>
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
                                <th>Nama Barang</th>
                                <th>No Telephone</th>
                                <th>Qty</th>
                                <th>Id Pesanan</th>
                                <th>Tanggal Bayar</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($pembayaran as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>{{$data->no_telephone}}</td>
                                    <td>{{$data->qty}}</td>
                                    <td>{{$data->pesanan->id}}</td>
                                    <td>{{$data->tanggal_bayar}}</td>
                                    <td>{{$data->total}}</td>

                                    <td>
                                        <a href="{{route('transaksi.edit', $data->id)}}" class="mb-2 btn btn-outline-info">Edit</a>
                                        <form action="{{route('transaksi.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('transaksi.show', $data->id)}}" class="btn btn-info">Show</a><br>
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
