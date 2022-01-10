@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Transaksi Pesanan</h1>
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
                <div class="card-header">Show Data Transaksi Pesanan</div>
                <div class="card-body">
                    <form action="{{route('transaksi.show', $pembayaran->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{$pembayaran->nama_barang}}" class="form-control @error('nama_barang') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">No Telephone</label>
                            <input type="text" name="no_telephone" value="{{$pembayaran->no_telephone}}" class="form-control @error('no_telephone') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Qty</label>
                            <input type="text" name="qty" value="{{$pembayaran->qty}}" class="form-control @error('qty') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Id Pesanan</label>
                            <input type="text" name="pesanan_id" value="{{$pembayaran->pesanan->id}}" class="form-control @error('pesanan_id') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" value="{{$pembayaran->tanggal_bayar}}" class="form-control @error('tanggal_bayar') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Total</label>
                            <input type="text" name="total" value="{{$pembayaran->total}}" class="form-control @error('total') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{url('admin/transaksi')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
