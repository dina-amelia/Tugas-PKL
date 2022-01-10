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
                <h1 class="m-0">Edit Transaksi Pembayaran</h1>
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
                <div class="card-header"> Data Transaksi</div>
                <div class="card-body">
                    <form action="{{route('transaksi.update', $pembayaran->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{$pembayaran->nama_barang}}" class="form-control @error('nama_barang') is-invalid @enderror">
                             @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telephone</label>
                            <input type="text" name="no_telephone" value="{{$pembayaran->no_telephone}}" class="form-control @error('no_telephone') is-invalid @enderror">
                             @error('no_telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Qty</label>
                            <input type="text" name="qty" value="{{$pembayaran->qty}}" class="form-control @error('qty') is-invalid @enderror">
                             @error('qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Id Pesanan</label>
                            <select name="pesanan_id" class="form-control @error('pesanan_id') is-invalid @enderror" >
                                @foreach($pesanan as $data)
                                    <option value="{{$data->id}}" {{$data->id == $pembayaran->pesanan_id ? 'selected="selected"' : '' }}>{{$data->id}}</option>
                                @endforeach
                            </select>
                            @error('pesanan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" value="{{$pembayaran->tanggal_bayar}}" class="form-control @error('tanggal_bayar') is-invalid @enderror">
                             @error('tanggal_bayar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Total</label>
                            <input type="text" name="total" value="{{$pembayaran->total}}" class="form-control @error('total') is-invalid @enderror">
                             @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
